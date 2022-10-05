<?php
	include("funcoes/conecta.php");

    	if($_SESSION['nivel'] == 1){
?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Perfil</title>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="css/home.css">
		    <link rel="stylesheet" type="text/css" href="css/perfil.css">
		    <link rel="stylesheet" type="text/css" href="css/fundo.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		</head>
		<body>
		
		<nav class="nav navbar navbar-light"  style="background-color: rgb(62 42 147);
													 box-shadow: -1px 0px 20px 6px #000000;
			 										 padding: 3px;
			 										 text-decoration: none;
			 										 color: white;">
				<a class="navbar-brand" >
		  		     
		 		</a>
		 		<div class="navbar-nav-scroll">
				  	<ul class="navbar-nav bd-navbar-nav flex-row">
				  		
				  		<li class="nav-item">
				  			<a class="nav-link" href="comunidade.php" style="text-decoration: none;
				  															color: white;
				  															margin-right: 6px;">Comunidade
				  				
				  			</a>
				  		</li>
				  		<li class="nav-item">
							<a class="nav-link" href="sistemas.php" style="color: white;
																		   margin-right: 6px;">Sistemas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="perfil.php" style="color: white;
																		 margin-right: 6px;
																		 font-weight: bold;">
								<span class="sr-only">
			        				(página atual)
			        			</span>Perfil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="homebrew.php" style="color: white;
																	       margin-right: 6px;">Homebrew</a>
				  		</li>
				  	</ul>
			  </div>
			</nav>
			
		<div class="barra-lateral" style="position: fixed;">
			<div class="dados-perfil">
			
			<div class="img" style="max-width: 45%;  max-height: 45%;" >
					<?php 
					if($_SESSION['imagem_usuario']!=null){
						?>
						<p>
							<img src="<?php echo $_SESSION['imagem_usuario']; ?>" id="perfil"  alt="foto de perfil" class="rounded-circle"	style="max-height: 100%; max-width: 100%;"/>
						</p>
						<?php
						}
						?>
					<h3><?php echo $_SESSION['nome'];?></h3>
					<form action="funcoes/logout.php" method="post">
						<input type="submit"  name="Desconectar" value="Desconectar" style="border-radius: 8px;  border-color: purple; background-color: purple; color: white; height: 30px; width: 100px;">
					</form>
			</div>

			<br>

			<span>aqui é onde vai ficar a descrição breve do usuario</span>

			<div class="sequestradores">
				<a>48</a> <br>
				seguidores
			</div>

			<div class="sequestradores">
				<a>89</a> <br>
				seguindo
			</div>

			<div class="sequestradores">
				<a>35</a> <br>
				posts
			</div>
			
			
			</div>
		</div> 
		<div>
		<script>
				var wordLimit = 30;

				$(function() {

				//trata o conteúdo na inicialização da página
				$('.show-summary').each(function() {
					var post = $(this);
					var text = post.text();
					//encontra palavra limite
					var re = /[\s]+/gm, results = null, count = 0;
					while ((results = re.exec(text)) !== null && ++count < wordLimit) { }
					//resume o texto e coloca o link
					if (results !== null && count >= wordLimit) {
						var summary = text.substring(0, re.lastIndex - results[0].length);
						post.text(summary + '...');
						post.data('original-text', text);
						post.append('<a style=" color: dark;" class="read-more">Leia mais</a>');
					}
				});

				//ao clicar num link "Leia mais", mostra o conteúdo original
				$('.read-more').on('click', function() {
					var post = $(this).closest('.show-summary');
					var text = post.data('original-text');
					post.text(text);
				});

				});
					
			</script>
			<div id="editar">
				
			</div>
			<hr style="border-color: white">
			<h3 style="color: white; margin-left: 10%;" align="center">Meus Posts</h3>
			<?php


        
        	$sec = "select * from tb_homebrew where id_usuario = '".$_SESSION['codigo']."'";

            if($resposta = $mysqli->query($sec)){
			if($resposta->num_rows==0){
            ?>
				 <h5 style="color:white; text-align: center;">Não tem posts ainda</h5>
            <?php
			}else{
				while($linha = $resposta->fetch_object()){
                $_SESSION['codigo_homebrew'] = $linha->cd_homebrew;
                $_SESSION['titulo_homebrew'] = $linha->nm_homebrew;
                $_SESSION['texto_homebrew'] = $linha->ds_homebrew;
                $_SESSION['imagem_homebrew'] = $linha->im_imagem_homebrew;
                $_SESSION['data_homebrew'] = $linha->ds_data_homebrew;
                $_SESSION['hora_homebrew'] = $linha->ds_hora_homebrew;
                $_SESSION['id_postador'] = $linha->id_usuario;
                $_SESSION['nome_postadorH'] = $linha->nm_postador;
               

                
                ?>
            
                
                <div class="card" style="padding-top: 20px; width: 45%; margin-left: 33%; margin-top: 5%;">
                    
                    <h3 class="card-title" align="center"><a href="post.php?codigo_homebrew=<?php  echo $_SESSION['codigo_homebrew'];?>" class="titulo" style="text-decoration: none; color: black;"><?php echo $_SESSION['titulo_homebrew'];?></a></h3>
                    <div class="card-title" style="background-color: lightgray;">
                    <?php if($_SESSION['imagem_homebrew']!=null){?><p><img class=" w-100 h-100 rounded"  src="<?php echo $_SESSION['imagem_homebrew']; ?>" class="foto"/></p><?php }?>  
                    
                    <div class="card-body " style="background-color: lightgray;">
                    <?php 
                            if($_SESSION['texto_homebrew']!=null){
                        ?>

                            
                            <p > <b style="color: black; font-weight: bold; font-size: 25px; margin-right: 5px;"> Descrição: </b>  <span class="show-summary"><?php echo $_SESSION['texto_homebrew']; ?> </span>
                            </p>



                        <?php 
                            }
                        ?>
                        <p>
                            <b>Postado em: </b>  <?php echo $_SESSION['data_homebrew'] . " às " . $_SESSION['hora_homebrew']; ?>
                            <br>

                             <b> Postado por: </b> <?php echo $_SESSION['nome_postadorH'];?>
                                             
                        
                        </p>
                    </div>
                    </div>
                    <div class="card-body " >
                        
                        <div class="btn-group container"  role="group" aria-label="Basic example" >
                            <button type="button" class="btn btn-secondary" style="color: black; background-color: transparent; border-color: white;">curtir</button>

                            <button type="button" class="btn btn-secondary" style="color: black; background-color: transparent; border-color: white;">comentar</button>
                        </div>
                    </div>
                </div>
           <?php
                
            }



        }
        
        
      }


?>
		</div>



<?php
    }else{
        ?>
        <script>
            alert("Você não tem acesso a esta página");
            window.location.href = "function/logout.php";
        </script>
        <?php
    }

?>