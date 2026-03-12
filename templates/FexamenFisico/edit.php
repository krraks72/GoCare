<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FexamenFisico $fexamenFisico
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
        <div class="examenFisico form content">
            <?= $this->Form->create($fexamenFisico) ?>
            <fieldset>
                <h3><?= __('Examen Fisico - Signos Vitales - Terapias') ?></h3>
                <label for="registro_id">Registro HC número</label>
                <input name="registro_id" readonly value="<?php echo $fexamenFisico->registro_id; ?>"></input>
                <table>
                    <thead>
                        <tr>
                            <?php
                                echo $this->Form->label('estado_general','Estado General');
                                echo $this->Form->textarea('estado_general');
                            ?>
                        </tr>
                        <tr>
                            <th>
                                <?= $this->Form->control('talla', [
                                    'label' => 'Talla (cm)',
                                    'type' => 'number',
                                    'step' => '1',
                                    'min' => '25',
                                    'max' => '220',
                                    'required' => true,
                                ]); ?>
                            </th>
                            <th>
                                <?= $this->Form->control('peso', [
                                    'label' => 'Peso (Kg)',
                                    'type' => 'number',
                                    'step' => '0.001',
                                    'min' => '2',
                                    'max' => '200',
                                ]); ?>
                            </th>
                            <th>
                                <?= $this->Form->control('saturacion', [
                                    'label' => 'Saturación (%)',
                                    'type' => 'number',
                                    'step' => '1',
                                    'min' => '55',
                                    'max' => '100',
                                ]); ?>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <?= $this->Form->control('frecuencia_cardiaca', [
                                    'type' => 'number',
                                    'step' => '1',
                                    'min' => '30',
                                    'max' => '220',
                                ]); ?>
                            </th>
                            <th>
                                <?= $this->Form->control('frecuencia_respiratoria', [
                                    'type' => 'number',
                                    'step' => '1',
                                    'min' => '4',
                                    'max' => '50',
                                ]); ?>
                            </th>
                            <th>
                                <?= $this->Form->control('temperatura', [
                                    'label' => 'Temperatura (°C)',
                                    'type' => 'number',
                                    'step' => '0.1',
                                    'min' => '32',
                                    'max' => '45',
                                ]); ?>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>
                                <?= $this->Form->control('ta_sistolica', [
                                    'label' => 'TA Sistólica (mm/hg)',
                                    'type' => 'number',
                                    'step' => '1',
                                    'min' => '40',
                                    'max' => '250',
                                ]); ?>
                            </th>
                            <th>
                                <?= $this->Form->control('ta_diastolica', [
                                    'label' => 'TA Diastólica (mm/hg)',
                                    'step' => '1',
                                    'min' => '20',
                                    'max' => '160',
                                ]); ?>
                            </th>
                        </tr>
                    </thead>
                </table>
            </fieldset>
            <?= $this->Form->button(__('Siguiente')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
