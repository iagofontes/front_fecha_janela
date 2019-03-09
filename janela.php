<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>#FechaAJanelaMenino</title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="icon" href="https://st3.depositphotos.com/7520316/13611/v/1600/depositphotos_136115680-stock-illustration-window-icon-illustration-isolated-vector.jpg" type="image/x-icon"/>
	<link rel="shortcut icon" href="https://st3.depositphotos.com/7520316/13611/v/1600/depositphotos_136115680-stock-illustration-window-icon-illustration-isolated-vector.jpg" type="image/x-icon"/>
</head>
<body>
	<nav>
		<div class="nav-wrapper light-green accent-2">
			<a href="#" class="brand-logo center">#FechaAJanelaMenino</a>
		</div>
	</nav>

	<div class="container" style="margin-top: 2em;">
		<div class="row">
			<div class="col s12" id="janela-aberta" style="display:none;">
				<img src="./img/janela-aberta.jpg" alt="janela aberta" class="responsive-img">
			</div>
			<div class="col s12" id="janela-fechada" style="display:none;">
				<img src="./img/janela-fechada.jpg" alt="janela fechada" class="responsive-img">
			</div>
		</div>
	</div>

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		M.AutoInit();
		var imgAbertaField = document.querySelector('#janela-aberta');
		var imgFechadaField = document.querySelector('#janela-fechada');

		delayAndFetch();

		function delayAndFetch() {
			window.setInterval(() => {
				fetch('http://10.20.74.5:8080/verificarJanela')
					.then((response)=>response.json())
					.then((retorno)=>{
						if(retorno.status == 'aberta') {
							M.toast({html: 'Fecha essa janela menino!', displayLength: 2000})
							imgAbertaField.style = "display:block;";
							imgFechadaField.style = "display:none;";
						} else {
							imgAbertaField.style = "display:none;";
							imgFechadaField.style = "display:block;";
						}
					})
					.catch((error)=>{
						console.log(error);
					});
			}, 3000);
		}

	</script>
</body>
</html>
