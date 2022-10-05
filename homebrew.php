<?php

    include("funcoes/conecta.php");

    if($_SESSION['nivel'] == 1 ){

        // Caso o usuario pertencer a esse nivel, o conteudo é gerado

        ?>
<!DOCTYPE html>
<html>
<head>
	<title>Homebrew</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/homebrew.css">
    <link rel="stylesheet" type="text/css" href="css/fundo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<nav  class="nav navbar navbar-light"  style="background-color: rgb(62 42 147);
											 box-shadow: -1px 0px 20px 6px #000000;
	 										 padding: 3px;
	 										 text-decoration: none;
	 										 color: white;">
        

  		     <img src="imagens/perfilbranco.png" width="50" height="50" alt="">
 		</a>
 		<div class="navbar-nav-scroll">
		  	<ul class="navbar-nav bd-navbar-nav flex-row">
		  		
		  		<li class="nav-item">
		  			<a class="nav-link" href="comunidade.php" style="text-decoration: none;
		  															color: white;
		  															margin-right: 8px;">Comunidade
		  				
		  			</a>
		  		</li>
		  		<li class="nav-item">
					<a class="nav-link" href="sistemas.php" style="color: white;
																   margin-right: 8px;">Sistemas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="perfil.php" style="color: white;
																 margin-right: 8px;">Perfil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="homebrew.php" style="color: white;
															       margin-right: 8px;
															       font-weight: bold">

						<span class="sr-only">
	        				(página atual)
	        			</span>
						Homebrew</a>
		  		</li>
		  	</ul>
	  </div>
	</nav>


    <div class="barra-lateral" style="position: fixed;">
        <div class="itens-homebrew">
            <a href="javascript::" onclick="tudo('funcoes/categorias.php')" class="itens"  style="text-decoration: none; color: black; padding-top: 15%; font-size: 185%; max-width: 60%;" name="tipo">Todos</a>

            <a  href="javascript::" onclick="monstro('funcoes/bestiario.php')"class="itens"  style="text-decoration: none; color: black; padding-top: 15%; font-size: 185%; max-width: 60%;" name="tipo">Bestiário</a>

           	<a href="javascript::" onclick="item('funcoes/item.php')" class="itens"  style="text-decoration: none; color: black; padding-top: 15%; font-size: 185%; max-width: 60%;" name="tipo">Itens Mágicos</a>

           	<a href="javascript::" onclick="aventura('funcoes/aventura.php')" class="itens"  style="text-decoration: none; color: black; padding-top: 15%; font-size: 185%; max-width: 60%;" name="tipo">Aventuras</a>
 
          	<a href="javascript::" onclick="classe('funcoes/classe.php')" class="itens"  style="text-decoration: none; ; color: black; padding-top: 15%; font-size: 185%; max-width: 60%;" name="tipo">Classes</a>

           	<a href="javascript::" onclick="mapa('funcoes/mapa.php')" class="itens"  style="text-decoration: none; color: black; padding-top: 15%; font-size: 185%; max-width: 60%;" name="tipo">Mapas</a>
            <br>
            <button style="border-radius: 8px; margin-right: 15%; margin-top: 8%; border-color: purple; background-color: purple; height: 45px;"><a class="itens" href="criar_homebrew.php"style="text-decoration: none; max-width: 60%; color: white;  max-width: 60%; ">
            Criar homebrew</a></button>
        </div>
    </div> 




            <script>

                // Pesquisa

            //     $("#pesquisar_tipo").click(function(){
            //     $.ajax({
            //     url: "pesquisar.php",
            //     type: "POST",
            //     dataType: "html",

            //     data:{
            //         tipo: $("#tipo").val()
                    
            //     },
            //     success: (resposta)=>{
            //         $("#publicacao").html(resposta);
            //     }

            // }).fail(function(jqXHR, textStatus ) {
            //     console.log("Request failed: " + textStatus);

            // }).always(function() {
            //     console.log("");
            // }); 
            //     })


                function monstro(arquivo){
                    if(arquivo){
                    $.ajax({
                    url: arquivo,
                    type: 'GET',
                    data: arquivo,

                    success: function(data){
                        $("#publicacao").html(data);
                    }

                });
                    }
                }

                  function item(arquivo){
                    if(arquivo){
                    $.ajax({
                    url: arquivo,
                    type: 'GET',
                    data: arquivo,

                    success: function(data){
                        $("#publicacao").html(data);
                    }

                });
                    }
                }
                  
                function aventura(arquivo){
                    if(arquivo){
                    $.ajax({
                    url: arquivo,
                    type: 'GET',
                    data: arquivo,

                    success: function(data){
                        $("#publicacao").html(data);
                    }

                });
                    }
                }
                function classe(arquivo){
                    if(arquivo){
                    $.ajax({
                    url: arquivo,
                    type: 'GET',
                    data: arquivo,

                    success: function(data){
                        $("#publicacao").html(data);
                    }

                });
                    }
                }
                function mapa(arquivo){
                    if(arquivo){
                    $.ajax({
                    url: arquivo,
                    type: 'GET',
                    data: arquivo,

                    success: function(data){
                        $("#publicacao").html(data);
                    }

                });
                    }
                }
                function tudo(arquivo){
                    if(arquivo){
                    $.ajax({
                    url: arquivo,
                    type: 'GET',
                    data: arquivo,

                    success: function(data){
                        $("#publicacao").html(data);
                    }

                });
                    }
                }
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

        </body>
        </html>

        <div id="publicacao">
        
        <?php


        // inicio do contato com a tabela publicacao
        $sec = "select * from tb_homebrew order by cd_homebrew desc";
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
        <!-- Redirecionado a pagina index -->
        <script>
            alert("Você não tem acesso a esta página");
            window.location.href = "index.php";
        </script>
        <?php
    }
        ?>


</body>
</html>