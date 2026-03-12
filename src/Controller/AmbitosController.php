<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ambitos Controller
 *
 * @property \App\Model\Table\AmbitosTable $Ambitos
 * @method \App\Model\Entity\Ambito[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AmbitosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ambitos = $this->paginate($this->Ambitos);

        $this->set(compact('ambitos'));
    }

    /**
     * View method
     *
     * @param string|null $id Ambito id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ambito = $this->Ambitos->get($id, [
            'contain' => ['Consulta'],
        ]);

        $this->set(compact('ambito'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ambito = $this->Ambitos->newEmptyEntity();
        if ($this->request->is('post')) {
            $ambito = $this->Ambitos->patchEntity($ambito, $this->request->getData());
            if ($this->Ambitos->save($ambito)) {
                $this->Flash->success(__('The ambito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ambito could not be saved. Please, try again.'));
        }
        $this->set(compact('ambito'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ambito id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ambito = $this->Ambitos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ambito = $this->Ambitos->patchEntity($ambito, $this->request->getData());
            if ($this->Ambitos->save($ambito)) {
                $this->Flash->success(__('The ambito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ambito could not be saved. Please, try again.'));
        }
        $this->set(compact('ambito'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ambito id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ambito = $this->Ambitos->get($id);
        if ($this->Ambitos->delete($ambito)) {
            $this->Flash->success(__('The ambito has been deleted.'));
        } else {
            $this->Flash->error(__('The ambito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
