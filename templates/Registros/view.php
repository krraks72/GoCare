<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registro $registro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Registro'), ['action' => 'edit', $registro->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Registro'), ['action' => 'delete', $registro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registro->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Registros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Registro'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="registros view content">
            <h3><?= h($registro->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre Convenio') ?></th>
                    <td><?= h($registro->nombre_convenio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo Identificacion') ?></th>
                    <td><?= h($registro->tipo_identificacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero Identificacion') ?></th>
                    <td><?= h($registro->numero_identificacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre Paciente') ?></th>
                    <td><?= h($registro->nombre_paciente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genero') ?></th>
                    <td><?= h($registro->genero) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lugar Residencia') ?></th>
                    <td><?= h($registro->lugar_residencia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Procedencia') ?></th>
                    <td><?= h($registro->procedencia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profesion') ?></th>
                    <td><?= h($registro->profesion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ocupacion') ?></th>
                    <td><?= h($registro->ocupacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado Civil') ?></th>
                    <td><?= h($registro->estado_civil) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($registro->direccion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono Domicilio') ?></th>
                    <td><?= h($registro->telefono_domicilio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono Movil') ?></th>
                    <td><?= h($registro->telefono_movil) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($registro->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Datos Acompanante') ?></th>
                    <td><?= h($registro->datos_acompanante) ?></td>
                </tr>
                <tr>
                    <th><?= __('Datos Responsable') ?></th>
                    <td><?= h($registro->datos_responsable) ?></td>
                </tr>
                <tr>
                    <th><?= __('TipoDocMedico') ?></th>
                    <td><?= h($registro->tipoDocMedico) ?></td>
                </tr>
                <tr>
                    <th><?= __('DocumentoMedico') ?></th>
                    <td><?= h($registro->documentoMedico) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($registro->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cita') ?></th>
                    <td><?= $registro->cita === null ? '' : $this->Number->format($registro->cita) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= $this->Number->format($registro->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Edad') ?></th>
                    <td><?= $this->Number->format($registro->edad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Especialidad') ?></th>
                    <td><?= $this->Number->format($registro->especialidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Nacimiento') ?></th>
                    <td><?= h($registro->fecha_nacimiento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($registro->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($registro->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Analisis') ?></h4>
                <?php if (!empty($registro->analisis)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registro Id') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th><?= __('Causa Externa') ?></th>
                            <th><?= __('Finalidad Consulta') ?></th>
                            <th><?= __('Analisis') ?></th>
                            <th><?= __('Plan Manejo') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registro->analisis as $analisis) : ?>
                        <tr>
                            <td><?= h($analisis->id) ?></td>
                            <td><?= h($analisis->registro_id) ?></td>
                            <td><?= h($analisis->fecha) ?></td>
                            <td><?= h($analisis->causa_externa) ?></td>
                            <td><?= h($analisis->finalidad_consulta) ?></td>
                            <td><?= h($analisis->analisis) ?></td>
                            <td><?= h($analisis->plan_manejo) ?></td>
                            <td><?= h($analisis->created) ?></td>
                            <td><?= h($analisis->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Analisis', 'action' => 'view', $analisis->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Analisis', 'action' => 'edit', $analisis->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Analisis', 'action' => 'delete', $analisis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analisis->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Antecedentes') ?></h4>
                <?php if (!empty($registro->antecedentes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registro Id') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th><?= __('Valor') ?></th>
                            <th><?= __('Tipo Antecedente Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registro->antecedentes as $antecedentes) : ?>
                        <tr>
                            <td><?= h($antecedentes->id) ?></td>
                            <td><?= h($antecedentes->registro_id) ?></td>
                            <td><?= h($antecedentes->fecha) ?></td>
                            <td><?= h($antecedentes->valor) ?></td>
                            <td><?= h($antecedentes->tipo_antecedente_id) ?></td>
                            <td><?= h($antecedentes->created) ?></td>
                            <td><?= h($antecedentes->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Antecedentes', 'action' => 'view', $antecedentes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Antecedentes', 'action' => 'edit', $antecedentes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Antecedentes', 'action' => 'delete', $antecedentes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $antecedentes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Fantecedentes') ?></h4>
                <?php if (!empty($registro->fantecedentes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registro Id') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th><?= __('Valor') ?></th>
                            <th><?= __('Tipo Antecedente Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registro->fantecedentes as $fantecedentes) : ?>
                        <tr>
                            <td><?= h($fantecedentes->id) ?></td>
                            <td><?= h($fantecedentes->registro_id) ?></td>
                            <td><?= h($fantecedentes->fecha) ?></td>
                            <td><?= h($fantecedentes->valor) ?></td>
                            <td><?= h($fantecedentes->tipo_antecedente_id) ?></td>
                            <td><?= h($fantecedentes->created) ?></td>
                            <td><?= h($fantecedentes->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Fantecedentes', 'action' => 'view', $fantecedentes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Fantecedentes', 'action' => 'edit', $fantecedentes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fantecedentes', 'action' => 'delete', $fantecedentes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fantecedentes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Antecedentes Obstetricos') ?></h4>
                <?php if (!empty($registro->antecedentes_obstetricos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registro Id') ?></th>
                            <th><?= __('Embarazo Actual') ?></th>
                            <th><?= __('Trimestre') ?></th>
                            <th><?= __('Metodo Planificacion') ?></th>
                            <th><?= __('Menarquia') ?></th>
                            <th><?= __('Fur') ?></th>
                            <th><?= __('Ciclos') ?></th>
                            <th><?= __('Gestacioinales') ?></th>
                            <th><?= __('Partos') ?></th>
                            <th><?= __('Abortos') ?></th>
                            <th><?= __('Vivos') ?></th>
                            <th><?= __('Mortinatos') ?></th>
                            <th><?= __('Ectopicos') ?></th>
                            <th><?= __('Gemelares') ?></th>
                            <th><?= __('Ultimo Parto') ?></th>
                            <th><?= __('Mola Id') ?></th>
                            <th><?= __('Mola') ?></th>
                            <th><?= __('Muertes Perinatales Ps') ?></th>
                            <th><?= __('Muertes Perinatales Pm') ?></th>
                            <th><?= __('Ultima Citologia') ?></th>
                            <th><?= __('Resultado Citologia') ?></th>
                            <th><?= __('Fecha Vph') ?></th>
                            <th><?= __('Resultado Vph') ?></th>
                            <th><?= __('Fecha Colposcopia') ?></th>
                            <th><?= __('Otros Antecedentes') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registro->antecedentes_obstetricos as $antecedentesObstetricos) : ?>
                        <tr>
                            <td><?= h($antecedentesObstetricos->id) ?></td>
                            <td><?= h($antecedentesObstetricos->registro_id) ?></td>
                            <td><?= h($antecedentesObstetricos->embarazo_actual) ?></td>
                            <td><?= h($antecedentesObstetricos->trimestre) ?></td>
                            <td><?= h($antecedentesObstetricos->metodo_planificacion) ?></td>
                            <td><?= h($antecedentesObstetricos->menarquia) ?></td>
                            <td><?= h($antecedentesObstetricos->fur) ?></td>
                            <td><?= h($antecedentesObstetricos->ciclos) ?></td>
                            <td><?= h($antecedentesObstetricos->gestacioinales) ?></td>
                            <td><?= h($antecedentesObstetricos->partos) ?></td>
                            <td><?= h($antecedentesObstetricos->abortos) ?></td>
                            <td><?= h($antecedentesObstetricos->vivos) ?></td>
                            <td><?= h($antecedentesObstetricos->mortinatos) ?></td>
                            <td><?= h($antecedentesObstetricos->ectopicos) ?></td>
                            <td><?= h($antecedentesObstetricos->gemelares) ?></td>
                            <td><?= h($antecedentesObstetricos->ultimo_parto) ?></td>
                            <td><?= h($antecedentesObstetricos->mola_id) ?></td>
                            <td><?= h($antecedentesObstetricos->mola) ?></td>
                            <td><?= h($antecedentesObstetricos->muertes_perinatales_ps) ?></td>
                            <td><?= h($antecedentesObstetricos->muertes_perinatales_pm) ?></td>
                            <td><?= h($antecedentesObstetricos->ultima_citologia) ?></td>
                            <td><?= h($antecedentesObstetricos->resultado_citologia) ?></td>
                            <td><?= h($antecedentesObstetricos->fecha_vph) ?></td>
                            <td><?= h($antecedentesObstetricos->resultado_vph) ?></td>
                            <td><?= h($antecedentesObstetricos->fecha_colposcopia) ?></td>
                            <td><?= h($antecedentesObstetricos->otros_antecedentes) ?></td>
                            <td><?= h($antecedentesObstetricos->created) ?></td>
                            <td><?= h($antecedentesObstetricos->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AntecedentesObstetricos', 'action' => 'view', $antecedentesObstetricos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AntecedentesObstetricos', 'action' => 'edit', $antecedentesObstetricos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AntecedentesObstetricos', 'action' => 'delete', $antecedentesObstetricos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $antecedentesObstetricos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Consulta') ?></h4>
                <?php if (!empty($registro->consulta)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registro Id') ?></th>
                            <th><?= __('Sevicios Publicos') ?></th>
                            <th><?= __('Unidad Sanitaria') ?></th>
                            <th><?= __('Condicion Ingreso') ?></th>
                            <th><?= __('Ambito Id') ?></th>
                            <th><?= __('Motivo Id') ?></th>
                            <th><?= __('Motivo Consulta') ?></th>
                            <th><?= __('Enfermedad Actual') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registro->consulta as $consulta) : ?>
                        <tr>
                            <td><?= h($consulta->id) ?></td>
                            <td><?= h($consulta->registro_id) ?></td>
                            <td><?= h($consulta->sevicios_publicos) ?></td>
                            <td><?= h($consulta->unidad_sanitaria) ?></td>
                            <td><?= h($consulta->condicion_ingreso) ?></td>
                            <td><?= h($consulta->ambito_id) ?></td>
                            <td><?= h($consulta->motivo_id) ?></td>
                            <td><?= h($consulta->motivo_consulta) ?></td>
                            <td><?= h($consulta->enfermedad_actual) ?></td>
                            <td><?= h($consulta->created) ?></td>
                            <td><?= h($consulta->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Consulta', 'action' => 'view', $consulta->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Consulta', 'action' => 'edit', $consulta->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Consulta', 'action' => 'delete', $consulta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consulta->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Examen Fisico') ?></h4>
                <?php if (!empty($registro->examen_fisico)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registro Id') ?></th>
                            <th><?= __('Estado General') ?></th>
                            <th><?= __('Talla') ?></th>
                            <th><?= __('Peso') ?></th>
                            <th><?= __('Saturacion') ?></th>
                            <th><?= __('Frecuencia Cardiaca') ?></th>
                            <th><?= __('Frecuencia Respiratoria') ?></th>
                            <th><?= __('Temperatura') ?></th>
                            <th><?= __('Ocular') ?></th>
                            <th><?= __('Verbal') ?></th>
                            <th><?= __('Motora') ?></th>
                            <th><?= __('Ta Sistolica') ?></th>
                            <th><?= __('Ta Diastolica') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registro->examen_fisico as $examenFisico) : ?>
                        <tr>
                            <td><?= h($examenFisico->id) ?></td>
                            <td><?= h($examenFisico->registro_id) ?></td>
                            <td><?= h($examenFisico->estado_general) ?></td>
                            <td><?= h($examenFisico->talla) ?></td>
                            <td><?= h($examenFisico->peso) ?></td>
                            <td><?= h($examenFisico->saturacion) ?></td>
                            <td><?= h($examenFisico->frecuencia_cardiaca) ?></td>
                            <td><?= h($examenFisico->frecuencia_respiratoria) ?></td>
                            <td><?= h($examenFisico->temperatura) ?></td>
                            <td><?= h($examenFisico->ocular) ?></td>
                            <td><?= h($examenFisico->verbal) ?></td>
                            <td><?= h($examenFisico->motora) ?></td>
                            <td><?= h($examenFisico->ta_sistolica) ?></td>
                            <td><?= h($examenFisico->ta_diastolica) ?></td>
                            <td><?= h($examenFisico->created) ?></td>
                            <td><?= h($examenFisico->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ExamenFisico', 'action' => 'view', $examenFisico->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ExamenFisico', 'action' => 'edit', $examenFisico->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExamenFisico', 'action' => 'delete', $examenFisico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examenFisico->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Hallazgos') ?></h4>
                <?php if (!empty($registro->hallazgos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registro Id') ?></th>
                            <th><?= __('Tipo Hallazgo Id') ?></th>
                            <th><?= __('Hallazgo') ?></th>
                            <th><?= __('Valor') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registro->hallazgos as $hallazgos) : ?>
                        <tr>
                            <td><?= h($hallazgos->id) ?></td>
                            <td><?= h($hallazgos->registro_id) ?></td>
                            <td><?= h($hallazgos->tipo_hallazgo_id) ?></td>
                            <td><?= h($hallazgos->hallazgo) ?></td>
                            <td><?= h($hallazgos->valor) ?></td>
                            <td><?= h($hallazgos->created) ?></td>
                            <td><?= h($hallazgos->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Hallazgos', 'action' => 'view', $hallazgos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Hallazgos', 'action' => 'edit', $hallazgos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hallazgos', 'action' => 'delete', $hallazgos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hallazgos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Incapacidad') ?></h4>
                <?php if (!empty($registro->incapacidad)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registro Id') ?></th>
                            <th><?= __('Nombre Convenio') ?></th>
                            <th><?= __('Tipo Identificacion') ?></th>
                            <th><?= __('Numero Identificacion') ?></th>
                            <th><?= __('Nombre Paciente') ?></th>
                            <th><?= __('Genero') ?></th>
                            <th><?= __('Dias Inca') ?></th>
                            <th><?= __('Prioridad') ?></th>
                            <th><?= __('Observaciones') ?></th>
                            <th><?= __('Fecha Inicial') ?></th>
                            <th><?= __('Fecha Final') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registro->incapacidad as $incapacidad) : ?>
                        <tr>
                            <td><?= h($incapacidad->id) ?></td>
                            <td><?= h($incapacidad->registro_id) ?></td>
                            <td><?= h($incapacidad->nombre_convenio) ?></td>
                            <td><?= h($incapacidad->tipo_identificacion) ?></td>
                            <td><?= h($incapacidad->numero_identificacion) ?></td>
                            <td><?= h($incapacidad->nombre_paciente) ?></td>
                            <td><?= h($incapacidad->genero) ?></td>
                            <td><?= h($incapacidad->dias_inca) ?></td>
                            <td><?= h($incapacidad->prioridad) ?></td>
                            <td><?= h($incapacidad->observaciones) ?></td>
                            <td><?= h($incapacidad->fecha_inicial) ?></td>
                            <td><?= h($incapacidad->fecha_final) ?></td>
                            <td><?= h($incapacidad->created) ?></td>
                            <td><?= h($incapacidad->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Incapacidad', 'action' => 'view', $incapacidad->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Incapacidad', 'action' => 'edit', $incapacidad->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Incapacidad', 'action' => 'delete', $incapacidad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incapacidad->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Rips') ?></h4>
                <?php if (!empty($registro->rips)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registro Id') ?></th>
                            <th><?= __('Tipo Diagnostico') ?></th>
                            <th><?= __('Diagnostico Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registro->rips as $rips) : ?>
                        <tr>
                            <td><?= h($rips->id) ?></td>
                            <td><?= h($rips->registro_id) ?></td>
                            <td><?= h($rips->tipo_diagnostico) ?></td>
                            <td><?= h($rips->diagnostico_id) ?></td>
                            <td><?= h($rips->created) ?></td>
                            <td><?= h($rips->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Rips', 'action' => 'view', $rips->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Rips', 'action' => 'edit', $rips->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rips', 'action' => 'delete', $rips->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rips->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
