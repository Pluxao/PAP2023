<?php
require 'config.php';
require 'verificar.php';
require 'user.php';

$categorias = [];
$cat = $pdo->query("SELECT *FROM livros_categorias");
if ($cat->rowCount() > 0) {
    $categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
}

$livros = [];
$id_categoria = filter_input(INPUT_GET, 'id_categoria');
if ($id_categoria) {

    $livro = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE id_categoria = :id_categoria AND livros.cod_categoria = livros_categorias.id_categoria ORDER BY cod_categoria");
    $livro->bindValue(':id_categoria', $id_categoria);
    $livro->execute();

    if ($livro->rowCount() > 0) {
        if (!empty($_GET['search'])) {
            $livros = [];
            $data = $_GET['search'];
            $liv = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE id_categoria = :id_categoria AND livros.cod_categoria = livros_categorias.id_categoria AND (titulo LIKE '%$data%' or editora LIKE '%$data%' or classe LIKE '%$data%') ORDER BY cod DESC");
            $liv->bindValue(':id_categoria', $id_categoria);
            $liv->execute();
            if ($liv->rowCount() > 0) {
                $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
            } else {
                echo "<script>alert('Nenhum Resultado encontado')</script>";
                echo "<script>window.location = 'ucategorias.php?id_categoria=$id_categoria'</script>";
            }
        } else {
            $livros = [];
            $liv = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE id_categoria = :id_categoria AND livros.cod_categoria = livros_categorias.id_categoria ORDER BY cod DESC");
            $liv->bindValue(':id_categoria', $id_categoria);
            $liv->execute();
            if ($liv->rowCount() > 0) {
                $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
            }
        }
    } else {
        echo "<script>alert('Categoria sem livros')</script>";
        echo "<script>window.open('uhome.php', '_self')</script>";
    }
} else {
    echo "<script>alert('Categoria sem livros')</script>";
    echo "<script>window.open('uhome.php', '_self')</script>";
}

$livs = [];
$liv = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE id_categoria = :id_categoria AND livros.cod_categoria = livros_categorias.id_categoria ORDER BY cod_categoria");
$liv->bindValue(':id_categoria', $id_categoria);
$liv->execute();

if ($liv->rowCount() > 0) {
    $livs = $liv->fetch(PDO::FETCH_ASSOC);
}

$cate = [];
$sql = $pdo->prepare("SELECT nome_categoria FROM livros_categorias WHERE id_categoria = :id_categoria");
$sql->bindValue(':id_categoria', $id_categoria);
if ($sql->rowCount() > 0) {
    $cate = $sql->fetchLL(PDO::FETCH_ASSOC);
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
    <title>
        <?php echo $livs['nome_categoria']; ?>
    </title>

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
                <li><a href="./uhome.php">INÍCIO</a></li>
                <li class="active"><a href="./utodoslivros.php">LIVROS</a></li>
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
                        <a href="./index.html"><img src="img/loongoka.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./uhome.php">INÍCIO</a></li>
                            <li class="active"><a href="./utodoslivros.php">LIVROS</a></li>
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
                            <h2>Categoria<br>Todos Livros</h2>
                            <a href="#livrocategoria" class="primary-btn">Ver Livros</a>
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

    <!-- Featured Section Begin -->
    <section class="featured spad" id="livrocategoria">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>TODOS OS LIVROS</h2>
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
                                    if ($livraria['classe'] != ' Sem classe') {
                                        echo '<h5 class="card-title">' . $livraria["classe"] . '</h5>';
                                    }
                                } else {
                                    echo '<h5 class="card-title text-danger">
                                    Pago
                                </h5>';

                                }
                                ?>
                                <h5 class="card-title">
                                    <?php echo number_format($livraria['preco'], 2, ",", "."); ?> AOA
                                </h5>
                                <h6><a href="#">
                                        <?php echo $livraria['titulo'] ?>
                                    </a></h6>
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
    </div><br>
    <!-- Banner End -->

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
                                <script>document.write(new Date().getFullYear());</script> Todos os direitos reservados
                                | Este Sistema foi feito<i class="fa fa-heart" aria-hidden="true"></i> por <a
                                    href="https:loongoka.com" target="_blank">Abel Canas </a>e<a href="#"
                                    target="_blank"> Santos Francisco</a>
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

        search.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                searchLivros();
            }
        });

        function searchLivros() {
            window.location = "ucategorias.php?id_categoria=<?= $id_categoria; ?>&search=" + search.value;
        }
    </script>
</body>

</html>