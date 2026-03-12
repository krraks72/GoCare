<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoAntecedente $tipoAntecedente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tipoAntecedente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tipoAntecedente->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tipo Antecedentes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tipoAntecedentes form content">
            <?= $this->Form->create($tipoAntecedente) ?>
            <fieldset>
                <h3><?= __('Edit Tipo Antecedente') ?></h3>
                <?php
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
