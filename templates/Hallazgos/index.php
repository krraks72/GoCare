<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Hallazgo> $hallazgos
 */
?>
<div class="row">
    <aside class="column">
        <div class="column-responsive column-100">
            <div class="revision form content">
                <div class="side-nav-pool">
                    <h4 class="heading"><?= __('Acciones') ?></h4>
                    <?= $this->Html->link(__('Datos Paciente'), ['controller' => 'Registros','action' => 'edit', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Datos consulta'), ['controller' => 'Consulta','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Antecedentes'), ['controller' => 'Antecedentes','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Revisión'), ['controller' => 'Revisiones','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Examen-Fisico'), ['controller' => 'ExamenFisico','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Hallazgos'), ['controller' => 'Hallazgos','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Diagnosticos'), ['controller' => 'Rips','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Analisis'), ['controller' => 'Analisis','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Incapacidades'), ['controller' => 'Incapacidad','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Cerrar Historia'), ['controller' => 'Registros','action' => 'finish', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Cancelar Cita'), ['controller' => 'Registros','action' => 'failed', $consecutivo], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="revision form content">
            <?= $this->Html->link(__('Agregar Hallazgo'), ['action' => 'add', $consecutivo], ['class' => 'button float-right']) ?>
            <h3><?= __('Examen Fisico- Hallazgos') ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('registro_id') ?></th>
                            <th><?= $this->Paginator->sort('tipo_hallazgo_id') ?></th>
                            <th><?= $this->Paginator->sort('valor') ?></th>
                            <th><?= $this->Paginator->sort('fecha') ?></th>
                            <th><?= $this->Paginator->sort('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hallazgos as $hallazgo): ?>
                        <tr>
                            <td><?= h($hallazgo->registro->id) ?></td>
                            <td><?= h($hallazgo->tipo_hallazgo->descripcion) ?></td>
                            <td><?= h($hallazgo->valor) ?></td>
                            <td><?= h($hallazgo->created) ?></td>
                            <td class="actions">
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hallazgo->id, $consecutivo], ['confirm' => __('Are you sure you want to delete # {0}?', $hallazgo->id)]) ?>
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
            <?= $this->Html->link(__('Siguiente'), ['controller' => 'Rips', 'action' => 'index', $consecutivo],['class' => 'button']) ?>
        </div>
    </div>
</div>
