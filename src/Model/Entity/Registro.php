<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Registro Entity
 *
 * @property int $id
 * @property int|null $cita
 * @property string|null $nombre_convenio
 * @property string|null $tipo_identificacion
 * @property string|null $numero_identificacion
 * @property string|null $nombre_paciente
 * @property string|null $genero
 * @property \Cake\I18n\FrozenDate|null $fecha_nacimiento
 * @property string|null $lugar_residencia
 * @property string|null $procedencia
 * @property string|null $profesion
 * @property string|null $ocupacion
 * @property string|null $estado_civil
 * @property string|null $direccion
 * @property string|null $telefono_domicilio
 * @property string|null $telefono_movil
 * @property string|null $email
 * @property string|null $datos_acompanante
 * @property string|null $datos_responsable
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 * @property string|null $tipoDocMedico
 * @property string|null $documentoMedico
 * @property int $estado
 * @property int $edad
 * @property int $especialidad
 *
 * @property \App\Model\Entity\Antecedente[] $antecedentes
 * @property \App\Model\Entity\AntecedentesObstetrico[] $antecedentes_obstetricos
 * @property \App\Model\Entity\Consultum[] $consulta
 * @property \App\Model\Entity\Incapacidad[] $incapacidad
 * @property \App\Model\Entity\ExamenFisico[] $examen_fisico
 * @property \App\Model\Entity\Hallazgo[] $hallazgos
 * @property \App\Model\Entity\Rip[] $rips
 */
class Registro extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'cita' => true,
        'nombre_convenio' => true,
        'tipo_identificacion' => true,
        'numero_identificacion' => true,
        'nombre_paciente' => true,
        'genero' => true,
        'fecha_nacimiento' => true,
        'lugar_residencia' => true,
        'procedencia' => true,
        'profesion' => true,
        'ocupacion' => true,
        'estado_civil' => true,
        'direccion' => true,
        'telefono_domicilio' => true,
        'telefono_movil' => true,
        'email' => true,
        'datos_acompanante' => true,
        'datos_responsable' => true,
        'created' => true,
        'modified' => true,
        'tipoDocMedico' => true,
        'documentoMedico' => true,
        'estado' => true,
        'edad' => true,
        'especialidad' => true,
        'antecedentes' => true,
        'antecedentes_obstetricos' => true,
        'consulta' => true,
        'incapacidad' => true,
        'examen_fisico' => true,
        'hallazgos' => true,
        'rips' => true,
    ];
}
