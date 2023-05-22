<?php
	require '../../config.php';
	require '../../verificar.php';
	require '../../admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jogo.css">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <link rel="icon" href="../../img/wind.png" type="image/x-icon"/>


    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="game-wrap">
            <canvas width="960px" height="540" id="game"></canvas>
            <a class="primaru-btn" href="../../ajogos.php">SAIR</a>

            <audio controls class="shoot" hidden>
            <source src="shoot.mp3" type="audio/mp3">
    	    </audio>

            <audio controls loop id="audio" hidden>
        <source src="somjogo.mp3" type="audio/mp3">
    	</audio>
		
            <article class="content">
                <br>
                <h1 class="title"><span style="color: black;">C</span><span style="color: blue;">o</span><span style="color: yellow;">l</span><span style="color: red;">o</span><span style="color: grey;">r</span><span> </span><span style="color: pink;">B</span><span style="color: green;">l</span><span style="color: skyblue;">a</span><span style="color: white;">s</span><span style="color: #ff9300;">t</span></h1>
    
                <p>Use as setas <code>Esquerda</code> e <code>Direita</code> ou as letras <code>A</code> e <code>D</code> para se mover, <code>Space</code> para atirar.</p>
                <p><a href="../../home.php">Loongoka</a> a sua livraria virtual. Divirta-se aqui mesmo</p>    
            </article>
        </div>
    </div>
    <script src="jogo.js"></script>
</body>
</html>