<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fantecedentes Controller
 *
 * @property \App\Model\Table\FantecedentesTable $Fantecedentes
 * @method \App\Model\Entity\Fantecedente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FantecedentesController extends AppController
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
        $fantecedentes = $this->paginate($this->Fantecedentes->find()->where(['registro_id' => $consecutivo]));

        $this->set(compact('fantecedentes', 'consecutivo'));
    }

    /**
     * View method
     *
     * @param string|null $id Fantecedente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fantecedente = $this->Fantecedentes->get($id, [
            'contain' => ['Registros', 'TipoAntecedentes'],
        ]);

        $this->set(compact('fantecedente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        $fantecedente = $this->Fantecedentes->newEmptyEntity();
        if ($this->request->is('post')) {
            $fantecedente = $this->Fantecedentes->patchEntity($fantecedente, $this->request->getData());
            if ($this->Fantecedentes->save($fantecedente)) {
                $this->Flash->success(__('The fantecedente has been saved.'));

                return $this->redirect(['controller' => 'Fantecedentes', 'action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The fantecedente could not be saved. Please, try again.'));
        }
        $registros = $this->Fantecedentes->Registros->find()->all();
        $tipoAntecedentes = $this->Fantecedentes->TipoAntecedentes->find()->all();
        $this->set(compact('fantecedente', 'registros', 'tipoAntecedentes', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fantecedente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fantecedente = $this->Fantecedentes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fantecedente = $this->Fantecedentes->patchEntity($fantecedente, $this->request->getData());
            if ($this->Fantecedentes->save($fantecedente)) {
                $this->Flash->success(__('The fantecedente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fantecedente could not be saved. Please, try again.'));
        }
        $registros = $this->Fantecedentes->Registros->find('list', ['limit' => 200])->all();
        $tipoAntecedentes = $this->Fantecedentes->TipoAntecedentes->find('list', ['limit' => 200])->all();
        $this->set(compact('fantecedente', 'registros', 'tipoAntecedentes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fantecedente id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fantecedente = $this->Fantecedentes->get($id);
        if ($this->Fantecedentes->delete($fantecedente)) {
            $this->Flash->success(__('The fantecedente has been deleted.'));
        } else {
            $this->Flash->error(__('The fantecedente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
