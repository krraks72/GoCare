<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Analisi Entity
 *
 * @property int $id
 * @property int $registro_id
 * @property \Cake\I18n\FrozenDate|null $fecha
 * @property string $causa_externa
 * @property string $finalidad_consulta
 * @property string|null $analisis
 * @property string|null $plan_manejo
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Registro $registro
 */
class Analisi extends Entity
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
        'fecha' => true,
        'causa_externa' => true,
        'finalidad_consulta' => true,
        'analisis' => true,
        'plan_manejo' => true,
        'created' => true,
        'modified' => true,
        'registro' => true,
    ];
}
