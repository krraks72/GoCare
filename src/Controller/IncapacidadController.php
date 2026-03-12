<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\I18n;

/**
 * Incapacidad Controller
 *
 * @property \App\Model\Table\IncapacidadTable $Incapacidad
 * @method \App\Model\Entity\Incapacidad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IncapacidadController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($consecutivo = null)
    {
        $this->paginate = [
            'contain' => ['Registros'],
        ];
        $incapacidad = $this->paginate($this->Incapacidad->find()->where(['registro_id' => $consecutivo]));

        $this->set(compact('incapacidad', 'consecutivo'));
    }

    /**
     * View method
     *
     * @param string|null $id Incapacidad id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $incapacidad = $this->Incapacidad->get($id, [
            'contain' => ['Registros'],
        ]);

        $this->set(compact('incapacidad'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($consecutivo = null)
    {
        // Cambiar el locale a 'en_US'
        I18n::setLocale('en_US');

        $incapacidad = $this->Incapacidad->newEmptyEntity();
        if ($this->request->is('post')) {
            $incapacidad = $this->Incapacidad->patchEntity($incapacidad, $this->request->getData());
            if ($this->Incapacidad->save($incapacidad)) {
                $this->Flash->success(__('The incapacidad has been saved.'));

                return $this->redirect(['action' => 'index', $consecutivo]);
            }
            $this->Flash->error(__('The incapacidad could not be saved. Please, try again.'));
        }

        $reg = $this->Incapacidad->Registros->find()->where(['id' => $consecutivo]);
        $registros = $this->Incapacidad->Registros->find()->where(['id' => $consecutivo]);
        $this->set(compact('incapacidad', 'registros', 'reg', 'consecutivo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Incapacidad id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $incapacidad = $this->Incapacidad->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $incapacidad = $this->Incapacidad->patchEntity($incapacidad, $this->request->getData());
            if ($this->Incapacidad->save($incapacidad)) {
                $this->Flash->success(__('The incapacidad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The incapacidad could not be saved. Please, try again.'));
        }
        $registros = $this->Incapacidad->Registros->find('list', ['limit' => 200])->all();
        $this->set(compact('incapacidad', 'registros'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Incapacidad id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $consecutivo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $incapacidad = $this->Incapacidad->get($id);
        if ($this->Incapacidad->delete($incapacidad)) {
            $this->Flash->success(__('The incapacidad has been deleted.'));
        } else {
            $this->Flash->error(__('The incapacidad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $consecutivo]);
    }
}
