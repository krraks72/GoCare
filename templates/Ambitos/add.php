<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ambito $ambito
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ambitos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ambitos form content">
            <?= $this->Form->create($ambito) ?>
            <fieldset>
                <h3><?= __('Add Ambito') ?></h3>
                <?php
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
