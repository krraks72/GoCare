<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Obstetrico> $obstetricos
 */
?>
<div class="obstetricos index content">
    <?= $this->Html->link(__('New Obstetrico'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Obstetricos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('registro_id') ?></th>
                    <th><?= $this->Paginator->sort('embarazo_actual') ?></th>
                    <th><?= $this->Paginator->sort('trimestre') ?></th>
                    <th><?= $this->Paginator->sort('metodo_planificacion') ?></th>
                    <th><?= $this->Paginator->sort('menarquia') ?></th>
                    <th><?= $this->Paginator->sort('fur') ?></th>
                    <th><?= $this->Paginator->sort('ciclos') ?></th>
                    <th><?= $this->Paginator->sort('gestacioinales') ?></th>
                    <th><?= $this->Paginator->sort('partos') ?></th>
                    <th><?= $this->Paginator->sort('abortos') ?></th>
                    <th><?= $this->Paginator->sort('vivos') ?></th>
                    <th><?= $this->Paginator->sort('mortinatos') ?></th>
                    <th><?= $this->Paginator->sort('ectopicos') ?></th>
                    <th><?= $this->Paginator->sort('gemelares') ?></th>
                    <th><?= $this->Paginator->sort('ultimo_parto') ?></th>
                    <th><?= $this->Paginator->sort('mola_id') ?></th>
                    <th><?= $this->Paginator->sort('mola') ?></th>
                    <th><?= $this->Paginator->sort('muertes_perinatales_ps') ?></th>
                    <th><?= $this->Paginator->sort('muertes_perinatales_pm') ?></th>
                    <th><?= $this->Paginator->sort('ultima_citologia') ?></th>
                    <th><?= $this->Paginator->sort('resultado_citologia') ?></th>
                    <th><?= $this->Paginator->sort('fecha_vph') ?></th>
                    <th><?= $this->Paginator->sort('resultado_vph') ?></th>
                    <th><?= $this->Paginator->sort('fecha_colposcopia') ?></th>
                    <th><?= $this->Paginator->sort('otros_antecedentes') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($obstetricos as $obstetrico): ?>
                <tr>
                    <td><?= $this->Number->format($obstetrico->id) ?></td>
                    <td><?= $obstetrico->has('registro') ? $this->Html->link($obstetrico->registro->id, ['controller' => 'Registros', 'action' => 'view', $obstetrico->registro->id]) : '' ?></td>
                    <td><?= $obstetrico->embarazo_actual === null ? '' : $this->Number->format($obstetrico->embarazo_actual) ?></td>
                    <td><?= $obstetrico->trimestre === null ? '' : $this->Number->format($obstetrico->trimestre) ?></td>
                    <td><?= h($obstetrico->metodo_planificacion) ?></td>
                    <td><?= h($obstetrico->menarquia) ?></td>
                    <td><?= h($obstetrico->fur) ?></td>
                    <td><?= h($obstetrico->ciclos) ?></td>
                    <td><?= $obstetrico->gestacioinales === null ? '' : $this->Number->format($obstetrico->gestacioinales) ?></td>
                    <td><?= $obstetrico->partos === null ? '' : $this->Number->format($obstetrico->partos) ?></td>
                    <td><?= $obstetrico->abortos === null ? '' : $this->Number->format($obstetrico->abortos) ?></td>
                    <td><?= $obstetrico->vivos === null ? '' : $this->Number->format($obstetrico->vivos) ?></td>
                    <td><?= $obstetrico->mortinatos === null ? '' : $this->Number->format($obstetrico->mortinatos) ?></td>
                    <td><?= $obstetrico->ectopicos === null ? '' : $this->Number->format($obstetrico->ectopicos) ?></td>
                    <td><?= $obstetrico->gemelares === null ? '' : $this->Number->format($obstetrico->gemelares) ?></td>
                    <td><?= h($obstetrico->ultimo_parto) ?></td>
                    <td><?= $obstetrico->mola_id === null ? '' : $this->Number->format($obstetrico->mola_id) ?></td>
                    <td><?= h($obstetrico->mola) ?></td>
                    <td><?= $obstetrico->muertes_perinatales_ps === null ? '' : $this->Number->format($obstetrico->muertes_perinatales_ps) ?></td>
                    <td><?= $obstetrico->muertes_perinatales_pm === null ? '' : $this->Number->format($obstetrico->muertes_perinatales_pm) ?></td>
                    <td><?= h($obstetrico->ultima_citologia) ?></td>
                    <td><?= h($obstetrico->resultado_citologia) ?></td>
                    <td><?= h($obstetrico->fecha_vph) ?></td>
                    <td><?= h($obstetrico->resultado_vph) ?></td>
                    <td><?= h($obstetrico->fecha_colposcopia) ?></td>
                    <td><?= h($obstetrico->otros_antecedentes) ?></td>
                    <td><?= h($obstetrico->created) ?></td>
                    <td><?= h($obstetrico->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $obstetrico->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $obstetrico->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $obstetrico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $obstetrico->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
