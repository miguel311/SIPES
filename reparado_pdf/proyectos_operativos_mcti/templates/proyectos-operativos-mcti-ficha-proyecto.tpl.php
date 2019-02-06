<?php
 /**
  * Sistema Integral de Planificación y Presupuesto (SIPP)
  * @file proyectos-operativos-ficha-proyecto.tpl.php
  * Drupal part Module to Sistema Integral de Planificación y Presupuesto (SIPP)
  * Copyright 2011 Sistema Automatizado para la Planificación Estratégico-Situacional en la Administración Pública Venezolana (CENDITEL)
  *
  * This program is free software; you can redistribute it and/or modify
  * it under the terms of the GNU General Public License as published by
  * the Free Software Foundation; either version 2 of the License, or
  * (at your option) any later version.
  * 
  * This program is distributed in the hope that it will be useful,
  * but WITHOUT ANY WARRANTY; without even the implied warranty of
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  * GNU General Public License for more details.
  * 
  * You should have received a copy of the GNU General Public License
  * along with this program; if not, write to the Free Software
  * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  *
  * @author Cenditel Merida - Msc. Juan Vizcarrondo
  * @date 2013-08-02 // (a&#241;o-mes-dia)
  * @version 0.1 // (0.1)
  */

  $node_type = content_types('proyectos_operativos');
  $campos_proyectos = $node_type['fields'];
  $content = node_build_content($proyecto);
  $format_number = array(
    'decimals' => variable_get('proyectos_operativos_number_decimals', 0),
    'dec_point' => variable_get('proyectos_operativos_number_dec_point', ','),
    'thousands_sep' => variable_get('proyectos_operativos_number_thousands_sep', '.'),
  );
  $arreglo = array(
    'field_proyecto_fecha_i' => 'field_proyecto_fecha_i',
    'field_proyecto_fecha_f' => 'field_proyecto_fecha_f',
    'field_proyecto_plurianual' => 'field_proyecto_plurianual',
    'field_proyecto_status' => 'field_proyecto_status',
    'field_proyecto_status' => 'field_proyecto_status',
    'field_proyecto_situacion_p' => 'field_proyecto_situacion_p',
    'field_proyecto_monto_anual' => 'field_proyecto_monto_anual',
    'field_proyecto_total' => 'field_proyecto_total',
    'field_proyecto_monto_ant' => 'field_proyecto_monto_ant',
    'field_proyecto_monto_prox' => 'field_proyecto_monto_prox',
    'field_proyecto_esp_monto_finan' => 'field_proyecto_esp_monto_finan',
    'field_montos_otras_moneds' => 'field_montos_otras_moneds',
    'field_proyecto_poan' => 'field_proyecto_poan',
    'field_proyecto_pndes' => 'field_proyecto_pndes',
    'field_proyecto_mcti' => 'field_proyecto_mcti',
    'field_proyecto_ubicaci_inter' => 'field_proyecto_ubicaci_inter',
    'field_proyecto_ubicaci_comu' => 'field_proyecto_ubicaci_comu',
    'field_proyecto_codigo_comu' => 'field_proyecto_codigo_comu',
    'field_proyecto_nombres_cum' => 'field_proyecto_nombres_cum',
    'field_proyecto_sector' => 'field_proyecto_sector',
    'field_proyecto_relacion' => 'field_proyecto_relacion',
    'field_proyecto_causas' => 'field_proyecto_causas',
    'field_proyecto_justificacion' => 'field_proyecto_justificacion',
    'field_proyecto_alcance' => 'field_proyecto_alcance',
    'field_tipo_factores' => 'field_tipo_factores',
    'field_factor_impact_multifc' => 'field_factor_impact_multifc',
    'field_factor_segun_origen' => 'field_factor_segun_origen',
    'field_factor_impact_multiog' => 'field_factor_impact_multiog',
    'field_proyecto_sa_descripcion' => 'field_proyecto_sa_descripcion',
    'field_proyecto_sa_formulai' => 'field_proyecto_sa_formulai',
    'field_proyecto_sa_fuentei' => 'field_proyecto_sa_fuentei',
    'field_proyecto_sa_fecha' => 'field_proyecto_sa_fecha',
    'field_proyecto_sa_cuantificacion' => 'field_proyecto_sa_cuantificacion',
    'field_proyecto_so_descripcion' => 'field_proyecto_so_descripcion',
    'field_proyecto_tiempoi' => 'field_proyecto_tiempoi',
    'field_proyecto_unidadm' => 'field_proyecto_unidadm',
    'field_proyecto_meta_fisica' => 'field_proyecto_meta_fisica',
    'field_proyecto_descripcion_bien' => 'field_proyecto_descripcion_bien',
    'field_proyecto_descripcion_bien' => 'field_proyecto_descripcion_bien',
    'field_proyecto_descripcion_bien' => 'field_proyecto_descripcion_bien',

  );
  foreach($arreglo as $campo) {
    $content->content[$campo]['field']['#label_display'] = 'hidden';
  }
  $plurianual = ($proyecto->field_proyecto_plurianual[0]['value'] == variable_get('proyectos_operativos_plurianual', 0));
  $pndes = variable_get('proyectos_operativos_muestra_pndes', TRUE);
  $mcti = variable_get('proyectos_operativos_muestra_mcti', TRUE);
  $sa = variable_get('proyectos_operativos_muestra_sa', TRUE);
  $so = variable_get('proyectos_operativos_muestra_so', TRUE);
  $unidad_m = module_exists('proyectos_reformulacion') ? 'proyectos_operativos_unidad_medida_reformulado' : 'field_proyecto_unidadm';
  $meta = module_exists('proyectos_reformulacion') ? 'proyectos_operativos_meta_fisica_reformulado' : 'field_proyecto_meta_fisica';
