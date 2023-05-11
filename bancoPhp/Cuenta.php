<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Cuenta
 *
 * @author pc
 */
class Cuenta {

    public function __construct($numCta) {
        $this->numeroCuenta = $numCta;
    }
    
    private $numeroCuenta;
    private $nombreTitular;
    private $saldo;
    
    public function getNombreTitular() {
        return $this->nombreTitular;
    }
    
    public function consultar() {
        echo '<b>Número de cuenta:</b> '.$this->numeroCuenta;
        echo '<br/><b>Nombre del titular:</b> '.$this->nombreTitular;
        echo '<br/><b>Saldo:</b> $ '.$this->saldo;
    }
    
    public function consignar($monto){
        $this->saldo = $this->saldo + $monto;
    }
    
    public function retirar($monto){
        $this->saldo = $this->saldo - $monto;
    }
    
    public function transferir($monto,$cuenta){
        $this->saldo = $this->saldo - $monto;
        $cuenta->saldo = $cuenta->saldo + $monto;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setNombreTitular($nombreTitular): void {
        $this->nombreTitular = $nombreTitular;
    }

    public function setSaldo($saldo): void {
        $this->saldo = $saldo;
    }



}
