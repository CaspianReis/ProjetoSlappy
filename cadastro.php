<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/cadastro.css">
  <link rel="stylesheet" href="css/global.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <title>Faça seu cadastro</title>
</head>

<body>

  <script>
    
    $(document).ready(function(){

      $("#feito").click(function(){
        if($("#senha").val() != $("#confirme_senha").val()){
          document.getElementById("show").innerHTML = "Senhas não compatíveis";
          return false;
        }
      });
    });
  </script>

  <div class="container">
  <div class="row">
    <div class="col">
      <form action="funcoes/cadastrar_usuario.php" method="post">
      <h1>Cadastre-se</h1>

      <div class="campo">
        <label>Nome de usuário</label>
        <input type="text" name="nome_usuario" placeholder="Nome de usuário" required>
        <div class="underline"></div>
      </div>
      <br>
      <div class="campo">
        <label>Email</label>
        <input type="email" name="email_usuario" placeholder="Insira seu email" required>
        <div class="underline"></div>
      </div>
      <br>
      <div class="campo">
        <label>Senha</label>
        <input type="password" name="senha_usuario1" id="senha" placeholder="Insira sua senha" required>
        <div class="underline"></div>
      </div>
      <br>
      <label>Confirme sua senha</label>
      <div class="campo" >
        <input type="password" name="senha_usuario2" id="confirme_senha" placeholder="Confirme sua senha">
        <div class="underline"></div>
      </div>
      <br>
      <h6 id="show" style="color: red; font-size: 13px;"></h6>
      <input type="submit" id="feito" name="feito" value="feito">
    </form>

    <span class="sem-conta" id="login">já tem uma conta? <a href="login.php">Conecte-se</a></span>
 
</div>
</body>

</html>