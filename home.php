<!-- CARROUSEL PRIMARIO COMEÇO -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $sql = "select * from banner order by titulo desc limit 3"; // buscando os banners do toogle
        $consulta = $con->prepare($sql);
        $consulta->execute();

        $ac = 0;
        $active = 'active';
        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "<li data-target='#myCarousel' data-slide-to='$ac' class='$active'></li>";
            $ac++;
            $active = '';
        }
        ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        <?php
        $sql = "select * from banner order by titulo desc limit 3"; // buscando os banners
        $consulta = $con->prepare($sql);
        $consulta->execute();
        $active = 'active';
        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            $id = $dados->id;
            $titulo = $dados->titulo;
            $texto = $dados->texto;
            $foto = $dados->foto;
            $foto = "images/carrosel/$foto";
            $foto = $foto . "g.jpg";
            echo "<div class='item $active'>
                <img src='$foto'>
                <div class='carousel-caption'>
                    <h3>$titulo</h3>
                    <p>$texto</p>    
                </div>
    </div>";
            $active = '';
        }
        ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
</div>
<!-- CARROUSEL PRIMARIO FINAL -->

<!-- CARROUSEL SECUNDARIO COMEÇO -->
<div style="margin:0px auto;">
    <div id="amazingcarousel-container-1">
        <div id="amazingcarousel-1" style="display:none;position:relative;width:100%;max-width:720px;margin:0px auto 0px;">
            <div class="amazingcarousel-list-container">
                <ul class="amazingcarousel-list">
                    <?php
                    $sql = "select
                            b.id,
                            b.foto,
                            b.foto_lightbox,
                            p.nome cliente,
                            b.legenda
                            from bannerengine b
                            inner join cliente p on (b.id_cliente = p.id)
                            order by p.nome desc limit 9"; // BUSCANDO TUDO DO BANNER SECUNDARIO
                    $consulta = $con->prepare($sql);
                    $consulta->execute();
                    while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                        $id = $dados->id;
                        $foto = $dados->foto;
                        $foto_lightbox = $dados->foto_lightbox;
                        $cliente = $dados->cliente;
                        $legenda = $dados->legenda;

                        $foto_lightbox = "images/carouselengine/$foto_lightbox";
                        $foto_lightbox = $foto_lightbox . "-lightbox.jpg";
                        $foto = "images/carouselengine/$foto";
                        $foto = $foto . ".jpg";

                        echo "<li class='amazingcarousel-item'>
                            <div class='amazingcarousel-item-container'>
                                    <div class='amazingcarousel-image'>
                                        <a href='$foto_lightbox' title='$legenda' class='html5lightbox' data-group='amazingcarousel-1'>
                                            <img src='$foto'  alt='$legenda'></a>
                                    </div>
                                <div class='amazingcarousel-title'>
                                $legenda
                                </div>
                            </div>
                            </li>";
                    }
                    ?>
                </ul>
                <div class="amazingcarousel-prev"></div>
                <div class="amazingcarousel-next"></div>
            </div>
            <div class="amazingcarousel-nav"></div>
            <div class="amazingcarousel-engine">
                <a href="http://amazingcarousel.com"></a>
            </div>
        </div>
    </div>
</div>
<!-- CAROUSEL DE final COMEÇO -->

<!-- fundo quase rodape -->
<div class="fundo-rodape">
    <div class="container">
        <!-- começo de agenda -->
        <div class="row">
            <div class="col-lg-4 responsivo-oeste agendahome">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-camera" style="color: #901010;font-size: 1.5em;"></i> Agenda Semanal
                        <div class="panel-body">
                            <?php
                            $sql = "select
                                    a.id,
                                    p.nome cliente,
                                    a.local,
                                    date_format(a.data,'%d/%m/%Y') data
                                    from agenda a
                                    inner join cliente p on (a.id_cliente = p.id)
                                    order by a.data desc limit 3"; // BUSCANDO TUDO DO BANNER SECUNDARIO
                            $consulta = $con->prepare($sql);
                            $consulta->execute();
                            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                $id = $dados->id;
                                $id_cliente = $dados->cliente;
                                $local = $dados->local;
                                $data = $dados->data;
                                echo "<div class='list-group'>
                                       <span class='pull-light'><i class='fa fa-user'></i> $id_cliente</span>
                                       <span class='pull-right'><i class='fa fa-map-marker'></i> $local</span><br><br>
                                       <span class='pull-right text-muted small'><i class='fa fa-calendar'></i><em>Data:$data</em></span>
                                        </div>
                                        <br>";
                            }
                            echo "<a href='?pg=agendasemanal' class='btn btn-default btn-damiana-black'><i class='fa fa-arrow-circle-o-right' aria-hidden='true' style='font-size: 1.5em;
    padding-right: 5px;'></i>Ver Mais</a>"
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- começo de noticias -->
            <div class="col-lg-8 responsivo-leste">
                <div class="start-box noticia-responsivo-home">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-left" style="border-bottom: 1px solid #ccc;"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Noticias</h1>
                            <div class="row">
                                <?php
                                $sql = "select *, date_format(data,'%d/%m/%Y') data from noticia n
                                    order by id desc limit 1"; // BUSCANDO TUDO DO BANNER SECUNDARIO
                                $consulta = $con->prepare($sql);
                                $consulta->execute();
                                while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                    $id = $dados->id;
                                    $titulo = $dados->titulo;
                                    $texto = $dados->texto;
                                    $data = $dados->data;
                                    $foto = $dados->foto;

                                    $foto = $foto . "p.jpg";
                                    
                                            $foto = "images/noticias/" . $foto;
                                    echo "<div class='col-sm-4'>
                                            <a href = '$foto' data-lightbox = 'example-set' data-title = '$titulo'>
                                                    <img src = '$foto' data-lightbox = 'example-set' data-title = '$titulo'>
                                            </a>
                                            <div class='item-overlay top'></div>
                                            </div>
                                          <div class='col-sm-8'>
                                    <h3>$titulo</h3>
                                    <div class='list-group'>
                                        <span><i class='fa fa-calendar'></i> $data</span>
                                        <br>
                                        <p>$texto</p>
                                    </div>
                                ";
                                    echo "<a href='?pg=noticias' class='btn btn-default btn-damiana-black' style='margin-top: 15px;'><i class='fa fa-arrow-circle-o-right' aria-hidden='true'style='font-size: 1.5em;
    padding-right: 5px;'></i>Ver Mais</a></div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fb-page" data-href="https://www.facebook.com/Damianacruzfotografia/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Damianacruzfotografia/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Damianacruzfotografia/">Damiana Cruz Fotografias</a></blockquote></div>
        </div>
    </div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102550894-1', 'auto');
  ga('send', 'pageview');

</script>