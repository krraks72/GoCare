<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Incapacidad $incapacidad
 */

use Cake\I18n\FrozenDate;

?>
<div class="row">
    <aside class="column">
        <div class="column-responsive column-100">
            <div class="revision form content">
                <div class="side-nav-pool">
                    <h4 class="heading"><?= __('Acciones') ?></h4>
                    <?= $this->Html->link(__('Datos Paciente'), ['controller' => 'Registros','action' => 'edit', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Datos consulta'), ['controller' => 'Consulta','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Antecedentes'), ['controller' => 'Antecedentes','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Revisión'), ['controller' => 'Revisiones','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Examen-Fisico'), ['controller' => 'ExamenFisico','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Hallazgos'), ['controller' => 'Hallazgos','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Diagnosticos'), ['controller' => 'Rips','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Analisis'), ['controller' => 'Analisis','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Incapacidades'), ['controller' => 'Incapacidad','action' => 'index', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Cerrar Historia'), ['controller' => 'Registros','action' => 'finish', $consecutivo], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Cancelar Cita'), ['controller' => 'Registros','action' => 'failed', $consecutivo], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="incapacidad form content">
            <?= $this->Form->create($incapacidad) ?>
            <fieldset>
                <h3><?= __('Crear Incapacidad') ?></h3>
                <label for="registro_id">Registro HC número</label>
                <input name="registro_id" readonly value="<?php echo $consecutivo; ?>"></input>
                <label for="nombre_convenio">Nombre Convenio</label>
                <select name="nombre_convenio" readonly>
                    <?php foreach ($registros as $a): ?>
                        <option value="<?php echo $a->nombre_convenio; ?>"><?php echo $a->nombre_convenio; ?></option>
                    <?php endforeach ?>
                </select>
                <label for="tipo_identificacion">Tipo tipo_identificacion</label>
                <select name="tipo_identificacion" readonly>
                    <?php foreach ($registros as $a): ?>
                        <option value="<?php echo $a->tipo_identificacion; ?>"><?php echo $a->tipo_identificacion; ?></option>
                    <?php endforeach ?>
                </select>
                <label for="numero_identificacion">Número Identificación</label>
                <select name="numero_identificacion" readonly>
                    <?php foreach ($registros as $a): ?>
                        <option value="<?php echo $a->numero_identificacion; ?>"><?php echo $a->numero_identificacion; ?></option>
                    <?php endforeach ?>
                </select>
                <label for="nombre_paciente">Nombre Paciente</label>
                <select name="nombre_paciente" readonly>
                    <?php foreach ($registros as $a): ?>
                        <option value="<?php echo $a->nombre_paciente; ?>"><?php echo $a->nombre_paciente; ?></option>
                    <?php endforeach ?>
                </select>
                <label for="genero">Género</label>
                <select name="genero" readonly>
                    <?php foreach ($registros as $a): ?>
                        <option value="<?php echo $a->genero; ?>"><?php echo $a->genero; ?></option>
                    <?php endforeach ?>
                </select>
                <label for="prioridad">Prioridad</label>
                <select name="prioridad" readonly>
                    <option value="Programada">Programada</option>
                    <option value="Prioritaria">Prioritaria</option>
                    <option value="Urgente">Urgente</option>
                </select>
                <?php
                    echo $this->Form->label('observaciones','Observaciones');
                    echo $this->Form->textarea('observaciones');
                ?>
                <label for="dias_inca">días incapacidad</label>
                <input name="dias_inca" id="dias_inca" oninput="calcularFechaFinal()"></input>
                <label for="fecha_inicial">Fecha Inicial</label>
                <input name="fecha_inicial" id="fecha_inicial" value="<?php echo FrozenDate::now(); ?>"></input>
                <label for="fecha_final">Fecha Final</label>
                <input name="fecha_final" id="fecha_final"></input>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    const fechaInicialInput = document.getElementById('fecha_inicial');
    const diasIncapacidadInput = document.getElementById('dias_inca');
    const fechaFinalInput = document.getElementById('fecha_final');

    function calcularFechaFinal() {
        const fechaInicial = new Date(fechaInicialInput.value);
        const diasInca = parseInt(diasIncapacidadInput.value, 10);
        if (!isNaN(diasInca)) {
            const fechaFinal = new Date(fechaInicial);
            fechaFinal.setDate(fechaFinal.getDate() + diasInca - 1);
            const formattedFechaFinal = fechaFinal.toISOString().split('T')[0];
            fechaFinalInput.value = formattedFechaFinal;
        } else {
            fechaFinalInput.value = '';
        }
    };

    function calcularFechaInicial() {
        const fechaInicial = new Date(fechaInicialInput.value);
        const fechaFinal = new Date(fechaInicial);
        fechaFinal.setDate(fechaFinal.getDate());
        const formattedFechaFinal = fechaFinal.toISOString().split('T')[0];
        fechaInicialInput.value = formattedFechaFinal;
    };

    calcularFechaInicial();
</script>
