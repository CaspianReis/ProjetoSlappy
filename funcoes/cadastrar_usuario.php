<?php
  
    include("conecta.php");
    include("protect.php");
    protect();

// Pegando dados
    $nome = $_POST['nome_usuario'];
    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario1'];
    $data = date('d/m/Y');
    $imagem = "imagens/perfilbranco.png";

    $sql = "insert into tb_usuario value(null, 1, '".$nome."', '".$email."', '".$senha."', '".$data."', '".$imagem."'); ";


    if($mysqli->query($sql)){
    
        ?>
        <script>
            window.location.href="../comunidade.php";
        </script>
        <?php
    }else{
        ?>
        <script>
            window.location.href="../index.php";
        </script>
        <?php
    }



?>