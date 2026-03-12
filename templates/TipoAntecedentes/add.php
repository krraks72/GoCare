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
            <?= $this->Html->link(__('List Tipo Antecedentes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tipoAntecedentes form content">
            <?= $this->Form->create($tipoAntecedente) ?>
            <fieldset>
                <h3><?= __('Add Tipo Antecedente') ?></h3>
                <?php
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
