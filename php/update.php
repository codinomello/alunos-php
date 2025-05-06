<?php
    include "sql.php";

    $ra = $_REQUEST["ra"];
    $nome = $_REQUEST["nome"];
    $idade = $_REQUEST["idade"];
    $email = $_REQUEST["email"];

    $sql = "UPDATE alunos SET nome = :nome, idade = :idade, email = :email WHERE ra = :ra";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':idade', $idade);
    $stm->bindValue(':email', $email);
    $stm->bindValue(':ra', $ra);

    $resultado = $stm->execute();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cadastro</title>
    <link rel="icon" type="image/png" href="../images/icons/art.png">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <nav class="navegação">
            <ul>
                <li><a href="../index.html">🏡</a></li>
                <li><a href="select.php">Consulta</a></li>
                <li><a>Alteração</a></li>
            </ul>
        </nav>
    </header>

    <main class="conteúdo">
        <section class="principal">
            <h1>Status da Alteração</h1>
            <div class="introdução">
                <?php if ($resultado): ?>
                    <p class="destaque" style="color: var(--accent2);">Dados alterados com sucesso!</p>
                <?php else: ?>
                    <p class="destaque" style="color: var(--accent1);">Erro ao alterar dados</p>
                <?php endif; ?>
                <a href="select.php" class="voltar-link">Voltar para consulta</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Gabriel. Todos os direitos reservados.</p>
    </footer>
</body>
</html>