<?php
    include "sql.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ra = $_REQUEST["ra"];
        $nome = $_REQUEST["nome"];
        $idade = $_REQUEST["idade"];
        $email = $_REQUEST["email"];
        
        $sql = "INSERT INTO alunos (ra, nome, idade, email) VALUES (:ra, :nome, :idade, :email)";
        $smt = $conexao->prepare($sql);
        $smt->bindValue(':ra', $nome);
        $smt->bindValue(':nome', $nome);
        $smt->bindValue(':idade', $idade);
        $smt->bindValue(':email', $email);
        
        $resultado = $smt->execute();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status do Cadastro</title>
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
            <h1>Status do Cadastro</h1>
            <div class="introdução">
                <?php if ($resultado): ?>
                    <p class="destaque">Dados inseridos com sucesso!</p>
                <?php else: ?>
                    <p class="destaque" style="color: var(--accent1);">Erro ao inserir dados</p>
                <?php endif; ?>
                <div>
                    <a href="select.php" class="voltar-link" style="color: var(--accent2);">Consultar</a>
                    <a href="../index.html" class="voltar-link" style="color: var(--highlight);">Voltar</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Gabriel. Todos os direitos reservados.</p>
    </footer>
</body>
</html>