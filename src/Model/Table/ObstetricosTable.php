<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Obstetricos Model
 *
 * @property \App\Model\Table\RegistrosTable&\Cake\ORM\Association\BelongsTo $Registros
 *
 * @method \App\Model\Entity\Obstetrico newEmptyEntity()
 * @method \App\Model\Entity\Obstetrico newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Obstetrico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Obstetrico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Obstetrico findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Obstetrico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Obstetrico[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Obstetrico|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Obstetrico saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Obstetrico[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Obstetrico[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Obstetrico[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Obstetrico[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ObstetricosTable extends Table
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

        $this->setTable('obstetricos');
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
            ->integer('embarazo_actual')
            ->allowEmptyString('embarazo_actual');

        $validator
            ->integer('trimestre')
            ->allowEmptyString('trimestre');

        $validator
            ->scalar('metodo_planificacion')
            ->maxLength('metodo_planificacion', 100)
            ->allowEmptyString('metodo_planificacion');

        $validator
            ->date('menarquia')
            ->allowEmptyDate('menarquia');

        $validator
            ->date('fur')
            ->allowEmptyDate('fur');

        $validator
            ->scalar('ciclos')
            ->maxLength('ciclos', 50)
            ->allowEmptyString('ciclos');

        $validator
            ->integer('gestacioinales')
            ->allowEmptyString('gestacioinales');

        $validator
            ->integer('partos')
            ->allowEmptyString('partos');

        $validator
            ->integer('abortos')
            ->allowEmptyString('abortos');

        $validator
            ->integer('vivos')
            ->allowEmptyString('vivos');

        $validator
            ->integer('mortinatos')
            ->allowEmptyString('mortinatos');

        $validator
            ->integer('ectopicos')
            ->allowEmptyString('ectopicos');

        $validator
            ->integer('gemelares')
            ->allowEmptyString('gemelares');

        $validator
            ->date('ultimo_parto')
            ->allowEmptyDate('ultimo_parto');

        $validator
            ->integer('mola_id')
            ->allowEmptyString('mola_id');

        $validator
            ->scalar('mola')
            ->maxLength('mola', 100)
            ->allowEmptyString('mola');

        $validator
            ->integer('muertes_perinatales_ps')
            ->allowEmptyString('muertes_perinatales_ps');

        $validator
            ->integer('muertes_perinatales_pm')
            ->allowEmptyString('muertes_perinatales_pm');

        $validator
            ->date('ultima_citologia')
            ->allowEmptyDate('ultima_citologia');

        $validator
            ->scalar('resultado_citologia')
            ->maxLength('resultado_citologia', 200)
            ->allowEmptyString('resultado_citologia');

        $validator
            ->date('fecha_vph')
            ->allowEmptyDate('fecha_vph');

        $validator
            ->scalar('resultado_vph')
            ->maxLength('resultado_vph', 200)
            ->allowEmptyString('resultado_vph');

        $validator
            ->date('fecha_colposcopia')
            ->allowEmptyDate('fecha_colposcopia');

        $validator
            ->scalar('otros_antecedentes')
            ->maxLength('otros_antecedentes', 200)
            ->allowEmptyString('otros_antecedentes');

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
