<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="styles.css">
  <script src="script.js" defer></script>
  <title>Document</title>
</head>
<body>

  <section style="text-align: right;">
    <a href="../../ajogos.php" style="margin: 1%; border-color: #ff9300; text-decoration:none;" class="primary-btn">VOLTAR</a>
  </section>
  
  <audio controls loop id="audio" hidden>
    <source src="somjogo.mp3" type="audio/mp3">
  </audio>

  <audio controls class="novamaxima" hidden>
    <source src="novamaxima.mp3" type="audio/mp3">
  </audio>

  <div class="board" id="board">
    <div class="cell" data-cell></div>
    <div class="cell" data-cell></div>
    <div class="cell" data-cell></div>
    <div class="cell" data-cell></div>
    <div class="cell" data-cell></div>
    <div class="cell" data-cell></div>
    <div class="cell" data-cell></div>
    <div class="cell" data-cell></div>
    <div class="cell" data-cell></div>
  </div>

  <div class="winning-message" id="winningMessage">
    <div data-winning-message-text></div>
    <button id="restartButton">REINICIAR</button>
    <button style="margin: 2%;" onclick="sair()">SAIR</button>
  </div>

  <script>
    function sair(){
      window.location = '../../ajogos.php'
    }
  </script>
</body>
</html>