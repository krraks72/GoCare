<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rip $rip
 * @var string[]|\Cake\Collection\CollectionInterface $registros
 * @var string[]|\Cake\Collection\CollectionInterface $diagnosticos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rip->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rips'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rips form content">
            <?= $this->Form->create($rip) ?>
            <fieldset>
                <h3><?= __('Edit Rip') ?></h3>
                <?php
                    echo $this->Form->control('registro_id', ['options' => $registros]);
                    echo $this->Form->control('diagnostico_id', ['options' => $diagnosticos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
