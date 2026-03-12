<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consultum $consultum
 * @var \Cake\Collection\CollectionInterface|string[] $registros
 * @var \Cake\Collection\CollectionInterface|string[] $ambitos
 * @var \Cake\Collection\CollectionInterface|string[] $motivos
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
        <div class="consulta form content">
            <?= $this->Form->create($consultum) ?>
            <fieldset>
                <h3><?= __('Datos consulta') ?></h3>
                <label for="registro_id">Registro HC número</label>
                <input name="registro_id" readonly value="<?php echo $consecutivo; ?>"></input>
                <table>
                    <thead>
                        <tr>
                            <th>
                            <label>¿Cuenta con sevicios públicos?</label>
                                <input type="checkbox" name="sevicios_publicos" value="true">  SI</input>
                            </th>
                            <th>
                                <label>¿Cuenta con unidad sanitaria?</label>
                                <input type="checkbox" name="unidad_sanitaria" value="true">  SI</input>
                            </th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('condicion_ingreso'); ?></th>
                            <th><label for="ambito_id">Ambitos</label>
                                <select name="ambito_id">
                                    <?php foreach ($ambitos as $a): ?>
                                        <option value="<?php echo $a->id; ?>"><?php echo $a->descripcion; ?></option>
                                    <?php endforeach ?>
                                </select></th>
                        </tr>
                    </thead>
                </table>
                <?php
                    echo $this->Form->label('motivo_consulta','Motivo de Consulta');
                    echo $this->Form->textarea('motivo_consulta');
                    echo $this->Form->label('enfermedad_actual','Enfermedad Actual');
                    echo $this->Form->textarea('enfermedad_actual');
                    echo $this->Form->label('notas','Notas');
                    echo $this->Form->textarea('notas');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Siguiente')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>