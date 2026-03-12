<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro $registro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Registros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="registros form content">
            <?= $this->Form->create($registro) ?>
            <fieldset>
                <h3><?= __('Add Registro') ?></h3>
                <?php
                    echo $this->Form->control('cita');
                    echo $this->Form->control('nombre_convenio');
                    echo $this->Form->control('tipo_identificacion');
                    echo $this->Form->control('numero_identificacion');
                    echo $this->Form->control('nombre_paciente');
                    echo $this->Form->control('genero');
                    echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
                    echo $this->Form->control('lugar_residencia');
                    echo $this->Form->control('procedencia');
                    echo $this->Form->control('profesion');
                    echo $this->Form->control('ocupacion');
                    echo $this->Form->control('estado_civil');
                    echo $this->Form->control('direccion');
                    echo $this->Form->control('telefono_domicilio');
                    echo $this->Form->control('telefono_movil');
                    echo $this->Form->control('email');
                    echo $this->Form->control('datos_acompanante');
                    echo $this->Form->control('datos_responsable');
                    echo $this->Form->control('tipoDocMedico');
                    echo $this->Form->control('documentoMedico');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
