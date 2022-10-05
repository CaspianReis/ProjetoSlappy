<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/fundo.css">
</head>
<body>

	<nav class="nav navbar navbar-light"  style="background-color: rgb(62 42 147);
											 box-shadow: -1px 0px 20px 6px #000000;
	 										 padding: 3px;
	 										 text-decoration: none;
	 										 color: white;">
		<a class="navbar-brand" href="login.php">
  		     <img src="imagens/perfilbranco.png" width="50" height="50" alt="">
 		</a>
 		<div class="navbar-nav-scroll">
		  	<ul class="navbar-nav bd-navbar-nav flex-row">
		  		<li class="nav-item active">
	        		<a class="nav-link active" href="index.php"  style="color: white;
	        															margin-right: 8px;
	        															font-weight: bold;">Home
	        			<span class="sr-only">
	        				(página atual)
	        			</span>
	        		</a>
	      		</li>
		  		<li class="nav-item">
		  			<a class="nav-link" href="login.php" style="text-decoration: none;
		  															color: white;
		  															margin-right: 8px;">
		  				Comunidade
		  			</a>
		  		</li>
		  		<li class="nav-item">
					<a class="nav-link" href="login.php" style="color: white;
																   margin-right: 8px;">Sistemas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login.php" style="color: white;
																 margin-right: 8px;">Perfil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login.php" style="color: white;
															       margin-right: 8px;">Homebrew</a>
		  		</li>
		  	</ul>
	  </div>
	</nav>

	<h2>BEM-VINDO!</h2>

	<div class="container">

  <div class="row">

    <div class="col" id="texto">
     Olá viajante! Bem vindo ao meu grimório, aqui você encontrará
	diferentes informações de aventureiros de todos os "mundos".
	Antes de desbravar esse mundo incrível, queria falar um pouco sobre mim....
	<p>Certa vez, um grupo de magos e artífices vindos da escola de magia 
	"Etec de Itanhaém" decidiu se reunir e criar um lugar onde todos 
	pudessem compartilhar informações uns com os outros. Estes alunos 
	trabalharam árduamente até criar este lugar que você se encontra.</p>
	Bom, claro que em algum momento aparece alguém com más intenções,
	e para evitar que isso acontecesse de novo, eles colocaram uma proteção
	mágica aqui da qual expulsa qualquer um permanentemente (ouvi dizer que 
	uma das pessoas que tentou foi parar nos planos abyssais, que medo!).
	Enfim, apenas aproveite o lugar, tente não ofender ninguém e se for colocar
	algo de outra pessoa, certifique-se de que tenha permissão. 
    </div>

    <div class="col">
      <img id="pet" src="imagens/slappy.png" style="max-height: 90%;
      											   max-width: 85%;">
    </div>
  </div>

  <div class="botao">
	
	<button  class="btn"><a href="cadastro.php" style="text-decoration: none;
													   color: black">cadastrar</a></button>
	<button class="btn"><a href="login.php" style="text-decoration: none;
														color: black">entrar</a></button>
  </div>

</div>
	


</body>
</html>