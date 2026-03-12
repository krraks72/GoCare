<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Analisis Controller
 *
 * @property \App\Model\Table\AnalisisTable $Analisis
 * @method \App\Model\Entity\Analisi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnalisisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $analisi = $this->Analisis->find()->where(['registro_id' => $consecutivo]);
        if ($analisi->isEmpty()) {
            return $this->redirect(['controller' => 'Analisis', 'action' => 'add', $consecutivo]);
        }
        else{
            $this->paginate = [
                'contain' => ['Registros'],
            ];
            $analisis = $this->paginate($this->Analisis->find()->where(['registro_id' => $consecutivo]));

            $this->set(compact('analisis', 'consecutivo'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Analisi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $analisi = $this->Analisis->get($id, [
            'contain' => ['Registros'],
        ]);

        $this->set(compact('analisi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $analisi = $this->Analisis->newEmptyEntity();
        if ($this->request->is('post')) {
            $anali = $this->Analisis->find()->where(['registro_id' => $consecutivo]);
            if ($anali->all()->isEmpty()) {
                $analisi = $this->Analisis->patchEntity($analisi, $this->request->getData());
                if ($this->Analisis->save($analisi)) {
                    $this->Flash->success(__('The analisi has been saved.'));

                    return $this->redirect(['action' => 'index', $consecutivo]);
                }
                $this->Flash->error(__('The analisi could not be saved. Please, try again.'));
            }
            else {
                return $this->redirect(['action' => 'index', $consecutivo]);
            }
        }
        $registros = $this->Analisis->Registros->find('list', ['limit' => 200])->all();
        $this->set(compact('analisi', 'registros', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Analisi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $consecutivo = null)
    {
        $analisi = $this->Analisis->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $analisi = $this->Analisis->patchEntity($analisi, $this->request->getData());
            if ($this->Analisis->save($analisi)) {
                $this->Flash->success(__('The analisi has been saved.'));

                return $this->redirect(['action' => 'index', $analisi->registro_id]);
            }
            $this->Flash->error(__('The analisi could not be saved. Please, try again.'));
        }
        $registros = $this->Analisis->Registros->find('list', ['limit' => 200])->all();
        $this->set(compact('analisi', 'registros', 'consecutivo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Analisi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $analisi = $this->Analisis->get($id);
        if ($this->Analisis->delete($analisi)) {
            $this->Flash->success(__('The analisi has been deleted.'));
        } else {
            $this->Flash->error(__('The analisi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
