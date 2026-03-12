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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $diagnostico->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $diagnostico->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Diagnosticos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diagnosticos form content">
            <?= $this->Form->create($diagnostico) ?>
            <fieldset>
                <h3><?= __('Edit Diagnostico') ?></h3>
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
