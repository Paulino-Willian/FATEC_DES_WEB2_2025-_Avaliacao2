<?php
require('classe/login.php');
$validador = new Login();
$validador->verificar_logado();
require_once 'classe/DB.php';


// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $preco = trim($_POST['preco'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');

    if (empty($nome) || empty($preco) || empty($descricao) || empty($categoria)) {
        $erro = "Todos os campos são obrigatórios.";
    } else {
        try {
            $db = new DB();
            $db->cadastrar($nome, $preco, $descricao, $categoria);
            $sucesso = "Produto cadastrado com sucesso!";
        } catch (Exception $e) {
            $erro = "Erro ao cadastrar produto: " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lojinha - Cadastro de Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6c63ff;
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        main {
            padding: 40px;
            max-width: 600px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            text-align: left;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #6c63ff;
            color: white;
            padding: 12px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #4e47d4;
        }

        .btn-voltar {
            text-align: center;
            margin-top: 20px;
        }

        .btn-voltar a {
            color: #6c63ff;
            text-decoration: none;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #777;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <header>
        <h1>Cadastro de Produtos da Lojinha</h1>
    </header>

    <main>
        <h2>Cadastrar Novo Produto</h2>
        <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <?php if (!empty($sucesso)) echo "<p style='color:green;'>$sucesso</p>"; ?>

        <form method="POST">
            <label for="produto">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>

            <label for="preco">Preço (R$):</label>
            <input type="number" id="preco" name="preco" step="0.01" required>

            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" required>

            <input type="submit" value="Cadastrar Produto">
        </form>

        <div class="btn-voltar">
            <p><a href="home.php">← Voltar ao Painel</a></p>
        </div>
    </main>

    <footer>
        &copy; 2025 Lojinha Artesanal - Fatec Araras
    </footer>
</body>
</html>
