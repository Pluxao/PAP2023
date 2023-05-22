<!DOCTYPE html>
<html lang="en">
<head>
	<title>convForm - example</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/jquery.convform.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="demo.css">
</head>
<body>
	<section id="demo">
	    <div class="vertical-align">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0">
	                    <div class="card no-border">
	                        <div id="chat" class="conv-form-wrapper">
	                            <form action="" method="GET" class="hidden">
	                                <select data-conv-question="Olá, eu sou a Loongoka Bot, fui programado para auxiliar o(a) senhor(a) enquanto navega nesta aplicação web. <br><br> Quer continuar a interagir com a Loongoka Bot?" name="first-question">
	                                    <option value="yes">Sim</option>
	                                    <option value="sure">Não</option>
	                                </select>
	                                <input type="text" name="name" data-conv-question="Antes de continuarmos, insira o seu nome...|Antes de continuarmos, insira o seu nome...">
									<input type="text" data-conv-question="Olá, {name}! É um prazer conhece-lo(a)." data-no-answer="true">
	                                <input type="text" data-conv-question="Vou ajuda-lo(a) a obter as informações que necessita." data-no-answer="true">
	                                <input type="text" data-conv-question="Se quiser ver as outras opções, queira por favor clicar no espaço entre as duas opções e usar a seta direita para ver as outras opções." data-no-answer="true">
	                               
	                                <select name="acoes" data-callback="storeState" data-conv-question="O que deseja fazer?">
	                                    <option value="Sobre">Sobre Nós</option>
	                                    <option value="Funcionalidades">O que posso fazer neste sistema?</option>
	                                </select>
	                                <div data-conv-fork="acoes">
	                                    <div data-conv-case="Sobre">
	                                        <input type="text" data-conv-question="Somos a LOONGOKA, um ambiente virtual destinada ao auxílio dos alunos, jovens e crianças na obtenção de materiais didácticos para a aprendizagem dos conteúdos programáticos do currículo do Ensino Primário e do Iº. Ciclo do Ensino Secundário bem como também diversos livros que servem de ajuda no ambito académico e investigativo." data-no-answer="true">
	                                    </div>
	                                    <div data-conv-case="Funcionalidades">
		                                    <select name="thought" data-conv-question="Senhor(a) {name}, neste sistema o(a) senhor(a) pode fazer o seguinte:<br>Visualizar Livros<br>Ler Livros<br>Baixar Livros<br>Ver postes<br>Comentar<br>Passatempos">
		                                    	<option value="yes">Ver</option>
		                                    	<option value="no">No..</option>
		                                    </select>
	                                    </div>
	                                </div>
	                                <select name="programmer" data-callback="storeState" data-conv-question="So, are you a programmer? (this question will fork the conversation based on your answer)">
	                                    <option value="yes">Sim</option>
	                                    <option value="no">Não</option>
	                                </select>

	                                <div data-conv-fork="programmer">
	                                    <div data-conv-case="yes">
	                                        <input type="text" data-conv-question="aaaaaA fellow programmer! Cool." data-no-answer="true">
	                                    </div>
	                                    <div data-conv-case="no">
		                                    <select name="thought" data-conv-question="bbbbbbHave you ever thought about learning? Programming is fun!">
		                                    	<option value="yes">Yes</option>
		                                    	<option value="no">No..</option>
		                                    </select>
	                                    </div>
	                                </div>
	                                <input type="text" data-conv-question="convForm also supports regex patterns. Look:" data-no-answer="true">
	                                <input data-conv-question="Type in your e-mail" data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="email" type="email" name="email" required placeholder="What's your e-mail?">
	                                <input data-conv-question="Now tell me a secret (like a password)" type="password" data-minlength="6" id="senha" name="password" required placeholder="password">
									<select data-conv-question="Selects also support callback functions. For example, try one of these:">
											<option value="google" data-callback="google">Google</option>
											<option value="bing" data-callback="bing">Bing</option>
									</select>
	                                <select name="callbackTest" data-conv-question="You can do some cool things with callback functions. Want to rollback to the 'programmer' question before?">
	                                    <option value="yes" data-callback="rollback">Yes</option>
	                                    <option value="no" data-callback="restore">No</option>
	                                </select>
	                                <select data-conv-question="This is it! If you like me, consider donating! If you need support, contact me. When the form gets to the end, the plugin submits it normally, like you had filled it." id="">
	                                    <option value="">Awesome!</option>
	                                </select>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="dist/autosize.min.js"></script>
	<script type="text/javascript" src="dist/jquery.convform.js"></script>

	<script>
		function google(stateWrapper, ready) {
			window.open("https://google.com");
			ready();
		}
		function bing(stateWrapper, ready) {
			window.open("https://bing.com");
			ready();
		}
		var rollbackTo = false;
		var originalState = false;
		function storeState(stateWrapper, ready) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
			ready();
		}
		function rollback(stateWrapper, ready) {
			console.log("rollback called: ", rollbackTo, originalState);
			console.log("answers at the time of user input: ", stateWrapper.answers);
			if(rollbackTo!=false) {
				if(originalState==false) {
					originalState = stateWrapper.current.next;
						console.log('stored original state');
				}
				stateWrapper.current.next = rollbackTo;
				console.log('changed current.next to rollbackTo');
			}
			ready();
		}
		function restore(stateWrapper, ready) {
			if(originalState != false) {
				stateWrapper.current.next = originalState;
				console.log('changed current.next to originalState');
			}
			ready();
		}
	</script>
	<script>
		jQuery(function($){
			convForm = $('#chat').convform({selectInputStyle: 'disable'});
			console.log(convForm);
		});
	</script>
</body>
</html>