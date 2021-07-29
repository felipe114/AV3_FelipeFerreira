<?php
    
    namespace D\xampp2\htdocs\AV3_POO;

    require_once "InterfaceCliente.php";
    require_once "cria_conexao.php";
    require_once "cliente.php";
    require_once "montarHTML.php";

    use D\xampp2\htdocs\AV3_POO\Cliente;
    use D\xampp2\htdocs\AV3_POO\InterfaceCliente;
    use D\xampp2\htdocs\AV3_POO\CriaConexao;
    use D\xampp2\htdocs\AV3_POO\montaHTML;
    use PDO;

    class DAORepositorioCliente implements InterfaceCliente
    {
        private PDO $conexao;
        
        public function __construct(PDO $conexao)
        {
            $this->conexao = $conexao;
        }
        
        public function todosClientes(): array
        {
            $sqlConsulta = "SELECT * FROM clientes";
            $stmt = $this->conexao->query($sqlConsulta);

            $criaHTML = new montaHTML();
            return $criaHTML->hidratarListaClientes($stmt);
        }
        
        public function salvar(Cliente $cliente): bool
        {
            if($cliente->getidcliente() === null){
                return $this->criaCliente($cliente);
            }

            return $this->updateCliente($cliente);
        }

        public function criaCliente(Cliente $cliente): bool
        {
            $sqlInsert = "INSERT INTO clientes (nome, endereco, telefone) VALUES (:nome, :endereco, :telefone);";
            $stmt = $this->conexao->prepare($sqlInsert);
            $stmt->bindValue(":nome", $cliente->getnomecliente(), PDO::PARAM_STR);
            $stmt->bindValue(":endereco", $cliente->getendereco(), PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $cliente->gettelefone(), PDO::PARAM_STR);
            $sucesso = $stmt->execute();
            
            if($sucesso){
                $cliente->setidcliente($this->conexao->lastInsertId());
            }

            return $sucesso;
        }

        public function lerCliente(Cliente $cliente): array
        {
            $sqlConsulta = "SELECT * FROM clientes WHERE idcliente = :id;";
            $stmt = $this->conexao->prepare($sqlConsulta);
            $stmt->bindValue(':id', $cliente->getidcliente(), PDO::PARAM_INT);
            $stmt->execute();

            $criaHTML = new montaHTML();
            return $criaHTML->hidratarListaClientes($stmt);

        }

        public function updateCliente(Cliente $cliente): bool
        {
            $sqlUpdate = "UPDATE clientes SET nome = :nome, endereco = :endereco, telefone = :telefone WHERE idcliente = :id;";
            $stmt = $this->conexao->prepare($sqlUpdate);
            $stmt->bindValue(':nome', $cliente->getnomecliente(), PDO::PARAM_STR);
            $stmt->bindValue(':endereco', $cliente->getendereco(), PDO::PARAM_STR);
            $stmt->bindValue(':telefone', $cliente->gettelefone(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $cliente->getidcliente(), PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function deletarCliente(Cliente $cliente): bool
        {
            $stmt = $this->conexao->prepare('DELETE FROM clientes WHERE idcliente = ?;');
            $stmt->bindValue(1, $cliente->getidcliente(), PDO::PARAM_INT);

            return $stmt->execute();
        }
    }


