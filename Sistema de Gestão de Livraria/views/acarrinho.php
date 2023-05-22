<?php
require 'config.php';
require 'verificar.php';
require 'admin.php';

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
$destaques = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria DESC limit 6");
if ($destaques->rowCount() > 0) {
    $desta = $destaques->fetchALL(PDO::FETCH_ASSOC);
}
$livros = [];
$liv = $pdo->query("SELECT *FROM livros, livros_categorias, usuarios WHERE livros.cod_categoria = livros_categorias.id_categoria AND livros.cadastrador = usuarios.id ORDER BY cod_categoria DESC limit 8");
if ($liv->rowCount() > 0) {
    $livros = $liv->fetchALL(PDO::FETCH_ASSOC);
}
$listapost = [];
$posts = $pdo->query("SELECT *FROM posts");
if ($posts->rowCount() > 0) {
    $listapost = $posts->fetchALL(PDO::FETCH_ASSOC);
}

$cod = filter_input(INPUT_GET, 'cod');
/* Adicionar ao carrinho */
if ($cod) {
    $idProduto = $_GET['cod'];
    if (!isset($_SESSION['itens'][$idProduto])) {
        $_SESSION['itens'][$idProduto] = 1;
    } else {
        $_SESSION['itens'][$idProduto] += 1;
    }
}

$livro = [];
$sql = $pdo->prepare("SELECT *FROM livros WHERE cod = :cod");
$sql->bindValue(':cod', $cod);
$sql->execute();
if ($sql->rowCount() > 0) {
    $livro = $sql->fetch(PDO::FETCH_ASSOC);
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
    <title>Carrinho</title>

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

    <style>
        .cart-page {
            margin: 80px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-info {
            display: flex;
            flex-wrap: wrap;
        }

        th {
            text-align: left;
            padding: 5px;
            color: white;
            background: #ff9300;
            font-weight: normal;
        }

        td {
            padding: 10px 5px;
        }

        td input {
            width: 40px;
            height: 30px;
            padding: 5px;
        }

        td img {
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }

        td a {
            color: red;
        }

        td a:hover {
            transition: .5s;
            color: #ff9300;
        }

        .preco_total {
            display: flex;
            justify-content: flex-end;
        }
        .preco_total1 {
            display: flex;
            justify-content: flex-start;
        }
        .preco_total table {
            border-top: 3px solid #ff9300;
            width: 100%;
            max-width: 350px;
        }
        .preco_total1 table {
            border-top: 3px solid #ff9300;
            width: 100%;
            max-width: 350px;
        }
    </style>

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
                            <li><a href="./atodoslivros.php">LIVROS</a></li>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" style="background-color: #ff9300;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Carrinho</h2>
                        <div class="breadcrumb__option">
                            <a href="home.php">Início</a>
                            <span>Carrinho</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!-- Breadcrumb Section End -->

    <?php
    /* Exibir o carrinho */
    if (count($_SESSION['itens']) == 0) {
        echo "<script>alert('Carrinho vazio, adicione itens ao carrinho')</script>";
        echo "<script>window.location = 'home1.php'</script>";
    } else {
        $_SESSION['dados'] = array();
        $valorfinal = 0;
        foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
            $sql = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE cod=? AND livros.cod_categoria = livros_categorias.id_categoria");
            $sql->bindParam(1, $idProduto);
            $sql->execute();
            $produtos = $sql->fetchAll();
            $total = $produtos[0]["preco"];
            $valorfinal += $total; // soma o valor de $total a $total_secao
    
            echo '<div class="container small-container cart-page">
                    <table>
                    <tr>
                        <th>Produtos</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Acção</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="painel/views/capas_upload/' . $produtos[0]["img_livro"] . '">
                                <div>
                                    <p>Título: ' . $produtos[0]["titulo"] . '</p>
                                    <p>Editora ou Autor: ' . $produtos[0]["editora"] . '</p>
                                </div>
                            </div>
                        </td>
                        <td>' . $produtos[0]["nome_categoria"] . '</td>
                        <td>' . number_format($produtos[0]["preco"], 2, ",", ".") . ' AOA</td>
                        <td> <a title="Remover" href="removeritem.php?cod=' . $idProduto . '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                </table>
            </div> <div class="container preco_total">
        <table>
            <tr>
             <div class="container preco_total1">
        <table>
            <tr>
                <a hidden id="baixar" href="abaixar.php?file='.$produtos[0]['livro'] . '&titulo_baixado=' . $produtos[0]['titulo'] . '&cod_baixado=' . $idProduto . '&disponibilidade_baixado=' . $produtos[0]['disponibilidade'] . '&preco_baixado=' . $produtos[0]['preco'] . '" class="primary-btn"><i class="fa fa-cloud-download"></i>&nbsp;Baixar</a>
            </tr>
        </table>
        </div>
        </div>';
            


            /* Passar os dados no vetor para depois pegar no banco de dados*/

            array_push(
                $_SESSION['dados'],
                array(
                    'iduser' => $consulta['id'],
                    'nome_baixado' => $produtos[0]["img_livro"],
                    'titulo_baixado' => $produtos[0]['titulo'],
                    'livropdf' => $produtos[0]['livro'],
                    'cod_baixado' => $idProduto,
                    'disponibilidade_baixado' => $produtos[0]['disponibilidade'],
                    'preco_baixado' => $produtos[0]['preco'],
                    'total' => $total
                )
            );

        }
        echo ' <div class="container preco_total1">
        <table>
            <tr>
                <td>Total</td>
                <td>' . number_format($valorfinal, 2, ",", ".") . ' AOA</td>
            </tr>
        </table>
        </div>
        </div>';


        echo '<div class="alert alert-success text-center" hidden id="comprado">Compra feita com sucesso!</div>';
        echo '<div class="container" style="display: flex; flex-direction: column; justifly-content: space-around; ">
                <a class="primary-btn" style="text-align: center;" href="home1.php">Adicionar&nbsp;<i class="fa fa-plus"></i></a>&nbsp;&nbsp;
                <div id="smart-button-container">
                    <div style="text-align: center;">
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>';
    }
    ?>






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
                                <script>document.write(new Date().getFullYear());</script> Todos os direitos
                                reservados
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
                        element.insertAdjacentHTML('beforeend', '<a class="primary-btn" href="factura.php?iduser=<?= $consulta['id']; ?>&nome_baixado=<?= $livro['livro']; ?>&titulo_baixado=<?= $livro['titulo']; ?>&cod_baixado=<?= $livro['cod']; ?>&disponibilidade_baixado=<?= $livro['disponibilidade']; ?>&preco_baixado=<?= $livro['preco']; ?>"><i class="fa fa-cloud-download"></i> Emitir Factura</a>');


                    });
                },

                onError: function (err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
        }
        initPayPalButton();
    </script>

</body>

</html>