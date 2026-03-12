<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Analisi $analisi
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
            <?= $this->Form->create($analisi) ?>
            <fieldset>
                <h3><?= __('Analisis - Terapias') ?></h3>
                <?php
                    echo $this->Form->control('registro_id', ['options' => $registros]);
                    echo $this->Form->control('fecha', ['empty' => true]);
                    ?>
                    <label for="causa_externa">Causa externa:</label>
                    <select class="form-control" id="causa_externa" name="causa_externa">
                        <option value="1" <?php if ($analisi->causa_externa == '1') echo 'selected'; ?>>Accidente de trabajo</option>
                        <option value="2" <?php if ($analisi->causa_externa == '2') echo 'selected'; ?>>Accidente de tránsito</option>
                        <option value="3" <?php if ($analisi->causa_externa == '3') echo 'selected'; ?>>Accidente rábico</option>
                        <option value="4" <?php if ($analisi->causa_externa == '4') echo 'selected'; ?>>Accidente ofídico</option>
                        <option value="5" <?php if ($analisi->causa_externa == '5') echo 'selected'; ?>>Otro tipo de accidente</option>
                        <option value="6" <?php if ($analisi->causa_externa == '6') echo 'selected'; ?>>Evento catastrófico</option>
                        <option value="7" <?php if ($analisi->causa_externa == '7') echo 'selected'; ?>>Lesión por agresión</option>
                        <option value="8" <?php if ($analisi->causa_externa == '8') echo 'selected'; ?>>Lesión auto infligida</option>
                        <option value="9" <?php if ($analisi->causa_externa == '9') echo 'selected'; ?>>Sospecha de maltrato físico</option>
                        <option value="10" <?php if ($analisi->causa_externa == '10') echo 'selected'; ?>>Sospecha de abuso sexual</option>
                        <option value="11" <?php if ($analisi->causa_externa == '11') echo 'selected'; ?>>Sospecha de violencia sexual</option>
                        <option value="12" <?php if ($analisi->causa_externa == '12') echo 'selected'; ?>>Sospecha de maltrato emocional</option>
                        <option value="13" <?php if ($analisi->causa_externa == '13') echo 'selected'; ?>>Enfermedad general</option>
                        <option value="14" <?php if ($analisi->causa_externa == '14') echo 'selected'; ?>>Enfermedad profesional</option>
                        <option value="15" <?php if ($analisi->causa_externa == '15') echo 'selected'; ?>>Otra</option>
                    </select>
                    <label for="finalidad_consulta">Finalidad consulta:</label>
                    <select class="form-control" id="finalidad_consulta" name="finalidad_consulta">
                        <option value="1" <?php if ($analisi->finalidad_consulta == '1') echo 'selected'; ?>>Atención del parto (puerperio)</option>
                        <option value="2" <?php if ($analisi->finalidad_consulta == '2') echo 'selected'; ?>>Atención del recién nacido</option>
                        <option value="3" <?php if ($analisi->finalidad_consulta == '3') echo 'selected'; ?>>Atención en planificación familiar</option>
                        <option value="4" <?php if ($analisi->finalidad_consulta == '4') echo 'selected'; ?>>Detección de alteraciones de crecimiento y desarrollo del menor de diez años</option>
                        <option value="5" <?php if ($analisi->finalidad_consulta == '5') echo 'selected'; ?>>Detección de alteración del desarrollo joven</option>
                        <option value="6" <?php if ($analisi->finalidad_consulta == '6') echo 'selected'; ?>>Detección de alteraciones del embarazo</option>
                        <option value="7" <?php if ($analisi->finalidad_consulta == '7') echo 'selected'; ?>>Detección de alteraciones del adulto</option>
                        <option value="8" <?php if ($analisi->finalidad_consulta == '8') echo 'selected'; ?>>Detección de alteraciones de agudeza visual</option>
                        <option value="9" <?php if ($analisi->finalidad_consulta == '9') echo 'selected'; ?>>Detección de enfermedad profesional</option>
                        <option value="10" <?php if ($analisi->finalidad_consulta == '10') echo 'selected'; ?>>No aplica</option>
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
