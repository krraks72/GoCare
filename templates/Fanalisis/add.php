<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fanalisi $fanalisi
 * @var \Cake\Collection\CollectionInterface|string[] $registros
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
        <div class="analisis form content">
            <?= $this->Form->create($fanalisi) ?>
            <fieldset>
                <h3><?= __('Analisis - Terapias') ?></h3>
                <h3><?= __('Datos consulta') ?></h3>
                <label for="registro_id">Registro HC número</label>
                <input name="registro_id" readonly value="<?php echo $consecutivo; ?>"></input>
                <?php
                    echo $this->Form->control('fecha', ['empty' => true, 'label' => 'Fecha proximo control']);
                ?>
                <label for="causa_externa">Causa externa:</label>
                <select class="form-control" id="causa_externa" name="causa_externa">
                    <option value="1">Accidente  de trabajo</option>
                    <option value="2">Accidente  de tránsito</option>
                    <option value="3">Accidente rábico</option>
                    <option value="2">Accidente ofídico</option>
                    <option value="3">Otro tipo de accidente </option>
                    <option value="2">Evento catastrófico</option>
                    <option value="3">Lesión por agresión </option>
                    <option value="2">Lesión auto infligida</option>
                    <option value="3">Sospecha de maltrato físico</option>
                    <option value="2">Sospecha de abuso sexual</option>
                    <option value="2">Sospecha de violencia sexual</option>
                    <option value="2">Sospecha de maltrato emocional</option>
                    <option value="2">Enfermedad general</option>
                    <option value="2">Enfermedad profesional</option>
                    <option value="2">Otra</option>
                </select>
                <label for="finalidad_consulta">Finalidad consulta:</label>
                <select class="form-control" id="finalidad_consulta" name="finalidad_consulta">
                    <option value="1">Atención del parto (puerperio)</option>
                    <option value="2">Atención del recién nacido</option>
                    <option value="3">Atención en planificación familiar</option>
                    <option value="2">Detección de alteraciones de crecimiento y desarrollo del menor de diez años</option>
                    <option value="3">Detección de alteración del desarrollo joven</option>
                    <option value="2">Detección de alteraciones del embarazo</option>
                    <option value="3">Detección de alteraciones del adulto</option>
                    <option value="2">Detección de alteraciones de agudeza visual</option>
                    <option value="3">Detección de enfermedad profesional</option>
                    <option value="3">No aplica</option>
                </select>
                <?php
                    echo $this->Form->label('analisis','Analisis');
                    echo $this->Form->textarea('analisis');
                    echo $this->Form->label('plan_manejo','Plan de Manejo');
                    echo $this->Form->textarea('plan_manejo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
