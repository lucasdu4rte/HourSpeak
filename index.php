<!DOCTYPE HTML>
 <html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<title>HourSpeak</title>


		<script src="responsivevoice.js"></script>

		<!-- Bootstrap core CSS -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">

	    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="cover.css" rel="stylesheet">

	    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	    <script src="js/ie-emulation-modes-warning.js"></script>

		<audio id="audio">
		   <source type="audio/mp3"  src="noft.mp3" >
		</audio>

		<script type="text/javascript">
			audio = document.getElementById('audio');

			function play(){
			   audio.play();
			}
		</script>

		<script type="text/javascript">

			//Função que verifica se Alerta deve ser acionado
			function Alerta(h,m,s)
			{
				var pIni = document.getElementById('periodoIni').value;
				var pFim = document.getElementById('periodofim').value;
				var selI = document.getElementById('intervaloAlerta').selectedIndex;
				var opcao = document.getElementById('intervaloAlerta').options; //array com as opções
				

				if (h >= pIni && h<=pFim) {
					var caso = parseInt(opcao[selI].text);
					if (s == 0) {
						switch (caso){
							case 10:
								if (0 == m%10) {responsiveVoice.speak(h+" Horas e "+m+" Minutos.", "Brazilian Portuguese Female")}; //Somente multiplus de 10, como 0,10,20...
								break;
							case 20:
								if (0 == m%20) {responsiveVoice.speak(h+" Horas e "+m+" Minutos.", "Brazilian Portuguese Female")};//Somente multiplus de 20, como 0,20,40...
								break;
							case 30:
								if (0 == m%30) {responsiveVoice.speak(h+" Horas e "+m+" Minutos.", "Brazilian Portuguese Female")};//Somente multiplus de 30, como 0,30,60...
								break;
							case 60:
								if (0 == m%60) {responsiveVoice.speak(h+" Horas e "+m+" Minutos.", "Brazilian Portuguese Female")};//Somente multiplus de 60, como 0,60...
								break;

						}

					}
				}

			}

			//Função Principal: Hora Atual baseada no Computador
			function time()
			{
				agora = new Date();
				h = agora.getHours();
				m = agora.getMinutes();
				s = agora.getSeconds();

				// m=40; //teste

				Alerta(h,m,s);

				if (h < 10) {
					h = '0'+ h;
				}
				if (m < 10) {
					m = '0'+ m;
				}
				if (s < 10) {
					s = '0'+ s;
				}

				document.getElementById('Relogio').innerHTML=h+":"+m+":"+s;
				setTimeout('time()',1000);

				
			}

			//Função que recebe os parametros para ser reproduzido com voz e Push Notification
			function FalaHora(h,m,s){
				agora = new Date();
				h = agora.getHours();
				m = agora.getMinutes();
				s = agora.getSeconds();

				play();
				responsiveVoice.speak(h+" Horas e "+m+" Minutos e "+s+ " segundos", "Brazilian Portuguese Female")

			}

		</script>

	</head>
	<body onload="time()">


	<!--Cebeçalho-->
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">HourSpeak</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <!--<form class="navbar-form  navbar-left">
                  <div class="form-group">-->
                   <li>
                     <a>Período
				     <input class="form-control" type="number" min="1" max="24" id="periodoIni" maxlength="2" size="2" value="7"> até
				     <input class="form-control" type="number" min="1" max="24" id="periodofim" maxlength="2" size="2" value="18"></a>
				   </li>
				  <!--</div>

				  <div class="form-group"> -->
                   <li>
                    <a>Intervalo
				     <select class="form-control" id="intervaloAlerta">
				      <option>10</option>
				      <option>20</option>
				      <option>30</option>
				      <option>60</option>
				     </select></a>
				    
				   </li>
				   <!--</div>
				 </form>-->
                </ul>
              </nav>
            </div>
          </div>

	<!--Fim do Cabeçalho-->
		

		<div class="inner cover">
            <h1 class="cover-heading">		
            <div id="Relogio"></div>
				<p style="font-size: 15px;">Horário de Brasília</p>
			</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
			<h3><button class="btn btn-lg btn-default" type="button" onclick="FalaHora()">Que horas são agora?</button></h3>
			</p>
		</div>

          <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div>

        </div>
      </div>
    </div>






	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

	</body>
</html>