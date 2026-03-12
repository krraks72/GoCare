<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Registros Model
 *
 * @property \App\Model\Table\AntecedentesTable&\Cake\ORM\Association\HasMany $Antecedentes
 * @property \App\Model\Table\FantecedentesTable&\Cake\ORM\Association\HasMany $Fantecedentes
 * @property \App\Model\Table\AntecedentesObstetricosTable&\Cake\ORM\Association\HasMany $AntecedentesObstetricos
 * @property \App\Model\Table\ConsultaTable&\Cake\ORM\Association\HasMany $Consulta
 * @property \App\Model\Table\ConsultaTable&\Cake\ORM\Association\HasMany $Fconsulta
 * @property \App\Model\Table\ExamenFisicoTable&\Cake\ORM\Association\HasMany $ExamenFisico
 * @property \App\Model\Table\HallazgosTable&\Cake\ORM\Association\HasMany $Hallazgos
 * @property \App\Model\Table\IncapacidadTable&\Cake\ORM\Association\HasMany $Incapacidad
 * @property \App\Model\Table\RipsTable&\Cake\ORM\Association\HasMany $Rips
 *
 * @method \App\Model\Entity\Registro newEmptyEntity()
 * @method \App\Model\Entity\Registro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Registro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Registro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Registro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Registro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Registro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Registro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RegistrosTable extends Table
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

        $this->setTable('registros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Analisis', [
            'foreignKey' => 'registro_id',
        ]);
        $this->hasMany('Antecedentes', [
            'foreignKey' => 'registro_id',
        ]);
        $this->hasMany('Fantecedentes', [
            'foreignKey' => 'registro_id',
        ]);
        $this->hasMany('AntecedentesObstetricos', [
            'foreignKey' => 'registro_id',
        ]);
        $this->hasMany('Consulta', [
            'foreignKey' => 'registro_id',
        ]);
        $this->hasMany('Fconsulta', [
            'foreignKey' => 'registro_id',
        ]);
        $this->hasMany('ExamenFisico', [
            'foreignKey' => 'registro_id',
        ]);
        $this->hasMany('Hallazgos', [
            'foreignKey' => 'registro_id',
        ]);
        $this->hasMany('Incapacidad', [
            'foreignKey' => 'registro_id',
        ]);
        $this->hasMany('Rips', [
            'foreignKey' => 'registro_id',
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
            ->integer('cita')
            ->allowEmptyString('cita');

        $validator
            ->scalar('nombre_convenio')
            ->maxLength('nombre_convenio', 200)
            ->allowEmptyString('nombre_convenio');

        $validator
            ->scalar('tipo_identificacion')
            ->maxLength('tipo_identificacion', 2)
            ->allowEmptyString('tipo_identificacion');

        $validator
            ->scalar('numero_identificacion')
            ->maxLength('numero_identificacion', 20)
            ->allowEmptyString('numero_identificacion');

        $validator
            ->scalar('nombre_paciente')
            ->maxLength('nombre_paciente', 200)
            ->allowEmptyString('nombre_paciente');

        $validator
            ->scalar('genero')
            ->maxLength('genero', 1)
            ->allowEmptyString('genero');

        $validator
            ->date('fecha_nacimiento')
            ->allowEmptyDate('fecha_nacimiento');

        $validator
            ->scalar('lugar_residencia')
            ->maxLength('lugar_residencia', 200)
            ->allowEmptyString('lugar_residencia');

        $validator
            ->scalar('procedencia')
            ->maxLength('procedencia', 100)
            ->allowEmptyString('procedencia');

        $validator
            ->scalar('profesion')
            ->maxLength('profesion', 200)
            ->allowEmptyString('profesion');

        $validator
            ->scalar('ocupacion')
            ->maxLength('ocupacion', 200)
            ->allowEmptyString('ocupacion');

        $validator
            ->scalar('estado_civil')
            ->maxLength('estado_civil', 20)
            ->allowEmptyString('estado_civil');

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 200)
            ->allowEmptyString('direccion');

        $validator
            ->scalar('telefono_domicilio')
            ->maxLength('telefono_domicilio', 20)
            ->allowEmptyString('telefono_domicilio');

        $validator
            ->scalar('telefono_movil')
            ->maxLength('telefono_movil', 20)
            ->allowEmptyString('telefono_movil');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('datos_acompanante')
            ->maxLength('datos_acompanante', 300)
            ->allowEmptyString('datos_acompanante');

        $validator
            ->scalar('datos_responsable')
            ->maxLength('datos_responsable', 300)
            ->allowEmptyString('datos_responsable');

        $validator
            ->scalar('tipoDocMedico')
            ->maxLength('tipoDocMedico', 2)
            ->allowEmptyString('tipoDocMedico');

        $validator
            ->scalar('documentoMedico')
            ->maxLength('documentoMedico', 20)
            ->allowEmptyString('documentoMedico');

        $validator
            ->integer('estado')
            ->requirePresence('estado', 'create')
            ->notEmptyString('estado');

        $validator
            ->integer('edad')
            ->requirePresence('edad', 'create')
            ->notEmptyString('edad');

        $validator
            ->integer('especialidad')
            ->requirePresence('especialidad', 'create')
            ->notEmptyString('especialidad');

        return $validator;
    }
}
