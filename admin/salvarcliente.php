<?php

//verificar se foi dado post
if ($_POST) {
    //se foi - salvar/alterar
    //recuperar os dados enviados
    $id = trim($_POST["id"]);
    $nome = trim($_POST["nome"]);
    $cpf = trim($_POST["cpf"]);
    $telefone = trim($_POST["telefone"]);
    $data = trim($_POST["data"]);
    $endereco = trim($_POST["endereco"]);
    $numero = trim($_POST["numero"]);

    //Para salvar o banco de dados com ANO-MES-DIA
    $data = explode("/", $data);
    $data = $data[2] . "-" . $data[1] . "-" . $data[0];

    //montar o sql para inserir ou atualizar
    if (empty($id)) {
        //inserir
        $sql = "insert into cliente values
			(NULL, ? , ? , ?, ? , ? , ?)";
        //NULL, nome, cpf, telefone
    } else {
        //atualizar
        $sql = "update cliente set nome = ?, cpf = ?, telefone = ?, data = ?, endereco = ?, numero = ?
			where id = ? limit 1";
    }
    //executar
    $consulta = $con->prepare($sql);
    //passar os parametros
    $consulta->bindParam(1, $nome);
    $consulta->bindParam(2, $cpf);
    $consulta->bindParam(3, $telefone);
    $consulta->bindParam(4, $data);
    $consulta->bindParam(5, $endereco);
    $consulta->bindParam(6, $numero);
    if (!empty($id))
        $consulta->bindParam(7, $id);
    //verificar se executa

    if ($consulta->execute()) {
        echo "<div class='alert alert-success'>Registro Salvo/Alterado com sucesso!</div>
            <div class = 'pull-right'>
                <a href = 'home.php?pg=listarcliente' class = 'btn btn-success' title = 'Listar'>
                    Visualizar a Lista Novamente
                </a>
            </div>";
    } else {
        echo "<div class='alert alert-block alert-danger'>Erro ao Salvar/Alterar</div>";
    }
} else {
    //se não foi - erro
    echo "<div class='alert alert-block alert-danger'>
		Erro ao acessar página</div>";
}