<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ExamenFisico Controller
 *
 * @property \App\Model\Table\ExamenFisicoTable $ExamenFisico
 * @method \App\Model\Entity\ExamenFisico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamenFisicoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $examenFisico = $this->ExamenFisico->find()->where(['registro_id' => $consecutivo]);
        if ($examenFisico->isEmpty()) {
            return $this->redirect(['controller' => 'examenFisico', 'action' => 'add', $consecutivo]);
        }
        else{
            $this->paginate = [
                'contain' => ['Registros'],
            ];
            $examenFisico = $this->paginate($this->ExamenFisico->find()->where(['registro_id' => $consecutivo]));

            $this->set(compact('examenFisico','consecutivo'));
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
        $examenFisico = $this->ExamenFisico->get($id, [
            'contain' => ['Registros'],
        ]);

        $this->set(compact('examenFisico'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $examenFisico = $this->ExamenFisico->newEmptyEntity();
        if ($this->request->is('post')) {
            $examen = $this->ExamenFisico->find()->where(['registro_id' => $consecutivo]);
            if ($examen->isEmpty()) {
                $examenFisico = $this->ExamenFisico->patchEntity($examenFisico, $this->request->getData());
                if ($this->ExamenFisico->save($examenFisico)) {
                    $this->Flash->success(__('The examen fisico has been saved.'));

                    return $this->redirect(['controller' => 'Hallazgos', 'action' => 'index', $consecutivo]);
                }
                $this->Flash->error(__('The examen fisico could not be saved. Please, try again.'));
            }
            else {
                return $this->redirect(['controller' => 'Hallazgos', 'action' => 'index', $consecutivo]);
            }
        }
        $registros = $this->ExamenFisico->Registros->find()->all();
        $this->set(compact('examenFisico', 'registros', 'consecutivo'));
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
        $examenFisico = $this->ExamenFisico->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examenFisico = $this->ExamenFisico->patchEntity($examenFisico, $this->request->getData());
            if ($this->ExamenFisico->save($examenFisico)) {
                $this->Flash->success(__('The examen fisico has been saved.'));

                return $this->redirect(['action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The examen fisico could not be saved. Please, try again.'));
        }
        $registros = $this->ExamenFisico->Registros->find('list', ['limit' => 200])->all();
        $this->set(compact('examenFisico', 'registros', 'consecutivo'));
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
        $examenFisico = $this->ExamenFisico->get($id);
        if ($this->ExamenFisico->delete($examenFisico)) {
            $this->Flash->success(__('The examen fisico has been deleted.'));
        } else {
            $this->Flash->error(__('The examen fisico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
