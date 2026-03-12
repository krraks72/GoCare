<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Obstetricos Controller
 *
 * @property \App\Model\Table\ObstetricosTable $Obstetricos
 * @method \App\Model\Entity\Obstetrico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ObstetricosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Registros'],
        ];
        $obstetricos = $this->paginate($this->Obstetricos);

        $this->set(compact('obstetricos'));
    }

    /**
     * View method
     *
     * @param string|null $id Obstetrico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $obstetrico = $this->Obstetricos->get($id, [
            'contain' => ['Registros'],
        ]);

        $this->set(compact('obstetrico'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $obstetrico = $this->Obstetricos->newEmptyEntity();
        if ($this->request->is('post')) {
            $obstetrico = $this->Obstetricos->patchEntity($obstetrico, $this->request->getData());
            if ($this->Obstetricos->save($obstetrico)) {
                $this->Flash->success(__('The obstetrico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The obstetrico could not be saved. Please, try again.'));
        }
        $registros = $this->Obstetricos->Registros->find('list', ['limit' => 200])->all();
        $this->set(compact('obstetrico', 'registros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Obstetrico id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $obstetrico = $this->Obstetricos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $obstetrico = $this->Obstetricos->patchEntity($obstetrico, $this->request->getData());
            if ($this->Obstetricos->save($obstetrico)) {
                $this->Flash->success(__('The obstetrico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The obstetrico could not be saved. Please, try again.'));
        }
        $registros = $this->Obstetricos->Registros->find('list', ['limit' => 200])->all();
        $this->set(compact('obstetrico', 'registros'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Obstetrico id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $obstetrico = $this->Obstetricos->get($id);
        if ($this->Obstetricos->delete($obstetrico)) {
            $this->Flash->success(__('The obstetrico has been deleted.'));
        } else {
            $this->Flash->error(__('The obstetrico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
