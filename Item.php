<?php

class Item {
    private $nome;
    private $tamanho;

    public function __construct($nome, $tamanho) {
        $this->nome = $nome;
        $this->tamanho = $tamanho;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getTamanho() {
        return $this->tamanho;
    }

    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }
}
