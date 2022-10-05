<?php

    include("conecta.php");

    $tipo = $_POST['tipo'];

    $sql = "select * from tb_homebrew where id_sistema_homebrew = '$tipo' order by cd_homebrew desc";

    if($resposta = $mysqli->query($sql)){
        if($resposta->num_rows==0){
            echo "sem post";
        }else{
            while($linha = $resposta->fetch_object()){
              $_SESSION['codigo_homebrew'] = $linha->cd_homebrew;
              $_SESSION['titulo_homebrew'] = $linha->nm_homebrew;
              $_SESSION['texto_homebrew'] = $linha->ds_homebrew;
              $_SESSION['imagem_homebrew'] = $linha->im_imagem_homebrew;
              $_SESSION['data_homebrew'] = $linha->ds_data_homebrew;
              $_SESSION['hora_homebrew'] = $linha->ds_hora_homebrew;
              $_SESSION['nome_postador'] = $linha->id_usuario;
              $_SESSION['tipo'] = $linha->id_tipo_homebrew;    

            ?>

            <!-- Aqui esta ocorrendo a exibicao -->
           
            <div id="panel" align="center">
                <!-- Pegando link via url -->
            <p> <a href="post.php?codigo_post=<?php  echo $_SESSION['codigo_homebrew'];?>" class="titulo"><?php echo $_SESSION['titulo_homebrew'];?></a></p>
                <!-- outros... -->
             <?php if($_SESSION['imagem_homebrew']!=null){?><p><img src="<?php echo $_SESSION['imagem_homebrew']; ?>" class="foto"/></p><?php }?>
             <p><i class="bi bi-clock"></i> Postado em: <?php echo $_SESSION['data_homebrew'] . " às " . $_SESSION['hora_homebrew']; ?><br><i class="bi bi-person-circle"></i> Postado por: <?php echo $_SESSION['nome_ppostador'];?> </p>
                
             <p>
                  <i class="bi bi-hand-thumbs-up"></i> <i class="bi bi-chat-dots"></i>
             </p>
        
       </div> 
       <?php
    
          }
        }
      }

?>