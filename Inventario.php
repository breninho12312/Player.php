<?php
require_once 'Item.php';

class Inventario {
    private $capacidadeMaxima;
    private $itens = [];
    private $tamanhoAtual = 0;

    public function __construct() {
        $this->capacidadeMaxima = 20;
    }

    public function adicionarItem(Item $item) {
        if ($this->tamanhoAtual + $item->getTamanho() <= $this->capacidadeMaxima) {
            $this->itens[] = $item;
            $this->tamanhoAtual += $item->getTamanho();
            return true;
        }
        return false;
    }

    public function removerItem($nome) {
        foreach ($this->itens as $key => $item) {
            if ($item->getNome() === $nome) {
                $this->tamanhoAtual -= $item->getTamanho();
                unset($this->itens[$key]);
                return true;
            }
        }
        return false;
    }

    public function getCapacidadeMaxima() {
        return $this->capacidadeMaxima;
    }

    public function setCapacidadeMaxima($capacidade) {
        $this->capacidadeMaxima = $capacidade;
    }

    public function aumentarCapacidade($nivel) {
        $this->capacidadeMaxima += $nivel * 3;
    }

    public function getItens() {
        return $this->itens;
    }

    public function setItens(array $itens) {
        $this->itens = $itens;
        $this->tamanhoAtual = array_sum(array_map(function($item) {
            return $item->getTamanho();
        }, $itens));
    }

    public function getTamanhoAtual() {
        return $this->tamanhoAtual;
    }

    public function setTamanhoAtual($tamanho) {
        $this->tamanhoAtual = $tamanho;
    }
}
?>