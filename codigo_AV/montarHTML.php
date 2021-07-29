<?php
    
    namespace D\xampp2\htdocs\AV3_POO;

    use D\xampp2\htdocs\AV3_POO\Produto;
    use D\xampp2\htdocs\AV3_POO\Cliente;
    use D\xampp2\htdocs\AV3_POO\DAORepositorioProduto;
    use PDO;


    class montaHTML{
        public function hidratarListaProdutos(\PDOStatement $stmt): array
            {
                $listaDadosProdutos = $stmt->fetchALL(PDO::FETCH_ASSOC);
                $listaProdutos = [];

                echo "<table>";
                foreach($listaDadosProdutos as $dadosProduto){
                    $listaProdutos[] = new Produto(
                        $dadosProduto['idproduto'],
                        $dadosProduto['nome'],
                        $dadosProduto['preco'],
                    );
                    echo "
                    <tr>
                        <td width='20'>
                            {$dadosProduto['idproduto']}
                        </td>
                        <td width='150'>
                            {$dadosProduto['nome']}
                        </td>
                        <td align='right'>
                            ".number_format($dadosProduto['preco'], 2, ',', '.')."
                        </td>
                    </tr>";
                }
                echo "</table>";

                return $listaProdutos;
            }

            public function hidratarListaClientes(\PDOStatement $stmt): array
            {
                $listaDadosClientes = $stmt->fetchALL(PDO::FETCH_ASSOC);
                $listaClientes = [];

                echo "<table>";
                foreach($listaDadosClientes as $dadosCliente){
                    $listaClientes[] = new Cliente(
                        $dadosCliente['idcliente'],
                        $dadosCliente['nome'],
                        $dadosCliente['endereco'],
                        $dadosCliente['telefone'],
                    );
                    echo "
                    <tr>
                        <td width='20'>
                            {$dadosCliente['idcliente']}
                        </td>
                        <td width='150'>
                            {$dadosCliente['nome']}
                        </td>
                        <td width='280'>
                            {$dadosCliente['endereco']}
                        </td>
                        <td align='right'>
                            {$dadosCliente['telefone']}
                        </td>
                    </tr>";
                }
                echo "</table>";

                return $listaClientes;
            }
        }

