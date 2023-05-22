<?php
	require '../../config.php';
	require '../../verificar.php';
	require '../../admin.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jogo.css">
    <link rel="icon" href="../../img/wind.png" type="image/x-icon"/>

    <title>CSMAGA GAME</title>
</head>
<body>
    
<!-- Game canvas -->
<canvas id="c"></canvas>

<!-- Gameplay HUD -->
<div class="hud">
	<div class="hud__score">
		<div class="score-lbl"></div>
		<div class="cube-count-lbl"></div>
	</div>
	<div class="pause-btn"><div></div></div>
	<div class="slowmo">
		<div class="slowmo__bar"></div>
	</div>
</div>
<!-- Menu System -->
<div class="menus">
	<div class="menu menu--main">
		<h1>CsmaGa</h1>
		<button type="button" class="play-normal-btn">INICIAR JOGO</button>
		<button type="button" class="play-casual-btn">MODE CASUAL</button>
		<a style="text-decoration:none;" href="../../ajogos.php"><button type="button">SAIR</button></a>
		<div class="credits"> <a href="../../home.php">Loongoka</a> a sua livraria virtual. Divirta-se aqui mesmo</div>
		<audio controls loop id="audio" hidden>
        <source src="somjogo.mp3" type="audio/mp3">
    	</audio>
		<audio controls class="quebrando" hidden>
        <source src="song.mp3" type="audio/mp3">
    	</audio>
		<audio controls class="gameover" hidden>
        <source src="gameover.mp3" type="audio/mp3">
    	</audio>
		<audio controls class="novamaxima" hidden>
        <source src="novamaxima.mp3" type="audio/mp3">
    	</audio>
	</div>
	<div class="menu menu--pause">
		<h1>EM PAUSA</h1>
		<button type="button" class="resume-btn">CONTINUAR O JOGO</button>
		<button type="button" class="menu-btn--pause">MENÚ PRINCIPAL</button>
	</div>
	<div class="menu menu--score">
		<h1>VOCÊ PERDEU</h1>
		<h2>SUA PONTUAÇÃO:</h2>
		<div class="final-score-lbl"></div>
		<div class="high-score-lbl"></div>
		<button type="button" class="play-again-btn">JOGAR NOVAMENTE</button>
		<button type="button" class="menu-btn--score">MENÚ PRINCIPAL</button>
	</div>
</div>
<script src="jogo.js"></script>
<script>
	/*const somjogo = document.querySelector('.somjogo');
    	somjogo.currentTime = 0;
    	somjogo.play();


		const audio = document.getElementById("audio");
audio.autoplay = true;
audio.load();


const gameover = document.querySelector('.gameover');
    		gameover.currentTime = 0;
    		gameover.play();
*/
</script>
</body>
</html>