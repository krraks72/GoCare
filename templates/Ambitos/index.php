<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ambito> $ambitos
 */
?>
<div class="ambitos index content">
    <?= $this->Html->link(__('New Ambito'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ambitos') ?></h3>
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
                <?php foreach ($ambitos as $ambito): ?>
                <tr>
                    <td><?= $this->Number->format($ambito->id) ?></td>
                    <td><?= h($ambito->descripcion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ambito->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ambito->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ambito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ambito->id)]) ?>
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
