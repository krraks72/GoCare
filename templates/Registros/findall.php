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
                    <?= $this->Html->link(__('Usuarios'), ['controller' => 'Users','action' => 'index'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Reactivar HC'), ['controller' => 'Registros','action' => 'find'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Paciente HC'), ['controller' => 'Registros','action' => 'findall'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Pendientes HC'), ['controller' => 'Registros','action' => 'pending'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Home'), ['controller' => 'Registros','action' => 'home'], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="registros form content">
            <?= $this->Form->create($registro) ?>
            <fieldset>
                <h3><?= __('Historial de registros por Paciente') ?></h3>
                <label>Digitar número de documento del paciente a buscar</label>
                <label for="buscar_documento">Número Documento</label>
                <input type="text" name="buscar_documento" id="buscar_documento" required>
            </fieldset>
            <?= $this->Form->button(__('Buscar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

