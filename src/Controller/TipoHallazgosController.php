<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TipoHallazgos Controller
 *
 * @property \App\Model\Table\TipoHallazgosTable $TipoHallazgos
 * @method \App\Model\Entity\TipoHallazgo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoHallazgosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tipoHallazgos = $this->paginate($this->TipoHallazgos);

        $this->set(compact('tipoHallazgos'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Hallazgo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoHallazgo = $this->TipoHallazgos->get($id, [
            'contain' => ['Hallazgos'],
        ]);

        $this->set(compact('tipoHallazgo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoHallazgo = $this->TipoHallazgos->newEmptyEntity();
        if ($this->request->is('post')) {
            $tipoHallazgo = $this->TipoHallazgos->patchEntity($tipoHallazgo, $this->request->getData());
            if ($this->TipoHallazgos->save($tipoHallazgo)) {
                $this->Flash->success(__('The tipo hallazgo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo hallazgo could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoHallazgo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Hallazgo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoHallazgo = $this->TipoHallazgos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoHallazgo = $this->TipoHallazgos->patchEntity($tipoHallazgo, $this->request->getData());
            if ($this->TipoHallazgos->save($tipoHallazgo)) {
                $this->Flash->success(__('The tipo hallazgo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo hallazgo could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoHallazgo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Hallazgo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoHallazgo = $this->TipoHallazgos->get($id);
        if ($this->TipoHallazgos->delete($tipoHallazgo)) {
            $this->Flash->success(__('The tipo hallazgo has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo hallazgo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
