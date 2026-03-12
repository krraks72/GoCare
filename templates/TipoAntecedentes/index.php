<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TipoAntecedente> $tipoAntecedentes
 */
?>
<div class="tipoAntecedentes index content">
    <?= $this->Html->link(__('New Tipo Antecedente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tipo Antecedentes') ?></h3>
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
                <?php foreach ($tipoAntecedentes as $tipoAntecedente): ?>
                <tr>
                    <td><?= $this->Number->format($tipoAntecedente->id) ?></td>
                    <td><?= h($tipoAntecedente->descripcion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tipoAntecedente->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoAntecedente->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoAntecedente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoAntecedente->id)]) ?>
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
