<?php
//recuperar a variavel pg que indica qual pagina ira abrir
$pg = "home";

//verificar se esta sendo enviado um pg por GET
if (isset($_GET["pg"])) {
    //trim - retirar espaços em branco
    $pg = trim($_GET["pg"]);
}

//incluir o arquivo do banco de dados
include "conecta.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Damiana Cruz Fotografias</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> <!-- para nao dar zoom -->
        <meta name="description" content="Damiana Cruz - Fotografias, Xambrê - PR">
        <meta content= "Damiana Cruz Fotografias, xambre" name="description">
        <meta name="description" content="Sistema de Fotografias Online, Fotografa de Xambrê, Aniversários, Batizados, Eventos e Festas">
        <meta name="theme-color" content="#a60000"> <!-- MUDANDO A COR DA URL NA VERSAO MOBILE -->
        <meta name="keyword" content="Damiana Cruz Fotografias, Fotos Online,Fotografias Xambre, fotografa de perola, Casa branca">
        <link href="images/icon.png" rel="shortcut icon"> <!-- ADICIONANDO UM MINI ICONE NO NAVEGADOR -->
        <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- MEU ESTILO PESSOAL DO CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!-- BOOTSTRAP-->
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> <!-- FONTE AWESOME-->
        <link rel="stylesheet" type="text/css" href="css/lightbox.css"> <!-- PLUGIN PARA VISUALIZAR A FOTO MAIOR  -->
        <link rel="stylesheet" type="text/css" href="css/responsivo.css"> <!-- qaue faz o Responsivo  -->
        <link rel="stylesheet" type="text/css" href="css/component.css"> <!-- qaue faz o Responsivo  -->
        <link rel="stylesheet" type="text/css" href="css/elegant-icons-style.css"> <!-- qaue faz o Responsivo  -->
        <script src="js/jquery-3.2.1.min.js"></script> <!-- Jquery-->
        <script type="text/javascript" src="js/lightbox2-master/dist/js/lightbox-plus-jquery.min.js"></script>
        <script src="js/lightbox.js"></script><!-- JS PARA VISUALIZAR A FOTO MAIOR  -->
        <script src="js/jquery.min.js"></script> <!-- BOOTSTRAP-->
        <script src="js/bootstrap.min.js"></script> <!-- BOOTSTRAP-->
        <script src="carouselengine/jquery.js"></script> <!-- CARROUSEL MENOR ONDE VISUALIZA 3 FOTOS -->
        <script src="carouselengine/amazingcarousel.js"></script> <!-- CARROUSEL MENOR ONDE VISUALIZA 3 FOTOS -->
        <link rel="stylesheet" type="text/css" href="carouselengine/initcarousel-1.css"> <!-- CARROUSEL MENOR ONDE VISUALIZA 3 FOTOS -->
        <script src="carouselengine/initcarousel-1.js"></script> <!-- CARROUSEL MENOR ONDE VISUALIZA 3 FOTOS -->
        <script src="js/jquery.timeago.js"></script> <!-- PLUGIN CSS DE NEWS WIDGET -->
        <script src="js/modernizr.custom.js"></script> <!-- PLUGIN CSS DE NEWS WIDGET -->
        <script src="js/component.js"></script> <!-- PLUGIN CSS DE NEWS WIDGET -->
        <script src="js/bootstrap-inputmask.min.js"></script> <!-- PLUGIN CSS DE NEWS WIDGET -->
        <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
        <script type="text/javascript">
            $(function () {
                $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            });

        </script>
        <script type="text/javascript">
            function valida_form() {
                var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                if (!filter.test(document.getElementById("email").value)) {
                    alert('Por favor, digite o email corretamente');
                    document.getElementById("email").focus();
                    return false;
                }
            }
        </script>
        <meta name="google-site-verification" content="jSv__ejWqan3wY9yflchK7NGMOk-XuUvMS9MVQ_FG4Y" />
    </head>
    <body>
        <!-- rede social -->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Damiana Cruz - Fotografias</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo-responsivo" href="#"><img src="images/logo2.png"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse iconefonte" id="menu">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>HOME</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-list" aria-hidden="true"></i>CATEGORIA  <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                //$sql = "select * from categoria order by nome";
                                $sql = "select * from categoria where id <> '11' order by nome";

                                $consulta = $con->prepare($sql);
                                // execute o sql
                                $consulta->execute();
                                while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                    // separa os dados
                                    $id = $dados->id;
                                    $nome = $dados->nome;
                                    echo "<li><a href='?pg=categoria&id=$id'>$nome</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a href="?pg=orcamento"><i class="fa fa-credit-card" aria-hidden="true"></i>SOLICITE ORÇAMENTO</a></li>
                        <li><a href="?pg=sobrenos"><i class="fa fa-users" aria-hidden="true"></i>SOBRE NÓS</a></li>
                        <li><a href="?pg=buscadefotos"><i class="fa fa-search" aria-hidden="true"></i>BUSCAR FOTOS</a></li>
                        <li><a href="?pg=contato"><i class="fa fa-envelope-o" aria-hidden="true"></i>CONTATO</a></li>

                    </ul>

                </div><!--/.nav-collapse -->
            </div>

        </nav>

        <div id="container" class="container container-mobile">
            <div class="header">
                <div class="logo">
                    <a href="index.php">
                        <img class="imglogo" src="images/logodamiana.png">
                    </a>
                </div>
                <nav class="navdireita" id="menu">
                    <ul>
                        <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>HOME</a></li>
                        <li><a><i class="fa fa-list" aria-hidden="true"></i>CATEGORIA</a>
                            <ul>
                                <?php
                                //$sql = "select * from categoria order by nome"; //upper(nome)
                                $sql = "select * from categoria where id <> '11' order by nome";
                                $consulta = $con->prepare($sql);
                                // execute o sql
                                $consulta->execute();
                                while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                    // separa os dados
                                    $id = $dados->id;
                                    $nome = $dados->nome;
                                    echo "<li><a href='?pg=categoria&id=$id'>$nome</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a href="?pg=orcamento"><i class="fa fa-credit-card" aria-hidden="true"></i>SOLICITE ORÇAMENTO</a></li>
                    </ul>
                </nav>
                <nav class="navesquerda" id="menu">
                    <ul><li><a href="?pg=sobrenos"><i class="fa fa-users" aria-hidden="true"></i>SOBRE NÓS</a></li></ul>
                    <ul>
                        <li><a href="?pg=buscadefotos"><i class="fa fa-search" aria-hidden="true"></i>BUSCAR FOTOS</a></li>
                    </ul>

                    <ul>
                        <li><a href="?pg=contato"><i class="fa fa-envelope-o" aria-hidden="true"></i>CONTATO</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <main>
            <?php
            //configurar a página - home -> home.php
            $pg = $pg . ".php";
            //verificar se o arquivo existe
            if (file_exists($pg)) {
                //se existir incluir o arquivo
                include $pg;
            } else {
                //incluir o arquivo de erro
                include "erro.php";
            }
            ?>

        </main>
        <!-- RODAPE -->
        <footer class="rodape-centro">
            <div class="container rodape1" style="margin-bottom: 10px;">
                <ul class="rodape-fundo">
                    <h1 class="text-center" style="color: #ffffff;">Categorias</h1>
                    <?php
                    $sql = "select * from categoria where id <> '11' order by nome"; //upper(nome)
                    $consulta = $con->prepare($sql);
                    // execute o sql
                    $consulta->execute();
                    while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                        // separa os dados
                        $id = $dados->id;
                        $nome = $dados->nome;
                        echo "<li><a href='?pg=categoria&id=$id' style='text-align: left;'><i class='fa fa-list' aria-hidden='true'></i> $nome</a></li>";
                    }
                    ?>

                </ul>
                <ul class="rodape-fundo">
                    <h1 class="text-center" style="color: #ffffff;">Menus</h1>
                    <li><a href="?pg=orcamento" style="text-align: left;"><i class="fa fa-credit-card" aria-hidden="true"></i> SOLICITE ORÇAMENTO</a></li>
                    <li><a href="?pg=sobrenos" style="text-align: left;"><i class="fa fa-users" aria-hidden="true"></i> SOBRE NOS</a></li>
                    <li><a href="?pg=buscadefotos" style="text-align: left;"><i class="fa fa-search" aria-hidden="true"></i> BUSCAR FOTOS</a></li>
                    <li><a href="?pg=agendasemanal" style="text-align: left;"><i class="fa fa-calendar" aria-hidden="true"></i> AGENDA SEMANAL</a></li>
                    <li><a href="?pg=noticias" style="text-align: left;"><i class="fa fa-newspaper-o" aria-hidden="true"></i> NOTICIAS</a></li>
                </ul>
                <ul class="rodape-fundo">
                    <li><a href="http://www.damianacruz.com.br/admin/index.php"><i class="fa fa-folder" aria-hidden="true"></i> PAINEL ADMIN</a></li>
                </ul>
                <!--
                <div class="desenvolvedor">
                    <div class="dentro-logo">
                        <a href="#"><img src="images/desenvolvedor.png"></a>
                    </div>
                </div>
                -->
                <div class="redes-sociais">
                    <ul class="rede-social-group">
                        <li>
                            <a href="#" style="width: 50%;float: right;"><i class="fa fa-whatsapp" aria-hidden="true"></i> (44) 9 9108-5366</a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Damianacruzfotografia/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <!-- 
                        <li>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li> -->
                    </ul>
                </div>
                <!--
                <div class="centro-direitos text-center">
                    <p class="text-center">Damiana Cruz Fotografias - Todos os Direitos Reservados</p>
                </div>
                -->
            </div>
            <div class="container-footer-final">
                <p class="text-center">Damiana Cruz Fotografias - Todos os Direitos Reservados v.1.2</p>
                <br>
                <div class="dentro-logo">
                    <a href="https://www.facebook.com/dudu18xb"><img src="images/icone.png"></a>
                </div>
            </div>
        </footer>
        <!-- PLUGIN RESPONSAVEL PELA SETA -->
        <script src="js/botao.js"></script>


    </body>
</html>
<script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-102550894-1', 'auto');
            ga('send', 'pageview');

</script>
