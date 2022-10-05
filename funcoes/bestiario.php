        <?php
include("conecta.php");

        // inicio do contato com a tabela publicacao
        $sec = "select * from tb_homebrew where id_tipo_homebrew='1' ";

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