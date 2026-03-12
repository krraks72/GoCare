<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Motivos Controller
 *
 * @property \App\Model\Table\MotivosTable $Motivos
 * @method \App\Model\Entity\Motivo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MotivosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $motivos = $this->paginate($this->Motivos);

        $this->set(compact('motivos'));
    }

    /**
     * View method
     *
     * @param string|null $id Motivo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $motivo = $this->Motivos->get($id, [
            'contain' => ['Consulta'],
        ]);

        $this->set(compact('motivo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $motivo = $this->Motivos->newEmptyEntity();
        if ($this->request->is('post')) {
            $motivo = $this->Motivos->patchEntity($motivo, $this->request->getData());
            if ($this->Motivos->save($motivo)) {
                $this->Flash->success(__('The motivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The motivo could not be saved. Please, try again.'));
        }
        $this->set(compact('motivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Motivo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $motivo = $this->Motivos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $motivo = $this->Motivos->patchEntity($motivo, $this->request->getData());
            if ($this->Motivos->save($motivo)) {
                $this->Flash->success(__('The motivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The motivo could not be saved. Please, try again.'));
        }
        $this->set(compact('motivo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Motivo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $motivo = $this->Motivos->get($id);
        if ($this->Motivos->delete($motivo)) {
            $this->Flash->success(__('The motivo has been deleted.'));
        } else {
            $this->Flash->error(__('The motivo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
