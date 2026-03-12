<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Frevisiones Controller
 *
 * @property \App\Model\Table\FrevisionesTable $Frevisiones
 * @method \App\Model\Entity\Frevisione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrevisionesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $this->paginate = [
            'contain' => ['Registros', 'Sistemas'],
        ];
        $frevisiones = $this->paginate($this->Frevisiones->find()->where(['registro_id' => $consecutivo]));

        $this->set(compact('frevisiones', 'consecutivo'));
    }

    /**
     * View method
     *
     * @param string|null $id Frevisione id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frevisione = $this->Frevisiones->get($id, [
            'contain' => ['Registros', 'Sistemas'],
        ]);

        $this->set(compact('frevisione'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $frevisione = $this->Frevisiones->newEmptyEntity();
        if ($this->request->is('post')) {
            $frevisione = $this->Frevisiones->patchEntity($frevisione, $this->request->getData());
            if ($this->Frevisiones->save($frevisione)) {
                $this->Flash->success(__('The frevisione has been saved.'));

                return $this->redirect(['controller' => 'Frevisiones', 'action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The frevisione could not be saved. Please, try again.'));
        }
        $registros = $this->Frevisiones->Registros->find()->all();
        $sistemas = $this->Frevisiones->Sistemas->find()->where(['id' => 2])->all();
        $this->set(compact('frevisione', 'registros', 'sistemas', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Frevisione id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frevisione = $this->Frevisiones->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frevisione = $this->Frevisiones->patchEntity($frevisione, $this->request->getData());
            if ($this->Frevisiones->save($frevisione)) {
                $this->Flash->success(__('The frevisione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frevisione could not be saved. Please, try again.'));
        }
        $registros = $this->Frevisiones->Registros->find('list', ['limit' => 200])->all();
        $sistemas = $this->Frevisiones->Sistemas->find('list', ['limit' => 200])->where(['id' => 2])->all();
        $this->set(compact('frevisione', 'registros', 'sistemas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Frevisione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frevisione = $this->Frevisiones->get($id);
        if ($this->Frevisiones->delete($frevisione)) {
            $this->Flash->success(__('The frevisione has been deleted.'));
        } else {
            $this->Flash->error(__('The frevisione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
