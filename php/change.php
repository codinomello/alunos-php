<?php
    include "sql.php" ;

    $codigo =  $_REQUEST["codigo"]  ;

    $sql = "SELECT * FROM alunos WHERE codigo = :codigo" ;
    $stm =  $conexao->prepare($sql);
    $stm->bindValue( ':codigo'  , $codigo ) ;

    $stm->execute() ;

    if( $linha = $stm->fetch(PDO::FETCH_ASSOC) ) {
        $nome  = $linha["nome"];
        $idade = $linha["idade"];
        $email = $linha["email"];
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
    <form name="form1" method="post" action="alterar.php">
        <p>Código:</p> 
        <input type="text" name="txtCodigo"  readonly  value="<?php echo $codigo;?>">
        <br>

        <p>Nome:</p>
        <input type="text" name="txtNome" value="<?php echo $nome;?>">
        <br>

        <p>Idade:</p> 
        <input type="text" name="txtIdade" value="<?php echo $idade;?>">
        <br>

        <p>Email:</p>
        <input type="text" name="txtEmail" value="<?php echo $email;?>"><br>

        <input type="submit" value="Alterar">
    </form>
    <?php
        } else{
            echo "Aluno procurado não existe!!!";
        }
    ?>
</body>
</html>