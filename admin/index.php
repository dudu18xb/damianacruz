<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Gerenciameno</title>
        <meta charset="utf-8">
        <meta name="theme-color" content="#a60000"> <!-- MUDANDO A COR DA URL NA VERSAO MOBILE -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> <!-- para nao dar zoom -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css">
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <link href="images/icon.png" rel="shortcut icon">

        <script type="text/javascript" src="js/jquery-3.2.1.min"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-inputmask.min.js"></script>
        <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
        <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="js/npm.js"></script>
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/nicestyle.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />

        <script>
            $(function () {
                $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            });
        </script>
    </head>
    <body class="login-img3-body">

        <div class="container-login">

            <form name="login" method="post" action="verificar.php" novalidate class="login-form">       
                <div class="login-wrap">
                    <p class="login-img"><img src="images/logodamiana.png"></i></p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input type="text" name="login" required
                               data-validation-required-message="Digite o Login"
                               class="form-control" placeholder="Digite seu login" autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" name="senha" required
                               data-validation-required-message="Digite sua senha"
                               class="form-control" placeholder="Digite sua senha" autofocus>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Logar</button>
                </div>
            </form>

    </body>

</html>