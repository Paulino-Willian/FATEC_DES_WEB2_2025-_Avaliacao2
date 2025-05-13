<?php

class DB
{
    private $pdo;
    private $tabela = 'produtos_artesanais';

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'artesanato_db';
        $user = 'root';
        $pass = '';

        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function conn()
    {
        return $this->pdo;
    }

    public function cadastrar($produto, $preco, $descricao, $categoria)
    {
        $sql = "INSERT INTO {$this->tabela} (nome_produto, preco, descricao, categoria)
                VALUES (:nome_produto, :preco, :descricao, :categoria)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome_produto', $produto);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':categoria', $categoria);
        return $stmt->execute();
    }

    public function listar()
    {
        $sql = "SELECT id, nome_produto, descricao, preco, categoria FROM {$this->tabela}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ID($id)
    {
        $sql = "SELECT id, nome_produto, descricao, preco, categoria FROM {$this->tabela} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM {$this->tabela} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function atualizar($id, $produto, $descricao, $preco, $categoria)
    {
        $sql = "UPDATE {$this->tabela} 
            SET produto = :produto, 
                descricao = :descricao, 
                preco = :preco, 
                categoria = :categoria 
            WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':produto', $produto);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':categoria', $categoria);
        return $stmt->execute();
    }
}