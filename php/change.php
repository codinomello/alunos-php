<?php
    include "sql.php";

    $ra = $_REQUEST["ra"];
    $nome = $linha["nome"];
    $idade = $linha["idade"];
    $email = $linha["email"];

    $sql = "SELECT * FROM alunos WHERE ra = :ra";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':ra', $codigo);
    $stm->execute();
    $linha = $stm->fetch(PDO::FETCH_ASSOC);

    if (!$linha) {
        echo "<script>alert('Aluno procurado não existe!'); window.location.href='select.php';</script>";
        exit();
    }

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
                <li><a href="insert.php">Cadastro</a></li>
            </ul>
        </nav>
    </header>

    <main class="conteúdo">
        <section class="principal">
            <h1>Alteração de Cadastro</h1>
            <p>Modifique os dados do aluno abaixo</p>
        </section>

        <form name="formulário" method="post" action="change.php" class="introdução">
        <fieldset>
                <legend><h2 class="destaque">EDITAR DADOS</h2></legend>
                <div class="campo-formulário">
                    <label for="ra">RA</label>
                    <input type="number" max="999999999" name="ra" id="ra" required>
                </div>
                <div class="campo-formulário">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div class="campo-formulário">
                    <label for="idade">Idade</label>
                    <input type="number" name="idade" id="idade" required>
                </div>
                <div class="campo-formulário">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <button type="submit" value="gravar" class="enviar">Gravar</button>
            </fieldset>
        </form>
        <div>
            <a href="select.php" class="voltar-link" style="color: var(--accent2);">Consultar</a>
            <a href="../index.html" class="voltar-link" style="color: var(--highlight);">Voltar</a>
        </div>
    </main>
    

    <footer>
        <p>&copy; 2025 Gabriel. Todos os direitos reservados.</p>
    </footer>
</body>
</html>