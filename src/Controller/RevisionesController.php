<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Revisiones Controller
 *
 * @property \App\Model\Table\RevisionesTable $Revisiones
 * @method \App\Model\Entity\Revisione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RevisionesController extends AppController
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
        $revisiones = $this->paginate($this->Revisiones->find()->where(['registro_id' => $consecutivo]));

        $this->set(compact('revisiones', 'consecutivo'));
    }

    /**
     * View method
     *
     * @param string|null $id Revisione id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $revisione = $this->Revisiones->get($id, [
            'contain' => ['Registros', 'Sistemas'],
        ]);

        $this->set(compact('revisione'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $revisione = $this->Revisiones->newEmptyEntity();
        if ($this->request->is('post')) {
            $revisione = $this->Revisiones->patchEntity($revisione, $this->request->getData());
            if ($this->Revisiones->save($revisione)) {
                $this->Flash->success(__('The revisione has been saved.'));

                return $this->redirect(['controller' => 'Revisiones', 'action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The revisione could not be saved. Please, try again.'));
        }
        $registros = $this->Revisiones->Registros->find()->all();
        $sistemas = $this->Revisiones->Sistemas->find()->all();
        $this->set(compact('revisione', 'registros', 'sistemas', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Revisione id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $revisione = $this->Revisiones->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $revisione = $this->Revisiones->patchEntity($revisione, $this->request->getData());
            if ($this->Revisiones->save($revisione)) {
                $this->Flash->success(__('The revisione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The revisione could not be saved. Please, try again.'));
        }
        $registros = $this->Revisiones->Registros->find('list', ['limit' => 200])->all();
        $sistemas = $this->Revisiones->Sistemas->find('list', ['limit' => 200])->all();
        $this->set(compact('revisione', 'registros', 'sistemas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Revisione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $revisione = $this->Revisiones->get($id);
        if ($this->Revisiones->delete($revisione)) {
            $this->Flash->success(__('The revisione has been deleted.'));
        } else {
            $this->Flash->error(__('The revisione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
