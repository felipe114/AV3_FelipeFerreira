<?php

namespace D\xampp2\htdocs\AV3_POO;

class Cliente{
    private ?int $idcliente;
    private string $nomecliente;
    private string $endereco;
    private string $telefone;

    public function __construct(?int $idcliente, string $nomecliente, string $endereco, string $telefone)
    {
        $this->idcliente = $idcliente;
        $this->nomecliente = $nomecliente;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    public function getidcliente(): ?int
    {
        return $this->idcliente;
    }
    public function getnomecliente(): string
    {
        return $this->nomecliente;
    }
    public function getendereco(): string
    {
        return $this->endereco;
    }
    public function gettelefone(): string
    {
        return $this->telefone;
    }
    public function setidcliente(int $idcliente): void
    {
        $this->idcliente = $idcliente;
    }
    public function setnomecliente(int $nomecliente): void
    {
        $this->nomecliente = $nomecliente;
    }
    public function setendereco(int $endereco): void
    {
        $this->endereco = $endereco;
    }
    public function settelefone(int $telefone): void
    {
        $this->telefone = $telefone;
    }
}