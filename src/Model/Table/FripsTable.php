<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rips Model
 *
 * @property \App\Model\Table\RegistrosTable&\Cake\ORM\Association\BelongsTo $Registros
 * @property \App\Model\Table\DiagnosticosTable&\Cake\ORM\Association\BelongsTo $Diagnosticos
 *
 * @method \App\Model\Entity\Rip newEmptyEntity()
 * @method \App\Model\Entity\Rip newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rip get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rip findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rip[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rip|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rip saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rip[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rip[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rip[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rip[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FripsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('frips');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Registros', [
            'foreignKey' => 'registro_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Diagnosticos', [
            'foreignKey' => 'diagnostico_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('registro_id')
            ->notEmptyString('registro_id');

        $validator
            ->scalar('tipo_diagnostico')
            ->maxLength('tipo_diagnostico', 200)
            ->allowEmptyString('tipo_diagnostico');

        $validator
            ->integer('diagnostico_id')
            ->allowEmptyString('diagnostico_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('registro_id', 'Registros'), ['errorField' => 'registro_id']);
        $rules->add($rules->existsIn('diagnostico_id', 'Diagnosticos'), ['errorField' => 'diagnostico_id']);

        return $rules;
    }
}
