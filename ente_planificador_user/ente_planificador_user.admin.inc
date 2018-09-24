<?php
  /**
  * Modulo para la gestión de los entes planificadores
  * Sistema Automatizado para la Planificación Estratégico-Situacional en la Administración Pública Venezolana
  * @file ente_planificador.module
  * Drupal part Module to code ente planificador module
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
  * @author Cenditel Mérida TSU- Miguel Angel Narvaez Montilva
  * @see http://www.cenditel.gob.ve/
  * @see http://planificacion.cenditel.gob.ve/
  */


/*
 * Implementation of hook_form()
 */
function ente_planificador_user_admin_settings_form($form, &$form_state) {
  $form['description'] = array(
    '#type' => 'item',
    '#title' => t('List of views to manage in the system to the link //administrar_usuarios, recomende configuration views: Consultar listado de usuarios. and type of view: page.'),
  );

  $options = array();
  $views_list_user = views_get_all_views();
  foreach ($views_list_user as $view){
    $options[$view->name] = $view->human_name;
  }
  // form of select the list of views 
  $form['ente_planificador_user_views_list'] = array(
    '#type'             => 'select',
    '#default_value'    => variable_get('ente_planificador_user_views_list', 'consultar_listado_de_usuarios'),
    '#required'         =>TRUE,
    '#title'            => t('selected the views.'),
    '#options'          => $options,
    '#description'      => t('List of available views '),
    '#ajax' => array(
      'callback' => 'ente_planificador_user_views_ajax_display', 
      'wrapper' => 'display-container-views', 
      'effect' => 'fade',
      'event' => 'change',
      'method' => 'replace',
    ),
  );

  $form['views_container'] = array(
    '#type' => 'container', 
    '#prefix' => '<div id="display-container-views">',
    '#suffix' => '</div>',
  );

  if (isset($form_state['values']['ente_planificador_user_views_list']) || (variable_get('ente_planificador_user_views_list', NULL))){

    $name = (isset($form_state['values']['ente_planificador_user_views_list'])) ? $form_state['values']['ente_planificador_user_views_list'] : variable_get('ente_planificador_user_views_list', 'consultar_listado_de_usuarios');
    //$name = $form_state['values']['views'];
    $view =  views_get_view($name, 0);
    foreach ($view->display as $key => $display){
      $options_display[$key] = $display->display_title;
    }

    $form['views_container']['ente_planificador_user_display_views'] = array(
      '#type'  => 'select',
      '#required'  =>TRUE,
      '#title'  => t('selected the type of view.'),
      '#default_value'  => variable_get('ente_planificador_user_display_views', 'page'),//call the value of form for system_settings_form 
      '#options'  => $options_display,
      '#description'  => t('List of available types of views'),
    );
  }
  $form = system_settings_form($form);//autosave information of the form.
  return $form;
}

/*
 * Implementation of function ente_planificador_user_views_ajax_display   
 */ 
function ente_planificador_user_views_ajax_display($form, &$form_state) {
  return $form['views_container'];
}