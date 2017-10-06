<h1>Cadastro de Cliente</h1>

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
<?php
//edição dos dados
$id = $nome = $cpf = $telefone = $data = $endereco = $numero = "";
//verifica se foi enviado id por get
if (isset($_GET["id"])) {
    $id = trim($_GET["id"]);
    //sql para selecionar o clientes
    $sql = "select *, date_format(data,'%d/%m/%Y') data from cliente where id = ? limit 1";
    $consulta = $con->prepare($sql);
    $consulta->bindParam(1, $id);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);
    //separar os dados
    $id = $dados->id;
    $nome = $dados->nome;
    $cpf = $dados->cpf;
    $telefone = $dados->telefone;
    $data = $dados->data;
    $endereco = $dados->endereco;
    $numero = $dados->numero;
}

?>
<form name="form1" method="post" novalidate action="home.php?pg=salvarcliente" >
    <fieldset>
        <legend>* Campo obrigatório</legend>

        <input type="hidden" name="id"
               class="form-control" readonly
               value="<?= $id; ?>">
        <div class="row">
            <div class="col-lg-6">
                <div class="control-group">
                    <label for="nome" class="control-label">* Nome do cliente:</label>
                    <div class="controls">
                        <section class="panel">
                            <div class="panel-body">
                                <input type="text" required id="nome"
                                       name="nome" class="form-control"
                                       data-validation-required-message="Preencha o nome do Cliente"
                                       value="<?= $nome; ?>" placeholder="Preenche o Nome Completo do Cliente ex: João da Silva">
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 cpf">
                <div class="control-group">
                    <label for="cpf" class="control-label">* CPF</label>
                    <div class="controls">
                        <section class="panel">
                            <div class="panel-body">
                                <input type="text" name="cpf" id="cpf" required data-validation-required-message="Preencha o CPF do Cliente" class="form-control" value="<?= $cpf; ?>" data-mask="999.999.999-99" placeholder="Somente Números">
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="control-group">
                    <label for="data" class="control-label">* Data Nascimento:</label>
                    <div class="controls">
                        <section class="panel">
                            <div class="panel-body">
                                <input name="data" required
                                       data-validation-required-message="Preencha a Data de Nascimento"
                                       value="<?= $data; ?>"
                                       class="form-control"
                                       data-mask="99/99/9999" placeholder="Somente Números">
                            </div>
                        </section>
                    </div>
                </div>	               
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="control-group">
                    <label for="telefone" class="control-label">* Telefone:</label>
                    <div class="controls">
                        <section class="panel">
                            <div class="panel-body">
                                <input type="text" required
                                       name="telefone"
                                       class="form-control"
                                       data-validation-required-message="Preencha o Telefone do Cliente"
                                       value="<?= $telefone; ?>" data-mask="(99)9999-9999" placeholder="Somente Números">
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="control-group">
                    <label for="endereco" class="control-label">* Endereço:</label>
                    <div class="controls">
                        <section class="panel">
                            <div class="panel-body">
                                <input type="text" required
                                       name="endereco"
                                       class="form-control"
                                       data-validation-required-message="Preencha o Endereço do Cliente"
                                       value="<?= $endereco; ?>" placeholder="Descrição do Endereço">
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="control-group">
                    <label for="numero" class="control-label">Numero:</label>
                    <div class="controls">
                        <section class="panel">
                            <div class="panel-body">
                                <input type="int" required
                                       name="numero"
                                       class="form-control"
                                       data-validation-required-message="Preencha a data de nascimento"
                                       value="<?= $numero; ?>" placeholder="Número do Endereço">
                            </div>
                        </section>
                    </div>
                </div>
            </div>

    </fieldset>
    <button type="submit" class="btn btn-success">Salvar Dados</button>
</form>