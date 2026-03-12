<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hallazgos Model
 *
 * @property \App\Model\Table\RegistrosTable&\Cake\ORM\Association\BelongsTo $Registros
 * @property \App\Model\Table\TipoHallazgosTable&\Cake\ORM\Association\BelongsTo $TipoHallazgos
 *
 * @method \App\Model\Entity\Hallazgo newEmptyEntity()
 * @method \App\Model\Entity\Hallazgo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Hallazgo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hallazgo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hallazgo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Hallazgo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hallazgo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hallazgo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hallazgo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hallazgo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Hallazgo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Hallazgo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Hallazgo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HallazgosTable extends Table
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

        $this->setTable('hallazgos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Registros', [
            'foreignKey' => 'registro_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TipoHallazgos', [
            'foreignKey' => 'tipo_hallazgo_id',
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
            ->integer('tipo_hallazgo_id')
            ->notEmptyString('tipo_hallazgo_id');

        $validator
            ->scalar('hallazgo')
            ->maxLength('hallazgo', 200)
            ->allowEmptyString('hallazgo');

        $validator
            ->scalar('valor')
            ->maxLength('valor', 2000)
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

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
        $rules->add($rules->existsIn('tipo_hallazgo_id', 'TipoHallazgos'), ['errorField' => 'tipo_hallazgo_id']);

        return $rules;
    }
}
