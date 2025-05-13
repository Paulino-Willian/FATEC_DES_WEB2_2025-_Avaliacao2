<?php
require('classe/login.php');
require('classe/db.php');

$validador = new Login();
$validador->verificar_logado();

$msg = '';

// Processa a exclusão se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    $db = new db();

    if ($db->deletar($id)) {
        $msg = "Produto com ID {$id} removido com sucesso.";
    } else {
        $msg = "Erro ao tentar remover o produto com ID {$id}. Verifique se ele existe.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lojinha - Remover Produto</title>
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
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ff4d4d;
            color: white;
            padding: 12px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #cc0000;
        }

        .mensagem {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }

        .btn-voltar {
            text-align: center;
            margin-top: 30px;
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
    <h1>Remover Produto</h1>
</header>

<main>
    <h2>Informe o ID do Produto para Remoção</h2>

    <form method="POST">
        <label for="id">ID do Produto:</label>
        <input type="number" name="id" id="id" required min="1">

        <input type="submit" value="Remover Produto">
    </form>

    <?php if ($msg): ?>
        <div class="mensagem"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <div class="btn-voltar">
        <p><a href="home.php">← Voltar ao Painel</a></p>
    </div>
</main>

<footer>
    &copy; 2025 Lojinha Artesanal - Fatec Araras
</footer>

</body>
</html>
