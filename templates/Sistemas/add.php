<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sistema $sistema
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sistemas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sistemas form content">
            <?= $this->Form->create($sistema) ?>
            <fieldset>
                <legend><?= __('Add Sistema') ?></legend>
                <?php
                    echo $this->Form->control('IdDato');
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
