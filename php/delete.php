<?php
    include "sql.php" ;

    $codigo = $_REQUEST["codigo"] ;

    $sql = "DELETE FROM alunos where codigo=:cod"  ;

    $stm = $conexao->prepare($sql) ;
    $stm->bindValue( ':cod'  , $codigo  ) ;

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
