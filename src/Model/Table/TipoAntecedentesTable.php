<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoAntecedentes Model
 *
 * @property \App\Model\Table\AntecedentesTable&\Cake\ORM\Association\HasMany $Antecedentes
 * @property \App\Model\Table\RevisionTable&\Cake\ORM\Association\HasMany $Revision
 *
 * @method \App\Model\Entity\TipoAntecedente newEmptyEntity()
 * @method \App\Model\Entity\TipoAntecedente newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TipoAntecedente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoAntecedente get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoAntecedente findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TipoAntecedente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoAntecedente[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoAntecedente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoAntecedente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoAntecedente[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoAntecedente[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoAntecedente[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoAntecedente[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TipoAntecedentesTable extends Table
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

        $this->setTable('tipo_antecedentes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Antecedentes', [
            'foreignKey' => 'tipo_antecedente_id',
        ]);
        $this->hasMany('Revision', [
            'foreignKey' => 'tipo_antecedente_id',
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
