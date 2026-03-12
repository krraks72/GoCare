<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fconsultum Entity
 *
 * @property int $id
 * @property int $registro_id
 * @property string|null $sevicios_publicos
 * @property string|null $unidad_sanitaria
 * @property string|null $condicion_ingreso
 * @property int $ambito_id
 * @property int|null $motivo_id
 * @property string|null $motivo_consulta
 * @property string|null $enfermedad_actual
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Registro $registro
 * @property \App\Model\Entity\Ambito $ambito
 * @property \App\Model\Entity\Motivo $motivo
 */
class Fconsultum extends Entity
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
        'sevicios_publicos' => true,
        'unidad_sanitaria' => true,
        'condicion_ingreso' => true,
        'ambito_id' => true,
        'motivo_id' => true,
        'motivo_consulta' => true,
        'enfermedad_actual' => true,
        'created' => true,
        'modified' => true,
        'registro' => true,
        'ambito' => true,
        'motivo' => true,
    ];
}
