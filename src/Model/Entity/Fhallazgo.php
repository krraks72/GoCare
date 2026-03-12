<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fhallazgo Entity
 *
 * @property int $id
 * @property int $registro_id
 * @property int $tipo_hallazgo_id
 * @property string|null $hallazgo
 * @property string|null $valor
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Registro $registro
 * @property \App\Model\Entity\TipoHallazgo $tipo_hallazgo
 */
class Fhallazgo extends Entity
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
        'tipo_hallazgo_id' => true,
        'hallazgo' => true,
        'valor' => true,
        'created' => true,
        'modified' => true,
        'registro' => true,
        'tipo_hallazgo' => true,
    ];
}
