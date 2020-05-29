<?php
require_once './admin/classes/Anuncio.php';
require_once './admin/classes/Foto.php';

    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8"/>
            <title>Up Anúncios</title>
            <link rel="stylesheet" href="_css\estilo-teste.css"/>
            <link rel="stylesheet" href="_css\pesquisarCss.css"/>
            <link rel="stylesheet" href="_css\anuncioCss.css"/>

            <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
            <script>
                $(function () {
                    $('.thumbs img').click(function () {
                        var cover = $('.cover img');
                        var thumb = $(this).attr('src');

                        if (cover.attr('src') !== thumb) {
                            cover.fadeTo('200', '0', function () {
                                cover.attr('src', thumb);
                                cover.fadeTo('150', '1');

                            });
                            $('.thumbs img').removeClass('active');
                            $(this).addClass('active');
                        }
                    });
                });

            </script>


        </head>
        <body>
            <?php
            $anuncio = new Anuncio();
            $foto = new Foto();
            
if (isset($_GET['acao']) && $_GET['acao'] == 'ver') {          
            $id = (int) $_GET['id'];
            $stmt = $anuncio->find($id);
          
    $endereco = $stmt->rua . ' - ' . $stmt->bairro . '<br/> CEP: ' . $stmt->cep . '<br/>' . $stmt->zona . ' - ' . $stmt->cidade . ' - ' . $stmt->estado;
    $tel = $stmt->telefone . ' - ' . $stmt->celular;
            ?>
            <div id="banner">
                <img src="_imagens\logo.png" id="logo"/>
                <img src="_imagens\capa.jpg" id="centro"/>
            </div>
            <nav id="menu">
                <ul type="disc">
                    <li><a href="home.html">HOME</a></li>
                    <li><a href="sobre.html">SOBRE</a></li>
                    <li><a href="anunciar.php">ANUNCIAR</a></li>
                    <li><a href="pesquisar.php">PESQUISAR</a></li>
                    <li><a href="contato.html">CONTATO</a></li>
                </ul>
            </nav>
            <div id="interface">

                <div class="galeria">


                    <div class="cover">	
                        <img src="admin/img/<?php echo $stmt->bannerPrincipal?>" alt="[Anunciante]" title="Anunciante"/>
                    </div>

                    <div class="thumbs">
                        <img src="admin/img/<?php echo $stmt->bannerPrincipal?>" class="active" alt="[Anunciante - thumb]" title="Anunciante - thumb"/>
                        
                        <?php  foreach ($foto->getAlbum($id) as $key => $astmt):    ?>
                        <img src="admin/img/<?php echo $astmt->caminho?>" alt="[Anunciante - thumb]" width='200' title="Anunciante - thumb"/>
                        <?php   endforeach;     ?>
<!--                        <img src="_imagens\galeria\3.jpg" alt="[Anunciante - thumb]" title="Anunciante - thumb"/>
                        <img src="_imagens\galeria\4.jpg" alt="[Anunciante - thumb]" title="Anunciante - thumb"/>-->
                    </div>


                </div>

                <div id="descricao">

                    <div class="anuncio-nome">                                                     
                        <p class="nome-anuncio"> <?php echo $stmt->nomeEmpresa; ?> </p>
                        <p class="endereco-anuncio">  <?php echo $endereco; ?> </p>
                        <p class="telefone-anuncio">  <?php echo $tel; ?></p>


                    </div>
                    <p id="descricao-anuncio"> <?php echo $stmt->descricao; ?> </p>


                    <div id="footer-anuncio"> 
                        <img src="_imagens\android.jpg">
                        <p id="texto-rodape-anuncio">Cupons de desconto só </br>através do aplicativo!</p>
                    </div>
                </div>



                <div id="footer-geral">
                    <div id="footer-1">
                        <ul type="disc">
                            <li><a href="sobre.html">Sobre</a></li>
                            <li><a href="anunciar.php">Anunciar</a></li>
                            <li><a href="pesquisr.php">Pesquisar</a></li>
                            <li><a href="contato.html">Contato</a></li>
                        </ul>
                    </div>
                    <div id="footer-2">
                        <ul type="disc">
                            <li><a href="">Cupons</a></li>
                            <li><a href="">Seja um Vendedor</a></li>
                            <li><a href="">Parceiros</a></li>
                            <li><a href="http://www.youblisher.com/p/1789619-UP-Anuncios/" target="_blank">Revista Online</a></li>
                        </ul>
                    </div>
                    <div id="footer-3">
                        <figure class="foto-legenda">
                            <figcaption>Nos siga nas redes sociais!</figcaption>
                            <a href="https://www.instagram.com/up_anuncios/?hl=pt-br" target="_blank"><img src="_imagens\instagram-icon2.jpg"\></a>
                            <a href="https://www.facebook.com/fpm.upanuncios/" target="_blank"><img src="_imagens\facebook-icon.jpg"\></a>
                        </figure>
                        <div class="aplicativo">
                            <figcaption>Aplicativo</figcaption>
                            <a href=""><img src="_imagens\googleplay-banner.jpg" id="aplicativo"\></a>
                        </div>
                    </div>
                    <div class="footer-4">
                        <figure class="foto-legenda2">
                            <figcaption>Formas de pagamento:</figcaption>
                            <img src="_imagens\boleto-icon.jpg"\>
                            <img src="_imagens\caixa-icon.jpg"\>
                        </figure>
                    </div>
                </div>
            </div>
        <?php } ?>   
    </body>   	 
</html>