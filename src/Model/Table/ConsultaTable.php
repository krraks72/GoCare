<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Consulta Model
 *
 * @property \App\Model\Table\RegistrosTable&\Cake\ORM\Association\BelongsTo $Registros
 * @property \App\Model\Table\AmbitosTable&\Cake\ORM\Association\BelongsTo $Ambitos
 * @property \App\Model\Table\MotivosTable&\Cake\ORM\Association\BelongsTo $Motivos
 *
 * @method \App\Model\Entity\Consultum newEmptyEntity()
 * @method \App\Model\Entity\Consultum newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Consultum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Consultum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Consultum findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Consultum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Consultum[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Consultum|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consultum saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consultum[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Consultum[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Consultum[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Consultum[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConsultaTable extends Table
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

        $this->setTable('consulta');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Registros', [
            'foreignKey' => 'registro_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ambitos', [
            'foreignKey' => 'ambito_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Motivos', [
            'foreignKey' => 'motivo_id',
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
            ->scalar('sevicios_publicos')
            ->allowEmptyString('sevicios_publicos');

        $validator
            ->scalar('unidad_sanitaria')
            ->allowEmptyString('unidad_sanitaria');

        $validator
            ->scalar('condicion_ingreso')
            ->maxLength('condicion_ingreso', 2000)
            ->requirePresence('condicion_ingreso', 'create')
            ->notEmptyString('condicion_ingreso');

        $validator
            ->integer('ambito_id')
            ->notEmptyString('ambito_id');

        $validator
            ->integer('motivo_id')
            ->allowEmptyString('motivo_id');

        $validator
            ->scalar('motivo_consulta')
            ->maxLength('motivo_consulta', 2000)
            ->requirePresence('motivo_consulta', 'create')
            ->notEmptyString('motivo_consulta');

        $validator
            ->scalar('enfermedad_actual')
            ->maxLength('enfermedad_actual', 2000)
            ->requirePresence('enfermedad_actual', 'create')
            ->notEmptyString('enfermedad_actual');

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
        $rules->add($rules->existsIn('ambito_id', 'Ambitos'), ['errorField' => 'ambito_id']);
        $rules->add($rules->existsIn('motivo_id', 'Motivos'), ['errorField' => 'motivo_id']);

        return $rules;
    }
}
