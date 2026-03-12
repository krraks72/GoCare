<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnostico $diagnostico
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Diagnosticos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diagnosticos form content">
            <?= $this->Form->create($diagnostico) ?>
            <fieldset>
                <h3><?= __('Add Diagnostico') ?></h3>
                <?php
                    echo $this->Form->control('codigo');
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
