<?php

include("funcoes/conecta.php");
$_SESSION['ident_post'] = $_GET['codigo_homebrew'];


$sql = "select * from tb_homebrew where cd_homebrew = '".$_SESSION['ident_post']."'";

// selecionando dados do post

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
        ?>

<!-- Exibindo conteudo post -->

<div id="conteudo_pagina">
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="style.css">
            <!-- CSS only -->
	        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
	        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<a href="homebrew.php">Voltar</a>
<div id="panel" align="left">
                <p> <a href="post.php?codigo_homebrew=<?php $post =  $_SESSION['codigo_homebrew']; echo $_SESSION['codigo_homebrew'];?>" class="titulo"><?php echo $_SESSION['titulo_homebrew'];?></a></p>
                <?php if($_SESSION['imagem_homebrew']!=null){?><p><img src="<?php echo $_SESSION['imagem_homebrew']; ?>" class="foto"/></p><?php }?>
                 <?php if($_SESSION['texto_homebrew']!=null){?><p class="descricao"><?php echo $_SESSION['texto_homebrew'];?></p><?php }?>
                 <p><i class="bi bi-clock"></i> Postado em: <?php echo $_SESSION['data_homebrew'] . " às " . $_SESSION['hora_homebrew']; ?><br><i class="bi bi-person-circle"></i> Postado por: <?php echo $_SESSION['nome'];?> </p>

           </div>
</body>
</html>



    <?php 


}
}
}
?>

<!-- Curtir, teste -->

<div id="panel">

 

        <!-- <p><input type="hidden" name="valor_curt" value="1"></p> -->
        <p><input type="submit" id="curtir" value="Curtir" class="btn btn-button"></p>
        <!-- <input type="hidden" name="curtir_post" value="enjoy"> -->

   

    <!-- Verificando like -->

    <script>
        $(document).ready(function(){
            $("#curtir").click(function(){
                $.ajax({
                url: "curtir.php",
                type: "POST",
                dataType: "html",

                data:{
                    cod: 1,
                    id: <?php echo $_SESSION['ident_post']; ?>,
                    id_user: <?php echo $_SESSION['codigo']; ?>
                    
                },
                success: (resposta)=>{
                    $("#like").html(resposta);
                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);

            }).always(function() {
                console.log("");
            }); 
            });

            $("#comentar_botao").click(function(){
                $.ajax({
                url: "comentario.php",
                type: "POST",
                dataType: "html",

                data:{
                    comentario_usuario: $("#comentario").val(),
                    id_comentario: <?php echo $_SESSION['ident_post']; ?>
                    
                },
                success: (resposta)=>{
                    $("#conteudo_pagina").html(resposta);
                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);

            }).always(function() {
                console.log("");
            }); 

            

            });



        });
    </script>


    <hr>

    <!-- selecionando like -->

    <div id="like">
    <p> 
<?php

         $sel_like = "select * from tb_curtir where id_homebrew = '".$_SESSION['ident_post']."'";

    if($resposta = $mysqli->query($sel_like)){
        if($resposta->num_rows==0){
 
        }else{
        if($resposta->num_rows==1){
            $_SESSION['qt_like'] =$resposta->num_rows ." like";
            ?>
            <i class="bi bi-hand-thumbs-up"></i> <?php echo $_SESSION['qt_like']; ?> 
            <?php
        }elseif($resposta->num_rows > 1 ){

            $_SESSION['qt_like'] = $resposta->num_rows ." likes";

            ?>
            <i class="bi bi-hand-thumbs-up"></i> <?php echo $_SESSION['qt_like']; ?> 
            <?php

        } 
            
            }

        }

?>

</p>

<!-- comentario quantidade -->
<p>
<?php

    $coment = "select * from tb_comentario where id_post = '".$_SESSION['ident_post']."' order by cd_comentario desc";

        if($resposta = $mysqli->query($coment)){
        if($resposta->num_rows==0){
            echo "sem comentario";
        }else{


            if($resposta->num_rows==1){
                $_SESSION['qt_comentario'] =$resposta->num_rows ." comentario";
                ?>

                <i class="bi bi-chat-dots"></i> <?php echo $_SESSION['qt_comentario']; ?>
                <?php

            }elseif($resposta->num_rows > 1 ){

                $_SESSION['qt_comentario'] = $resposta->num_rows ." comentarios";

                ?>
               <i class="bi bi-chat-dots"></i> <?php echo $_SESSION['qt_comentario']; ?>
                <?php

            } 


}
}

?>
</p>

    </div>

</div>

<!-- aba comentario -->

<div id="panel">
   
        <p><?php echo "Digite algo, " . $_SESSION['nome'] . ":";?></p>
        <p><textarea name="comentario" id="comentario" class="form form-control" placeholder="Digite uma mensagem" ></textarea></p>
        <p><input type="submit" id="comentar_botao" value="enviar" class="btn btn-button"></p>
     

<!-- verificando comentario -->

<hr>

<!-- selecionando comentario -->


    <?php


    $coment = "select * from tb_comentario where id_comentario = '".$_SESSION['ident_post']."' order by cd_comentario desc";
    
    if($resposta = $mysqli->query($coment)){
        if($resposta->num_rows==0){
            echo "sem comentario";
        }else{

            // pegando a quantidade de comentario

          

            while($linha = $resposta->fetch_object()){
            $_SESSION['nome_comentario'] = $linha->nm_comentario_nome;
            $_SESSION['desc_coment'] = $linha->ds_comentario;
            $_SESSION['data_coment'] = $linha->ds_data;
            $_SESSION['hora_coment'] = $linha->ds_hora;
            
            
    
    ?>
    <!-- exibicao comentario -->
    <div id="comentario_exibir">
    
             
                <p><img src="imagens/semfoto.png" class="foto-coment"><b><?php echo " " . $_SESSION['nome_comentario']; ?></b></p>
                <p class="list-group-item"><?php echo $_SESSION['desc_coment']; ?></p>
                <p class="list-group-item"><i class="bi bi-clock"></i> <?php echo "Postado em " . $_SESSION['data_coment'] . " às " . $_SESSION['hora_coment'];?></p>
                
                <!-- css foto -->
                <style>
                    .foto-coment{
                        width: 30px;
                        height: 30px;
                        border-radius: 3px;
                    }
                </style>

    </div>

    <?php

        }
    }

}

    ?>
</div>


</div>