<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive column-100">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <h3><?= __('Cambiar Clave Usuario') ?></h3>
                <?php
                    echo $this->Form->control('email', ['readonly' => true]);
                    echo $this->Form->control('tipoDocumento', ['readonly' => true]);
                    echo $this->Form->control('documento', ['readonly' => true]);
                    echo $this->Form->control('nombre', ['readonly' => true]);
                    echo $this->Form->control('password');                    
                    echo $this->Form->control('confirPass', ['type' => 'password', 'label' => 'Confirmar Password']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
