<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Hallazgos Controller
 *
 * @property \App\Model\Table\HallazgosTable $Hallazgos
 * @method \App\Model\Entity\Hallazgo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HallazgosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $this->paginate = [
            'contain' => ['Registros', 'TipoHallazgos'],
        ];
        $hallazgos = $this->paginate($this->Hallazgos->find()->where(['registro_id' => $consecutivo]));

        $this->set(compact('hallazgos', 'consecutivo'));
    }

    /**
     * View method
     *
     * @param string|null $id Hallazgo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hallazgo = $this->Hallazgos->get($id, [
            'contain' => ['Registros', 'TipoHallazgos'],
        ]);

        $this->set(compact('hallazgo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $hallazgo = $this->Hallazgos->newEmptyEntity();
        if ($this->request->is('post')) {
            $hallazgo = $this->Hallazgos->patchEntity($hallazgo, $this->request->getData());
            if ($this->Hallazgos->save($hallazgo)) {
                $this->Flash->success(__('The hallazgo has been saved.'));

                return $this->redirect(['action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The hallazgo could not be saved. Please, try again.'));
        }
        $registros = $this->Hallazgos->Registros->find()->all();
        $tipoHallazgos = $this->Hallazgos->TipoHallazgos->find()->all();
        $this->set(compact('hallazgo', 'registros', 'tipoHallazgos', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hallazgo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hallazgo = $this->Hallazgos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hallazgo = $this->Hallazgos->patchEntity($hallazgo, $this->request->getData());
            if ($this->Hallazgos->save($hallazgo)) {
                $this->Flash->success(__('The hallazgo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hallazgo could not be saved. Please, try again.'));
        }
        $registros = $this->Hallazgos->Registros->find('list', ['limit' => 200])->all();
        $tipoHallazgos = $this->Hallazgos->TipoHallazgos->find('list', ['limit' => 200])->all();
        $this->set(compact('hallazgo', 'registros', 'tipoHallazgos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hallazgo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hallazgo = $this->Hallazgos->get($id);
        if ($this->Hallazgos->delete($hallazgo)) {
            $this->Flash->success(__('The hallazgo has been deleted.'));
        } else {
            $this->Flash->error(__('The hallazgo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
