<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoHallazgos Model
 *
 * @property \App\Model\Table\HallazgosTable&\Cake\ORM\Association\HasMany $Hallazgos
 *
 * @method \App\Model\Entity\TipoHallazgo newEmptyEntity()
 * @method \App\Model\Entity\TipoHallazgo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TipoHallazgo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoHallazgo get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoHallazgo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TipoHallazgo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoHallazgo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoHallazgo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoHallazgo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoHallazgo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoHallazgo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoHallazgo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoHallazgo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TipoHallazgosTable extends Table
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

        $this->setTable('tipo_hallazgos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Hallazgos', [
            'foreignKey' => 'tipo_hallazgo_id',
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
            ->maxLength('descripcion', 120)
            ->allowEmptyString('descripcion');

        return $validator;
    }
}
