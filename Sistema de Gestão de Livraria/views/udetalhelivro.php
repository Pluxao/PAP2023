<?php
require 'config.php';
require 'verificar.php';
require 'user.php';

$cod = filter_input(INPUT_GET, 'cod');
$livro = [];
if ($cod) {
    $sql = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE  cod = :cod AND livros_categorias.id_categoria = livros.cod_categoria");
    $sql->bindValue(':cod', $cod);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $livro = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "<script>alert('Produto não encontrado')</script>";
        echo "<script>window.location = 'home.php'</script>";
    }
} else {
    echo "<script>alert('Erro!!!')</script>";
    echo "<script>window.location = 'uhome.php'</script>";
}


$categorias = [];
$cat = $pdo->query("SELECT *FROM livros_categorias");
if ($cat->rowCount() > 0) {
    $categorias = $cat->fetchALL(PDO::FETCH_ASSOC);
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
    <title>Obter Livro -
        <?= $livro['titulo'] ?>
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
                            <li><a href="utodoslivros.php">Todas Categorias</a></li>
                            <?php foreach ($categorias as $listagem): ?>
                                <li><a href="ucategorias.php?id_categoria=<?= $listagem['id_categoria']; ?>;?>"><?php echo $listagem['nome_categoria']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    <?php echo $livro['nome_categoria']; ?>
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="O que você procura?">
                                <button type="submit" class="site-btn">PESQUISAR</button>
                            </form>
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
                            <a href="uhome.php">Início</a>
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
                        <div class="product__details__pic__item" style="width: 300px; border: 1px solid grey;">
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
                            <?php echo '<div style="color: #ff9300;">Preço: ' . number_format($livro['preco'], 2, ",", ".") . ' AOA.</div>';
                            ?>
                        </div>
                        <!-- <a download="<?php echo $livro['livro'] ?>" href="painel/views/livros_upload/<?php echo $livro['livro'] ?>" class="primary-btn"><i class="fa fa-cloud-download"></i>&nbsp;Baixar</a> -->
                        <?php
                        if ($livro['disponibilidade'] == 'Grátis') {
                            echo '<a href="baixar.php?file=' . $livro["livro"] . '&titulo_baixado=' . $livro['titulo'] . '&cod_baixado=' . $livro['cod'] . '&disponibilidade_baixado=' . $livro['disponibilidade'] . '&preco_baixado=' . $livro['preco'] . '" class="primary-btn"><i class="fa fa-cloud-download"></i>&nbsp;Baixar</a>';
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
                            href="baixar.php?file=<?= $livro['livro']; ?>&titulo_baixado=<?= $livro['titulo']; ?>&cod_baixado=<?= $livro['cod']; ?>&disponibilidade_baixado=<?= $livro['disponibilidade']; ?>&preco_baixado=<?= $livro['preco']; ?>"
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
                            <a href="./uhome.php"><img src="img/loongoka-logo.png" alt=""></a>
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



</body>

</html>

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

                    // Or go to another URL:  actions.redirect('thank_you.html');

                });
            },

            onError: function (err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>