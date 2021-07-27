<?php

require_once "cria_conexao.php";
require_once "produto.php";
require_once "cliente.php";
require_once "DAORepositorioProduto.php";
require_once "DAORepositorioCliente.php";

use D\xampp2\htdocs\AV3_POO\CriaConexao;
use D\xampp2\htdocs\AV3_POO\Produto;
use D\xampp2\htdocs\AV3_POO\Cliente;
use D\xampp2\htdocs\AV3_POO\DAORepositorioProduto;
use D\xampp2\htdocs\AV3_POO\DAORepositorioCliente;

echo "<pre>";

$repositorioP = new DAORepositorioProduto(CriaConexao::criarConexao());
var_dump($repositorioP);

$prod1 = new Produto(NULL, "Celular", 3000);
$prod2 = new Produto(NULL, "Notebook", 5000);
$prod3 = new Produto(NULL, "Monitor", 900);
$prod4 = new Produto(NULL, "Teclado", 380);
$prod5 = new Produto(NULL, "Mouse", 150);

/*
$repositorio->salvar($prod1);
$repositorio->salvar($prod2);
$repositorio->salvar($prod3);
$repositorio->salvar($prod4);
$repositorio->salvar($prod5);
*/
$repositorioP->todosProdutos();

$repositorioC = new DAORepositorioCliente(CriaConexao::criarConexao());

$cli1 = new Cliente(NULL, "Ana Oliveira", "Rua Das Nações 450", "47 992324576");
//$repositorioC->salvar($cli1);
$repositorioC->todosClientes();

echo "</pre>";


?>
