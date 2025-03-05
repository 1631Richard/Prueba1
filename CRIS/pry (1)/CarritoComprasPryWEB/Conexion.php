<?php
class Conexion {
  private $cn=null;
  function conecta(){
   if($this->cn==null){
       $this->cn= mysqli_connect("localhost", "SAYREX", "SAYREX","pry_web");
   }   
   return $this->cn;   
  }
}
?>