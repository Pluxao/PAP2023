<?php
     require 'config.php';
     require 'verificar.php';
    require 'admin.php';


    $cod = filter_input(INPUT_GET, 'cod');
    $livro = [];
    if($cod){
        $sql = $pdo->prepare("SELECT *FROM livros, livros_categorias WHERE  cod = :cod AND livros_categorias.id_categoria = livros.cod_categoria");
        $sql->bindValue(':cod', $cod);
        $sql->execute();

        if($sql->rowCount() > 0){
            $livro = $sql->fetch(PDO::FETCH_ASSOC);
        }else{
            echo "<script>alert('Produto não encontrado')</script>";
            echo "<script>window.location = 'home.php'</script>";
        }
    }else{
    echo "<script>alert('Erro!!!')</script>";
    echo "<script>window.location = 'index.php'</script>";
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./img/wind.png" type="image/x-icon"/>
    <title>Título: <?php echo$livro['titulo'];?></title>

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

<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist/build/pdf.min.js"></script>
    <style>
    *{
        margin: 0;
        padding: 0;
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
   <center> <div>
 <button id="prev-page" class="btn" style="color:white; broder-color:#ff9300; background-color: #ff9300;"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
<button id="next-page" class="btn" style="color:white; broder-color:#ff9300; background-color: #ff9300;"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
<p id="page-num"></p>
</div></center><br>
    <center><canvas style="border: solid 1px;" id="pdf-canvas"></canvas></center><br><br>
   

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
    <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
  <script>

    // URL do arquivo PDF a ser lido
const pdfUrl = "painel/views/livros_upload/<?php echo $livro['livro']?>";

// Elemento canvas para renderizar o PDF
const canvas = document.getElementById("pdf-canvas");
const width = window.innerWidth * 0.5;
const height = window.innerHeight * 0.5;
canvas.style.width = "70%";
canvas.width = width;
canvas.height = height;
let numPages = null;


pdfjsLib.getDocument(pdfUrl).promise.then((pdf) => {
  numPages = pdf.numPages;
  // ...
});


// Carrega o arquivo PDF
pdfjsLib.getDocument(pdfUrl).promise.then((pdf) => {
  // Obtém a primeira página do PDF
  pdf.getPage(1).then((page) => {
    // Define a escala do PDF
    const scale = 1.5;

    // Obtém as dimensões da página PDF
    const viewport = page.getViewport({ scale: scale });

    // Define a largura e a altura do canvas
    canvas.width = window.innerWidth;
canvas.height = window.innerHeight;


    const prevButton = document.getElementById('prev-page');
const nextButton = document.getElementById('next-page');
let currentPageNum = 1;

// Event listener para o botão de página anterior
prevButton.addEventListener('click', () => {
  if (currentPageNum > 1) {
    currentPageNum--;
    renderPage(currentPageNum);
    updatePageNum();
  }
});

// Event listener para o botão de próxima página
nextButton.addEventListener('click', () => {
  if (currentPageNum < pdf.numPages) {
    currentPageNum++;
    renderPage(currentPageNum);
    updatePageNum();
  }
});

function updatePageNum() {
  const pageNumElement = document.getElementById('page-num');
  pageNumElement.textContent = `Página ${currentPageNum} de ${numPages}`;
}
// Função para renderizar uma página do PDF
function renderPage(pageNum) {
  pdf.getPage(pageNum).then((page) => {
    const scale = 1.5;
    const viewport = page.getViewport({ scale: scale });
    canvas.width = viewport.width;
    canvas.height = viewport.height;
    const renderContext = {
      canvasContext: canvas.getContext('2d'),
      viewport: viewport
    };
    page.render(renderContext);
  });
}

// Carrega o arquivo PDF e renderiza a primeira página
let pdf = null;
pdfjsLib.getDocument(pdfUrl).promise.then((loadedPdf) => {
  pdf = loadedPdf;
  renderPage(currentPageNum);
});

  });
});

  </script> 
</body>
</html>

