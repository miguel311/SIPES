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

/**
 * Implements hook_views_default_views().
 */
function ente_planificador_views_default_views() {

$view = new view();
$view->name = 'consultar_listado_de_usuarios';
$view->description = '';
$view->tag = 'default';
$view->base_table = 'users';
$view->human_name = 'Consultar Listado de Usuarios';
$view->core = 7;
$view->api_version = '3.0';
$view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

/* Display: Master */
$handler = $view->new_display('default', 'Master', 'default');
$handler->display->display_options['title'] = 'Consultar Listado de Usuarios';
$handler->display->display_options['use_more_always'] = FALSE;
$handler->display->display_options['access']['type'] = 'perm';
$handler->display->display_options['access']['perm'] = 'access user profiles';
$handler->display->display_options['cache']['type'] = 'none';
$handler->display->display_options['query']['type'] = 'views_query';
$handler->display->display_options['exposed_form']['type'] = 'basic';
$handler->display->display_options['pager']['type'] = 'some';
$handler->display->display_options['pager']['options']['items_per_page'] = '10';
$handler->display->display_options['style_plugin'] = 'table';
/* Field: User: Name */
$handler->display->display_options['fields']['name']['id'] = 'name';
$handler->display->display_options['fields']['name']['table'] = 'users';
$handler->display->display_options['fields']['name']['field'] = 'name';
$handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
$handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
/* Sort criterion: User: Created date */
$handler->display->display_options['sorts']['created']['id'] = 'created';
$handler->display->display_options['sorts']['created']['table'] = 'users';
$handler->display->display_options['sorts']['created']['field'] = 'created';
$handler->display->display_options['sorts']['created']['order'] = 'DESC';
/* Filter criterion: User: Active */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'users';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = '1';
$handler->display->display_options['filters']['status']['group'] = 1;
$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

/* Display: Page */
$handler = $view->new_display('page', 'Page', 'page');
$handler->display->display_options['defaults']['fields'] = FALSE;
/* Field: User: Name */
$handler->display->display_options['fields']['name']['id'] = 'name';
$handler->display->display_options['fields']['name']['table'] = 'users';
$handler->display->display_options['fields']['name']['field'] = 'name';
$handler->display->display_options['fields']['name']['label'] = 'Nombre de Usuario';
$handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
$handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
/* Field: User: Nombre de usuario */
$handler->display->display_options['fields']['field_ente_user_nombre']['id'] = 'field_ente_user_nombre';
$handler->display->display_options['fields']['field_ente_user_nombre']['table'] = 'field_data_field_ente_user_nombre';
$handler->display->display_options['fields']['field_ente_user_nombre']['field'] = 'field_ente_user_nombre';
$handler->display->display_options['fields']['field_ente_user_nombre']['label'] = 'Nombres';
/* Field: User: Apellido de usuario */
$handler->display->display_options['fields']['field_ente_user_apellido']['id'] = 'field_ente_user_apellido';
$handler->display->display_options['fields']['field_ente_user_apellido']['table'] = 'field_data_field_ente_user_apellido';
$handler->display->display_options['fields']['field_ente_user_apellido']['field'] = 'field_ente_user_apellido';
$handler->display->display_options['fields']['field_ente_user_apellido']['label'] = 'Apellidos';
/* Field: User: Cedula de identidad de usuario */
$handler->display->display_options['fields']['field_ente_user_cedula']['id'] = 'field_ente_user_cedula';
$handler->display->display_options['fields']['field_ente_user_cedula']['table'] = 'field_data_field_ente_user_cedula';
$handler->display->display_options['fields']['field_ente_user_cedula']['field'] = 'field_ente_user_cedula';
$handler->display->display_options['fields']['field_ente_user_cedula']['label'] = 'Cédula de Identidad';
/* Field: User: Ente Planificador */
$handler->display->display_options['fields']['field_enteplanificador_user']['id'] = 'field_enteplanificador_user';
$handler->display->display_options['fields']['field_enteplanificador_user']['table'] = 'field_data_field_enteplanificador_user';
$handler->display->display_options['fields']['field_enteplanificador_user']['field'] = 'field_enteplanificador_user';
$handler->display->display_options['fields']['field_enteplanificador_user']['settings'] = array(
  'bypass_access' => 0,
  'link' => 1,
);
/* Field: User: Link */
$handler->display->display_options['fields']['view_user']['id'] = 'view_user';
$handler->display->display_options['fields']['view_user']['table'] = 'users';
$handler->display->display_options['fields']['view_user']['field'] = 'view_user';
$handler->display->display_options['fields']['view_user']['label'] = 'Consultar';
$handler->display->display_options['fields']['view_user']['alter']['alter_text'] = TRUE;
$handler->display->display_options['fields']['view_user']['alter']['text'] = 'Consultar';
/* Field: User: Edit link */
$handler->display->display_options['fields']['edit_node']['id'] = 'edit_node';
$handler->display->display_options['fields']['edit_node']['table'] = 'users';
$handler->display->display_options['fields']['edit_node']['field'] = 'edit_node';
$handler->display->display_options['fields']['edit_node']['label'] = 'Modificar';
$handler->display->display_options['fields']['edit_node']['alter']['alter_text'] = TRUE;
$handler->display->display_options['fields']['edit_node']['alter']['text'] = 'Modificar';
/* Field: User: Cancel link */
$handler->display->display_options['fields']['cancel_node']['id'] = 'cancel_node';
$handler->display->display_options['fields']['cancel_node']['table'] = 'users';
$handler->display->display_options['fields']['cancel_node']['field'] = 'cancel_node';
$handler->display->display_options['fields']['cancel_node']['label'] = 'Eliminar';
$handler->display->display_options['fields']['cancel_node']['alter']['alter_text'] = TRUE;
$handler->display->display_options['fields']['cancel_node']['alter']['text'] = 'Eliminar';
$handler->display->display_options['defaults']['filter_groups'] = FALSE;
$handler->display->display_options['defaults']['filters'] = FALSE;
/* Filter criterion: User: Active */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'users';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = '1';
$handler->display->display_options['filters']['status']['group'] = 1;
$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
/* Filter criterion: User: Ente Planificador (field_enteplanificador_user) */
$handler->display->display_options['filters']['field_enteplanificador_user_target_id']['id'] = 'field_enteplanificador_user_target_id';
$handler->display->display_options['filters']['field_enteplanificador_user_target_id']['table'] = 'field_data_field_enteplanificador_user';
$handler->display->display_options['filters']['field_enteplanificador_user_target_id']['field'] = 'field_enteplanificador_user_target_id';
$handler->display->display_options['filters']['field_enteplanificador_user_target_id']['operator'] = 'not empty';
$handler->display->display_options['filters']['field_enteplanificador_user_target_id']['expose']['operator_id'] = 'field_enteplanificador_user_target_id_op';
$handler->display->display_options['filters']['field_enteplanificador_user_target_id']['expose']['label'] = 'Ente Planificador (field_enteplanificador_user)';
$handler->display->display_options['filters']['field_enteplanificador_user_target_id']['expose']['operator'] = 'field_enteplanificador_user_target_id_op';
$handler->display->display_options['filters']['field_enteplanificador_user_target_id']['expose']['identifier'] = 'field_enteplanificador_user_target_id';
$handler->display->display_options['path'] = 'administrar_usuarios';

$views[$view->name] = $view;
return $views;
}