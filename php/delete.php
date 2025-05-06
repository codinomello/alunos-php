<?php
    include "sql.php";

    $ra = $_REQUEST["ra"];
    $sql = "DELETE FROM alunos where ra=:ra";
    $stm = $conexao->prepare($sql) ;
    $stm->bindValue( ':cod'  , $ra  ) ;

    $resultado = $stm->execute() ;

    if( $resultado ) {
        echo "<h2>Dados excluídos</h2>" ;
    }
    else{
        echo "<h2>Erro ao excluír</h2>" ;
    }

    echo "<br><br>" ;
    echo "<a href='select.php'>Voltar</a>"
?>