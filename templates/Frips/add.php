<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frip $frip
 * @var \Cake\Collection\CollectionInterface|string[] $registros
 * @var \Cake\Collection\CollectionInterface|string[] $diagnosticos
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
        <div class="rips form content">
            <?= $this->Form->create($frip) ?>
            <fieldset>
                <h3><?= __('Nuevo Diagnostico - Terapias') ?></h3>
                <label for="registro_id">Registro HC número</label>
                <input name="registro_id" readonly value="<?php echo $consecutivo; ?>"></input>
                <label for="diagnostico_id">Diagnóstico</label>
                <select name="diagnostico_id" id="diagnostico_id">
                    <?php foreach ($diagnosticos as $m) : ?>
                        <option class="opcion" value="<?php echo $m->id; ?>"><?php echo $m->descripcion; ?></option>
                    <?php endforeach ?>
                </select>
                <label for="tipo_diagnostico">Tipo Diagnóstico</label>
                <select name="tipo_diagnostico" id="tipo_diagnostico">
                    <option class="opcion" value="Principal">Principal</option>
                    <option class="opcion" value="Relacionado 1">Relacionado 1</option>
                    <option class="opcion" value="Relacionado 2">Relacionado 2</option>
                    <option class="opcion" value="Relacionado 3">Relacionado 3</option>
                    <option class="opcion" value="Otro">Otro</option>
                </select>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
