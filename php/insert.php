<?php
    $nome = $_REQUEST["nome"];
    $idade = $_REQUEST["idade"];
    $email = $_REQUEST["email"];

    include "sql.php";
    
    $sql = "INSERT INTO alunos (nome, idade, email) VALUES (:nome, :idade, :email)";

    $smt = $conexao->prepare($sql);
    $smt->bindValue(':nome', $nome);
    $smt->bindValue(':idade', $idade);
    $smt->bindValue(':email', $email);
    
    $resultado = $smt->execute();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cadastro</title>
    <link rel="icon" type="image/png" href="images/icons/art.png">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <nav class="navegação">
            <ul>
                <li><a href="../index.html">🏡</a></li>
                <li><a>Cadastro</a></li>
            </ul>
        </nav>
    </header>

    <main class="conteúdo">
        <section class="principal">
            <h1>Resultado do Cadastro</h1>
            <div class="introdução">
                <?php if ($resultado): ?>
                    <p class="destaque">Dados inseridos com sucesso!</p>
                <?php else: ?>
                    <p class="destaque" style="color: var(--accent1);">Erro ao inserir dados</p>
                <?php endif; ?>
                <a href="../index.html" class="voltar-link">Voltar</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Gabriel. Todos os direitos reservados.</p>
    </footer>

    <style>
        .voltar-link {
            display: inline-block;
            margin-top: 1rem;
            color: var(--highlight);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border: 1px solid var(--extra3);
            border-radius: 4px;
            transition: color 0.3s ease, background-color 0.3s ease, transform 0.3s ease;
        }

        .voltar-link:hover {
            color: var(--hover);
            background-color: var(--extra2);
            transform: scale(1.05);
        }
    </style>
</body>
</html>