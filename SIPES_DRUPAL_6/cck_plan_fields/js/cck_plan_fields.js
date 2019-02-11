 /**
  * Sistema Automatizado para la Planificación Estratégico-Situacional en la Administración Pública Venezolana
  * @file cck_plan_fields.js
  * Drupal part Module to code ente planificador module
  * Copyright 2013 Sistema Automatizado para la Planificación Estratégico-Situacional en la Administración Pública Venezolana (CENDITEL)
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
  * @date 2013-08-03 // (a&#241;o-mes-dia)
  * @version 0.2 // (0.2)
  *
  */

Drupal.behaviors.cckPlanFields = function (context) {
  $('.' + 'totales').attr('readonly', true);
}

function suma(clase) {
  var sum = 0;
  var i = 0;
  var valor = 0;
  $('.' + clase).each(function() {
        valor = parseFloat($(this).val().replace(/[.\s]/g, ''));
        if (valor < 0 || isNaN(valor) || !isFinite(valor)) {
          $(this).val(0);
          valor = 0;
        }
        sum += valor;
    });
  if (jQuery.isFunction($.number)) {
    sum = $.number(sum, 0, ',', '.');
  }
  $('.' + clase + '_total').val(sum);
}
