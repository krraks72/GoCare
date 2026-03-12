<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Registro> $registros
 */
?>
<div class="row">
    <aside class="column">
        <div class="column-responsive column-100">
            <div class="revision form content">
                <div class="side-nav-pool">
                    <h4 class="heading"><?= __('Acciones') ?></h4>
                    <?= $this->Html->link(__('Usuarios'), ['controller' => 'Users','action' => 'index'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Reactivar HC'), ['controller' => 'Registros','action' => 'find'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Paciente HC'), ['controller' => 'Registros','action' => 'findall'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Pendientes HC'), ['controller' => 'Registros','action' => 'pending'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Home'), ['controller' => 'Registros','action' => 'home'], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="revision form content">
            <h3><?= __('Registros pendientes HC') ?></h3>
            <!--<td><?= h($session['Auth']->email) ?></td>-->
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <?php $this->loadHelper('Time'); ?>
                            <th><?= $this->Paginator->sort('ID cita') ?></th>
                            <th><?= $this->Paginator->sort('Fecha') ?></th>
                            <th><?= $this->Paginator->sort('Documento') ?></th>
                            <th><?= $this->Paginator->sort('Nombre') ?></th>
                            <th><?= $this->Paginator->sort('Docu Medico') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro): ?>
                        <tr>
                            <td><?= $registro->cita === null ? '' : $this->Number->format($registro->cita) ?></td>
                            <td><?= $this->Time->format($registro->created, 'dd/MM/yyyy') ?></td>
                            <td><?= h($registro->numero_identificacion) ?></td>
                            <td><?= h($registro->nombre_paciente) ?></td>
                            <td><?= h($registro->documentoMedico) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Cancelar'), ['action' => 'failed', $registro->id]) ?>
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
    </div>
</div>
