<?php
require 'config.php';
require 'verificar.php';
require 'admin.php';

$cod = filter_input(INPUT_GET, 'cod');
$livro = [];
if ($cod) {
    $sql = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE cod = :cod AND livros_categorias.id_categoria = livros.cod_categoria");
    $sql->bindValue(':cod', $cod);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $livro = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "<script>alert('Este Livro não existe na plataforma')</script>";
        echo "<script>window.location = 'home.php'</script>";
    }
} else {
    echo "<script>alert('Erro!!!')</script>";
    echo "<script>window.location = 'home.php'</script>";
}


$categorias = [];
$cat = $pdo->query("SELECT *FROM livros_categorias");
if ($cat->rowCount() > 0) {
    $categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
}

if (!empty($_GET['search'])) {
    $livros = [];
    $data = $_GET['search'];
    $liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id AND (titulo LIKE '%$data%' or editora LIKE '%$data%' or classe LIKE '%$data%') ORDER BY cod DESC limit 8");
    if ($liv->rowCount() > 0) {
        $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
    } else {
        echo "<script>alert('Nenhum Resultado encontado')</script>";
        echo "<script>window.location = 'adetalhelivro.php'</script>";
    }
} else {
    $livros = [];
    $liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod DESC limit 8");
    if ($liv->rowCount() > 0) {
        $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
    }
}

$id_categoria = filter_input(INPUT_GET, 'id_categoria');
$livs = [];
$liv = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE id_categoria = :id_categoria AND livros.cod_categoria = livros_categorias.id_categoria ORDER BY cod_categoria");
$liv->bindValue(':id_categoria', $id_categoria);
$liv->execute();
if ($liv->rowCount() > 0) {
    $livs = $liv->fetch(PDO::FETCH_ASSOC);
}

