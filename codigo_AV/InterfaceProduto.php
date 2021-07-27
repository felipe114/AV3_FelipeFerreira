<?php

namespace D\xampp2\htdocs\AV3_POO;

use D\xampp2\htdocs\AV3_POO\Produto;
use D\xampp2\htdocs\AV3_POO\montaHTML;

interface RepositorioProdutos{
    public function todosProdutos(): array;
    public function salvar(Produto $produto): bool;
    public function createProduto(Produto $produto): bool;
    public function lerProduto(Produto $produto): array;
    public function updateProduto(Produto $produto): bool;
    public function deletarProduto(Produto $produto): bool;
}