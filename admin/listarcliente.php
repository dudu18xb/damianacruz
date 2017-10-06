<h1>Lista de Todos os Clientes</h1>

<div class="pull-right">
	<a href="home.php?pg=cliente"
	class="btn btn-primary" 
	title="Novo Cadastro">
		Novo Cadastro de Cliente
	</a>

	<a href="home.php?pg=listarcliente"
	class="btn btn-success" title="Listar">
		Visualizar Clientes Cadastrados
	</a>
</div>

<div class="clearfix"></div>
<form name="form1" method="get" class="form-inline">
    <label for="busca">Realizar Busca por Nome:</label>
    <input type="hidden" name="pg" value="listarcliente">
    <input type="text" name="busca" class="form-control">
    <input type="submit" class="btn btn-success" value="Pesquisar">
</form>
<br>
<div class="clearfix"></div>

<table class="table table-striped 
       table-hover table-bordered">
    <thead>
    <th style="text-align: center;">ID</th>
    <th style="text-align: center;">Nome do Cliente</th>
    <th style="text-align: center;">CPF</th>
    <th style="text-align: center;">Telefone</th>
    <th style="text-align: center;">Data Nascimento</th>
    <th style="text-align: center;">Endereço</th>
    <th style="text-align: center;">Numero</th>
    <th width="19%" style="text-align: center;" >Opções</th>
</thead>

<?php
$busca = "";
if (isset($_GET["busca"]))
    $busca = trim($_GET["busca"]);
//sql para selecionar as plataformas
$sql = "select id, nome, cpf, telefone, date_format(data,'%d/%m/%Y') data, endereco, numero from cliente where nome like :busca order by nome";
$consulta = $con->prepare($sql);
$busca = "%$busca%";
$consulta->bindParam(":busca", $busca, PDO::PARAM_STR);
//executo o sql
$consulta->execute();
//gerar os dados na tela
while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
    //separar os dados
    $id = $dados->id;
    $nome = $dados->nome;
    $cpf = $dados->cpf;
    $telefone = $dados->telefone;
    $data = $dados->data;
    $endereco = $dados->endereco;
    $numero = $dados->numero;

    //mostrar os dados na linha da tabela
    echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$cpf</td>
				<td>$telefone</td>
				<td>$data</td>
				<td>$endereco</td>
				<td>$numero</td>
				<td>
					<a 
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i> Excluir
					</a>
					<a href='home.php?pg=cliente&id=$id'
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
            location.href = "home.php?pg=excluircliente&id=" + id;
        }
    }
</script>