$livros = [];
$liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod DESC limit 8");
if ($liv->rowCount() > 0) {
    $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
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
    <title>Detalhes</title>

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
                <li class="active"><a href="./atodoslivros.php">LIVROS</a></li>
                <li><a href="#">SOBRE</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./aplataforma.php">A PLATAFORMA</a></li>
                        <li><a href="./atermos.php">TERMOS DE USO</a></li>
                        <li><a href="./apoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                        <li><a href="./acontactos.php">CONTACTOS</a></li>
                    </ul>
                </li>
                <li><a href="./blog.php">BLOG</a></li>
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
                                <a href="painel/views/meuperfil.php" style="color:black;"><i
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
                        <a href="./home.php"><img src="img/loongoka.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="home.php">INÍCIO</a></li>
                            <li class="active"><a href="./atodoslivros.php">LIVROS</a></li>
                            <li><a href="#">SOBRE</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./aplataforma.php">A PLATAFORMA</a></li>
                                    <li><a href="./atermos.php">TERMOS DE USO</a></li>
                                    <li><a href="./apoliticas.php">POLÍTICAS DE PRIVACIDADE</a></li>
                                    <li><a href="./acontactos.php">CONTACTOS</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">BLOG</a></li>
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
                            <?php foreach ($categorias as $listagem): ?>
                                <li><a href="acategorias.php?id_categoria=<?= $listagem['id_categoria']; ?>"><?php echo $listagem['nome_categoria']; ?></a></li>
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
                                    <b>
                                        <?php echo $livs['nome_categoria']; ?>
                                    </b>
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
                </div>
            </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>
                            <?php echo $livro['nome_categoria']; ?>
                        </h2>
                        <div class="breadcrumb__option">
                            <a href="home.php">Home</a>
                            <a href="#">
                                <?php echo $livro['nome_categoria']; ?>
                            </a>
                            <span>
                                <?php echo $livro['titulo']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item" style="width: 75%; border: 1px solid grey;">
                            <img class="product__details__pic__item--large"
                                src="painel/views/capas_upload/<?php echo $livro['img_livro'] ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>
                            <?php echo $livro['titulo']; ?>
                        </h3>
                        <div class="product__details__rating">
                            Categoria:
                            <?php echo $livro['nome_categoria']; ?> -
                            Título:
                            <?php echo $livro['titulo']; ?> -
                            Editora ou Estritor:
                            <?php echo $livro['editora']; ?><br>
                            Data de lançamento:
                            <?php echo $livro['data_lancamento']; ?><br>
                            Edição ou Volume:
                            <?php echo $livro['edicao']; ?><br>
                            <?php echo '<div style="color: #ff9300;">Preço: ' . number_format($livro['preco'], 2, ",", ".") . ' AOA</div>'; ?>
                        </div><br>

                        <?php
                        if ($livro['disponibilidade'] == 'Grátis') {
                            echo '<a href="abaixar.php?file=' . $livro["livro"] . '&titulo_baixado=' . $livro['titulo'] . '&cod_baixado=' . $livro['cod'] . '&disponibilidade_baixado=' . $livro['disponibilidade'] . '&preco_baixado=' . $livro['preco'] . '" class="primary-btn"><i class="fa fa-cloud-download"></i>&nbsp;Baixar</a>';
                        } else {
                            echo '<div class="alert alert-success text-center" hidden id="comprado">Compra feita com sucesso!</div>';
                            echo '<div id="smart-button-container">
                        <div style="text-align: center;">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>';
                           

                        }
                        ?>
                        <a hidden id="baixar"
                            href="abaixar.php?file=<?= $livro['livro']; ?>&titulo_baixado=<?= $livro['titulo']; ?>&cod_baixado=<?= $livro['cod']; ?>&disponibilidade_baixado=<?= $livro['disponibilidade']; ?>&preco_baixado=<?= $livro['preco']; ?>"
                            class="primary-btn"><i class="fa fa-cloud-download"></i>&nbsp;Baixar</a>

                        <ul>
                            <li><b>Nossas redes Sociais</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

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
                                        echo '<li title="Ler livro"><a href="alerlivro.php?cod=' . $livraria["cod"] . '" target="_blank"><i class="fa fa-book" aria-hidden="true"></i></a></li>';
                                        echo '<li><a href="adetalhelivro.php?cod=' . $livraria['cod'] . '&id_categoria=' . $livraria["id_categoria"] . '"><i class="fa fa-cloud-download"></i></a></li>';
                                    } else {
                                        echo '<li title="A leitura online não está disponível para este livro"><a><i class="fa fa-times-circle" aria-hidden="true"></i></a></li>';
                                        echo '<li><a href="adetalhelivro.php?cod=' . $livraria['cod'] . '&id_categoria=' . $livraria["id_categoria"] . '"><i class="fa fa-cart-arrow-down"></i></a></li>';
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

    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD"
        data-sdk-integration-source="button-factory"></script>
    <script>


        function initPayPalButton() {
            paypal.Buttons({
                style: {
                    shape: 'pill',
                    color: 'white',
                    layout: 'vertical',
                    label: 'buynow',

                },

                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [{ "amount": { "currency_code": "USD", "value": 1 } }]
                    });
                },

                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (orderData) {

                        // Full available details
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                        // Show a success message within this page, e.g.
                        const element = document.getElementById('paypal-button-container');
                        const baixar = document.getElementById('baixar');
                        const comprado = document.getElementById('comprado');
                        element.innerHTML = '';
                        element.innerHTML = '<h3>Obrigado pelo seu pagamento!</h3>';
                        comprado.removeAttribute('hidden');
                        baixar.click();
                        element.insertAdjacentHTML('beforeend', '<a class="primary-btn" href="factura.php?iduser=<?=$consulta['id']; ?>&nome_baixado=<?=$livro['livro']; ?>&titulo_baixado=<?=$livro['titulo']; ?>&cod_baixado=<?=$livro['cod']; ?>&disponibilidade_baixado=<?= $livro['disponibilidade']; ?>&preco_baixado=<?= $livro['preco']; ?>"><i class="fa fa-cloud-download"></i> Emitir Factura</a>');


                        // Or go to another URL:  actions.redirect('thank_you.html');

                    });
                },

                onError: function (err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
        }
        initPayPalButton();

        var search = document.getElementById('pesquisar_l');

        search.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                searchLivros();
            }
        });

        function searchLivros() {
            window.location = "adetalhelivro.php?cod=<?= $cod; ?>&search=" + search.value;
        }
    </script>

</body>

</html>