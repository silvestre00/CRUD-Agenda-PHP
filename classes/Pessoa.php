<?php

require_once 'Telefone.php';

class Pessoa {
    public $id;
    public $nome;
    public $cpf;
    public $rg;
    public $cep;
    public $logradouro;
    public $complemento;
    public $setor;
    public $cidade;
    public $uf;
    public $telefones = [];

    public function __construct($dados = []) {
        $this->id = (isset($dados['id']) && !empty($dados['id'])) ? $dados['id'] : uniqid();
        $this->nome = $dados['nome'] ?? "";
        $this->cpf = $dados['cpf'] ?? "";
        $this->rg = $dados['rg'] ?? "";
        $this->cep = $dados['cep'] ?? "";
        $this->logradouro = $dados['logradouro'] ?? "";
        $this->complemento = $dados['complemento'] ?? "";
        $this->setor = $dados['setor'] ?? "";
        $this->cidade = $dados['cidade'] ?? "";
        $this->uf = $dados['uf'] ?? "";
        
        if (isset($dados['telefones']) && is_array($dados['telefones'])) {
            foreach ($dados['telefones'] as $tel) {
                $this->telefones[] = new Telefone($tel['telefone'] ?? "", $tel['descricao'] ?? "");
            }
        }
    }

    public function toArray() {
        $telefonesArray = [];
        foreach ($this->telefones as $tel) {
            $telefonesArray[] = $tel->toArray();
        }

        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'cep' => $this->cep,
            'logradouro' => $this->logradouro,
            'complemento' => $this->complemento,
            'setor' => $this->setor,
            'cidade' => $this->cidade,
            'uf' => $this->uf,
            'telefones' => $telefonesArray
        ];
    }
}
