<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sistemas Controller
 *
 * @property \App\Model\Table\SistemasTable $Sistemas
 * @method \App\Model\Entity\Sistema[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SistemasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sistemas = $this->paginate($this->Sistemas);

        $this->set(compact('sistemas'));
    }

    /**
     * View method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sistema'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sistema = $this->Sistemas->newEmptyEntity();
        if ($this->request->is('post')) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('The sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('The sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sistema = $this->Sistemas->get($id);
        if ($this->Sistemas->delete($sistema)) {
            $this->Flash->success(__('The sistema has been deleted.'));
        } else {
            $this->Flash->error(__('The sistema could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
