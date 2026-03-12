<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Diagnosticos Controller
 *
 * @property \App\Model\Table\DiagnosticosTable $Diagnosticos
 * @method \App\Model\Entity\Diagnostico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiagnosticosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $diagnosticos = $this->paginate($this->Diagnosticos);

        $this->set(compact('diagnosticos'));
    }

    /**
     * View method
     *
     * @param string|null $id Diagnostico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diagnostico = $this->Diagnosticos->get($id, [
            'contain' => ['Rips'],
        ]);

        $this->set(compact('diagnostico'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diagnostico = $this->Diagnosticos->newEmptyEntity();
        if ($this->request->is('post')) {
            $diagnostico = $this->Diagnosticos->patchEntity($diagnostico, $this->request->getData());
            if ($this->Diagnosticos->save($diagnostico)) {
                $this->Flash->success(__('The diagnostico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnostico could not be saved. Please, try again.'));
        }
        $this->set(compact('diagnostico'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diagnostico id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diagnostico = $this->Diagnosticos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diagnostico = $this->Diagnosticos->patchEntity($diagnostico, $this->request->getData());
            if ($this->Diagnosticos->save($diagnostico)) {
                $this->Flash->success(__('The diagnostico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnostico could not be saved. Please, try again.'));
        }
        $this->set(compact('diagnostico'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diagnostico id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diagnostico = $this->Diagnosticos->get($id);
        if ($this->Diagnosticos->delete($diagnostico)) {
            $this->Flash->success(__('The diagnostico has been deleted.'));
        } else {
            $this->Flash->error(__('The diagnostico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
