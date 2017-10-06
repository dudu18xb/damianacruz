<?php
// recuperando os dados do id

$id = $_GET["id"];

$sql = "select * from albuns where id = " . (int) $id . " limit 1";
$consulta = $con->prepare($sql);
$consulta->execute();
?>
<h1>Fotos do Álbum Selecionado</h1>

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
    <th width="10%" style="text-align: center;">Foto</th>
    <th style="text-align: center;" width="10%">Legenda do Álbum</th>
    <th style="text-align: center;" width="10%">Data</th>
    <th width="15%" style="text-align: center;">Opções</th>
</thead>

<?php
//listagem de categoria fotos
//$sql = "select *,date_format(data,'%d/%m/%Y') data from foto where id_albuns = ? order by data";
                $sql = "
                select 
                f.id id_foto,
                f.id_albuns id_albuns,
                f.foto foto,
                a.legenda legenda,
                date_format(a.data,'%d/%m/%Y') data_album
                from foto f
                inner join albuns a on (f.id_albuns = a.id)
                where id_albuns = ".(int)$id;
$consulta = $con->prepare($sql);
$consulta->bindParam(1, $id);
$consulta->execute();
while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
    // separando os dados
    $id = $dados->id_foto;
    $id_albuns = $dados->id_albuns;
    $foto = $dados->foto;
    $legenda = $dados->legenda;
    $data_album = $dados->data_album;

    // 123456 -> ../images/123456p.jpg
    //$foto = "../images/galeria/".$foto."p.jpg";
    //$foto = "../images/galeria/".$foto.".jpg";
    $foto = "../images/galeria/" . $foto;

    echo "<tr>
			<td>
				<img src='$foto' width='100%'>
			</td>
			<td>$legenda</td>
			<td>$data_album</td>
                        <td>
					<a 
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i> Excluir
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
            location.href = "home.php?pg=excluirfoto&id=" + id;
        }
    }
</script>