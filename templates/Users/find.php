<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="row">
    <div class="column-responsive column-100">
        <div class="revision form content">
            <h3><?= __('Cambiar Password') ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('email') ?></th>
                            <th><?= $this->Paginator->sort('documento') ?></th>
                            <th><?= $this->Paginator->sort('nombre') ?></th>
                            <th><?= $this->Paginator->sort('administrador') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->documento) ?></td>
                            <td><?= h($user->nombre) ?></td>
                            <td><?= h($user->administrador) ?></td>
                            <td>
                                <?= $this->Html->link(__('Password'), ['action' => 'change', $user->id], ['class' => 'button float-right']) ?></td>
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
    </div>
</div>
