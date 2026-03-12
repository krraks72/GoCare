<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\FactoryLocator;
use Cake\Datasource\ConnectionManager;
/**
 * Frips Controller
 *
 * @property \App\Model\Table\FripsTable $Frips
 * @method \App\Model\Entity\Frip[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FripsController extends AppController
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
        $frips = $this->paginate($this->Frips->find()->where(['registro_id' => $consecutivo]));

        $this->set(compact('frips', 'consecutivo'));
    }

    /**
     * View method
     *
     * @param string|null $id Frip id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frip = $this->Frips->get($id, [
            'contain' => ['Registros', 'Diagnosticos'],
        ]);

        $this->set(compact('frip'));
    }

    /**
     * Look method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful look, renders view otherwise.
     */
    public function look($consecutivo = null)
    {
        $frip = $this->Frips->newEmptyEntity();
        if ($this->request->is('post')) {
            $filtro = $this->request->getData('buscar_diagnostico');
            return $this->redirect(['action' => 'add', $consecutivo, $filtro]);
        }
        $this->set(compact('frip', 'consecutivo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null, $filtro = null)
    {
        $frip = $this->Frips->newEmptyEntity();        
        $connection = ConnectionManager::get('default');
        if ($this->request->is('post')) {   
            $frip = $this->Frips->patchEntity($frip, $this->request->getData());                        
            $results = $connection->execute('CALL validarDx(:id,:tipo)', ['id' => $consecutivo, 'tipo' => $frip->tipo_diagnostico])->fetchAll('assoc');                        
            $resultsPr = $connection->execute('CALL validarDx(:id,:tipo)', ['id' => $consecutivo, 'tipo' => 'Principal'])->fetchAll('assoc');
            if (is_null($results[0]['id'])) {
                if (is_null($resultsPr[0]['id']) && $frip->tipo_diagnostico === 'Principal') {
                    if ($this->Frips->save($frip)) {
                        $this->Flash->success(__('The frip has been saved.'));

                        return $this->redirect(['action' => 'index', $consecutivo]);
                    }
                    $this->Flash->error(__('The frip could not be saved. Please, try again.'));
                }
                if (is_null($resultsPr[0]['id']) && $frip->tipo_diagnostico !== 'Principal') {
                    $this->Flash->error(__('Falta un diagnóstico principal, por favor guarde primero el diagnostico principal de la consulta'));
                }
                if (!is_null($resultsPr[0]['id']) && $frip->tipo_diagnostico !== 'Principal') {
                    if ($this->Frips->save($frip)) {
                        $this->Flash->success(__('The frip has been saved.'));

                        return $this->redirect(['action' => 'index', $consecutivo]);
                    }
                    $this->Flash->error(__('The frip could not be saved. Please, try again.'));
                }                
            }
            else {
                $this->Flash->error(__('Ya existe un diagnóstico con el tipo de diagnostico seleccionado, por favor modifique el tipo de diagnóstico'));
            }
        }
        $registros = $this->Frips->Registros->find()->all();
        $diagnosticos = $this->Frips->Diagnosticos->find('all', array(
            'conditions' => array('descripcion LIKE ' => "%".$filtro."%")));
        $this->set(compact('frip', 'registros', 'diagnosticos', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Frip id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frip = $this->Frips->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frip = $this->Frips->patchEntity($frip, $this->request->getData());
            if ($this->Frips->save($frip)) {
                $this->Flash->success(__('The frip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frip could not be saved. Please, try again.'));
        }
        $registros = $this->Frips->Registros->find('list', ['limit' => 200])->all();
        $diagnosticos = $this->Frips->Diagnosticos->find('list', ['limit' => 200])->all();
        $this->set(compact('frip', 'registros', 'diagnosticos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Frip id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frip = $this->Frips->get($id);
        if ($this->Frips->delete($frip)) {
            $this->Flash->success(__('The frip has been deleted.'));
        } else {
            $this->Flash->error(__('The frip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
