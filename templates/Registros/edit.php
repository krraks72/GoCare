<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro $registro
 */
?>
<div class="row">
    <aside class="column">
        <div class="column-responsive column-100">
            <div class="revision form content">
                <div class="side-nav-pool">
                    <h4 class="heading"><?= __('Acciones') ?></h4>
                    <?= $this->Html->link(__('Datos Paciente'), ['controller' => 'Registros','action' => 'edit', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?php if ($registro->especialidad == 1) : ?>                        
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
                    <?php endif; ?>
                    <?php if ($registro->especialidad == 2) : ?>                        
                        <?= $this->Html->link(__('Datos consulta'), ['controller' => 'Fconsulta','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('Antecedentes'), ['controller' => 'Fantecedentes','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('Revisión'), ['controller' => 'Frevisiones','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('Examen-Fisico'), ['controller' => 'FexamenFisico','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('Hallazgos'), ['controller' => 'Fhallazgos','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('Diagnosticos'), ['controller' => 'Frips','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('Analisis'), ['controller' => 'Fanalisis','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('Cerrar Historia'), ['controller' => 'Registros','action' => 'finish', $consecutivo], ['class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('Cancelar Cita'), ['controller' => 'Registros','action' => 'failed', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="registros form content">
            <?= $this->Form->create($registro) ?>
            <fieldset>
                <h3><?= __('Datos Paciente') ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th><?= $this->Form->control('cita', ['readonly' => true]); ?></th>
                            <th><?= $this->Form->control('nombre_convenio', ['readonly' => true]); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('tipo_identificacion', ['readonly' => true]); ?></th>
                            <th><?= $this->Form->control('numero_identificacion', ['readonly' => true]); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('nombre_paciente', ['readonly' => true]); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('genero', ['readonly' => true]); ?></th>
                            <th><?= $this->Form->control('fecha_nacimiento', ['empty' => true], ['readonly' => true]); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('edad', ['readonly' => true]); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('lugar_residencia'); ?></th>
                            <th><?= $this->Form->control('procedencia'); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('profesion'); ?></th>
                            <th><?= $this->Form->control('ocupacion'); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('estado_civil'); ?></th>
                            <th><?= $this->Form->control('direccion'); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('telefono_domicilio'); ?></th>
                            <th><?= $this->Form->control('telefono_movil'); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('email'); ?></th>
                        </tr>
                        <tr>
                            <th><?= $this->Form->control('datos_acompanante'); ?></th>
                            <th><?= $this->Form->control('datos_responsable'); ?></th>
                        </tr>
                    </thead>
                </table>
            </fieldset>
            <?= $this->Form->button(__('Siguiente')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
