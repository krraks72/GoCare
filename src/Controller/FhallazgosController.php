<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fhallazgos Controller
 *
 * @property \App\Model\Table\FhallazgosTable $Fhallazgos
 * @method \App\Model\Entity\Fhallazgo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FhallazgosController extends AppController
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
        $fhallazgos = $this->paginate($this->Fhallazgos->find()->where(['registro_id' => $consecutivo]));

        $this->set(compact('fhallazgos', 'consecutivo'));
    }

    /**
     * View method
     *
     * @param string|null $id Fhallazgo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fhallazgo = $this->Fhallazgos->get($id, [
            'contain' => ['Registros', 'TipoHallazgos'],
        ]);

        $this->set(compact('fhallazgo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $fhallazgo = $this->Fhallazgos->newEmptyEntity();
        if ($this->request->is('post')) {
            $fhallazgo = $this->Fhallazgos->patchEntity($fhallazgo, $this->request->getData());
            if ($this->Fhallazgos->save($fhallazgo)) {
                $this->Flash->success(__('The fhallazgo has been saved.'));

                return $this->redirect(['action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The fhallazgo could not be saved. Please, try again.'));
        }
        $registros = $this->Fhallazgos->Registros->find()->all();
        $tipoHallazgos = $this->Fhallazgos->TipoHallazgos->find()->where(['id' => 20])->all();
        $this->set(compact('fhallazgo', 'registros', 'tipoHallazgos', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fhallazgo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fhallazgo = $this->Fhallazgos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fhallazgo = $this->Fhallazgos->patchEntity($fhallazgo, $this->request->getData());
            if ($this->Fhallazgos->save($fhallazgo)) {
                $this->Flash->success(__('The fhallazgo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fhallazgo could not be saved. Please, try again.'));
        }
        $registros = $this->Fhallazgos->Registros->find('list', ['limit' => 200])->all();
        $tipoHallazgos = $this->Fhallazgos->TipoHallazgos->find('list', ['limit' => 200])->where(['id' => 20])->all();
        $this->set(compact('fhallazgo', 'registros', 'tipoHallazgos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fhallazgo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fhallazgo = $this->Fhallazgos->get($id);
        if ($this->Fhallazgos->delete($fhallazgo)) {
            $this->Flash->success(__('The fhallazgo has been deleted.'));
        } else {
            $this->Flash->error(__('The fhallazgo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
