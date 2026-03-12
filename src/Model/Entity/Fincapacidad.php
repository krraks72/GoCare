<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fincapacidad Entity
 *
 * @property int $id
 * @property int $registro_id
 * @property string $nombre_convenio
 * @property string $tipo_identificacion
 * @property string $numero_identificacion
 * @property string $nombre_paciente
 * @property string $genero
 * @property int $dias_inca
 * @property string $prioridad
 * @property string $observaciones
 * @property string $fecha_inicial
 * @property string $fecha_final
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Registro $registro
 */
class Fincapacidad extends Entity
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
        'registro_id' => true,
        'nombre_convenio' => true,
        'tipo_identificacion' => true,
        'numero_identificacion' => true,
        'nombre_paciente' => true,
        'genero' => true,
        'dias_inca' => true,
        'prioridad' => true,
        'observaciones' => true,
        'fecha_inicial' => true,
        'fecha_final' => true,
        'created' => true,
        'modified' => true,
        'registro' => true,
    ];
}
