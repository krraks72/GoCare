<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fanalisis Controller
 *
 * @property \App\Model\Table\FanalisisTable $Fanalisis
 * @method \App\Model\Entity\Fanalisi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FanalisisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $fanalisi = $this->Fanalisis->find()->where(['registro_id' => $consecutivo]);
        if ($fanalisi->isEmpty()) {
            return $this->redirect(['controller' => 'Fanalisis', 'action' => 'add', $consecutivo]);
        }
        else{
            $this->paginate = [
                'contain' => ['Registros'],
            ];
            $fanalisis = $this->paginate($this->Fanalisis->find()->where(['registro_id' => $consecutivo]));

            $this->set(compact('fanalisis', 'consecutivo'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Fanalisi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fanalisi = $this->Fanalisis->get($id, [
            'contain' => ['Registros'],
        ]);

        $this->set(compact('fanalisi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $fanalisi = $this->Fanalisis->newEmptyEntity();
        if ($this->request->is('post')) {
            $anali = $this->Fanalisis->find()->where(['registro_id' => $consecutivo]);
            if ($anali->all()->isEmpty()) {
                $fanalisi = $this->Fanalisis->patchEntity($fanalisi, $this->request->getData());
                if ($this->Fanalisis->save($fanalisi)) {
                    $this->Flash->success(__('The fanalisi has been saved.'));

                    return $this->redirect(['action' => 'index', $consecutivo]);
                }
                $this->Flash->error(__('The fanalisi could not be saved. Please, try again.'));
            }
            else {
                return $this->redirect(['action' => 'index', $consecutivo]);
            }
        }
        $registros = $this->Fanalisis->Registros->find('list', ['limit' => 200])->all();
        $this->set(compact('fanalisi', 'registros', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fanalisi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $consecutivo = null)
    {
        $fanalisi = $this->Fanalisis->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fanalisi = $this->Fanalisis->patchEntity($fanalisi, $this->request->getData());
            if ($this->Fanalisis->save($fanalisi)) {
                $this->Flash->success(__('The fanalisi has been saved.'));

                return $this->redirect(['action' => 'index', $fanalisi->registro_id]);
            }
            $this->Flash->error(__('The fanalisi could not be saved. Please, try again.'));
        }
        $registros = $this->Fanalisis->Registros->find('list', ['limit' => 200])->all();
        $this->set(compact('fanalisi', 'registros', 'consecutivo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fanalisi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fanalisi = $this->Fanalisis->get($id);
        if ($this->Fanalisis->delete($fanalisi)) {
            $this->Flash->success(__('The fanalisi has been deleted.'));
        } else {
            $this->Flash->error(__('The fanalisi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
