<?php

if (isset($_GET["id"])) {
    // verifica se existe um banner engine cadastrado
    $id = trim($_GET["id"]);
    $sql = "select * from foto where id = ? limit 1";
    $consulta = $con->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);
    // separando os dados
    $id = $dados->id;
    $foto = $dados->foto;

    



    if (!empty($dados->foto)) {
        $sql = "delete from foto where id = ? limit 1";
        $consulta = $con->prepare($sql);
        $consulta->bindParam(1, $id);
        if ($consulta->execute()) {
            //executou
            echo "<div class='alert alert-success'>Registro Excluído com Sucesso
					</div>";
            unlink($foto = "../images/galeria/" . $foto);
        } else {
            //erro
            echo "<div class='alert alert-danger' style='text-align: center;'><p>Erro ao Excluir ".$consulta->errorInfo()[2]."</p><br><h3 style='text-align: center;'>Cliente tem Algum Cadastro Ativo !!!</h3></div>";
        }
        //incluir a listagem novamente
        include "listarfotocatcliente.php";
    } else {
        echo "<div class='alert alert-danger'>O registro não pode ser excluído pois existe "
        . " uma foto com esta categoria </div>";
    }
} else {
    echo "Erro ao excluir";
}