//$result  =  preg_replace('/(<div.*?class="field-label"[^>]*>)(.*?)(<\/div>)/i', "<b>$1:</b>$3", $content->content[$campo]);
?>
<table id="ficha-proyecto-presupuesto" border="1">
<tr><td colspan="2" align="center" ><h2><? print t('Datos Básicos');?></h2></td></tr>
<tr><td colspan="2" align="center" ><h3><? print t('Datos Básicos de Identificación del Proyecto');?></h3></td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_titulo']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="justify">&nbsp;<?php print check_plain($proyecto->titulo_asignado);?>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_codigo']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_plurianual']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<?php print check_plain($proyecto->field_proyecto_codigo[0]['value']);?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_plurianual']));?>&nbsp;</td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_descripcin_proyect']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="justify">&nbsp;<?php print check_plain($proyecto->field_descripcin_proyect[0]['value']);?>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_fecha_i']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_fecha_f']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_fecha_i']));?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_fecha_f']));?>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_status']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_situacion_p']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_status']));?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_situacion_p']));?>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_monto_anual']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_total']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_monto_anual']));?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_total']));?>&nbsp;</td></tr>
<?php if ($plurianual):?>
  <tr><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_monto_ant']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_monto_prox']['field']['#title'];?>:</b>&nbsp;</td></tr>
  <tr><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_monto_ant']));?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_monto_prox']));?>&nbsp;</td></tr>
<?php endif ?>
<!-- montos en otras monedas: -->
<tr><td align="center" colspan="2">&nbsp;<b><?php print $content->content['field_montos_otras_moneds']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td align="center" colspan="2">&nbsp;<?php print strip_tags(drupal_render($content->content['field_montos_otras_moneds']));?>&nbsp;</td></tr>

<tr><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_esp_monto_finan']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_poan']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_esp_monto_finan']));?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_poan']));?>&nbsp;</td></tr>
<?php
 if (variable_get('proyectos_operativos_muestra_responsables', TRUE)):  ?>
  <tr><td colspan="2" align="center" ><h3><? print t('Responsable del Proyecto');?></h3></td></tr>
  <?php
    $arreglo['gerente'] = array(
      'field_proyecto_nombre_gere' => 'field_proyecto_nombre_gere',
      'field_proyecto_cedul_gere' => 'field_proyecto_cedul_gere',
      'field_proyecto_corre_gere' => 'field_proyecto_corre_gere',
      'field_proyecto_telef_gere' => 'field_proyecto_telef_gere',
    );
    $arreglo['tecnico'] = array(
      'field_proyecto_nom_r_tec' => 'field_proyecto_nom_r_tec',
      'field_proyecto_ced_r_tec' => 'field_proyecto_ced_r_tec',
      'field_proyecto_cor_r_tec' => 'field_proyecto_cor_r_tec',
      'field_proyecto_tel_r_tec' => 'field_proyecto_tel_r_tec',
      'field_proyecto_und_r_tec' => 'field_proyecto_und_r_tec',
    );
    $arreglo['registrador'] = array(
      'field_proyecto_nom_r_reg' => 'field_proyecto_nom_r_reg',
      'field_proyecto_ced_r_reg' => 'field_proyecto_ced_r_reg',
      'field_proyecto_cor_r_reg' => 'field_proyecto_cor_r_reg',
      'field_proyecto_tel_r_reg' => 'field_proyecto_tel_r_reg',
    );
    $arreglo['administrativo'] = array(
      'field_proyecto_nom_r_adm' => 'field_proyecto_nom_r_adm',
      'field_proyecto_ced_r_adm' => 'field_proyecto_ced_r_adm',
      'field_proyecto_cor_r_adm' => 'field_proyecto_cor_r_adm',
      'field_proyecto_tel_r_adm' => 'field_proyecto_tel_r_adm',
      'field_proyecto_und_r_adm' => 'field_proyecto_und_r_adm',
    );
  ?>  

  <tr><td colspan="2" align="center" ><?php print ("<h4>Datos del Gerente</h4>"); ?></td></tr>
  <tr><td colspan="2" align="center" >
    <?php print("<table><thead><tr>"); ?>
     <?php foreach($arreglo['gerente'] as $campo): ?>
       <?php print("<th>"); ?>
       <?php print $content->content[$campo]['field']['#title']; ?>
       <?php print("</th>"); ?>
     <?php endforeach ?>
      <?php print("</tr></thead><tbody><tr class='odd'>"); ?>
       <?php foreach($arreglo['gerente'] as $campo): ?>
        <?php print("<td>"); ?>
          <?php foreach($content->content[$campo]['field']['#node']->{$campo} as $id => $value): ?>
            <?php if (isset($value['email'])): ?>
              <?php $values = $value['email']; ?>
            <?php else: ?>
              <?php $values = $value['value']; ?>
            <?php endif; ?>
          <?php endforeach ?>
          <?php print $values; ?>
        <?php print("</td>"); ?>
      <?php endforeach ?>
    <?php print("</tr></tbody>"); ?>
  <?php print("</table>"); ?>
  <!-- end Responsable Gerente -->
  </td></tr>
  <!-- Responsable tecnico -->
  <tr><td colspan="2" align="center" ><?php print ("<h4>Datos del Responsable tecnico</h4>"); ?></td></tr>
  <tr><td colspan="2" align="center" >
    <?php print("<table><thead><tr>"); ?>
      <?php foreach($arreglo['tecnico'] as $campo): ?>
        <?php print("<th>"); ?>
          <?php print $content->content[$campo]['field']['#title']; ?>
        <?php print("</th>"); ?>
      <?php endforeach ?>
      <?php print("</tr></thead><tbody><tr class='odd'>"); ?>
        <?php foreach($arreglo['tecnico'] as $campo): ?>
          <?php print("<td>"); ?>
            <?php foreach($content->content[$campo]['field']['#node']->{$campo} as $id => $value): ?>
            <?php if (isset($value['email'])): ?>
              <?php $values = $value['email']; ?>
            <?php else: ?>
              <?php $values = $value['value']; ?>
            <?php endif; ?>
          <?php endforeach ?>
          <?php print $values; ?>
      <?php print("</td>"); ?>
      <?php endforeach ?>
    <?php print("</tr></tbody>"); ?>
  <?php print("</table>"); ?>
  </td></tr>
  <!-- end Responsable tecnico -->
  <!-- Responsable registrador -->
  <tr><td colspan="2" align="center" ><?php print ("<h4>Datos del Responsable Registrador</h4>"); ?></td></tr>
  <tr><td colspan="2" align="center" >
    <?php print("<table><thead><tr>"); ?>
      <?php foreach($arreglo['registrador'] as $campo): ?>
        <?php print("<th>"); ?>
          <?php print $content->content[$campo]['field']['#title']; ?>
        <?php print("</th>"); ?>
      <?php endforeach ?>
      <?php print("</tr></thead><tbody><tr class='odd'>"); ?>
        <?php foreach($arreglo['registrador'] as $campo): ?>
         <?php print("<td>"); ?>
           <?php foreach($content->content[$campo]['field']['#node']->{$campo} as $id => $value): ?>
             <?php if (isset($value['email'])): ?>
               <?php $values = $value['email']; ?>
             <?php else: ?>
               <?php $values = $value['value']; ?>
             <?php endif; ?>
           <?php endforeach ?>
           <?php print $values; ?>
         <?php print("</td>"); ?>
      <?php endforeach ?>
    <?php print("</tr></tbody>"); ?>
  <?php print("</table>"); ?>
  </td></tr>
  <!-- end Responsable registrador -->
  <!-- Responsable administrador -->
  <tr><td colspan="2" align="center" ><?php print ("<h4>Datos del Responsable Administrativo</h4>"); ?></td></tr>
  <tr><td colspan="2" align="center" >
    <?php print("<table><thead><tr>"); ?>
      <?php foreach($arreglo['administrativo'] as $campo): ?>
       <?php print("<th>"); ?>
       <?php print $content->content[$campo]['field']['#title']; ?>
       <?php print("</th>"); ?>
     <?php endforeach ?>
     <?php print("</tr></thead><tbody><tr class='odd'>"); ?>
       <?php foreach($arreglo['administrativo'] as $campo): ?>
         <?php print("<td>"); ?>
         <?php foreach($content->content[$campo]['field']['#node']->{$campo} as $id => $value): ?>
          <?php if (isset($value['email'])): ?>
            <?php $values = $value['email']; ?>
          <?php else: ?>
            <?php $values = $value['value']; ?>
          <?php endif; ?>
        <?php endforeach ?>
        <?php print $values; ?>
        <?php print("</td>"); ?>
      <?php endforeach ?>
    <?php print("</tr></tbody>"); ?>
  <?php print("</table>"); ?>
  </td></tr>
  <!-- end Responsable administrador -->
