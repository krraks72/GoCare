<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Obstetrico $obstetrico
 * @var string[]|\Cake\Collection\CollectionInterface $registros
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $obstetrico->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $obstetrico->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Obstetricos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="obstetricos form content">
            <?= $this->Form->create($obstetrico) ?>
            <fieldset>
                <h3><?= __('Edit Obstetrico') ?></h3>
                <?php
                    echo $this->Form->control('registro_id', ['options' => $registros]);
                    echo $this->Form->control('embarazo_actual');
                    echo $this->Form->control('trimestre');
                    echo $this->Form->control('metodo_planificacion');
                    echo $this->Form->control('menarquia', ['empty' => true]);
                    echo $this->Form->control('fur', ['empty' => true]);
                    echo $this->Form->control('ciclos');
                    echo $this->Form->control('gestacioinales');
                    echo $this->Form->control('partos');
                    echo $this->Form->control('abortos');
                    echo $this->Form->control('vivos');
                    echo $this->Form->control('mortinatos');
                    echo $this->Form->control('ectopicos');
                    echo $this->Form->control('gemelares');
                    echo $this->Form->control('ultimo_parto', ['empty' => true]);
                    echo $this->Form->control('mola_id');
                    echo $this->Form->control('mola');
                    echo $this->Form->control('muertes_perinatales_ps');
                    echo $this->Form->control('muertes_perinatales_pm');
                    echo $this->Form->control('ultima_citologia', ['empty' => true]);
                    echo $this->Form->control('resultado_citologia');
                    echo $this->Form->control('fecha_vph', ['empty' => true]);
                    echo $this->Form->control('resultado_vph');
                    echo $this->Form->control('fecha_colposcopia', ['empty' => true]);
                    echo $this->Form->control('otros_antecedentes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
