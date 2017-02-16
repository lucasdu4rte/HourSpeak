<html>
	<head>

	<link rel="stylesheet" type="text/css" href="estilos.css">

		<script src="responsivevoice.js"></script>
		<script type="text/javascript">

			//Função que verifica se Alerta deve ser acionado
			function Alerta(h,m,s)
			{
				var pIni = document.getElementById('periodoIni');
				var pFim = document.getElementById('periodofim');
				var selI = document.getElementById('intervaloAlerta').selectedIndex;
				var opcao = document.getElementById('intervaloAlerta').options; //array com as opções
				
				if (h >= pIni && h<=pFim) {
					switch (opcao[selI].text){
						case 10:
							if (0 == m%10) {responsiveVoice.speak(h+" Horas e "+m+" Minutos.", "Brazilian Portuguese Female")} //Somente multiplus de 10, como 0,10,20...
						case 20:

						case 30:

						case 60:

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
				setTimeout('time()',500);

				
			}

			//Função que recebe os parametros para ser reproduzido com voz e Push Notification
			function FalaHora(h,m,s){
				agora = new Date();
				h = agora.getHours();
				m = agora.getMinutes();
				s = agora.getSeconds();

				responsiveVoice.speak(h+" Horas e "+m+" Minutos e "+s+ " segundos", "Brazilian Portuguese Female")

			}

		</script>
	</head>
	<body onload="time()">
	<!--Cebeçalho-->
		<ul>
			<li>Período
				<input type="number" min="1" max="12" id="periodoIni" maxlength="2" size="2" value="7"> até
				<input type="number" min="1" max="12" id="periodofim" maxlength="2" size="2" value="18">
				<button type="button" onclick="">Aplicar</button>
			</li>
			<li>Intervalo
			<select id="intervaloAlerta">
				<option>10</option>
				<option>20</option>
				<option>30</option>
				<option>60</option>
			</select>
			<button type="button" onclick="">Aplicar</button>
			</li>
			<li></li>
			<li>
				<div id="Relogio"></div>
				<p style="font-size: 15px;">Horário de Brasília</p>
			</li>
		</ul>

	<!--Fim do Cabeçalho-->
		<div>
			<h3><button type="button" onclick="FalaHora()">QUE HORAS SÃO AGORA?</button></h3>
			<p>
				
			</p>
		</div>

	</body>
</html>