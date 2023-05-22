<?php
     require 'config.php';
     require 'verificar.php';
    require 'admin.php';


     $blogpost = [];
     $id_post = filter_input(INPUT_GET, 'id_post');
     if($id_post){
         $sql = $pdo->prepare("SELECT *FROM posts WHERE id_post = :id_post");
         $sql->bindValue(':id_post', $id_post);
         $sql->execute();
     
             $post = $pdo->prepare("SELECT *FROM posts, usuarios WHERE posts.postador = usuarios.id AND id_post = :id_post");
             $post->bindValue(':id_post', $id_post);
             $post->execute();
     
             if($post->rowCount() > 0){
                 $blogpost = $post->fetchALL(PDO::FETCH_ASSOC);
             }else{
                 echo "<script>alert('Nenhum post encontado')</script>";
                 echo "<script>window.location = 'blog.php'</script>";
             }
         }else{
            header("location:blog.php");
         }

         $comentarios = [];
            if($id_post){
                $sql = $pdo->prepare("SELECT *FROM comentarios, posts, usuarios WHERE comentarios.cod_post = posts.id_post AND comentarios.comentador = usuarios.id AND id_post = :id_post");
                $sql->bindValue(':id_post', $id_post);
                $sql->execute();
                    if($sql->rowCount() > 0){
                        if (!empty($_GET['search'])){
                            $comentarios = [];
                            $data = $_GET['search'];
                            $sql = $pdo->prepare("SELECT *FROM comentarios, posts, usuarios WHERE comentarios.cod_post = posts.id_post AND comentarios.comentador = usuarios.id AND id_post = :id_post AND (pnome LIKE '%$data%' or comentario LIKE '%$data%') order by id_post DESC limit 6");
                            $sql->bindValue(':id_post', $id_post);
                            $sql->execute();
                            if($sql->rowCount() > 0){
                                $comentarios = $sql->fetchALL(PDO::FETCH_ASSOC);
                            }else{
                                echo "<script>alert('Nenhum Resultado encontado')</script>";
                                echo "<script>window.location = 'blogpost.php?id_post=$id_post'</script>";
                            }
                        }else{
                            $sql = $pdo->prepare("SELECT *FROM comentarios, posts, usuarios WHERE comentarios.cod_post = posts.id_post AND comentarios.comentador = usuarios.id AND id_post = :id_post");
                            $sql->bindValue(':id_post', $id_post);
                            $sql->execute();
                            if($sql->rowCount() > 0){
                                $comentarios = $sql->fetchALL(PDO::FETCH_ASSOC);
                            }
                        }
                    }
                }else{
                header("location:blog.php");
                }

    $categorias = [];
    $cat = $pdo->query("SELECT *FROM livros_categorias");
    if($cat->rowCount() > 0){
        $categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
    }
    $antigos = [];
    $livl = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria DESC limit 3");
    if($livl->rowCount() > 0){
        $antigos = $livl->fetchALL(PDO::FETCH_ASSOC);
    }

    $novos = [];
    $livl = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria limit 3");
    if($livl->rowCount() > 0){
        $novos = $livl->fetchALL(PDO::FETCH_ASSOC);
    }

    $destaques = [];
    $destaques = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria DESC limit 6");
    if($destaques->rowCount() > 0){
        $desta = $destaques->fetchALL(PDO::FETCH_ASSOC);
    }
    $livros = [];
    $liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria DESC limit 8");
    if($liv->rowCount() > 0){
        $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
    }
    $listapost = [];
    $posts = $pdo->query("SELECT *FROM posts order by id_post DESC limit 3");
    if($posts->rowCount() > 0){
        $listapost = $posts->fetchALL(PDO::FETCH_ASSOC);
    }
    $news = [];
    $new = $pdo->query("SELECT *FROM posts order by id_post DESC limit 3");
    if($new->rowCount() > 0){
        $news = $new->fetchALL(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./img/wind.png" type="image/x-icon"/>
    <title>Blog</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/adicionais.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="home.php"><img src="img/loongoka.png" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/lingua.png" alt="">
                <div>Português</div>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="home.php">INÍCIO</a></li>
                <li><a href="./atodoslivros.php">LIVROS</a></li>
                <li><a href="#">SOBRE</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./aplataforma.php">A PLATAFORMA</a></li>
                        <li><a href="./atermos.php">TERMOS DE USO</a></li>
                        <li><a href="./apoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                        <li><a href="./acontactos.php">CONTACTOS</a></li>
                    </ul>
                </li>
                <li class="active"><a href="./blog.php">BLOG</a></li>
                <li><a href="./ajogos.php">PASSATEMPOS</a></li>
                <li><a href="painel/views/dashboard.php" style="color: black;">Painel</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>loongoka@gmail.com</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>loongoka@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__language">
                                <img src="img/lingua.png" alt="">
                            </div>
                            <div class="header__top__right__language">
                                <a href="painel/views/dashboard.php" style="color: black;">Painel</a>
                            </div>
                            <div class="header__top__right__language">
                                <a href="painel/views/meuperfil.php" style="color:black;"><i class="fa fa-user"></i>&nbsp;&nbsp;Meu Perfil</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="logout.php"><i class="fa fa-sign-out"></i>LOGOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./home.php"><img src="img/loongoka.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="home.php">INÍCIO</a></li>
                            <li><a href="./atodoslivros.php">LIVROS</a></li>
                            <li><a href="#">SOBRE</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./aplataforma.php">A PLATAFORMA</a></li>
                                    <li><a href="./atermos.php">TERMOS DE USO</a></li>
                                    <li><a href="./apoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                                    <li><a href="./acontactos.php">CONTACTOS</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="./blog.php">BLOG</a></li>
                            <li><a href="./ajogos.php">PASSATEMPOS</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
    <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Todas categorias</span>
                        </div>
                        <ul>
                            <li><a href="atodoslivros.php">Todas Categorias</a></li>
                            <?php foreach($categorias as $listagem): ?>
                            <li><a href="acategorias.php?id_categoria=<?=$listagem['id_categoria'];?>"><?php echo $listagem['nome_categoria'];?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <div>
                                <div style="width: 30%;
	                                    float: left;ont-size: 16px;color: #1c1c1c;ont-weight: 700;padding-left: 18px;padding-top: 11px; position: relative;" class="hero__search__categories">
                                    <b>Comentários</b> 
                                    <span style="position: absolute;right: 14px;top: 14px;" class="arrow_carrot-down"></span>
                                </div>
                                <input style="width: 70%;border: none;height: 48px;font-size: 16px;color: #b2b2b2;padding-left: 20px;" type="search" id="pesquisar_l" placeholder="O que você procura?">
                                <button style="position: absolute;right: 0;top: -1px;height: 50px;" onclick="searchLivros()" class="site-btn">PESQUISAR</button>
                            </div>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+244 939.248.383</h5>
                                <span>Atendimento 24/7 horas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="img/breadcrumb.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2 style="color: #ff9300;"><b>Postagem</b></h2>
                        <ul>
                            <?php foreach($blogpost as $postagem): ?>
                            <li style="color: #ff9300;"><b>Post feito por: <?=$postagem['pnome'];?>&nbsp;&nbsp;<?=$postagem['unome'];?></b></li>
                            <li style="color: #ff9300;"><b><?=$postagem['data_post'];?></b></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
    <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <h4>Recentes</h4>
                            <div class="blog__sidebar__recent">
                                <?php foreach($news as $postagem): ?>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img style="height: 70px; width: 70px;" src="painel/views/post_upload/<?php echo $postagem['img_post']?>" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6><?=$postagem['titulo_post'];?></h6>
                                        <span><?=$postagem['data_post'];?></span>
                                    </div>
                                </a>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach($blogpost as $postagem): ?>
                    <div class="col-lg-8 col-md-7 order-md-1 order-1">
                        <div class="blog__details__text">
                            <img style="height: 500px; width: 500px;" src="painel/views/post_upload/<?php echo $postagem['img_post']?>" alt="">
                            <h3><?=$postagem['titulo_post'];?></h3>
                            <p><?=$postagem['post'];?></p>
                        </div>
                        <div class="blog__details__content">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="blog__details__author">
                                        <div class="blog__details__author__pic">
                                        <img src="../views/Painel/views/img_upload/<?php echo $consulta['imagem_perfil']?>" alt="aaa" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="blog__details__author__text">
                                            <h6><?php echo $consulta['pnome']?>&nbsp;&nbsp;<?php echo $consulta['unome']?></h6>
                                            <span><?php echo $consulta['estado']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <?php
                                        $cod_post = filter_input(INPUT_POST, 'cod_post');
                                        $comentador = filter_input(INPUT_POST, 'comentador');
                                        $comentario = filter_input(INPUT_POST, 'comentario');

                                        if (isset($_POST['postar'])) {
                                            if ($cod_post && $comentador && $comentario) {
                                                $sql = $pdo->prepare("INSERT INTO comentarios (cod_post, comentador, comentario) VALUES(:cod_post, :comentador, :comentario)");
                                                $sql->bindValue(':cod_post', $cod_post);
                                                $sql->bindValue(':comentador', $comentador);
                                                $sql->bindValue(':comentario', $comentario);
                                                $sql->execute();
                                                
                                                echo "<script>alert('O comentário foi publicado!')</script>";
                                                echo "<script>window.open('blogpost.php?id_post=$postagem[id_post]', '_self')</script>";
                                                exit();

                                            }else{
                                                echo "<script>alert('O comentário está vazio, escreva alguma coisa!')</script>";
                                                echo "<script>window.open('blog.php', '_self')</script>";
                                                exit();
                                            }
                                        }
                                    ?>
                                    <form method="post">
                                        <input type="text" name="cod_post"  hidden value="<?=$postagem['id_post'];?>">
                                        <input type="text" name="comentador" hidden value="<?php echo $consulta['id']?>">
                                        <textarea name="comentario" required style="overflow:hidden; resize:none;" placeholder="Escreva um comentário" cols="30" rows="2"></textarea><br>
                                        <button name="postar" class="btn btn-success">Comentar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
            </div>
        </div>
    </section>
    <section class="d-flex;" style="align-items: left;">
            <?php foreach($comentarios as $comit): ?>
            <div class="d-flex container" style="align-items: center; margin: 2%;">
                <div class="d-flex" style="flex-direction: column; margin:2%;">
                    <img style="width:100px; height: 100px; margin:2%;" src="../views/Painel/views/img_upload/<?php echo $comit['imagem_perfil']?>"alt="..." class="avatar-img rounded-circle">
                </div>
                <div  style="border-radius: 10%; background-color: rgb(240,240,240); width:100%; padding: 2%;">
                    <?=$comit['pnome'];?>&nbsp;<?=$comit['unome'];?>&nbsp;&nbsp;<?php 
                    if($comit['comentador'] == $consulta['id']){echo '<a style="color: #9b111e;" href="aapagarcomentario.php?id_comentario='.$comit['id_comentario'].'"><i style="font-size: 20px;" class="fa fa-trash-o" aria-hidden="true"></i></a>';}?></p>
                    <p style="color: black;">&nbsp;<?=$comit['comentario'];?></p>
                </div>
            </div>
            <?php endforeach;?>
        </section>
    <!-- Blog Details Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Publicações do Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($listapost as $postagem): ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img style="height: 200px; width: 266px;" src="painel/views/post_upload/<?php echo $postagem['img_post']?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;<?=$postagem['data_post'];?></li>
                            </ul>
                            <h5><a href="#"><?=$postagem['titulo_post'];?></a></h5>
                            <p style="text-align:justify;"><?=$postagem['post'];?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

     <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./home.php"><img src="img/loongoka-logo1.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Endereço: Travessa 22 Rua-E Luanda</li>
                            <li>Telefone: +244 939.248.383</li>
                            <li>Email: loongoka@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Links Úteis</h6>
                        <ul>
                            <li><a href="#inicio">Início</a></li>
                            <li><a href="atodoslivros.php">Livros</a></li>
                            <li><a href="aplataforma.php">Plataforma</a></li>
                            <li><a href="atermos.php">Termos de uso</a></li>
                            <li><a href="apoliticas.php">Políticas de privacidade</a></li>
                            <li><a href="acontactos.php">Contactos</a></li>
                        </ul>
                        <ul>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="ajogos.php">Passatempos</a></li>
                            <li><a href="cadastrar.php">Cadastrar-se</a></li>
                            <li><a href="#">Perfil</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Compre com a carteira digital</h6>
                        <p>Obter um livro nunca foi tão fácil como agora</p>
                        <img src="img/paypal-logo.png" alt="">
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> Todos os direitos reservados
                                | Este Sistema foi desenvolvido por <b>Abel Canas</b> e <b>Santos Francisco</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        var search = document.getElementById('pesquisar_l');

search.addEventListener("keydown", function(event){
    if (event.key === "Enter") {
        searchLivros();
    }
});

function searchLivros() {
    window.location = "blogpost.php?id_post=<?=$id_post;?>&search="+search.value; 
}
    </script>

</body>

</html>