<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rip Entity
 *
 * @property int $id
 * @property int $registro_id
 * @property string|null $tipo_diagnostico
 * @property int|null $diagnostico_id
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Registro $registro
 * @property \App\Model\Entity\Diagnostico $diagnostico
 */
class Rip extends Entity
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
        'tipo_diagnostico' => true,
        'diagnostico_id' => true,
        'created' => true,
        'modified' => true,
        'registro' => true,
        'diagnostico' => true,
    ];
}
