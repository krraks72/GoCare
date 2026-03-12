<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diagnosticos Model
 *
 * @property \App\Model\Table\RipsTable&\Cake\ORM\Association\HasMany $Rips
 *
 * @method \App\Model\Entity\Diagnostico newEmptyEntity()
 * @method \App\Model\Entity\Diagnostico newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Diagnostico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diagnostico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diagnostico findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Diagnostico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnostico[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnostico|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnostico saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnostico[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diagnostico[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diagnostico[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diagnostico[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiagnosticosTable extends Table
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

        $this->setTable('diagnosticos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Rips', [
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
            ->scalar('codigo')
            ->maxLength('codigo', 6)
            ->allowEmptyString('codigo');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 200)
            ->allowEmptyString('descripcion');

        return $validator;
    }
}
