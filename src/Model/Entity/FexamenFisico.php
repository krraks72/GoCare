<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FexamenFisico Entity
 *
 * @property int $id
 * @property int $registro_id
 * @property string|null $estado_general
 * @property int|null $talla
 * @property string|null $peso
 * @property int|null $saturacion
 * @property int|null $frecuencia_cardiaca
 * @property int|null $frecuencia_respiratoria
 * @property int|null $temperatura
 * @property int|null $ocular
 * @property int|null $verbal
 * @property int|null $motora
 * @property int|null $ta_sistolica
 * @property int|null $ta_diastolica
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Registro $registro
 */
class EFeamenFisico extends Entity
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
        'estado_general' => true,
        'talla' => true,
        'peso' => true,
        'saturacion' => true,
        'frecuencia_cardiaca' => true,
        'frecuencia_respiratoria' => true,
        'temperatura' => true,
        'ocular' => true,
        'verbal' => true,
        'motora' => true,
        'ta_sistolica' => true,
        'ta_diastolica' => true,
        'created' => true,
        'modified' => true,
        'registro' => true,
    ];
}
