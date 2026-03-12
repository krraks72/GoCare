<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\FactoryLocator;
use Cake\Datasource\ConnectionManager;

/**
 * Registros Controller
 *
 * @property \App\Model\Table\RegistrosTable $Registros
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegistrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $session = $_SESSION;
        $docu = $session['Auth']->documento;
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('CALL UsersValidation(:id)', ['id' => $docu])->fetchAll('assoc');
        if ($results[0]['administrador'] == 1) {
            return $this->redirect(['action' => 'home']);
        }
        else {
            $registros = $this->paginate($this->Registros->find()->where(['documentoMedico' => $docu, 'estado' => 1]));
            
            $url = "http://181.57.140.72/WSGoCare/api/CargarRegistros";

            // Inicializar cURL
            $ch = curl_init();

            // Establecer opciones de cURL
            curl_setopt($ch, CURLOPT_URL, $url); // URL del servicio
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retornar la respuesta como string
            curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Timeout para la solicitud
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Accept: application/json'
            ]);

            // Ejecutar la solicitud
            $response = curl_exec($ch);

            // Validar si hubo errores
            if (curl_errno($ch)) {
                //echo "Error en la solicitud: " . curl_error($ch);
                $this->Flash->error(__("Error en la solicitud: " . curl_error($ch)));
            } else {
                // Obtener el código de estado HTTP
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                
                // Verificar si la respuesta es exitosa (código 200)
                if ($http_code === 200) {
                    // Decodificar el JSON recibido
                    $data = json_decode($response, true);
                    
                    // Validar si la decodificación del JSON fue exitosa
                    if (json_last_error() === JSON_ERROR_NONE) {
                        //echo "Datos obtenidos correctamente:";
                        //print_r($data); // Mostrar los datos obtenidos
                        $this->Flash->success(__('Se realizó actualización de registros de citas'));
                    } else {
                        //echo "Error al decodificar JSON: " . json_last_error_msg();
                        $this->Flash->error(__("Error al decodificar JSON: " . json_last_error_msg()));
                    }
                } else {
                    //echo "Error en la solicitud. Código HTTP: " . $http_code;                        
                    $this->Flash->error(__("Error en la solicitud. Código HTTP: " . $http_code));
                }
            }

            // Cerrar cURL
            curl_close($ch);
            
            $this->set(compact('registros','session'));
        }
    }

    /**
     * Return method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function return($filtro = null)
    {
        $session = $_SESSION;
        $docu = $session['Auth']->documento;
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('CALL UsersValidation(:id)', ['id' => $docu])->fetchAll('assoc');
        if ($results[0]['administrador'] == 1) {
            $registros = $this->paginate($this->Registros->find()->where(['numero_identificacion' => $filtro, 'estado' => 4]));

            $this->set(compact('registros','session'));
        }
        else {
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Pending method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function pending()
    {
        $session = $_SESSION;
        $docu = $session['Auth']->documento;
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('CALL UsersValidation(:id)', ['id' => $docu])->fetchAll('assoc');
        if ($results[0]['administrador'] == 1) {
            $registros = $this->paginate($this->Registros->find()->where(['estado' => 1]));

            $this->set(compact('registros','session'));
        }
        else {
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Find method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful find, renders view otherwise.
     */
    public function find()
    {
        $registro = $this->Registros->newEmptyEntity();
        if ($this->request->is('post')) {
            $filtro = $this->request->getData('buscar_documento');
            return $this->redirect(['action' => 'return', $filtro]);
        }
        $this->set(compact('registro'));
    }

    /**
     * View method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registro = $this->Registros->get($id, [
            'contain' => ['Antecedentes', 'Consulta', 'ExamenFisico', 'Hallazgos', 'Obstetricos', 'Revision', 'Rips'],
        ]);

        $this->set(compact('registro'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registro = $this->Registros->newEmptyEntity();
        if ($this->request->is('post')) {
            $registro = $this->Registros->patchEntity($registro, $this->request->getData());
            if ($this->Registros->save($registro)) {
                $this->Flash->success(__('The registro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registro could not be saved. Please, try again.'));
        }
        $this->set(compact('registro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $consecutivo = $id;
        $registro = $this->Registros->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registro = $this->Registros->patchEntity($registro, $this->request->getData());
            if ($this->Registros->save($registro)) {
                $this->Flash->success(__('The registro has been saved.'));
                if ($registro->especialidad == 1) {
                    return $this->redirect(['controller' => 'Consulta','action' => 'index', $registro->id]);
                }
                if ($registro->especialidad == 2) {
                    return $this->redirect(['controller' => 'Fconsulta','action' => 'index', $registro->id]);
                }
            }
            $this->Flash->error(__('The registro could not be saved. Please, try again.'));
        }
        $this->set(compact('registro', 'consecutivo'));
    }

    /**
     * Fedit method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function fedit($id = null)
    {
        $consecutivo = $id;
        $registro = $this->Registros->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registro = $this->Registros->patchEntity($registro, $this->request->getData());
            if ($this->Registros->save($registro)) {
                $this->Flash->success(__('The registro has been saved.'));

                return $this->redirect(['controller' => 'Fconsulta','action' => 'add', $registro->id]);
            }
            $this->Flash->error(__('The registro could not be saved. Please, try again.'));
        }
        $this->set(compact('registro', 'consecutivo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->Registros->get($id);
        if ($this->Registros->delete($registro)) {
            $this->Flash->success(__('The registro has been deleted.'));
        } else {
            $this->Flash->error(__('The registro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Finish method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful finish, renders view otherwise.
     */
    public function finish($consecutivo = null)
    {   
        $id = $consecutivo;
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('CALL validarHC(:id)', ['id' => $id])->fetchAll('assoc');
        $mensaje = "El registro no está completo, revise los datos obligatorios antes de cerrar la HC";
        if (is_null($results[0]['consulta']) || is_null($results[0]['examen']) || is_null($results[0]['rips']) || is_null($results[0]['analisis'])) {
            if (is_null($results[0]['consulta'])) {
                $mensaje = $mensaje.", Falta pestaña Consulta"; 
            } if (is_null($results[0]['examen'])) {
                $mensaje = $mensaje.", Falta pestaña Examen Físico";
            } if (is_null($results[0]['rips'])) {
                $mensaje = $mensaje.", Falta pestaña Diagnósticos";
            } if (is_null($results[0]['analisis'])) {
                $mensaje = $mensaje.", Falta pestaña Análisis";
            }
            if ($this->request->is(['patch', 'post', 'put'])) {
                $this->Flash->error(__($mensaje));
            }
        }
        else {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $this->Registros->updateAll(
                    ['estado' => 0],
                    ['id' => $consecutivo]
                );
                
                $url = "http://181.57.140.72/WSGoCare/api/CargarHC";

                // Inicializar cURL
                $ch = curl_init();

                // Establecer opciones de cURL
                curl_setopt($ch, CURLOPT_URL, $url); // URL del servicio
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retornar la respuesta como string
                curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Timeout para la solicitud
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Accept: application/json'
                ]);

                // Ejecutar la solicitud
                $response = curl_exec($ch);

                // Validar si hubo errores
                if (curl_errno($ch)) {
                    //echo "Error en la solicitud: " . curl_error($ch);
                    $this->Flash->error(__("Error en la solicitud: " . curl_error($ch)));
                } else {
                    // Obtener el código de estado HTTP
                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    
                    // Verificar si la respuesta es exitosa (código 200)
                    if ($http_code === 200) {
                        // Decodificar el JSON recibido
                        $data = json_decode($response, true);
                        
                        // Validar si la decodificación del JSON fue exitosa
                        if (json_last_error() === JSON_ERROR_NONE) {
                            //echo "Datos obtenidos correctamente:";
                            //print_r($data); // Mostrar los datos obtenidos
                            $this->Flash->success(__('Se realizó el cargue de HC en Panacea'));
                        } else {
                            //echo "Error al decodificar JSON: " . json_last_error_msg();
                            $this->Flash->error(__("Error al decodificar JSON: " . json_last_error_msg()));
                        }
                    } else {
                        //echo "Error en la solicitud. Código HTTP: " . $http_code;                        
                        $this->Flash->error(__("Error en la solicitud. Código HTTP: " . $http_code));
                    }
                }

                // Cerrar cURL
                curl_close($ch);
                
                $this->Flash->success(__('The registro has been saved.'));
                return $this->redirect(['action' => 'index']);
            }   
        }
        $registro = $this->Registros->get($id, [
            'contain' => [],
        ]);       
        $this->set(compact('registro', 'consecutivo'));
    }
    
    /**
     * Failed method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful failed, renders view otherwise.
     */
    public function failed($consecutivo = null)
    {
        $id = $consecutivo;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Registros->updateAll(
                ['estado' => 4],
                ['id' => $consecutivo]
            );            
            $this->Flash->success(__('The registro has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $registro = $this->Registros->get($id, [
            'contain' => [],
        ]);       
        $this->set(compact('registro', 'consecutivo'));
    }
    
    /**
     * Reactived method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful reactived, renders view otherwise.
     */
    public function reactived($consecutivo = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Registros->updateAll(
                ['estado' => 1],
                ['id' => $consecutivo]
            );
            $this->Flash->success(__('The registro has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('consecutivo'));
    } 

    /**
     * Home method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful home, renders view otherwise.
     */
    public function home()
    {   
        $registro = $this->Registros->newEmptyEntity();
        $this->set(compact('registro'));
    }

    /**
     * FindAll method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful findAll, renders view otherwise.
     */
    public function findall()
    {   
        $registro = $this->Registros->newEmptyEntity();
        if ($this->request->is('post')) {
            $filtro = $this->request->getData('buscar_documento');
            return $this->redirect(['action' => 'viewall', $filtro]);
        }
        $this->set(compact('registro'));
    }

    /**
     * Viewall method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful viewall, renders view otherwise.
     */
    public function viewall($filtro = null)
    {
        $session = $_SESSION;
        $docu = $session['Auth']->documento;
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('CALL UsersValidation(:id)', ['id' => $docu])->fetchAll('assoc');
        if ($results[0]['administrador'] == 1) {
            $registros = $this->paginate($this->Registros->find()->where(['numero_identificacion' => $filtro]));

            $this->set(compact('registros','session'));
        }
        else {
            return $this->redirect(['action' => 'index']);
        }
    }
}
