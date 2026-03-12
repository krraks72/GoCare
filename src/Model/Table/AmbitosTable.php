<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ambitos Model
 *
 * @property \App\Model\Table\ConsultaTable&\Cake\ORM\Association\HasMany $Consulta
 *
 * @method \App\Model\Entity\Ambito newEmptyEntity()
 * @method \App\Model\Entity\Ambito newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ambito[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ambito get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ambito findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ambito patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ambito[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ambito|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ambito saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ambito[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ambito[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ambito[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ambito[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AmbitosTable extends Table
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

        $this->setTable('ambitos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Consulta', [
            'foreignKey' => 'ambito_id',
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
            ->scalar('descripcion')
            ->maxLength('descripcion', 200)
            ->allowEmptyString('descripcion');

        return $validator;
    }
}
