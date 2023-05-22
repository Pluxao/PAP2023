<?php
require 'config.php';
require 'verificar.php';
require 'user.php';

$categorias = [];
$cat = $pdo->query("SELECT *FROM livros_categorias");
if ($cat->rowCount() > 0) {
    $categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
}
$antigos = [];
$livl = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria DESC limit 3");
if ($livl->rowCount() > 0) {
    $antigos = $livl->fetchALL(PDO::FETCH_ASSOC);
}

$novos = [];
$livl = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria limit 3");
if ($livl->rowCount() > 0) {
    $novos = $livl->fetchALL(PDO::FETCH_ASSOC);
}

$destaques = [];
$destaques = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod DESC limit 6");
if ($destaques->rowCount() > 0) {
    $desta = $destaques->fetchALL(PDO::FETCH_ASSOC);
}
if (!empty($_GET['search'])) {
    $livros = [];
    $data = $_GET['search'];
    $liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id AND (titulo LIKE '%$data%' or editora LIKE '%$data%' or classe LIKE '%$data%') ORDER BY cod DESC limit 6");
    if ($liv->rowCount() > 0) {
        $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
    } else {
        echo "<script>alert('Nenhum Resultado encontado')</script>";
        echo "<script>window.location = 'uhome.php'</script>";
    }
} else {
    $livros = [];
    $liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod DESC limit 8");
    if ($liv->rowCount() > 0) {
        $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
    }
}
$listapost = [];
$posts = $pdo->query("SELECT *FROM posts ORDER BY id_post DESC limit 8");
if ($posts->rowCount() > 0) {
    $listapost = $posts->fetchALL(PDO::FETCH_ASSOC);
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
    <link rel="icon" href="./img/wind.png" type="image/x-icon" />
    <title>Início</title>

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

    <!-- Chat bot recursos -->
    <link rel="stylesheet" href="chatbot/estilo.css">
    <link rel="stylesheet" href="chatbot/dist/jquery.convform.css">
    <script src="chatbot/jquery-3.3.1.min.js"></script>
    <script src="chatbot/dist/jquery.convform.js"></script>
    <script src="chatbot/custom.js"></script>

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
            <a href="uhome.php"><img src="img/loongoka.png" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/lingua.png" alt="">
                <div>Português</div>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./uhome.php">INÍCIO</a></li>
                <li><a href="./utodoslivros.html">LIVROS</a></li>
                <li><a href="#">SOBRE</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./uplataforma.php">A PLATAFORMA</a></li>
                        <li><a href="./utermos.php">TERMOS DE USO</a></li>
                        <li><a href="./upoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                        <li><a href="./ucontactos.php">CONTACTOS</a></li>
                    </ul>
                </li>
                <li><a href="./ublog.php">BLOG</a></li>
                <li><a href="jogos.php">JOGOS</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
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
                                <a href="painel/views/umeuperfil.php" style="color:black;"><i
                                        class="fa fa-user"></i>&nbsp;&nbsp;Meu Perfil</a>
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
                        <a href="./uhome.php"><img src="img/loongoka.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./uhome.php">INÍCIO</a></li>
                            <li><a href="./utodoslivros.php">LIVROS</a></li>
                            <li><a href="#">SOBRE</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./uplataforma.php">A PLATAFORMA</a></li>
                                    <li><a href="./utermos.php">TERMOS DE USO</a></li>
                                    <li><a href="./upoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                                    <li><a href="./ucontactos.php">CONTACTOS</a></li>
                                </ul>
                            </li>
                            <li><a href="./ublog.php">BLOG</a></li>
                            <li><a href="./jogos.php">PASSATEMPOS</a></li>
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
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Todas categorias</span>
                        </div>
                        <ul>
                            <li><a href="utodoslivros.php">Todas Categorias</a></li>
                            <?php foreach ($categorias as $listagem): ?>
                                <li><a href="ucategorias.php?id_categoria=<?= $listagem['id_categoria']; ?>"><?php echo $listagem['nome_categoria']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <div>
                                <div style="width: 30%;
                                        float: left;ont-size: 16px;color: #1c1c1c;ont-weight: 700;padding-left: 18px;padding-top: 11px; position: relative;"
                                    class="hero__search__categories">
                                    <b>Todas categorias</b>
                                    <span style="position: absolute;right: 14px;top: 14px;"
                                        class="arrow_carrot-down"></span>
                                </div>
                                <input
                                    style="width: 70%;border: none;height: 48px;font-size: 16px;color: #b2b2b2;padding-left: 20px;"
                                    type="search" id="pesquisar_l" placeholder="O que você procura?">
                                <button style="position: absolute;right: 0;top: -1px;height: 50px;"
                                    onclick="searchLivros()" class="site-btn">PESQUISAR</button>
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
                    <div class="hero__item set-bg" data-setbg="img/hero/livraria.jpg">
                        <div class="hero__text">
                            <span>A LoongoKa é para si</span>
                            <h2>Literatura Nacional<br>e Internacional</h2>
                            <a href="#" class="primary-btn">Ver mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- text -->
    <div class="container" id="flex">
        <div class="ca">
            <i class="fa fa-book" id="icone" aria-hidden="true"></i>
            <h4 id="pontos"><b>Livros para si</b></h4>
        </div>
        <div class="ca">
            <i class="fa fa-globe" id="icone" aria-hidden="true"></i>
            <h4 id="pontos"><b>Nossa Literatura</b></h4>
        </div>
        <div class="ca">
            <i class="fa fa-hand-o-up" id="icone" aria-hidden="true"></i>
            <h4 id="pontos"><b>Tudo em um Click</b></h4>
        </div>
        <div class="ca">
            <i class="fa fa-volume-control-phone" id="icone" aria-hidden="true"></i>
            <h4 id="pontos"><b>+244 939.248.383</b></h4>
        </div>
    </div>
    <!-- final do text -->

    <!-- Categories Section Begin -->
    <section style="margin-top: 5%;">
        <div class="container">
            <div class="section-title">
                <h2>Destaques</h2>
            </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php foreach ($desta as $destaque): ?>
                        <div class="col-lg-3">
                            <div style="border: 1px solid; border-radius: 4px;" class="categories__item set-bg"
                                data-setbg="painel/views/capas_upload/<?php echo $destaque['img_livro'] ?>">
                                <h5 class="card-title"><a
                                        href="udetalhelivro.php?cod=<?= $destaque['cod']; ?>&id_categoria=<?= $destaque['id_categoria']; ?>"><?php
                                            echo $destaque['titulo'] ?></a></h5>
                                <h4><a style="border-radius: 4px;" class="primary-btn"
                                        href="udetalhelivro.php?cod=<?= $destaque['cod']; ?>" class="btn dtl"><i
                                            class="fa fa-eye" aria-hidden="true"></i>&nbsp;Detalhes</a></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Featured Section Begin -->
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>LIVROS - LOONGOKA</h2>
                        </div>
                    </div>
                </div>
                <div class="row featured__filter">
                    <?php foreach ($livros as $livraria): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix">
                            <div class="featured__item">
                                <div style="border: 1px solid;" class="featured__item__pic set-bg"
                                    data-setbg="painel/views/capas_upload/<?php echo $livraria['img_livro'] ?>">
                                    <ul class="featured__item__pic__hover">
                                        <?php
                                        if ($livraria['disponibilidade'] == 'Grátis') {
                                            echo '<li title="Ler livro"><a href="ulerlivro.php?cod=' . $livraria["cod"] . '" target="_blank"><i class="fa fa-book" aria-hidden="true"></i></a></li>';
                                            echo '<li title="Baixar"><a href="udetalhelivro.php?cod=' . $livraria["cod"] . '&id_categoria=' . $livraria['id_categoria'] . '"><i class="fa fa-cloud-download"></i></a></li>';

                                        } else {
                                            echo '<li title="A leitura online não está disponível para este livro"><a><i class="fa fa-times-circle" aria-hidden="true"></i></a></li>';
                                            echo '<li title="Comprar Livro"><a href="udetalhelivro.php?cod=' . $livraria["cod"] . '&id_categoria=' . $livraria['id_categoria'] . '"><i class="fa fa-money"></i></a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <?php
                                    if ($livraria['disponibilidade'] == 'Grátis') {
                                        echo '<h5 class="card-title text-success">
                                    Grátis
                                </h5>';
                                    } else {
                                        echo '<h5 class="card-title text-danger">
                                    Pago
                                </h5>';

                                    }
                                    ?>
                                    <h5 class="card-title">
                                        <?php echo number_format($livraria['preco'], 2, ",", "."); ?> AOA
                                    </h5>
                                    <h6>
                                        <?php echo $livraria['titulo'] ?>
                                    </h6>
                                    <h6 class="primary-btn">
                                        <?php echo $livraria['edicao'] ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Featured Section End -->

        <!-- Banner Begin -->
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="img/banner/banner-1.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="img/banner/banner-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->

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
                    <?php foreach ($listapost as $postagem): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img style="height: 200px; width: 266px;"
                                        src="painel/views/post_upload/<?php echo $postagem['img_post'] ?>" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;
                                            <?= $postagem['data_post']; ?>
                                        </li>
                                    </ul>
                                    <h5><a href="#">
                                            <?= $postagem['titulo_post']; ?>
                                        </a></h5>
                                    <p style="text-align:justify;">
                                        <?= $postagem['post']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
                                <a href="./index.html"><img src="img/loongoka-logo.png" alt=""></a>
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
                                <li><a href="#">Início</a></li>
                                <li><a href="#">Livros</a></li>
                                <li><a href="#">Plataforma</a></li>
                                <li><a href="#">Criadores</a></li>
                                <li><a href="#">Termos de uso</a></li>
                                <li><a href="#">Políticas de privacidade</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contactos</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Cadastrar-se</a></li>
                                <li><a href="#">Manuais Escolares</a></li>
                                <li><a href="#">Tecnologias</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__widget">
                            <h6>Envie-nos o seu E-mail</h6>
                            <p>E receba atualizações por e-mail sobre nossa livraria.</p>
                            <form action="#">
                                <input type="text" placeholder="Coloque o seu E-mail">
                                <button type="submit" class="site-btn">Inscrever-se</button>
                            </form>
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
                                    <script>document.write(new Date().getFullYear());</script> Todos os direitos
                                    reservados | Este Sistema foi feito<i class="fa fa-heart" aria-hidden="true"></i>
                                    por <a href="https:loongoka.com" target="_blank">Abel Canas </a>e<a href="#"
                                        target="_blank"> Santos Francisco</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
        <div class="chat_icon">
            <svg style="color: #ff8330;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                class="bi bi-robot" viewBox="0 0 16 16">
                <path
                    d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z" />
                <path
                    d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z" />
            </svg>
        </div>
        <div class="chat_box">
            <div class="conv-form-wrapper wrapper">
                <div class="title">
                    <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                        fill="currentColor" class="bi bi-robot" viewBox="0 0 16 16">
                        <path
                            d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z" />
                        <path
                            d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z" />
                    </svg>
                    ROBÔ LOONGOKA
                </div>
                <div class="form">
                    <div class="bot-inbox inbox">
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="msg-header">
                            <p>Prezado senhor(a), Bem vindo(a).</p>
                            <p>Olá, eu sou a Loongoka Robô.<br>Fui programada para estar a disposição dos clientes<br>
                                enquanto navegam no nosso sistema.<br></p>
                        </div>
                    </div>
                </div>
                <div class="typing-field">
                    <div class="input-data">
                        <input id="data" type="text" placeholder="Digite alguma coisa aqui..." required>
                        <button id="send-btn">Enviar</button>
                    </div>
                    <div class="typing-animation" style="display:none;">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Js Plugins -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>

        <script>
            var search = document.getElementById('pesquisar_l');

            search.addEventListener("keydown", function (event) {
                if (event.key === "Enter") {
                    searchLivros();
                }
            });

            function searchLivros() {
                window.location = "uhome.php?search=" + search.value;
            }

            $(document).ready(function () {
                $("#send-btn").on("click", function () {
                    $value = $("#data").val();
                    $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                    $(".form").append($msg);
                    $("#data").val('');

                    // show typing animation
                    $(".typing-animation").show();
                    // add delay before bot responds
                    setTimeout(function () {
                        // hide typing animation
                        $(".typing-animation").hide();
                        // start ajax code
                        $.ajax({
                            url: 'message.php',
                            type: 'POST',
                            data: 'text=' + $value,
                            success: function (result) {
                                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fa fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                                $(".form").append($replay);
                                // when chat goes down the scroll bar automatically comes to the bottom
                                $(".form").scrollTop($(".form")[0].scrollHeight);
                            }
                        });
                    }, 3000); // 1 second delay
                });
            });
        </script>
</body>

</html>

<style>
    .typing-animation {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .typing-animation .dot {
        height: 10px;
        width: 10px;
        background-color: #bbb;
        border-radius: 50%;
        margin: 0 5px;
        animation: typing 0.8s infinite ease-in-out;
    }

    .typing-animation .dot:nth-child(2) {
        animation-delay: 0.2s;
    }

    .typing-animation .dot:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes typing {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.5);
        }

        100% {
            transform: scale(1);
        }
    }
</style>
<?php

// Importa a biblioteca JSON do PHP
header('Content-Type: application/json');
// Habilita o módulo cURL do PHP
if (!function_exists('curl_init')) {
    die('cURL não está habilitado. Verifique sua configuração do PHP.');
}
$api_key = 'afa2fad9b21d451dbb3c67b6894fbb1a';

$url = "https://v6.exchangerate-api.com/v6/afa2fad9b21d451dbb3c67b6894fbb1a/pair/USD/AOA";

$response = file_get_contents($url);
$data = json_decode($response, true);

$rate = $data['conversion_rate'];

echo "1 dólar americano equivale a {$rate} kwanzas";



/*$url = 'https://query1.finance.yahoo.com/v7/finance/download/AAPL?period1=1646709946&period2=1678245946&interval=1d&events=history&includeAdjustedClose=true';
$data = file_get_contents($url);
$row = explode("\n", $data);
for ($x = 1; $x < count($row ); $x++) { 
$day[] = explode(",", $row[$x]);
}
print'<pre>';
print_r($day);
print'<pre>';
*/
?>