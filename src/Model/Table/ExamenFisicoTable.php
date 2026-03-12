<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExamenFisico Model
 *
 * @property \App\Model\Table\RegistrosTable&\Cake\ORM\Association\BelongsTo $Registros
 *
 * @method \App\Model\Entity\ExamenFisico newEmptyEntity()
 * @method \App\Model\Entity\ExamenFisico newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ExamenFisico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExamenFisico get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExamenFisico findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ExamenFisico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExamenFisico[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExamenFisico|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExamenFisico saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExamenFisico[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExamenFisico[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExamenFisico[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExamenFisico[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExamenFisicoTable extends Table
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

        $this->setTable('examen_fisico');
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
            ->scalar('estado_general')
            ->maxLength('estado_general', 2000)
            ->requirePresence('estado_general', 'create')
            ->notEmptyString('estado_general');

        $validator
            ->integer('talla')
            ->allowEmptyString('talla');

        $validator
            ->decimal('peso')
            ->allowEmptyString('peso');

        $validator
            ->integer('saturacion')
            ->allowEmptyString('saturacion');

        $validator
            ->integer('frecuencia_cardiaca')
            ->allowEmptyString('frecuencia_cardiaca');

        $validator
            ->integer('frecuencia_respiratoria')
            ->allowEmptyString('frecuencia_respiratoria');

        $validator
            ->decimal('temperatura')
            ->allowEmptyString('temperatura');

        $validator
            ->integer('ocular')
            ->allowEmptyString('ocular');

        $validator
            ->integer('verbal')
            ->allowEmptyString('verbal');

        $validator
            ->integer('motora')
            ->allowEmptyString('motora');

        $validator
            ->integer('ta_sistolica')
            ->allowEmptyString('ta_sistolica');

        $validator
            ->integer('ta_diastolica')
            ->allowEmptyString('ta_diastolica');

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