<?php endif ?>

<!-- PNDS -->
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_pndes']['field']['#title'];?>:</b>&nbsp;</td></tr>

<?php
  $datos = array();
  foreach ($proyecto->field_proyecto_pndes as $valor) {
       $parents = taxonomy_get_parents($datos[] = $valor['value']);

       $pndes = taxonomy_get_term($datos[] = $valor['value'], $reset = FALSE);
       $des_pndes[] = $pndes->description;
       $des_pndes2  = array_reverse($des_pndes);
  }
  $contenido = '<ul>';
  $contenido .= ($des_pndes2[0]) ? '<li> <i><b>Objetivo Histórico:</b></i><br>'. $des_pndes2[0] . '</li>' : '';
  $contenido .= ($des_pndes2[1]) ?'<li> <i><b>Objetivo Nacional:</b></i><br>'. $des_pndes2[1] . '</li>' : '';
  $contenido .= ($des_pndes2[2]) ?'<li> <i><b>Objetivo Estratégico:</b></i><br>'. $des_pndes2[2] . '</li>' : '';
  $contenido .= ($des_pndes2[3]) ?'<li> <i><b>Objetivo General:</b></i><br>'. $des_pndes2[3] . '</li>' : '';
  $contenido .= ($des_pndes2[4]) ?'<li> <i><b>Objetivos Específicos:</b></i><br>'. $des_pndes2[4] . '</li>' : '';
  $contenido .= '</ul>';
?>
<tr><td colspan="2" align="justify"><?php print $contenido;?>&nbsp;</td></tr>
<!-- end PNDS -->

<!-- Politicas Ministeriales -->
<tr><td colspan="2" align="center"><b><?php print $content->content['field_poli_ministeriales']['field']['#title'];?>:</b>&nbsp;</td></tr>
<?php
  $datos = array();
  foreach ($proyecto->field_poli_ministeriales as $valor) {
    $datos[] = $valor['value'];
  }
  $contenido = (count($datos)) ? '<ul><li>' . implode('</li><li>', $datos) . '</li></ul>' : t('No se han ingresado politicas ministeriales a este proyecto'); 
?>
<tr><td colspan="2" align="justify"><?php print $contenido;?>&nbsp;</td></tr>
<!-- end Politicas Ministeriales -->

<!-- Programas -->
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyectos_programas']['field']['#title'];?>:</b>&nbsp;</td></tr>
<?php
  $datos = array();
  foreach ($proyecto->field_proyectos_programas as $valor) {
    $datos[] = $valor['value'];
  }
  $contenido = (count($datos)) ? '<ul><li>' . implode('</li><li>', $datos) . '</li></ul>' : t('No se han ingresado programa  a este proyecto'); 
