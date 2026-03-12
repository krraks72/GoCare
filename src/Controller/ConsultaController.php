<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Consulta Controller
 *
 * @property \App\Model\Table\ConsultaTable $Consulta
 * @method \App\Model\Entity\Consultum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConsultaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $consultum = $this->Consulta->find()->where(['registro_id' => $consecutivo]);
        if ($consultum->isEmpty()) {
            return $this->redirect(['controller' => 'consulta', 'action' => 'add', $consecutivo]);
        }
        else{
            $this->paginate = [
                'contain' => ['Registros', 'Ambitos', 'Motivos'],
            ];
            $consulta = $this->paginate($this->Consulta->find()->where(['registro_id' => $consecutivo]));

            $this->set(compact('consulta', 'consecutivo'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Consultum id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consultum = $this->Consulta->get($id, [
            'contain' => ['Registros', 'Ambitos', 'Motivos'],
        ]);

        $this->set(compact('consultum'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $consultum = $this->Consulta->newEmptyEntity();
        if ($this->request->is('post')) {
            $consult = $this->Consulta->find()->where(['registro_id' => $consecutivo]);
            if ($consult->all()->isEmpty()) {
                $consultum = $this->Consulta->patchEntity($consultum, $this->request->getData());
                if ($this->Consulta->save($consultum)) {
                    $this->Flash->success(__('The consultum has been saved.'));

                    return $this->redirect(['controller' => 'Antecedentes', 'action' => 'index', $consecutivo]);
                }
                $this->Flash->error(__('The consultum could not be saved. Please, try again.'));
            }
            else {
                return $this->redirect(['controller' => 'Antecedentes', 'action' => 'index', $consecutivo]);
            }
        }
        $registros = $this->Consulta->Registros->find()->all();
        $ambitos = $this->Consulta->Ambitos->find()->all();
        $motivos = $this->Consulta->Motivos->find()->all();
        $this->set(compact('consultum', 'registros', 'ambitos', 'motivos', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Consultum id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $consecutivo = null)
    {
        $consultum = $this->Consulta->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consultum = $this->Consulta->patchEntity($consultum, $this->request->getData());
            if ($this->Consulta->save($consultum)) {
                $this->Flash->success(__('The consultum has been saved.'));

                return $this->redirect(['action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The consultum could not be saved. Please, try again.'));
        }
        $registros = $this->Consulta->Registros->find()->all();
        $ambitos = $this->Consulta->Ambitos->find()->all();
        $motivos = $this->Consulta->Motivos->find()->all();
        $this->set(compact('consultum', 'registros', 'ambitos', 'motivos', 'consecutivo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Consultum id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consultum = $this->Consulta->get($id);
        if ($this->Consulta->delete($consultum)) {
            $this->Flash->success(__('The consultum has been deleted.'));
        } else {
            $this->Flash->error(__('The consultum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
