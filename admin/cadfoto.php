<h1>Cadastros de Fotos</h1>

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
        <legend>* Seleciona o Álbum para Cadastro de Fotos</legend>
    <th style="text-align: center;" width="14%">Foto</th>
    <th style="text-align: center;" width="10%">Nome da Categoria</th>
    <th style="text-align: center;" width="10%">Nome do Cliente</th>
    <th style="text-align: center;" width="10%">Legenda</th>
    <th style="text-align: center;" width="10%">Data</th>
    <th style="text-align: center;" width="15%">Opções</th>
</thead>

<?php
//listagem de categoria fotos
$sql = "
		select
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
		order by f.data desc";
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
    $foto = "../images/galeria/" . $foto . "p.jpg";

    echo "<tr>
			<td>
				<img src='$foto' width='100%'>
			</td>
			<td>$id_categoria</td>
			<td>$id_clientenome</td>
			<td>$legenda</td>
			<td>$data</td>
                        <td>
					<a href='home.php?pg=foto&id=$id'
					class='btn btn-damiana-roxo' title='Cadastrar'>
						<i class='glyphicon glyphicon-log-in'> Cadastrar</i>
					</a>
                        </td>
		</tr>";
}
?>

</table>
