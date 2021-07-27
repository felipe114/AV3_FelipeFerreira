<?php

namespace D\xampp2\htdocs\AV3_POO;

class Produto{
    private ?int $idproduto;
    private string $nomeprod;
    private float $preco;

    public function __construct(?int $idproduto, string $nomeprod, float $preco)
    {
        $this->idproduto = $idproduto;
        $this->nomeprod = $nomeprod;
        $this->preco = $preco;
    }

    public function getidproduto(): ?int
    {
        return $this->idproduto;
    }
    public function getProduto(): string
    {
        return $this->nomeprod;
    }
    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setidproduto(int $id): void
    {
        $this->idproduto = $id;
    }
    public function setProduto(string $nomeprod): void
    {
        $this->nomeprod = $nomeprod;
    }
    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }
}