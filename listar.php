<?php
require('classe/login.php');
require('classe/db.php');

$validador = new Login();
$validador->verificar_logado();

// Instancia a classe de banco de dados
$db = new DB(); // Supondo que a classe se chama DB
$produtos = $db->listar(); // Usa o método listar já existente
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lojinha - Produtos Cadastrados</title>
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
            max-width: 900px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #6c63ff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
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
    <h1>Produtos Cadastrados</h1>
</header>

<main>
    <h2>Lista de Produtos</h2>

    <?php if (!empty($produtos)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço (R$)</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= htmlspecialchars($produto['id']) ?></td>
                        <td><?= htmlspecialchars($produto['nome_produto']) ?></td>
                        <td><?= htmlspecialchars($produto['descricao']) ?></td>
                        <td><?= number_format($produto['preco'], 2, ',', '.') ?></td>
                        <td><?= htmlspecialchars($produto['categoria']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align:center;">Nenhum produto cadastrado.</p>
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
