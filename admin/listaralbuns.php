<h1>Visualizar Álbuns de Fotos</h1>

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

<table class="table table-striped table-hover table-bordered">
	<thead>
		<th style="text-align: center;" width="10%">Foto</th>
		<th style="text-align: center;" width="10%">Nome da Categoria</th>
		<th style="text-align: center;" width="10%">Nome do Cliente</th>
		<th style="text-align: center;" width="10%">Legenda</th>
		<th style="text-align: center;" width="10%">Data</th>
        <th width="15%" style="text-align: center;">Opções</th>
	</thead>

	<?php
	//listagem de categoria fotos
	$sql = "
		select
		f.id,
		c.nome,
		p.nome cliente,
		f.foto,
		f.legenda,
		date_format(f.data,'%d/%m/%Y') data
		from albuns f
		inner join categoria c on (f.id_categoria = c.id) 
		inner join cliente p on (f.id_cliente = p.id)
		order by f.id desc
		";
	$consulta = $con->prepare($sql);
	$consulta->execute();
	while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

		//recuperar os dados
		$id = $dados->id;
		$id_categoria = $dados->nome;
		$id_cliente = $dados->cliente;
		$foto = $dados->foto;
		$legenda = $dados->legenda;
		$data = $dados->data;

		// 123456 -> ../images/123456p.jpg
		$foto = "../images/galeria/".$foto."p.jpg";

		echo "<tr>
			<td>
                            <img src='$foto' width='100%'>
			</td>
			<td>$id_categoria</td>
			<td>$id_cliente</td>
			<td>$legenda</td>
			<td>$data</td>
                        <td>
					<a 
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i> Excluir
					</a>
					<a href='home.php?pg=albuns&id=$id'
					class='btn btn-primary'>
						<i class='glyphicon glyphicon-pencil'></i> Alterar
					</a>
                        </td>
		</tr>";


	}


	?>
	
</table>
<script type="text/javascript">
	function excluir(id) {
		if (confirm("Deseja mesmo excluir este registro?")) {
			//direcionar para a pagina de exclusão de dados
			location.href =	"home.php?pg=excluiralbuns&id="+id;
		}
	}
</script>