?>
<tr><td colspan="2" align="justify"><?php print $contenido;?>&nbsp;</td></tr>
<!-- end Programas -->
<!-- problemas  -->
  <tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_problemas']['field']['#title'];?>:</b>&nbsp;</td></tr>
  <?php
    $datos = array();
    foreach ($proyecto->field_proyecto_problemas as $valor) {
      $datos[] = check_plain($valor['value']);
    }
    $contenido = (count($datos)) ? '<ul><li>' . implode('</li><li>', $datos) . '</li></ul>' : t('No se han ingresado problemas para este proyecto'); 
  ?>
  <tr><td colspan="2" align="justify"><?php print  $contenido;?>&nbsp;</td></tr>
<!-- end problemas  -->
<!-- causas  -->
  <tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_causas']['field']['#title'];?>:</b>&nbsp;</td></tr>
  <?php
    $datos = array();
    foreach ($proyecto->field_proyecto_causas as $valor) {
      $datos[] = check_plain($valor['value']);
    }
    $contenido = (count($datos)) ? '<ul><li>' . implode('</li><li>', $datos) . '</li></ul>' : t('No se han ingresado causas para este proyecto'); 
  ?>
  <tr><td colspan="2" align="justify"><?php print  $contenido;?>&nbsp;</td></tr>
<!-- end causas  -->

<!-- justificación & Alcance  -->
<?php if (variable_get('proyectos_operativos_muestra_justicacion', TRUE)): ?>
  <tr><td colspan="2" align="center" ><h3><? print t('Justificación');?></h3></td></tr
  <tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_justificacion']['field']['#title'];?>:</b>&nbsp;</td></tr>
  <tr><td colspan="2" align="justify"><?php print strip_tags(drupal_render($content->content['field_proyecto_justificacion']));?>&nbsp;</td></tr>
<?php endif ?>
<?php if (variable_get('proyectos_operativos_muestra_alcance', TRUE)): ?>
  <tr><td colspan="2" align="center" ><h3><? print t('Alcance del Proyecto');?></h3></td></tr>
  <tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_alcance']['field']['#title'];?>:</b>&nbsp;</td></tr>
  <tr><td colspan="2" align="justify"><?php print strip_tags(drupal_render($content->content['field_proyecto_alcance']));?>&nbsp;</td></tr>
<?php endif ?>
<!-- end justificación & Alcance  -->

<!-- Lineas estrategicas -->
<tr><td align="center" colspan="2">&nbsp;<b><?php print $content->content['field_lineas_estrategicas']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td align="center" colspan="2">&nbsp;<?php print strip_tags($x=drupal_render($content->content['field_lineas_estrategicas']));?>&nbsp;</td></tr>
<!-- end Lineas estrategicas -->

<tr><td colspan="2" align="center" ><h3><? print t('Localización del Proyecto');?></h3></td></tr>
<tr><td colspan="2" align="center" ><h4><? print t('Localización Internacional o Nacional');?></h4></td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_ubicaci_inter']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="center"><?php print strip_tags(drupal_render($content->content['field_proyecto_ubicaci_inter']));?>&nbsp;</td></tr>
<tr><td colspan="2" align="center" ><h4><? print t('Localización Comunal');?></h4></td></tr>
<tr><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_codigo_comu']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_nombres_cum']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_codigo_comu']));?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_nombres_cum']));?>&nbsp;</td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_ubicaci_comu']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="center"><?php print strip_tags(drupal_render($content->content['field_proyecto_ubicaci_comu']));?>&nbsp;</td></tr>
<tr><td colspan="2" align="center" ><h2><? print t('Datos Generales');?></h2></td></tr>
<tr><td colspan="2" align="center" ><h3><? print t('Clasificación Sectorial');?></h3></td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_sector']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="center"><?php print strip_tags(drupal_render($content->content['field_proyecto_sector']));?>&nbsp;</td></tr>
<?php if(variable_get('proyectos_operativos_muestra_talento', TRUE)) : ?>
  <tr><td colspan="2" align="center" ><h3><?php print t('Talento Humano');?></h3></td></tr>
  <tr><td colspan="2" align="center" >
  <?php
    $arreglo = array(
      'field_proyecto_institucionth' => 'field_proyecto_institucionth',
      'field_proyecto_nombres_a' => 'field_proyecto_nombres_a',
      'field_proyecto_cargo_th' => 'field_proyecto_cargo_th',
      'field_proyecto_rol_th' => 'field_proyecto_rol_th',
      'field_proyecto_esfuerzo' => 'field_proyecto_esfuerzo',
      'field_proyecto_formacion' => 'field_proyecto_formacion',
    );
    $header = array();
    foreach($arreglo as $campo) {
      $header[] = array('data' => check_plain($campos_proyectos[$campo]['widget']['label']), 'align' => 'center'); 
    }
    $tamano_array = array();
    foreach($arreglo as $field_id => $field) {
      $tamano_array[] = count($proyecto->{$field_id});
    }
    $cantidad_talento = max($tamano_array);
    $rows = array();
    for ($i = 0; $i < $cantidad_talento; $i++) {
      $row = array();
      foreach($arreglo as $campo) {
        $valor_d = ($campo == 'field_proyecto_esfuerzo') ? 0 : '';
        $valor = isset($proyecto->{$campo}[$i]) ? $proyecto->{$field_id}[$i]['value'] : $valor_d;
        $row[] = array('data' => check_plain($valor), 'align' => 'center',);
      }
      $rows[] = $row;
    }
    if (!count($rows)) {
      $row[] = array('data' => t('No se ha ingresado la sección de Talento Humano'), 'colspan' => count($header), 'align' => 'center');
      $rows[] = $row;
    }
    print theme('table', $header, $rows, array('border' => '1'));
  ?>
  </td></tr>
