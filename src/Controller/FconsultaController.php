<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fconsulta Controller
 *
 * @property \App\Model\Table\FconsultaTable $Fconsulta
 * @method \App\Model\Entity\Consultum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FconsultaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $fconsultum = $this->Fconsulta->find()->where(['registro_id' => $consecutivo]);
        if ($fconsultum->isEmpty()) {
            return $this->redirect(['controller' => 'Fconsulta', 'action' => 'add', $consecutivo]);
        }
        else{
            $this->paginate = [
                'contain' => ['Registros', 'Ambitos', 'Motivos'],
            ];
            $fconsultum = $this->paginate($this->Fconsulta->find()->where(['registro_id' => $consecutivo]));

            $this->set(compact('fconsultum', 'consecutivo'));
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
        $fconsultum = $this->Fconsulta->get($id, [
            'contain' => ['Registros', 'Ambitos', 'Motivos'],
        ]);

        $this->set(compact('fconsultum'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $fconsultum = $this->Fconsulta->newEmptyEntity();
        if ($this->request->is('post')) {
            $consult = $this->Fconsulta->find()->where(['registro_id' => $consecutivo]);
            if ($consult->all()->isEmpty()) {
                $fconsultum = $this->Fconsulta->patchEntity($fconsultum, $this->request->getData());
                if ($this->Fconsulta->save($fconsultum)) {
                    $this->Flash->success(__('The fconsultum has been saved.'));

                    return $this->redirect(['controller' => 'Fantecedentes', 'action' => 'index', $consecutivo]);
                }
                $this->Flash->error(__('The fconsultum could not be saved. Please, try again.'));
            }
            else {
                return $this->redirect(['controller' => 'Fantecedentes', 'action' => 'index', $consecutivo]);
            }
        }
        $registros = $this->Fconsulta->Registros->find()->all();
        $ambitos = $this->Fconsulta->Ambitos->find()->all();
        $motivos = $this->Fconsulta->Motivos->find()->all();
        $this->set(compact('fconsultum', 'registros', 'ambitos', 'motivos', 'consecutivo'));
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
        $fconsultum = $this->Fconsulta->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fconsultum = $this->Fconsulta->patchEntity($fconsultum, $this->request->getData());
            if ($this->Fconsulta->save($fconsultum)) {
                $this->Flash->success(__('The fconsultum has been saved.'));

                return $this->redirect(['action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The fconsultum could not be saved. Please, try again.'));
        }
        $registros = $this->Fconsulta->Registros->find()->all();
        $ambitos = $this->Fconsulta->Ambitos->find()->all();
        $motivos = $this->Fconsulta->Motivos->find()->all();
        $this->set(compact('fconsultum', 'registros', 'ambitos', 'motivos', 'consecutivo'));
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
        $fconsultum = $this->Fconsulta->get($id);
        if ($this->Fconsulta->delete($fconsultum)) {
            $this->Flash->success(__('The fconsultum has been deleted.'));
        } else {
            $this->Flash->error(__('The fconsultum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
