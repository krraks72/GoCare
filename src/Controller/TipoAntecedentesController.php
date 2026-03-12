<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TipoAntecedentes Controller
 *
 * @property \App\Model\Table\TipoAntecedentesTable $TipoAntecedentes
 * @method \App\Model\Entity\TipoAntecedente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoAntecedentesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tipoAntecedentes = $this->paginate($this->TipoAntecedentes);

        $this->set(compact('tipoAntecedentes'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Antecedente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoAntecedente = $this->TipoAntecedentes->get($id, [
            'contain' => ['Antecedentes', 'Revision'],
        ]);

        $this->set(compact('tipoAntecedente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoAntecedente = $this->TipoAntecedentes->newEmptyEntity();
        if ($this->request->is('post')) {
            $tipoAntecedente = $this->TipoAntecedentes->patchEntity($tipoAntecedente, $this->request->getData());
            if ($this->TipoAntecedentes->save($tipoAntecedente)) {
                $this->Flash->success(__('The tipo antecedente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo antecedente could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoAntecedente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Antecedente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoAntecedente = $this->TipoAntecedentes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoAntecedente = $this->TipoAntecedentes->patchEntity($tipoAntecedente, $this->request->getData());
            if ($this->TipoAntecedentes->save($tipoAntecedente)) {
                $this->Flash->success(__('The tipo antecedente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo antecedente could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoAntecedente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Antecedente id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoAntecedente = $this->TipoAntecedentes->get($id);
        if ($this->TipoAntecedentes->delete($tipoAntecedente)) {
            $this->Flash->success(__('The tipo antecedente has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo antecedente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
