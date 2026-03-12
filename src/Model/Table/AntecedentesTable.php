<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Antecedentes Model
 *
 * @property \App\Model\Table\RegistrosTable&\Cake\ORM\Association\BelongsTo $Registros
 * @property \App\Model\Table\TipoAntecedentesTable&\Cake\ORM\Association\BelongsTo $TipoAntecedentes
 *
 * @method \App\Model\Entity\Antecedente newEmptyEntity()
 * @method \App\Model\Entity\Antecedente newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Antecedente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Antecedente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Antecedente findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Antecedente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Antecedente[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Antecedente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Antecedente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Antecedente[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Antecedente[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Antecedente[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Antecedente[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AntecedentesTable extends Table
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

        $this->setTable('antecedentes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Registros', [
            'foreignKey' => 'registro_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TipoAntecedentes', [
            'foreignKey' => 'tipo_antecedente_id',
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
            ->scalar('valor')
            ->maxLength('valor', 2000)
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->integer('tipo_antecedente_id')
            ->notEmptyString('tipo_antecedente_id');

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
        $rules->add($rules->existsIn('tipo_antecedente_id', 'TipoAntecedentes'), ['errorField' => 'tipo_antecedente_id']);

        return $rules;
    }
}