<?php endif; ?>


<?php if (variable_get('proyectos_operativos_muestra_capacidades', TRUE)): ?>
  <tr><td colspan="2" align="center" ><h3><?php print t('Capacidades');?></h3></td></tr>
  <tr><td colspan="2" align="center" >
  <?php
    $arreglo = array(
      'field_proyecto_institucion_alc' => 'field_proyecto_institucion_alc',
      'field_proyecto_infraestructura' => 'field_proyecto_infraestructura',
      'field_proyecto_equipos' => 'field_proyecto_equipos',
      'field_proyecto_insumos' => 'field_proyecto_insumos',
      'field_proyectos_servicios' => 'field_proyectos_servicios',
    );
    $header = array();
    foreach($arreglo as $campo) {
      $header[] = array('data' => check_plain($campos_proyectos[$campo]['widget']['label']), 'align' => 'center'); 
    }
    $tamano_array = array();
    foreach($arreglo as $field_id => $field) {
      $tamano_array[] = count($proyecto->{$field_id});
    }
    $cantidad_talento = max($tamano_array);
    $rows = array();
    for ($i = 0; $i < $cantidad_talento; $i++) {
      $row = array();
      foreach($arreglo as $campo) {
        $valor_d = ($campo == 'field_proyecto_esfuerzo') ? 0 : '';
        $valor = isset($proyecto->{$campo}[$i]) ? $proyecto->{$campo}[$i]['value'] : $valor_d;
        $row[] = array('data' => check_plain($valor), 'align' => 'center',);
      }
      $rows[] = $row;
    }
    if (!count($rows)) {
      $row[] = array('data' => t('No se ha ingresado la sección de Capacidades'), 'colspan' => count($header), 'align' => 'center');
      $rows[] = $row;
    }
    print theme('table', $header, $rows, array('border' => '1'));
  ?>
  </td></tr>
<?php endif; ?>
<tr><td colspan="2" align="center" ><h3><?php print t('Instituciones');?></h3></td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_relacion']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="center"><?php print strip_tags(drupal_render($content->content['field_proyecto_relacion']));?>&nbsp;</td></tr>
<tr><td colspan="2" align="center" ><h3><?php print t('Nro Estimados de Empleos Generados');?></h3></td></tr>
<tr><td colspan="2" align="center" >
<?php
  $labels = array(
    'field_proyectos_femenino_i' => t('Empleos Masculinos'),
    'field_proyectos_femenino_d'=> t('Empleos Femeninos'),
    'field_proyectos_masculino_d' => t('Total'),
  );
  $arreglo1 = array(
    'field_proyecto_efdirecto' => 'field_proyecto_efdirecto',
    'field_proyecto_emdirecto' => 'field_proyecto_emdirecto',
  );
  $arreglo2 = array(
    'field_proyecto_emindirecto' => 'field_proyecto_emindirecto',
    'field_proyecto_efindirecto' => 'field_proyecto_efindirecto',
  );
  $header = array();
  $rows = array();
  $row = array();
  $sum_fila = 0;
  foreach ($labels as $label) {
    $header[] = array('data' => $label, 'align' => 'center'); 
  }
  foreach($arreglo1 as $campo) {
    $valor_d = 0;
    $valor = isset($proyecto->{$campo}[0]['value']) ? $proyecto->{$campo}[0]['value'] : $valor_d;
    $valor_m = $valor ? number_format($valor, 0, $format_number['dec_point'], $format_number['thousands_sep']) : 0;
    $row[] = array('data' => t('Directos Nuevos: ') . check_plain($valor_m), 'align' => 'left',);
    $sum_fila += $valor;
  }
  $valor_m = $sum_fila ? number_format($sum_fila, 0, $format_number['dec_point'], $format_number['thousands_sep']) : 0;
  $row[] = array('data' => t('Empleos Nuevos: ') . $valor_m, 'align' => 'left',);
  $rows[] = $row;
  $row = array();
  $sum_fila = 0;
  foreach($arreglo2 as $campo) {
    $valor_d = 0;
    $valor = isset($proyecto->{$campo}[0]['value']) ? $proyecto->{$campo}[0]['value'] : $valor_d;
    $valor_m = $valor ? number_format($valor, 0, $format_number['dec_point'], $format_number['thousands_sep']) : 0;
    $row[] = array('data' => t('Directos Sostenidos: ') . check_plain($valor_m), 'align' => 'left',);
    $sum_fila += $valor;
  }
  $valor_m = $sum_fila ? number_format($sum_fila, 0, $format_number['dec_point'], $format_number['thousands_sep']) : 0;
  $row[] = array('data' => t('Empleos Sostenidos: ') . $valor_m, 'align' => 'left',);

  $rows[] = $row;

  $row = array();
  $valor_t1 = $proyecto->field_proyecto_efdirecto[0]['value'] + $proyecto->field_proyecto_emindirecto[0]['value'];
  $row[] = array('data' => t('Total de Empleos Directos Masculinos: ') . number_format($valor_t1, 0, $format_number['dec_point'], $format_number['thousands_sep']), 'align' => 'left',);

  $valor_t2 = $proyecto->field_proyecto_emdirecto[0]['value'] + $proyecto->field_proyecto_efindirecto[0]['value'];
  $row[] = array('data' => t('Total de Empleos Directos Femeninos: ') . number_format($valor_t2, 0, $format_number['dec_point'], $format_number['thousands_sep']), 'align' => 'left',);

  $valor_t = $valor_t1 + $valor_t2;
  $row[]= array('data' =>  t('Total de Empleos Directos: ') . number_format($valor_t, 0, $format_number['dec_point'], $format_number['thousands_sep']), 'align' => 'left',);

  $rows[] = $row;
  print theme('table', $header, $rows, array('border' => '1'));
