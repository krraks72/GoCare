<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fhallazgo $fhallazgo
 * @var \Cake\Collection\CollectionInterface|string[] $registros
 * @var \Cake\Collection\CollectionInterface|string[] $tipoHallazgos
 */
?>
<div class="row">
    <aside class="column">
        <div class="column-responsive column-100">
            <div class="revision form content">
                <div class="side-nav-pool">
                    <h4 class="heading"><?= __('Acciones') ?></h4>
                    <?= $this->Html->link(__('Datos Paciente'), ['controller' => 'Registros','action' => 'edit', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Datos consulta'), ['controller' => 'Fconsulta','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Antecedentes'), ['controller' => 'Fantecedentes','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Revisión'), ['controller' => 'Frevisiones','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Examen-Fisico'), ['controller' => 'FexamenFisico','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Hallazgos'), ['controller' => 'Fhallazgos','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Diagnosticos'), ['controller' => 'Frips','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Analisis'), ['controller' => 'Fanalisis','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Cerrar Historia'), ['controller' => 'Registros','action' => 'finish', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Cancelar Cita'), ['controller' => 'Registros','action' => 'failed', $consecutivo], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="hallazgos form content">
            <?= $this->Form->create($fhallazgo) ?>
            <fieldset>
                <h3><?= __('Examen Físico - Nuevo Hallazgo - Terapias') ?></h3>
                <label for="registro_id">Registro HC número</label>
                <input name="registro_id" readonly value="<?php echo $consecutivo; ?>"></input>
                <label for="tipo_hallazgo_id">Localización</label>
                    <select name="tipo_hallazgo_id">
                    <?php foreach ($tipoHallazgos as $m): ?>
                        <option value="<?php echo $m->id; ?>"><?php echo $m->descripcion; ?></option>
                    <?php endforeach ?>
                </select>
                <?php
                    echo $this->Form->label('valor','Hallazgo');
                    echo $this->Form->textarea('valor');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
