<?php
require_once 'Inventario.php';

class Player {
    private $nome;
    private $nivel;
    private $inventario;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->nivel = 1;
        $this->inventario = new Inventario();
    }

    public function subirNivel() {
        $this->nivel++;
        $novaCapacidade = 20 + (3 * $this->nivel);
        $this->inventario = new Inventario($novaCapacidade);
    }
    
    public function getInventario() {
        return $this->inventario;
    }

    public function setInventario(Inventario $inventario) {
        $this->inventario = $inventario;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function coletarItem(Item $item) {
        return $this->inventario->adicionarItem($item);
    }

    public function soltarItem($nome) {
        return $this->inventario->removerItem($nome);
    }

    public function mostrarInventario() {
        return $this->inventario->listarItens();
    }
}
?>