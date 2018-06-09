<?php 
	class db{
		private $host= 'localhost';
		private $usuario= 'root';
		private $password= '';
		private $base = 'puntobol_web';

		public function conectar(){
			$conexion_mysql = "mysql:host=$this->host; dbname=$this->base";
			$conexionBD = new PDO($conexion_mysql, $this->usuario, $this->password);
			$conexionBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//esta linea arregla la codificacion de caracteres utf-8
			$conexionBD->exec("set names utf8");

			return $conexionBD;
		}
	}
?>