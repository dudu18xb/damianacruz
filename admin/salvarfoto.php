<?php

if ($_POST) {
    // recuperando os dados da categorias fotos

    $id_albuns = trim($_POST["id_albuns"]);
    $data = trim($_POST["data"]);



    //Para salvar o banco de dados com ANO-MES-DIA
    $data = explode("/", $data);
    $data = $data[2] . "-" . $data[1] . "-" . $data[0];

    // Obtém quantidade enviada. Perceba que é verificado se foi fornecido um número inteiro,
    // caso contrário é usada uma quantidade padrão, 5.
    $quantidade = (isset($_POST["quantidade"]) && is_int(intval($_POST["quantidade"]))) ? (int) $_POST["quantidade"] : 10;


    // Pasta de destino das fotos
    $destino = "../images/galeria/";
    // Obtém dados do upload

    $conta = 0;

    // Itera sobre as enviadas e processa as validações e upload
    for ($i = 0; $i < sizeof($_FILES["foto"]); $i++) {
        // Passa valores da iteração atual
        if (isset($_FILES["foto"]["name"][$i])) {
            $nome = $_FILES["foto"]["name"][$i];
            $tamanho = $_FILES["foto"]["size"][$i];
            $tipo = $_FILES["foto"]["type"][$i];
            $tmpname = $_FILES["foto"]["tmp_name"][$i];

            // Verifica se tem arquivo enviado
            if ($tamanho > 0 && strlen($nome) > 1) {
                //gerando caracteres especiais
                $aleatorio = rand(5, 10); // 5 À 10 CARACTERES
                $nome = substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtUuVvYyXxWwZz0123456789"), 0, $aleatorio) .".jpg";
                
                // Verifica se é uma imagem
                if (preg_match("/^image\/(gif|jpeg|jpg|png)$/", $tipo)) {

                    // Caminho completo de destino da foto
                    $caminho = $destino . $nome;

                    // Tudo OK! Move o upload!
                    if (move_uploaded_file($tmpname, $caminho)) {
                        echo "<p class='alert alert-success'>foto #" . ($i + 1) . " enviada.<br/></p>";
                        // Faz contagem de enviada com sucesso
                    } else { // Erro no envio
                        // $i+1 porque $i começa em zero
                        echo "<p class='alert alert-danger'>Não foi possível enviar a foto #" . ($i + 1) . "<br/></p>";
                    }
                }
                // se vai inserir ou atualizar
                if (empty($id)) {
                    // se for realmente inserir
                    $sql = "insert into foto (id,id_albuns,foto,data) values (NULL, '$id_albuns','$nome','$data')";
                } else {
                    // para fazer um update
                    $sql = " update foto set
                                id_albuns = '$id_albuns',
                                foto = '$nome',
                                data = '$data'
                                where id = $id limit 1";
                }
                //echo $sql;  //testando para ver
                // gravar no banco de dados
                $consulta = $con->prepare($sql);
                $conta++;
                if (!$consulta->execute()) {
                    // se deu algum errro
                    echo "<div class='alert alert-danger'>Erro ao Salvar</div>";
                }
            }
        }
    }
    if ($conta) { // Imagens foram enviadas, ok!
        echo "<p class='alert alert-success'><br/>Foi enviada(s) " . $conta . " foto(s).</p>
                <div class = 'pull-right'>
                    <a href = 'home.php?pg=listarfotocatcliente' class = 'btn btn-success' title = 'Listar'>
                Visualizar a Lista Novamente
                 </a>
        </div > ";
    } else { // Nenhuma imagem enviada, faz alguma ação
        echo "<p class='alert alert-danger'>Não Foi Enviado Fotos!</p>";
    }
} // else do POST
else {
    echo "<div class='alert alert-danger'>Erro ao realizar o cadastro!</div>";
}