?>
</td></tr>
<?php if (variable_get('proyectos_operativos_muestra_beneficiario', TRUE)): ?>
  <tr><td colspan="2" align="center" ><h3><?php print t('Beneficiarios');?></h3></td></tr>
  <tr><td colspan="2" align="center" >
  <?php
    $labes = array(
      'field_proyecto_beneficiario' => t('Beneficiario'),
      'field_proyectos_masculino_d' => t('Número estimado de beneficiarios masculinos'),
      'field_proyectos_femenino_i' => t('Número estimado de beneficiarios femeninos'),
    );
    $arreglo = array(
      'field_proyecto_beneficiario' => 'field_proyecto_beneficiario',
      'field_proyectos_masculino_d' => 'field_proyectos_masculino_d',
      //'field_proyectos_femenino_d' => 'field_proyectos_femenino_d',
    );
    if (variable_get('proyectos_operativos_muestra_beneficiarios_indirectos', TRUE)) {
     // $arreglo['field_proyectos_masculino_i'] = 'field_proyectos_masculino_i';
      $arreglo['field_proyectos_femenino_i'] = 'field_proyectos_femenino_i';
    }
    $header = array();
    foreach($labes as $label) {
      $header[] = array('data' => $label, 'align' => 'center'); 
    }
    $header[] = array('data' => t('TOTAL'), 'align' => 'center'); 
    $tamano_array = array();
    foreach($arreglo as $field_id => $field) {
      $tamano_array[] = count($proyecto->{$field_id});
    }
    $cantidad_talento = max($tamano_array);
    $rows = array();
    $suma_arreglo = array();
    foreach($arreglo as $campo) {
      $suma_arreglo[$campo] = 0;
    }
    for ($i = 0; $i < $cantidad_talento; $i++) {
      $row = array();
      $sum_fila = 0;
      foreach($arreglo as $campo) {
        if ($campo != 'field_proyecto_beneficiario') {
          $valor_d = ($field_id == 'field_proyecto_esfuerzo') ? 0 : '';
          $valor = isset($proyecto->{$campo}[$i]['value']) ? $proyecto->{$campo}[$i]['value'] : $valor_d;
          $valor_m = $valor ? number_format($valor, 0, $format_number['dec_point'], $format_number['thousands_sep']) : 0;
          $row[] = array('data' => check_plain($valor_m), 'align' => 'center',);
          $sum_fila += $valor;
          $suma_arreglo[$campo] += $valor;
        }
        else {
            $row[] = array('data' => check_plain($proyecto->{$campo}[$i]['value']), 'align' => 'left',);
        }
      }
      $valor_m = $sum_fila ? number_format($sum_fila, 0, $format_number['dec_point'], $format_number['thousands_sep']) : 0;
      $row[] = array('data' => $valor_m, 'align' => 'center',);
      $rows[] = $row;
    }
    $sum_fila = 0;
    $row = array();
    foreach($arreglo as $campo) {
      if ($campo == 'field_proyecto_beneficiario') {
        $row[] = array('data' => t('TOTAL DE BENEFICIARIOS'), 'align' => 'right',);
      }
      else {
        $valor_m = $suma_arreglo[$campo] ? number_format($suma_arreglo[$campo], 0, $format_number['dec_point'], $format_number['thousands_sep']) : 0;
        $row[] = array('data' => check_plain($valor_m), 'align' => 'center',);
        $sum_fila += $suma_arreglo[$campo];
      }
    }
    $valor_m = $sum_fila ? number_format($sum_fila, 0, $format_number['dec_point'], $format_number['thousands_sep']) : 0;
    $row[] = array('data' => $valor_m, 'align' => 'center',);
    $rows[] = $row;
    print theme('table', $header, $rows, array('border' => '1'));
  ?>
  </td></tr>
<?php endif ?>
<tr><td colspan="2" align="center" ><h3><?php print t('Objetivos del Proyecto');?></h3></td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_og']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="justify"><?php print strip_tags(drupal_render($content->content['field_proyecto_og']));?>&nbsp;</td></tr>
<tr><td colspan="2" align="left"><b><?php print $content->content['field_proyecto_oe']['field']['#title'];?>:</b>&nbsp;</td></tr>
<?php
  $datos = array();
  foreach ($proyecto->field_proyecto_oe as $valor) {
    $datos[] = $valor['value'];
  }
  $contenido = (count($datos)) ? '<ul><li>' . implode('</li><li>', $datos) . '</li></ul>' : t('No se han ingresado objetivos para este proyecto'); 
?>
<tr><td colspan="2" align="justify"><?php print $contenido;?>&nbsp;</td></tr>
<tr><td colspan="2" align="center" ><h2><? print t('Indicadores del Proyecto');?></h2></td></tr>
<?php if (variable_get('proyectos_operativos_muestra_enunciado_problema', TRUE)): ?>
  <tr><td colspan="2" align="center" ><h3><? print t('Enunciado del Problema');?></h3></td></tr>
  <tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_consecuencias']['field']['#title'];?>:</b>&nbsp;</td></tr>
  <?php
  $datos = array();
  foreach ($proyecto->field_proyecto_consecuencias as $valor) {
    $datos[] = $valor['value'];
  }
  $contenido = (count($datos)) ? '<ul><li>' . implode('</li><li>', $datos) . '</li></ul>' : t('No se han ingresado consecuencias a este proyecto'); 
  ?>
  <tr><td colspan="2" align="justify"><?php print $contenido;?>&nbsp;</td></tr>
