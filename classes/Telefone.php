<?php

class Telefone {
    public $telefone;
    public $descricao;

    public function __construct($telefone = "", $descricao = "") {
        $this->telefone = $telefone;
        $this->descricao = $descricao;
    }

    public function toArray() {
        return [
            'telefone' => $this->telefone,
            'descricao' => $this->descricao
        ];
    }
}
