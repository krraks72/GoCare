<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Antecedente $antecedente
 * @var string[]|\Cake\Collection\CollectionInterface $registros
 * @var string[]|\Cake\Collection\CollectionInterface $tipoAntecedentes
 */
?>
<div class="row">
    <aside class="column">
        <div class="column-responsive column-100">
            <div class="revision form content">
                <div class="side-nav-pool">
                    <h4 class="heading"><?= __('Acciones') ?></h4>
                    <?= $this->Html->link(__('Datos Paciente'), ['controller' => 'Registros','action' => 'edit', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Datos consulta'), ['controller' => 'Fconsulta','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Antecedentes'), ['controller' => 'Fantecedentes','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Revisión'), ['controller' => 'Frevisiones','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Examen-Fisico'), ['controller' => 'FexamenFisico','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Hallazgos'), ['controller' => 'Fhallazgos','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Diagnosticos'), ['controller' => 'Frips','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Analisis'), ['controller' => 'Fanalisis','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Cerrar Historia'), ['controller' => 'Registros','action' => 'finish', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Cancelar Cita'), ['controller' => 'Registros','action' => 'failed', $consecutivo], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="antecedentes form content">
            <?= $this->Form->create($antecedente) ?>
            <fieldset>
                <h3><?= __('Edit Antecedente') ?></h3>
                <?php
                    echo $this->Form->control('registro_id', ['options' => $registros]);
                    echo $this->Form->control('fecha', ['empty' => true]);
                    echo $this->Form->control('valor');
                    echo $this->Form->control('tipo_antecedente_id', ['options' => $tipoAntecedentes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
