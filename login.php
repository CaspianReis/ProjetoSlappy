<?php
  
  include("funcoes/conecta.php");
  if(isset($_POST['email_usuario'])){
    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario1'];
    $sql = "select * from tb_usuario where ds_email = '".$email."' and ds_senha = '".$senha."'";

    if($resposta = $mysqli->query($sql)){
      if($resposta->num_rows==0){
        $naoencontrou = "Usuario não encontrado";
      }else{
        while($linha = $resposta->fetch_object()){
          $_SESSION['codigo'] = $linha->cd_usuario;
          $_SESSION['nivel'] = $linha->id_nivel;
          $_SESSION['nome'] = $linha->nm_usuario;
          $_SESSION['login'] = $linha->ds_email;
          $_SESSION['senha'] = $linha->ds_senha;
          $_SESSION['imagem_usuario'] = $linha->im_imagem_usuario;


          if($_SESSION['nivel'] == 1){
            header('Location:perfil.php');
          }

          if($_SESSION['nivel'] == 2){
            header('Location:perfil_adm.php');
          }
          if($_SESSION['nivel'] == 3){
            ?>
            <script>
            alert("Você foi banido para planos abissais");
            window.location.href = "index.php";
            </script>
            <?php
          }
        }
      }
    }

  }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/cadastro.css">
  <link rel="stylesheet" href="css/global.css">
  <title>Faça seu Login</title>
</head>

<body>
   <div class="container">
  <div class="row">
    <div class="col">
    <form action="login.php" method="post">
      <h1>Login</h1>

      <div class="campo">
        <label>Email</label>
        <input type="email" name="email_usuario" placeholder="Insira seu email">
        <div class="underline"></div>
      </div>
      <br>
      <div class="campo">
        <label>Senha</label>
        <input type="password" name="senha_usuario1" placeholder="Insira sua senha">
        <div class="underline"></div>
      </div>
      <br>
      <h6 style="color: red; font-size: 13px;"><?php if(isset($_POST['email_usuario'])){echo $naoencontrou; } ?></h6>


      <input type="submit" name="feito" value="Feito">
    </form>

    <span class="sem-conta" id="conecte-se">Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></span>
    </div>
  

  </main>
</body>

</html>