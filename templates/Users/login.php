<div class="row" style="justify-content: center;">
    <div class="column-responsive column-40">
        <div class="consulta form content">
            <?= $this->Flash->render() ?>
            <?= $this->Form->create() ?>
            <fieldset>
                <center><h3><?= __('Por favor ingrese su correo y clave') ?></h3></center>
                <?= $this->Form->control('email', ['required' => true]) ?>
                <?= $this->Form->control('password', ['required' => true]) ?>
            </fieldset>
            <?= $this->Form->submit(__('Iniciar Sesión')); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
