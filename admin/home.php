    
<?php
include "login.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Fotografia</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> <!-- para nao dar zoom -->
        <meta name="theme-color" content="#890606">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link href="images/icon.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css">
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">

        <!-- Style.css padrao do NiceAdmin -->
        <link rel="stylesheet" type="text/css" href="css/nicestyle.css">
        <link rel="stylesheet" type="text/css" href="css/style-responsive.css">
        <link rel="stylesheet" type="text/css" href="css/line-icons.css">
        <link rel="stylesheet" type="text/css" href="css/elegant-icons-style.css">

        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>
        <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="js/bootstrap-inputmask.min.js"></script>
        <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
        <script type="text/javascript">
            $(function () {
                // validando os campos
                $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            });
            $(function ()
            {
                //Executa a requisição quando o campo username perder o foco
                $('#cpf').blur(function ()
                {
                    var cpf = $('#cpf').val().replace(/[^0-9]/g, '').toString();

                    if (cpf.length == 11)
                    {
                        var v = [];

                        //Calcula o primeiro dígito de verificação.
                        v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
                        v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
                        v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
                        v[0] = v[0] % 11;
                        v[0] = v[0] % 10;

                        //Calcula o segundo dígito de verificação.
                        v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
                        v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
                        v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
                        v[1] = v[1] % 11;
                        v[1] = v[1] % 10;

                        //Retorna Verdadeiro se os dígitos de verificação são os esperados.
                        if ((v[0] != cpf[9]) || (v[1] != cpf[10]))
                        {
                            alert('CPF inválido: ' + cpf);

                            $('#cpf').val('');
                            $('#cpf').focus();
                        }
                    } else
                    {
                        //alert('CPF inválido:' + cpf);

                        $('#cpf').val('');
                        $('#cpf').focus();
                    }
                });
            });
        </script>


    </head>
    <body>
        <!-- container section start -->
        <section id="container" class="sidebar-on">

            <header class="navbar navbar-default navbar-fixed-top header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>

                <!--logo start-->
                <a href="home.php" class="logo"><img src="imgs/logo.png"></a>
                <ul class="nav navbar-nav responsivo-nav" style="display: none;">
                    <li class="eborder-top">
                        <i class="icon_profile"></i>
                        <span><?php echo $_SESSION["nome"]; ?></span>
                    </li>
                </ul>
                <!--logo end-->
                <div class="top-nav notification-row">                
                    <!-- notificatoin dropdown start-->
                    <!-- user login dropdown start-->
                    <div class="collapse navbar-collapse navbar-right" id="menu">
                        <ul class="nav navbar-nav">
                            <li class="eborder-top">
                                <i class="icon_profile"></i>
                                <span><?php echo $_SESSION["nome"]; ?></span>
                            </li>
                            <li class="eborder-top1">
                                <a href="sair.php">
                                    <button class="btn btn-primary btn-lg btn-block"><i class="icon_close_alt2"></i> Sair</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>      
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">                
                        <li>
                            <a class="" href="home.php">
                                <i class="icon_house_alt"></i>
                                <span>Home</span>
                            </a>
                        </li> 
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_document_alt"></i>
                                <span>Cadastros de Dados</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a class="" href="home.php?pg=agenda">
                                        <i class="icon_calendar"></i>
                                        <span>Agenda Semanal<span>
                                                </a>
                                                </li>                          
                                                <li>
                                                    <a class="" href="home.php?pg=cliente">
                                                        <i class="icon_profile"></i>
                                                        <span>Cliente<span>
                                                                </a>
                                                                </li>                                                  
                                                                <li>
                                                                    <a class="" href="home.php?pg=categoria">
                                                                        <i class="icon_folder-add"></i>
                                                                        <span>Categoria<span>
                                                                                </a>
                                                                                </li>                          
                                                                                <li>
                                                                                    <a class="" href="home.php?pg=financeiro">
                                                                                        <i class="icon_creditcard"></i>
                                                                                        <span>Financeiro</span>
                                                                                    </a>
                                                                                </li>                          
                                                                                <li>
                                                                                    <a class="" href="home.php?pg=formapagamento">
                                                                                        <i class="icon_cart"></i>
                                                                                        <span>Formas Pagamento</span>
                                                                                    </a>
                                                                                </li>                          
                                                                                <li>
                                                                                    <a class="" href="home.php?pg=noticias">
                                                                                        <i class="icon_toolbox"></i>
                                                                                        <span>Noticias</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="" href="home.php?pg=usuariosistema">
                                                                                        <i class="icon_profile"></i>
                                                                                        <span>Usuario do Sistema<span>
                                                                                                </a>
                                                                                                </li>  
                                                                                                </ul>
                                                                                                </li>
                                                                                                <li class="sub-menu">
                                                                                                    <a href="javascript:;" class="">
                                                                                                        <i class="icon_wallet_alt"></i>
                                                                                                        <span>Lista Cadastros</span>
                                                                                                        <span class="menu-arrow arrow_carrot-right"></span>
                                                                                                    </a>
                                                                                                    <ul class="sub">
                                                                                                        <li>
                                                                                                            <a class="" href="home.php?pg=listaragenda">
                                                                                                                <i class="icon_calendar"></i>
                                                                                                                <span>Agenda Semanal</span>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="" href="home.php?pg=listarcliente">
                                                                                                                <i class="icon_group"></i>
                                                                                                                <span>Clientes</span>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="" href="home.php?pg=listarcategoria">
                                                                                                                <i class="icon_folder-open"></i>
                                                                                                                <span>Categoria</span>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li><a class="" href="home.php?pg=listarfinanceiro">
                                                                                                                <i class="icon_creditcard"></i>
                                                                                                                <span>Financeiro</span>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="" href="home.php?pg=listarformapagamento">
                                                                                                                <i class="icon_cart"></i>
                                                                                                                <span>Formas Pagamento</span>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="" href="home.php?pg=listarnoticias">
                                                                                                                <i class="icon_toolbox"></i>
                                                                                                                <span>Notícias</span>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a class="" href="home.php?pg=listarusuariosistema">
                                                                                                                <i class="icon_group"></i>
                                                                                                                <span>Usuário do Sistema</span>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </li>
                                                                                                <li class="sub-menu">
                                                                                                    <a href="javascript:;" class="">
                                                                                                        <i class="icon_camera_alt"></i>
                                                                                                        <span>Cadastro Fotos</span>
                                                                                                        <span class="menu-arrow arrow_carrot-right"></span>
                                                                                                    </a>
                                                                                                    <ul class="sub">
                                                                                                        <li>
                                                                                                            <a class="" href="home.php?pg=albuns">
                                                                                                                <i class="icon_image"></i>
                                                                                                                <span>Álbum<span>
                                                                                                                        </a>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a class="" href="home.php?pg=cadfoto">
                                                                                                                                <i class="icon_images"></i>
                                                                                                                                <span>Fotos de Álbuns</span>
                                                                                                                            </a>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a class="" href="home.php?pg=banner">
                                                                                                                                <i class="icon_image"></i>
                                                                                                                                <span>Banner - Site</span>
                                                                                                                            </a>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a class="" href="home.php?pg=bannerengine">
                                                                                                                                <i class="icon_image"></i>
                                                                                                                                <span>Banner Engine</span>
                                                                                                                            </a>
                                                                                                                        </li>
                                                                                                                        </ul>
                                                                                                                        </li>
                                                                                                                        <li class="sub-menu">
                                                                                                                            <a href="javascript:;" class="">
                                                                                                                                <i class="icon_wallet_alt"></i>
                                                                                                                                <span>Lista Fotos</span>
                                                                                                                            </a>
                                                                                                                            <ul class="sub">
                                                                                                                                <li>
                                                                                                                                    <a class="" href="home.php?pg=listaralbuns">
                                                                                                                                        <i class="icon_image"></i>
                                                                                                                                        <span>Álbuns</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                <li>
                                                                                                                                    <a class="" href="home.php?pg=listarfotocatcliente">
                                                                                                                                        <i class="icon_images"></i>
                                                                                                                                        <span>Fotos por Álbuns</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                <li>
                                                                                                                                    <a class="" href="home.php?pg=listartodasfotos">
                                                                                                                                        <i class="icon_images"></i>
                                                                                                                                        <span>Todas as Fotos</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                <li><a class="" href="home.php?pg=listarbanner">
                                                                                                                                        <i class="icon_image"></i>
                                                                                                                                        <span>Banner - Site</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                <li>
                                                                                                                                    <a class="" href="home.php?pg=listarbannerengine">
                                                                                                                                        <i class="icon_image"></i>
                                                                                                                                        <span>Banner Engine</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                            </ul>
                                                                                                                        </li>
                                                                                                                        <li class="sub-menu">
                                                                                                                            <a href="javascript:;" class="">
                                                                                                                                <i class="icon_wallet_alt"></i>
                                                                                                                                <span>Solicitações do Site</span>
                                                                                                                                <span class="menu-arrow arrow_carrot-right"></span>
                                                                                                                            </a>
                                                                                                                            <ul class="sub">
                                                                                                                                <li>
                                                                                                                                    <a class="" href="home.php?pg=listarcontato">
                                                                                                                                        <i class="icon_contacts"></i>
                                                                                                                                        <span>Contato</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                <li>
                                                                                                                                    <a class="" href="home.php?pg=listarsoliciteorcamentos">
                                                                                                                                        <i class="icon_chat"></i>
                                                                                                                                        <span>Orçamentos</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                            </ul>
                                                                                                                        </li>

                                                                                                                        <li class="sub-menu sair-menu" style="display: none;">
                                                                                                                            <a href="sair.php" class="">
                                                                                                                                <i class="icon_close_alt2"></i>
                                                                                                                                <span>Sair</span>
                                                                                                                            </a>
                                                                                                                        </li> 
                                                                                                                        </ul>                                                                        <!-- sidebar menu end-->
                                                                                                                        </div>
                                                                                                                        </aside>
                                                                                                                        <!--sidebar end-->
                                                                                                                        <div class="well container" style="margin-top: 80px;">
                                                                                                                            <?php
                                                                                                                            //verificar a variavel pg
                                                                                                                            if (isset($_GET["pg"]))
                                                                                                                                $pg = trim($_GET["pg"]);
                                                                                                                            else
                                                                                                                                $pg = "inicio";
                                                                                                                            //incluir o .php no nome do arquivo
                                                                                                                            $pg = $pg . ".php";
                                                                                                                            //plataforma -> plataforma.php
                                                                                                                            //verificar se o arquivo existe
                                                                                                                            if (file_exists($pg))
                                                                                                                                include $pg;
                                                                                                                            else
                                                                                                                                include "erro.php";
                                                                                                                            ?>
                                                                                                                        </div>
                                                                                                                        </section>


                                                                                                                        <!-- javascripts -->
                                                                                                                        <script src="js/jquery.js"></script>
                                                                                                                        <script src="js/jquery-ui-1.10.4.min.js"></script>
                                                                                                                        <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
                                                                                                                        <!-- bootstrap -->
                                                                                                                        <script src="js/bootstrap.min.js"></script>
                                                                                                                        <!-- nice scroll -->
                                                                                                                        <script src="js/jquery.scrollTo.min.js"></script>
                                                                                                                        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
                                                                                                                        <!-- charts scripts -->
                                                                                                                        <script src="assets/jquery-knob/js/jquery.knob.js"></script>
                                                                                                                        <script src="js/jquery.sparkline.js" type="text/javascript"></script>
                                                                                                                        <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
                                                                                                                        <script src="js/owl.carousel.js" ></script>
                                                                                                                        <!-- jQuery full calendar -->
                                                                                                                        <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
                                                                                                                        <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
                                                                                                                        <!--script for this page only-->
                                                                                                                        <script src="js/calendar-custom.js"></script>
                                                                                                                        <script src="js/jquery.rateit.min.js"></script>
                                                                                                                        <!-- custom select -->
                                                                                                                        <script src="js/jquery.customSelect.min.js" ></script>
                                                                                                                        <script src="assets/chart-master/Chart.js"></script>

                                                                                                                        <!--custome script for all page-->
                                                                                                                        <script src="js/scripts.js"></script>
                                                                                                                        <!-- custom script for this page-->
                                                                                                                        <script src="js/sparkline-chart.js"></script>
                                                                                                                        <script src="js/easy-pie-chart.js"></script>
                                                                                                                        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
                                                                                                                        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
                                                                                                                        <script src="js/xcharts.min.js"></script>
                                                                                                                        <script src="js/jquery.autosize.min.js"></script>
                                                                                                                        <script src="js/jquery.placeholder.min.js"></script>
                                                                                                                        <script src="js/gdp-data.js"></script>	
                                                                                                                        <script src="js/morris.min.js"></script>
                                                                                                                        <script src="js/sparklines.js"></script>	
                                                                                                                        <script src="js/charts.js"></script>
                                                                                                                        <script src="js/jquery.slimscroll.min.js"></script>
                                                                                                                        <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>

                                                                                                                        </body>
                                                                                                                        </html>