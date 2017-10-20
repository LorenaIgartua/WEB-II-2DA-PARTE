<?php

class ConfigApp
{
  public static $ACTION = "action";
  public static $PARAMS = "params";
  public static $ACTIONS = [
      '' =>  'RisottoController#index',
      'home' =>  'RisottoController#home',
      'nosotros' =>  'RisottoController#nosotros',
      'menu' =>  'RisottoController#menu',
      'menuAdmin' =>  'MenuController#menuAdmin',
      'contacto' =>  'RisottoController#contacto',
      'iniciarSesion' =>  'LoginController#iniciarSesion',
      'verificarUsuario' =>  'LoginController#verificarUsuario',
      'cerrarSesion' => 'LoginController#cerrarSesion',
      'agregarPlato' => 'MenuController#agregarPlato',
      'agregarMenu' => 'MenuController#agregarMenu',
      'eliminarPlato' => 'MenuController#eliminarPlato',
      'eliminarMenu' => 'MenuController#eliminarMenu',
      'cargarPlato' => 'MenuController#cargarPlato', /// este es el que carga el formulario
      'cargarMenu' => 'MenuController#cargarMenu', /// este es el que carga el formulario
      'actualizarPlato' => 'MenuController#actualizarPlato',
      'actualizarMenu' => 'MenuController#actualizarMenu'
  ];
}

 ?>
