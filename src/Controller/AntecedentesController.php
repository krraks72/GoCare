<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Antecedentes Controller
 *
 * @property \App\Model\Table\AntecedentesTable $Antecedentes
 * @method \App\Model\Entity\Antecedente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AntecedentesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $this->paginate = [
            'contain' => ['Registros','TipoAntecedentes'],
        ];
        $antecedentes = $this->paginate($this->Antecedentes->find()->where(['registro_id' => $consecutivo]));

        $this->set(compact('antecedentes', 'consecutivo'));
    }

    /**
     * View method
     *
     * @param string|null $id Antecedente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $antecedente = $this->Antecedentes->get($id, [
            'contain' => ['Registros', 'TipoAntecedentes'],
        ]);

        $this->set(compact('antecedente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $antecedente = $this->Antecedentes->newEmptyEntity();
        if ($this->request->is('post')) {
            $antecedente = $this->Antecedentes->patchEntity($antecedente, $this->request->getData());
            if ($this->Antecedentes->save($antecedente)) {
                $this->Flash->success(__('The antecedente has been saved.'));

                return $this->redirect(['controller' => 'Antecedentes', 'action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The antecedente could not be saved. Please, try again.'));
        }
        $registros = $this->Antecedentes->Registros->find()->all();
        $tipoAntecedentes = $this->Antecedentes->TipoAntecedentes->find()->all();
        $this->set(compact('antecedente', 'registros', 'tipoAntecedentes', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Antecedente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $antecedente = $this->Antecedentes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $antecedente = $this->Antecedentes->patchEntity($antecedente, $this->request->getData());
            if ($this->Antecedentes->save($antecedente)) {
                $this->Flash->success(__('The antecedente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The antecedente could not be saved. Please, try again.'));
        }
        $registros = $this->Antecedentes->Registros->find('list', ['limit' => 200])->all();
        $tipoAntecedentes = $this->Antecedentes->TipoAntecedentes->find('list', ['limit' => 200])->all();
        $this->set(compact('antecedente', 'registros', 'tipoAntecedentes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Antecedente id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $antecedente = $this->Antecedentes->get($id);
        if ($this->Antecedentes->delete($antecedente)) {
            $this->Flash->success(__('The antecedente has been deleted.'));
        } else {
            $this->Flash->error(__('The antecedente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
