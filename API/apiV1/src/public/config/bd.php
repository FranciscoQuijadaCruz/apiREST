<?php
  /**
   * 
   */
  class db
  {
  	//Variables de configuracion
  	private $host = "localhost";
  	private $user = "root";
  	private $pass = "fcoquijadacruz";
  	private $db = "apiv1";

  	//Metodo de conexion
  	public function conectar(){
  		$conexion_mysql = "mysql:host=$this->host;dbname=$this->db";
  		$conexionBD = new PDO($conexion_mysql,$this->user,$this->pass);

  		$conexionBD->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  		//pones codificacion de caracteres a utf-8
  		$conexionBD->exec("set names utf8");

  		return $conexionBD;
  	}
  }

?>