<?php endif ?>



<?php if (variable_get('proyectos_operativos_muestra_servicios_balance', TRUE)): ?>
  <tr><td colspan="2" align="center" ><h3><? print t('Impacto Ambiental del Proyecto');?></h3></td></tr>
  <tr><td colspan="2" align="center" ><h4><? print t('Tipo de impacto');?></h4></td></tr>
  <tr><td align="center">&nbsp;<b><?php print $content->content['field_tipo_factores']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_factor_impact_multifc']['field']['#title'];?>:</b>&nbsp;</td></tr>
  <tr><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_tipo_factores']));?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_factor_impact_multifc']));?>&nbsp;</td></tr>
  <tr><td align="center">&nbsp;<b><?php print $content->content['field_factor_segun_origen']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_factor_impact_multiog']['field']['#title'];?>:</b>&nbsp;</td></tr>
  <tr><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_factor_segun_origen']));?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_factor_impact_multiog']));?>&nbsp;</td></tr>
  <tr><td colspan="2" align="center" ><h4><? print t('Caracterización cualitativa de los efectos');?></h4></td></tr>
  <tr><td colspan="2" align="center" >
    <?php

      $arreglo = array();
      $arreglo[] = array(
        'field_factor_naturaleza' => 'Naturaleza',
        'field_factor_intensidad' => 'Intensidad',
        'field_factor_momento' => 'Momento',
        'field_factor_persistencia' => 'Persistencia',
        'field_factor_reversibilidad' => 'Reversibilidad',
      );
      $arreglo[] = array(
        'field_factor_extension' => 'Extensión',
        'field_factor_sinergismo' => ' Sinergismo',
        'field_factor_acumulacion' => 'Acumulación',
        'field_factor_relacion' =>' Relación causa-efecto',
        'field_factor_recuperabilidad' => ' Recuperabilidad',
      );
      $arreglo[] = array(
        'field_factor_importancia' => 'Importancia',
        'field_factor_medids_impact' => '¿Cuales serán las medidas para mitigar o eliminar los impactos ambientales de este proyecto?',
      );

      foreach ($arreglo as $values) {
        $row = array(); $rows = array();
        $header = array();
        foreach ($values as $key => $value) {
          $field = content_fields($key);
          $header[] = array('data' => $value, 'align' => 'center'); 
          $value = check_plain($proyecto->{$field['field_name']}[0]['value']);
          if ($options = optionwidgets_options($field)) {
            $value = $options[$proyecto->{$field['field_name']}[0]['value']];
          }
          $row[] = array('data' => $value, 'align' => 'left',);
        }
        $rows[] = $row;
        print theme('table', $header, $rows, array('border' => '1'));
      }

    ?>
  </td></tr>
<?php endif ?>
<?php if (variable_get('proyectos_operativos_muestra_servicios_balance', TRUE)): ?>
  <tr><td colspan="2" align="center" ><h3><? print t('Balance Estimado Nacional de Servicios Energéticos');?></h3></td></tr>
  <tr><td colspan="2" align="center" >
    <?php
      $arreglo = array();
      $rows = array();
      $arreglo['servicios'] = array(
        'field_balnc_progrmn_anu' => 'Tipo de Instalación',
        'field_balance_fuente' => 'Fuente',
        'field_balanc_tipofuent' => 'Tipo de Fuente',
        'field_balanc_tipoprod' => 'Tipo de Producto',
        'field_balanc_unidmed' => 'Unidad de Medida',
        'field_balanc_capacid' => 'Capacidad',
        'field_balanc_anho' => 'Año',
      );
      $header = '';
      $element = array();
      foreach ($arreglo['servicios'] as $field_id => $label) {
        if (isset($proyecto->{$field_id})) {
          foreach ($proyecto->{$field_id} as $key => $field) {
            $field = content_fields($field_id);
            $value = check_plain($proyecto->{$field_id}[$key]['value']);
            if ($options = optionwidgets_options($field)) {
              $value = $options[$proyecto->{$field_id}[$key]['value']];
            }
            $element[$key] .= '<td>' . $value . '</td>';
          }
          $header .= '<th>' . $label . '</th>';
        }
      }
      if (count($element)) {
        $output = '<table>';
        $output .= '<tr>'. $header . '</tr>';
        foreach ($element as $value) {
          $output .= '<tr class="odd">';
          $output .= $value;
          $output .= '</tr>';
        }
        $output .= '</table>';
        print $output;
      }
    ?>
  </td></tr>
<?php endif ?>
<?php if (variable_get('proyectos_operativos_muestra_programacion_anual', TRUE)): ?>
  <tr><td colspan="2" align="center" ><h3><? print t('Programacion Anual por Consumidor');?></h3></td></tr>
  <tr><td colspan="2" align="center" >
    <?php
      $arreglo = array();
      $rows = array();
      $arreglo['programacion'] = array(
        'field_progrmcn_anual_prog' => 'Tipo de Instalación',
        'field_progrmcn_anual_unid' => 'Unidad de Medida',
        'field_progrmcn_anual_cap' => 'Capacidad',
        'field_progrmcn_anual_anho' => 'Año',
      );

      $header = '';
      $element = array();
      foreach ($arreglo['programacion'] as $field_id => $label) {
        if (isset($proyecto->{$field_id})) {
          foreach ($proyecto->{$field_id} as $key => $field) {
            $field = content_fields($field_id);
            $value = check_plain($proyecto->{$field_id}[$key]['value']);
            if ($options = optionwidgets_options($field)) {
              $value = $options[$proyecto->{$field_id}[$key]['value']];
            }
            $element[$key] .= '<td>' . $value . '</td>';
          }
          $header .= '<th>' . $label . '</th>';
        }
      }
      if (count($element)) {
        $output = '<table>';
        $output .= '<tr>'. $header . '</tr>';
        foreach ($element as $value) {
          $output .= '<tr class="odd">';
          $output .= $value;
          $output .= '</tr>';
        }
        $output .= '</table>';
        print $output;
      }
    ?>
  </td></tr>
