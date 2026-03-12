<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\FactoryLocator;
use Cake\Datasource\ConnectionManager;
/**
 * Rips Controller
 *
 * @property \App\Model\Table\RipsTable $Rips
 * @method \App\Model\Entity\Rip[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RipsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $this->paginate = [
            'contain' => ['Registros', 'Diagnosticos'],
        ];
        $rips = $this->paginate($this->Rips->find()->where(['registro_id' => $consecutivo]));

        $this->set(compact('rips', 'consecutivo'));
    }

    /**
     * View method
     *
     * @param string|null $id Rip id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rip = $this->Rips->get($id, [
            'contain' => ['Registros', 'Diagnosticos'],
        ]);

        $this->set(compact('rip'));
    }

    /**
     * Look method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful look, renders view otherwise.
     */
    public function look($consecutivo = null)
    {
        $rip = $this->Rips->newEmptyEntity();
        if ($this->request->is('post')) {
            $filtro = $this->request->getData('buscar_diagnostico');
            return $this->redirect(['action' => 'add', $consecutivo, $filtro]);
        }
        $this->set(compact('rip', 'consecutivo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null, $filtro = null)
    {
        $rip = $this->Rips->newEmptyEntity();        
        $connection = ConnectionManager::get('default');
        if ($this->request->is('post')) {   
            $rip = $this->Rips->patchEntity($rip, $this->request->getData());                        
            $results = $connection->execute('CALL validarDx(:id,:tipo)', ['id' => $consecutivo, 'tipo' => $rip->tipo_diagnostico])->fetchAll('assoc');                        
            $resultsPr = $connection->execute('CALL validarDx(:id,:tipo)', ['id' => $consecutivo, 'tipo' => 'Principal'])->fetchAll('assoc');
            if (is_null($results[0]['id'])) {
                if (is_null($resultsPr[0]['id']) && $rip->tipo_diagnostico === 'Principal') {
                    if ($this->Rips->save($rip)) {
                        $this->Flash->success(__('The rip has been saved.'));

                        return $this->redirect(['action' => 'index', $consecutivo]);
                    }
                    $this->Flash->error(__('The rip could not be saved. Please, try again.'));
                }
                if (is_null($resultsPr[0]['id']) && $rip->tipo_diagnostico !== 'Principal') {
                    $this->Flash->error(__('Falta un diagnóstico principal, por favor guarde primero el diagnostico principal de la consulta'));
                }
                if (!is_null($resultsPr[0]['id']) && $rip->tipo_diagnostico !== 'Principal') {
                    if ($this->Rips->save($rip)) {
                        $this->Flash->success(__('The rip has been saved.'));

                        return $this->redirect(['action' => 'index', $consecutivo]);
                    }
                    $this->Flash->error(__('The rip could not be saved. Please, try again.'));
                }                
            }
            else {
                $this->Flash->error(__('Ya existe un diagnóstico con el tipo de diagnostico seleccionado, por favor modifique el tipo de diagnóstico'));
            }
        }
        $registros = $this->Rips->Registros->find()->all();
        $diagnosticos = $this->Rips->Diagnosticos->find('all', array(
            'conditions' => array('descripcion LIKE ' => "%".$filtro."%")));
        $this->set(compact('rip', 'registros', 'diagnosticos', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rip id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rip = $this->Rips->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rip = $this->Rips->patchEntity($rip, $this->request->getData());
            if ($this->Rips->save($rip)) {
                $this->Flash->success(__('The rip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rip could not be saved. Please, try again.'));
        }
        $registros = $this->Rips->Registros->find('list', ['limit' => 200])->all();
        $diagnosticos = $this->Rips->Diagnosticos->find('list', ['limit' => 200])->all();
        $this->set(compact('rip', 'registros', 'diagnosticos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rip id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rip = $this->Rips->get($id);
        if ($this->Rips->delete($rip)) {
            $this->Flash->success(__('The rip has been deleted.'));
        } else {
            $this->Flash->error(__('The rip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
