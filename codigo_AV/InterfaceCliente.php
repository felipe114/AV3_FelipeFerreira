<?php

namespace D\xampp2\htdocs\AV3_POO;

use D\xampp2\htdocs\AV3_POO\Cliente;
use D\xampp2\htdocs\AV3_POO\montaHTML;

interface RepositorioCliente{
    public function todosClientes(): array;
    public function salvar(Cliente $cliente): bool;
    public function lerCliente(Cliente $cliente): array;
    public function deletarCliente(Cliente $cliente): bool;
}