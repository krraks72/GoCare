<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
    </aside><div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <h3><?= __('Nuevo  Usuario') ?></h3>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('country_code');
                    echo $this->Form->control('password');
                    echo $this->Form->control('tipoDocumento');
                    echo $this->Form->control('documento');
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('administrador');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
