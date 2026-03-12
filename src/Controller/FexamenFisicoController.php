<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FexamenFisico Controller
 *
 * @property \App\Model\Table\FexamenFisicoTable $FexamenFisico
 * @method \App\Model\Entity\FexamenFisico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FexamenFisicoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $fexamenFisico = $this->FexamenFisico->find()->where(['registro_id' => $consecutivo]);
        if ($fexamenFisico->isEmpty()) {
            return $this->redirect(['controller' => 'FexamenFisico', 'action' => 'add', $consecutivo]);
        }
        else{
            $this->paginate = [
                'contain' => ['Registros'],
            ];
            $fexamenFisico = $this->paginate($this->FexamenFisico->find()->where(['registro_id' => $consecutivo]));

            $this->set(compact('fexamenFisico','consecutivo'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Examen Fisico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fexamenFisico = $this->FexamenFisico->get($id, [
            'contain' => ['Registros'],
        ]);

        $this->set(compact('fexamenFisico'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $fexamenFisico = $this->FexamenFisico->newEmptyEntity();
        if ($this->request->is('post')) {
            $examen = $this->FexamenFisico->find()->where(['registro_id' => $consecutivo]);
            if ($examen->isEmpty()) {
                $fexamenFisico = $this->FexamenFisico->patchEntity($fexamenFisico, $this->request->getData());
                if ($this->FexamenFisico->save($fexamenFisico)) {
                    $this->Flash->success(__('The examen fisico has been saved.'));

                    return $this->redirect(['controller' => 'Fhallazgos', 'action' => 'index', $consecutivo]);
                }
                $this->Flash->error(__('The examen fisico could not be saved. Please, try again.'));
            }
            else {
                return $this->redirect(['controller' => 'Hallazgos', 'action' => 'index', $consecutivo]);
            }
        }
        $registros = $this->FexamenFisico->Registros->find()->all();
        $this->set(compact('fexamenFisico', 'registros', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Examen Fisico id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $consecutivo = null)
    {
        $fexamenFisico = $this->FexamenFisico->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fexamenFisico = $this->FexamenFisico->patchEntity($fexamenFisico, $this->request->getData());
            if ($this->FexamenFisico->save($fexamenFisico)) {
                $this->Flash->success(__('The examen fisico has been saved.'));

                return $this->redirect(['action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The examen fisico could not be saved. Please, try again.'));
        }
        $registros = $this->FexamenFisico->Registros->find('list', ['limit' => 200])->all();
        $this->set(compact('fexamenFisico', 'registros', 'consecutivo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Examen Fisico id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fexamenFisico = $this->FexamenFisico->get($id);
        if ($this->FexamenFisico->delete($fexamenFisico)) {
            $this->Flash->success(__('The examen fisico has been deleted.'));
        } else {
            $this->Flash->error(__('The examen fisico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