<?php endif ?>
<?php if ($sa || $so): ?>
  <tr><td colspan="2" align="center" ><h3><? print t('Indicador de la Situación');?></h3></td></tr>
  <?php if ($sa): ?>
    <tr><td colspan="2" align="center" ><h4><? print t('Situación Actual');?></h4></td></tr>
    <tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_sa_descripcion']['field']['#title'];?>:</b>&nbsp;</td></tr>
    <tr><td colspan="2" align="justify"><?php print strip_tags(drupal_render($content->content['field_proyecto_sa_descripcion']));?>&nbsp;</td></tr>
    <tr><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_sa_formulai']['field']['#title'];?>:</b>&nbsp;</td><td align="center">&nbsp;<b><?php print $content->content['field_proyecto_sa_fuentei']['field']['#title'];?>:</b>&nbsp;</td></tr>
    <tr><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_sa_formulai']));?>&nbsp;</td><td align="center">&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_sa_fuentei']));?>&nbsp;</td></tr>
    <tr><td align="center" <?php if (!variable_get('proyectos_operativos_muestra_sa_cuantificacion', TRUE)) {print 'colspan="2"';}?>>&nbsp;<b><?php print $content->content['field_proyecto_sa_fecha']['field']['#title'];?>:</b>&nbsp;</td>
    <?php
      if (variable_get('proyectos_operativos_muestra_sa_cuantificacion', TRUE)) {
        print '<td align="center">&nbsp;<b>' . print $content->content['field_proyecto_sa_cuantificacion']['field']['#title'] . ':</b>&nbsp;</td>';
      }
    ?>
    </tr>
    <tr><td align="center" <?php if (!variable_get('proyectos_operativos_muestra_sa_cuantificacion', TRUE)) {print 'colspan="2"';}?>>&nbsp;<?php print strip_tags(drupal_render($content->content['field_proyecto_sa_fecha']));?>&nbsp;</td>
    <?php
      if (variable_get('proyectos_operativos_muestra_sa_cuantificacion', TRUE)) {
        print '<td align="center">&nbsp;' . strip_tags(drupal_render($content->content['field_proyecto_sa_cuantificacion'])) . '&nbsp;</td></tr>';
      }
    ?>
    </tr>
  <?php endif ?>

  <?php if ($so): ?>
    <tr><td colspan="2" align="center" ><h4><? print t('Situación Objetivo');?></h4></td></tr>
    <tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_so_descripcion']['field']['#title'];?>:</b>&nbsp;</td></tr>
    <tr><td colspan="2" align="justify"><?php print strip_tags(drupal_render($content->content['field_proyecto_so_descripcion']));?>&nbsp;</td></tr>
    <tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_tiempoi']['field']['#title'];?>:</b>&nbsp;</td></tr>
    <tr><td colspan="2" align="justify"><?php print strip_tags(drupal_render($content->content['field_proyecto_tiempoi']));?>&nbsp;</td></tr>
  <?php endif ?>
<?php endif ?>
<tr><td colspan="2" align="center" ><h3><? print t('Indicador del resultado del Proyecto');?></h3></td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_descripcion_bien']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="justify"><?php print strip_tags(drupal_render($content->content['field_proyecto_descripcion_bien']));?>&nbsp;</td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_unidadm']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="justify"><?php print strip_tags(drupal_render($content->content[$unidad_m]));?>&nbsp;</td></tr>
<tr><td colspan="2" align="center"><b><?php print $content->content['field_proyecto_meta_fisica']['field']['#title'];?>:</b>&nbsp;</td></tr>
<tr><td colspan="2" align="justify"><?php print strip_tags(drupal_render($content->content[$meta]), '<table><th><tbody><tr><td>');?>&nbsp;</td></tr>
<tr><td colspan="2" align="center" ><h3><? print t('Acciones Específicas');?></h3></td></tr>
<tr><td colspan="2" align="center" >
<?php print drupal_render($content->content['field_proyecto_accion_esp']); ?>
</td></tr>
</table>

<?php
/*
$unidad_m = module_exists('proyectos_reformulacion') ? 'proyectos_operativos_unidad_medida_reformulado' : 'field_proyecto_unidadm';
$meta = module_exists('proyectos_reformulacion') ? 'proyectos_operativos_meta_fisica_reformulado' : 'field_proyecto_meta_fisica';
<h3><?php print t('Indicador del resultado del Proyecto');?></h3>
<?php
  $arreglo = array(
    'field_proyecto_descripcion_bien' => 'field_proyecto_descripcion_bien',
    'field_proyecto_so_cuantificacion' => 'field_proyecto_so_cuantificacion',
    'field_proyecto_unidadm' => 'field_proyecto_unidadm',
    'field_proyecto_meta_fisica' => 'field_proyecto_meta_fisica',
  );
  if (module_exists('proyectos_reformulacion')) {
    $arreglo['field_proyecto_unidadm'] = 'proyectos_operativos_unidad_medida_reformulado';
    $arreglo['field_proyecto_meta_fisica'] = 'proyectos_operativos_meta_fisica_reformulado';
  }
?>
<?php foreach($arreglo as $campo): ?>
  <?php print drupal_render($content->content[$campo]); ?>
<?php endforeach ?>
<h3><?php print t('Acciones Específicas');?></h3>
<?php print drupal_render($content->content['field_proyecto_accion_esp']); ?>
*/?>
