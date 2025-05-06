<?php
    include "sql.php";
    
    $sql = "SELECT * FROM alunos";

    $smt = $conexao->prepare($sql);
    
    $resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta do Cadastro</title>
    <link rel="icon" type="image/png" href="images/icons/art.png">
    <link rel="stylesheet" href="../styles.css">
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
</head>
<body>
    <header>
        <nav class="navegação">
            <ul>
                <li><a href="../index.html">🏡</a></li>
                <li><a href="insert.php">Cadastro</a></li>
                <li><a>Consulta</a></li>
            </ul>
        </nav>
    </header>

    <main class="conteúdo">
        <section class="principal">
            <h1>Consulta do Cadastro</h1>
            <div class="introdução">
                <table border=1>
                    <?php while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td>
                                <?php echo $linha["nome"]; ?>
                            </td>
                            <td>
                                <?php echo $linha["idade"]; ?>
                            </td>
                            <td>
                                <?php echo $linha["email"]; ?>           
                            </td>
                            <td>
                                <a href='delete.php?codigo=" . $linha["codigo"]  . "'>Excluir</a>
                            </td>
                            <td>
                                <a href='change.php?codigo=" . $linha["codigo"]  . "'>Alterar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <a href="../index.html" class="voltar-link">Voltar</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Gabriel. Todos os direitos reservados.</p>
    </footer>
</body>
</html>