<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Obstetrico Entity
 *
 * @property int $id
 * @property int $registro_id
 * @property int|null $embarazo_actual
 * @property int|null $trimestre
 * @property string|null $metodo_planificacion
 * @property \Cake\I18n\FrozenDate|null $menarquia
 * @property \Cake\I18n\FrozenDate|null $fur
 * @property string|null $ciclos
 * @property int|null $gestacioinales
 * @property int|null $partos
 * @property int|null $abortos
 * @property int|null $vivos
 * @property int|null $mortinatos
 * @property int|null $ectopicos
 * @property int|null $gemelares
 * @property \Cake\I18n\FrozenDate|null $ultimo_parto
 * @property int|null $mola_id
 * @property string|null $mola
 * @property int|null $muertes_perinatales_ps
 * @property int|null $muertes_perinatales_pm
 * @property \Cake\I18n\FrozenDate|null $ultima_citologia
 * @property string|null $resultado_citologia
 * @property \Cake\I18n\FrozenDate|null $fecha_vph
 * @property string|null $resultado_vph
 * @property \Cake\I18n\FrozenDate|null $fecha_colposcopia
 * @property string|null $otros_antecedentes
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Registro $registro
 */
class Obstetrico extends Entity
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
        'embarazo_actual' => true,
        'trimestre' => true,
        'metodo_planificacion' => true,
        'menarquia' => true,
        'fur' => true,
        'ciclos' => true,
        'gestacioinales' => true,
        'partos' => true,
        'abortos' => true,
        'vivos' => true,
        'mortinatos' => true,
        'ectopicos' => true,
        'gemelares' => true,
        'ultimo_parto' => true,
        'mola_id' => true,
        'mola' => true,
        'muertes_perinatales_ps' => true,
        'muertes_perinatales_pm' => true,
        'ultima_citologia' => true,
        'resultado_citologia' => true,
        'fecha_vph' => true,
        'resultado_vph' => true,
        'fecha_colposcopia' => true,
        'otros_antecedentes' => true,
        'created' => true,
        'modified' => true,
        'registro' => true,
    ];
}
