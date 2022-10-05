<?php
  
    include("funcoes/conecta.php");

    if(isset($_POST['salvar'])){
      $nome_homebrew = $_POST['nome_homebrew'];
      $descricao = $_POST['descricao'];
      date_default_timezone_set('America/Sao_Paulo');
      $data = date("d/m/Y");
      $hora = date("H:i:s");
      $codigo = $_SESSION['codigo'];
      $nome = $_SESSION['nome'];
      $tipo = $_POST['tipo'];
      $sistema = $_POST['sistema'];
      $homebrew = "null";
                        

      $uploaddir = 'imagens/uploads/';
      $uploadfile = $uploaddir.basename($_FILES['image']['name']);
      $imagename = $uploaddir.basename($_FILES['image']['name']);

      if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
                                
        $sql = "insert into tb_homebrew value('".$homebrew."', '".$codigo."', '".$sistema."', '".$tipo."', '".$nome_homebrew."', '".$imagename."', '".$descricao."', '".$data."', '".$hora."')";
        if($resposta = $mysqli->query($sql)){
          header('Location:../homebrew.php');
        }
      }else{
        echo "erro ao enviar";
      }
           
    }          

?>
<span id="mais" style="display:none;"></span>
                            <button onclick="leiaMais()" class="btnLeiaMais">Leia mais</button><br>