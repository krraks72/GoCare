<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Analisis Model
 *
 * @property \App\Model\Table\RegistrosTable&\Cake\ORM\Association\BelongsTo $Registros
 *
 * @method \App\Model\Entity\Analisi newEmptyEntity()
 * @method \App\Model\Entity\Analisi newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Analisi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Analisi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Analisi findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Analisi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Analisi[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Analisi|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Analisi saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Analisi[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Analisi[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Analisi[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Analisi[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FanalisisTable extends Table
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

        $this->setTable('fanalisis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Registros', [
            'foreignKey' => 'registro_id',
            'joinType' => 'INNER',
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
            ->date('fecha')
            ->allowEmptyDate('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyString('fecha');

        $validator
            ->scalar('causa_externa')
            ->maxLength('causa_externa', 2000)
            ->requirePresence('causa_externa', 'create')
            ->notEmptyString('causa_externa');

        $validator
            ->scalar('finalidad_consulta')
            ->maxLength('finalidad_consulta', 2000)
            ->requirePresence('finalidad_consulta', 'create')
            ->notEmptyString('finalidad_consulta');

        $validator
            ->scalar('analisis')
            ->maxLength('analisis', 2000)
            ->requirePresence('analisis', 'create')
            ->notEmptyString('analisis');

        $validator
            ->scalar('plan_manejo')
            ->maxLength('plan_manejo', 2000)
            ->requirePresence('plan_manejo', 'create')
            ->notEmptyString('plan_manejo');

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

        return $rules;
    }
}
