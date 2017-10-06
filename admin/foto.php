<?php
// recuperando os dados do id

$id = $_GET["id"];

$sql = "select * from foto where id = " . (int) $id . " limit 1";
$consulta = $con->prepare($sql);
$consulta->execute();
?>
<h1>Cadastrar Fotos</h1>

<div class="pull-right">
    <a href="home.php?pg=albuns"
       class="btn btn-damiana-roxo-a" 
       title="Novo Cadastro">
        Novo Cadastro de Álbum
    </a>
    <a href="home.php?pg=cadfoto"
       class="btn btn-damiana-roxo-a" 
       title="Novo Cadastro">
        Novo Cadastro de Fotos
    </a>
    <a href="home.php?pg=listaralbuns"
       class="btn btn-success" title="Listar">
        Visualizar Álbuns Cadastrados
    </a>

    <a href="home.php?pg=listarfotocatcliente"
       class="btn btn-damiana-vermelho-lista" title="Listar">
        Visualizar Fotos por Álbuns
    </a>    
    <a href="home.php?pg=listartodasfotos"
       class="btn btn-damiana-vermelho-lista" title="Listar Todas Fotos">
        Visualizar Todas as Fotos
    </a>
</div>
<table class="table table-bordered table-hover table-striped">
	<thead>
		<th style="text-align: center;" width="14%">Foto</th>
		<th style="text-align: center;" width="10%">Nome da Categoria</th>
		<th style="text-align: center;" width="10%">Nome do Cliente</th>
		<th style="text-align: center;" width="10%">Legenda</th>
		<th style="text-align: center;" width="10%">Data</th>
	</thead>

	<?php
	//listagem de categoria fotos
	$sql = "
		select *,
		f.id,
		c.nome categoria,
		p.id cliente,
		p.nome clientenome,
		f.foto,
		f.legenda,
		date_format(f.data,'%d/%m/%Y') data
		from albuns f
		inner join categoria c on (f.id_categoria = c.id) 
		inner join cliente p on (f.id_cliente = p.id)
                where f.id = $id
		order by f.data desc limit 1";
	$consulta = $con->prepare($sql);
	$consulta->execute();
	while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

		//recuperar os dados
		$id = $dados->id;
		$id_categoria = $dados->categoria;
		$id_cliente = $dados->cliente;
		$id_clientenome = $dados->clientenome;
		$foto = $dados->foto;
		$legenda = $dados->legenda;
		$data = $dados->data;

		// 123456 -> ../images/123456p.jpg
		$foto = "../images/galeria/".$foto."p.jpg";

		echo "<tr>
			<td>
				<img src='$foto' width='50%'>
			</td>
			<td>$id_categoria</td>
			<td>$id_clientenome</td>
			<td>$legenda</td>
			<td>$data</td>
		</tr>";


	}

	?>
	
</table>

    <?php
    // edição de dados
    $id = $id_albuns = $foto = $data = "";
    // verificando se foi enviado por get 
    if (isset($_GET["id"])) {
        $id = trim($_GET["id"]);
        //sql para selecionar tudo da tabela financeiro
        $sql = "select *,date_format(data,'%d/%m/%Y') data from foto where id_albuns = ? limit 1";
        $consulta = $con->prepare($sql);
        $consulta->bindParam(1, $id);
        $consulta->execute();
        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            // separando os dados
            
            $id_albuns = $dados->id_albuns;
            $foto = $dados->foto;
            $data = $dados->data;
            
        }
    }
     
    ?>

<form name="form1" method="post" action="home.php?pg=salvarfoto" enctype="multipart/form-data">
    <fieldset>
        <legend>
            * Campos obrigatórios
        </legend>

        

        <div class="row">
            <div class="col-lg-4">
                <label for="id_albuns" class="control-label">Albuns:</label>
                <section class="panel">
                    <div class="panel-body">
                       <input type="text" readonly name="id_albuns" value="<?=$id;?>" class="form-control">
                    </div>
                </section>
            </div>
          

            <div class="col-lg-5">
                <label for="control-label"> Foto/Imagem: </label>
                <section class="panel">
                    <div class="panel-body">
                        <input name="foto[]" type="file" multiple class="form-control" value="<?= $foto; ?>">
                        Selecione um arquivo JPG)
                    </div>
                </section>
            </div>
            
            <div class="col-lg-3">
                <label for="data" class="control-label">* Data da Publicação:</label>
                <section class="panel">
                    <div class="panel-body">
                        <input type="text"
                               name="data" required
                               data-validation-required-message="Preencha a data"
                               value="<?= $data; ?>"
                               class="form-control"
                               data-mask="99/99/9999">
                    </div>
                </section>
            </div>
        </div>

        <br>

        <button type="submit" class="btn btn-success">Salvar Dados</button>

    </fieldset>
    
    <?php
    /*
    // edição de dados
    $id = $id_albuns = $foto = $data = "";
    // verificando se foi enviado por get 
    if (isset($_GET["id"])) {
        $id = trim($_GET["id"]);
        //sql para selecionar tudo da tabela financeiro
        $sql = "select * from foto where id_albuns = ? limit 1";
        $consulta = $con->prepare($sql);
        $consulta->bindParam(1, $id);
        $consulta->execute();
        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            // separando os dados
            $id = $dados->id;
            $id_albuns = $dados->id_albuns;
            $foto = $dados->foto;
            $data = $dados->data;
            
            $foto = "../images/galeria/".$foto;
            
            echo "<img src='$foto'><br>"
                    . "<a href='excluirfoto.php?id=$id' class='btn btn-danger'>Deletar</a>"
               ;
        }
    }
     
     */
    ?>
