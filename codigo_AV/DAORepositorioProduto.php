<?php
    
    namespace D\xampp2\htdocs\AV3_POO;

    require_once "InterfaceProduto.php";
    require_once "cria_conexao.php";
    require_once "produto.php";
    require_once "montarHTML.php";

    use D\xampp2\htdocs\AV3_POO\Produto;
    use D\xampp2\htdocs\AV3_POO\InterfaceProdutos;
    use D\xampp2\htdocs\AV3_POO\CriaConexao;
    use D\xampp2\htdocs\AV3_POO\montaHTML;
    use PDO;

    class DAORepositorioProduto implements InterfaceProdutos
    {
        private PDO $conexao;
        
        public function __construct(PDO $conexao)
        {
            $this->conexao = $conexao;
        }
        
        public function todosProdutos(): array
        {
            $sqlConsulta = "SELECT * FROM produtos";
            $stmt = $this->conexao->query($sqlConsulta);

            $criaHTML = new montaHTML();
            return $criaHTML->hidratarListaProdutos($stmt);
        }
        
        public function salvar(Produto $produto): bool
        {
            if($produto->getIdProduto() === null){
                return $this->criaProduto($produto);
            }

            return $this->updateProduto($produto);
        }

        public function criaProduto(Produto $produto): bool
        {
            $sqlInsert = "INSERT INTO produtos (nome, preco) VALUES (:nome, :preco);";
            $stmt = $this->conexao->prepare($sqlInsert);
            $stmt->bindValue(":nome", $produto->getProduto(), PDO::PARAM_STR);
            $stmt->bindValue(":preco", $produto->getPreco(), PDO::PARAM_STR);
            $sucesso = $stmt->execute();
            
            if($sucesso){
                $produto->setIdProduto($this->conexao->lastInsertId());
            }

            return $sucesso;
        }

        public function lerProduto(Produto $produto): array
        {
            $sqlConsulta = "SELECT * FROM produtos WHERE idproduto = :id;";
            $stmt = $this->conexao->prepare($sqlConsulta);
            $stmt->bindValue(':id', $produto->getIdProduto(), PDO::PARAM_INT);
            $stmt->execute();

            $criaHTML = new montaHTML();
            return $criaHTML->hidratarListaProdutos($stmt);

        }

        public function updateProduto(Produto $produto): bool
        {
            $sqlUpdate = "UPDATE produtos SET nome = :nome, preco = :preco WHERE idproduto = :id;";
            $stmt = $this->conexao->prepare($sqlUpdate);
            $stmt->bindValue(':nome', $produto->getProduto(), PDO::PARAM_STR);
            $stmt->bindValue(':preco', $produto->getPreco(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $produto->getIdProduto(), PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function deletarProduto(Produto $produto): bool
        {
            $stmt = $this->conexao->prepare('DELETE FROM produtos WHERE idproduto = ?;');
            $stmt->bindValue(1, $produto->getIdProduto(), PDO::PARAM_INT);

            return $stmt->execute();
        }
    }
