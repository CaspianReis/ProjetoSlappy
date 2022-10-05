<!DOCTYPE html>
<html>
<head>
  <title>Crie sua Homebrew!</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/global.css">
  <link rel="stylesheet" type="text/css" href="css/criar_homebrew.css">
</head>
<body>

  <div class="container">

      <form action="" method="post" enctype="multipart/form-data">
      <h1>No que você está pensando hoje?</h1>

      <div class="campo">
        <label>Nome da Homebrew</label>
        <input type="text" name="nome_homebrew" placeholder="Nome da homebrew" required>
        <div class="underline"></div>
      </div>
      <br>
      <div class="campo">
        <label>Insira seu arquivo</label>
          <input type="file" name="image" id="image" required>
        
      </div>
      <br>
      <div class="campo">
        <label>Descreva sua criação</label>
        <div class="form-group">
        <textarea class="form-control" name="descricao" placeholder="Insira sua descrição" required class="form-control" rows="3"></textarea>
      </div>
        
        <div class="underline"></div>
      </div>
      <br>
      <label>Selecione o tipo da sua criação</label>
      <div class="campo " >
        <select name="tipo" class="custom-select" required>
          <option selected> Escolha...</option>
          <option value="1">Monstro</option>
          <option value="2">Item Mágico</option>
          <option value="3">Aventura</option>
          <option value="4">Classe</option>
          <option value="5">Mapa</option>

        </select> 
        <div class="underline"></div>
      </div>
      <br>
      <label>Selecione o sistema da sua criação</label>
      <div class="campo " >
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sistema" value="1"> Dungeon & Dragons (D&D)
          <br>  
          <input class="form-check-input" type="radio" name="sistema" value="2"> Call of Cthulhu
          <br>  
          <input class="form-check-input" type="radio" name="sistema" value="3">  Ordem Paranormal
          <br>  
          <input class="form-check-input" type="radio" name="sistema" value="4"> Terra Devastada
          <br>  
          <input class="form-check-input" type="radio" name="sistema" value="5"> Defensores de Tóquio(3D&T)
          <br>  
        </div>
      <div class="underline"></div>
    </div>
      <br>
      <input type="submit" id="salvar" name="salvar" value="Publicar">
      <input type="hidden" name="enviar" value="salvar">

    </form>
    <?php
  
    include("funcoes/conecta.php");

    if(isset($_POST['enviar']) && $_POST['enviar'] == "salvar"){
      $nome_homebrew = $_POST['nome_homebrew'];
      $descricao = $_POST['descricao'];
      date_default_timezone_set('America/Sao_Paulo');
      $data = date("d/m/Y");
      $hora = date("H:i:s");
      $codigo = $_SESSION['codigo'];
      $nome = $_SESSION['nome'];
      $tipo = $_POST['tipo'];
      $sistema = $_POST['sistema'];
                        

      $uploaddir = 'imagens/uploads/';
      $uploadfile = $uploaddir.basename($_FILES['image']['name']);
      $imagename = $uploaddir.basename($_FILES['image']['name']);

      if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
                                
        $sql = "insert into tb_homebrew value(null, '".$codigo."', '".$sistema."', '".$tipo."', '".$nome."', '".$nome_homebrew."', '".$imagename."', '".$descricao."', '".$data."', '".$hora."')";
        if($resposta=$mysqli->query($sql)){
          header('Location:homebrew.php');
        }
      }else{
        ?>
        <script>
            alert("Caiu 1 no d20");
        </script>
        <?php
      }
           
    }          

?>
  </div>

    

</body>
</html>