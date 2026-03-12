<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Motivo $motivo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $motivo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $motivo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Motivos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="motivos form content">
            <?= $this->Form->create($motivo) ?>
            <fieldset>
                <h3><?= __('Edit Motivo') ?></h3>
                <?php
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
