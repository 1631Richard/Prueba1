<?php
class Prestamo {
    private $cliente;
    private $importe;
    private $meses;
    public function __construct($cliente, $importe, $meses) {
        $this->cliente = $cliente;
        $this->importe = $importe;
        $this->meses = $meses;
    }
    public function interes() {
        return $this->importe * 0.02 * $this->meses;
    }
    public function saldo() {
        return $this->importe + $this->interes();
    }
    public function cuota() {
        return round( $this->saldo() / $this->meses,2);
    }
    public function getCliente() {
        return $this->cliente;
    }
    public function getImporte() {
        return $this->importe;
    }
    public function getMeses() {
        return $this->meses;
    }
}
$prestamo = new Prestamo("Luis Pérez", 1000, 12);
echo "Cliente: " . $prestamo->getCliente() . "<br>";
echo "Importe del Préstamo: S/" . $prestamo->getImporte() . "<br>";
echo "Meses de Pago: " . $prestamo->getMeses() . "<br>";
echo "Interés Total: S/" . $prestamo->interes() . "<br>";
echo "Saldo Total: S/" . $prestamo->saldo() . "<br>";
echo "Cuota Mensual: S/" . $prestamo->cuota() . "<br>";
?>
