<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TipoHallazgo> $tipoHallazgos
 */
?>
<div class="tipoHallazgos index content">
    <?= $this->Html->link(__('New Tipo Hallazgo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tipo Hallazgos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tipoHallazgos as $tipoHallazgo): ?>
                <tr>
                    <td><?= $this->Number->format($tipoHallazgo->id) ?></td>
                    <td><?= h($tipoHallazgo->descripcion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tipoHallazgo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoHallazgo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoHallazgo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoHallazgo->id)]) ?>
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
