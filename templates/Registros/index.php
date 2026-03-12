<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Registro> $registros
 */
?>
<div class="registros index content">
    <h3><?= __('Registros Pendientes HC') ?></h3>
    <!--<td><?= h($session['Auth']->email) ?></td>-->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID cita') ?></th>
                    <th><?= $this->Paginator->sort('especialidad') ?></th>
                    <th><?= $this->Paginator->sort('Tipo Docu') ?></th>
                    <th><?= $this->Paginator->sort('Documento') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                <tr>
                    <td><?= $registro->cita === null ? '' : $this->Number->format($registro->cita) ?></td>
                    <?php if ($registro->especialidad == 2) : ?>
                        <td><?= h('Fisioterapia') ?></td>
                    <?php endif; ?>
                    <?php if ($registro->especialidad == 1) : ?>
                        <td><?= h('Medicina General') ?></td>
                    <?php endif; ?> 
                    <td><?= h($registro->tipo_identificacion) ?></td>
                    <td><?= h($registro->numero_identificacion) ?></td>
                    <td><?= h($registro->nombre_paciente) ?></td>
                    <td class="actions">
                        <?php if ($registro->especialidad == 2) : ?>
                            <?= $this->Form->postLink(__('Registrar'), ['action' => 'Fedit', $registro->id], ['confirm' => __('¿Quiere Registrar la HC número # {0}?', $registro->id), 'class' => 'button float-right']) ?>
                        <?php endif; ?>
                        <?php if ($registro->especialidad == 1) : ?>
                            <?= $this->Form->postLink(__('Registrar'), ['action' => 'Edit', $registro->id], ['confirm' => __('¿Quiere Registrar la HC número # {0}?', $registro->id), 'class' => 'button float-right']) ?>
                        <?php endif; ?>
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

<script>
    // Recargar la página cada 1 minutos (60000 milisegundos)
    setInterval(function() {
        location.reload(); // Recargar la página
    }, 60000); // 60000 ms = 1 minutos
</script>