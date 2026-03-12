<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Incapacidad Model
 *
 * @property \App\Model\Table\RegistrosTable&\Cake\ORM\Association\BelongsTo $Registros
 *
 * @method \App\Model\Entity\Incapacidad newEmptyEntity()
 * @method \App\Model\Entity\Incapacidad newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Incapacidad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Incapacidad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Incapacidad findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Incapacidad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Incapacidad[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Incapacidad|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Incapacidad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Incapacidad[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Incapacidad[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Incapacidad[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Incapacidad[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FincapacidadTable extends Table
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

        $this->setTable('fincapacidad');
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
            ->scalar('nombre_convenio')
            ->maxLength('nombre_convenio', 200)
            ->requirePresence('nombre_convenio', 'create')
            ->notEmptyString('nombre_convenio');

        $validator
            ->scalar('tipo_identificacion')
            ->maxLength('tipo_identificacion', 2)
            ->requirePresence('tipo_identificacion', 'create')
            ->notEmptyString('tipo_identificacion');

        $validator
            ->scalar('numero_identificacion')
            ->maxLength('numero_identificacion', 20)
            ->requirePresence('numero_identificacion', 'create')
            ->notEmptyString('numero_identificacion');

        $validator
            ->scalar('nombre_paciente')
            ->maxLength('nombre_paciente', 100)
            ->requirePresence('nombre_paciente', 'create')
            ->notEmptyString('nombre_paciente');

        $validator
            ->scalar('genero')
            ->maxLength('genero', 10)
            ->requirePresence('genero', 'create')
            ->notEmptyString('genero');

        $validator
            ->integer('dias_inca')
            ->requirePresence('dias_inca', 'create')
            ->notEmptyString('dias_inca');

        $validator
            ->scalar('prioridad')
            ->maxLength('prioridad', 10)
            ->requirePresence('prioridad', 'create')
            ->notEmptyString('prioridad');

        $validator
            ->scalar('observaciones')
            ->maxLength('observaciones', 2000)
            ->requirePresence('observaciones', 'create')
            ->notEmptyString('observaciones');

        $validator
            ->scalar('fecha_inicial')
            ->maxLength('fecha_inicial', 10)
            ->requirePresence('fecha_inicial', 'create')
            ->notEmptyString('fecha_inicial');

        $validator
            ->scalar('fecha_final')
            ->maxLength('fecha_final', 10)
            ->requirePresence('fecha_final', 'create')
            ->notEmptyString('fecha_final');

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
