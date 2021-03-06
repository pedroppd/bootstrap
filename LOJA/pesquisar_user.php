<?php 
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Pesquisa de Cursos</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Krona+One" rel="stylesheet">

    <?php 
  include_once('conexao.php');
      session_start();
      if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
          unset($_SESSION['login']);
          unset($_SESSION['senha']);
          header('location:index.php');
          }
       
      $logado = $_SESSION['login'];

      
          $sql = "SELECT * FROM usuario WHERE login_usuario='$logado'";

           $in = mysqli_query($con, $sql);

            $com = mysqli_fetch_assoc($in);

          $id=$com['idusuario'];


     

      
    ?>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-info mb-3">
      <div class="container">
        <a href="index_user.php" class="navbar-brand h1 mb-0"><i class="fab fa-jenkins"></i>P&C Programação</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite"><span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSite">
          <ul class="navbar-nav mr-5">
            <li class="nav-item">
              <a class="nav-link mr-3" href="index_user.php"><b>INÍCIO</b></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  data-toggle="dropdown" id="navDrop" href="#"><b>CURSOS</b></a>
              <div class="dropdown-menu">
                <a href="cursos.php" class="dropdown-item n1">HTML 5 & CSS 3</a><hr>
                <a href="cursos.php" class="dropdown-item n0">PHP</a><hr>
                <a href="cursos.php" class="dropdown-item n0">JAVASCRIPT</a><hr>
                <a href="cursos.php" class="dropdown-item n0">MYSQL</a><hr>
                <a href="cursos.php" class="dropdown-item n0">PYTHON</a><hr>
                <a href="cursos.php" class="dropdown-item n6">JAVA</a>
              </div>
            </li>
          </ul>

          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle mr-5"  data-toggle="dropdown" id="navDrop"><i class="far fa-user-circle"></i><b>OLÁ, <?php echo $logado ?></b></a>
                <div class="dropdown-menu">
                  <div class="form-group dropdown-item">
                    <p class="text-center">DESEJA SAIR?</p>
                  </div>
                  <div class="form-group text-center">
                    <div class="col-12">
                     <?php
                         echo"<button class='btn btn-danger'><a class='nav-link' style='color: white' href='index.php?sair=".$id."'>
                       SAIR</a></button>";
                        ?>
                    </div>
                  </div>
                </div>
            </li>
          </ul>
      
          <form action="pesquisar_user.php" class="form-inline" method="post">
            <input type="search" class="form-control col-6 mr-2"  placeholder="Buscar..." name="pesquisar">
            <button class="btn btn-dark" type="submit">Ok</button>
          </form>
      </div> <!-- .collapse.navbar-collapse -->
    <a href="#" class="nav-link navbar-nav" data-toggle="modal" data-target="#siteModal" style="color: #fff"><b>CARRINHO</b><i class="fas fa-shopping-cart fa-2x mr-2" style="color: #fff"></i></a>
       </div> <!-- .container -->
     
  </nav>

	<div class="container">
    <div class="jumbotron mb-3"> 
	    <div class="row justify-content-sm-center">
        <div class="col-md-4 col-sm-6 mb-5 mt-5">
        	<div class="card mb-5">
        		<?php

        			$pesquisar = $_POST['pesquisar'];
        			$sql = "SELECT * FROM produto WHERE nome_produto LIKE '%$pesquisar%' LIMIT 5";
        			$pesq = mysqli_query($con,$sql);

        			while($dados = mysqli_fetch_array($pesq)){
        		?>
                
                <img src="img/<?php echo $dados['foto_produto']; ?>" alt="html&css" class="card-img-top">
                <div class="card-body">
                  <h4 class="card-target"><?php echo $dados['nome_produto']; ?></h4>
                  <h6 class="card-subtarget mb-2 text-muted">Curso para WebDev</h6>
                  <p class="card-text mt-5 text-success pdif"><?php echo "<b>PREÇO: R$ ".$dados['preco_produto']."</b>"; ?></p>
                </div>
                <div class="card-body card-curioso">
                  <?php echo '<a href="cursos.php?acao=add&id='.$dados['idproduto'].'">Adicionar ao carrinho</a>'; ?>
                </div>
                <hr color="#000">
            
            <?php 
              }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>

	<div class="container-fluid mb-2"> 
        <div class="row"> 
            <div class="col-12 mb-3"><hr class="mt-0"></div>
            <div class="col-sm-4">
                <h3 class="text-info">P&C Programação</h3>
                <p>Site criado para o projeto final da matéria E-Commerce</p>
                <p>Ministrada pela Profª. Simone</p>
            </div>
            <div class="col-sm-4">
				        <h3 class="text-info">Menu</h3>
				        <div class="list-group">
				        	<a href="index.php" class="">Início</a>
				        	<a href="#" class="" data-toggle="modal" data-target="#siteModal">Cursos</a>
				        	<a href="#" class="" data-toggle="modal" data-target="#siteModal">Cadastre-se</a>
				        </div>
            </div>
            <div class="col-sm-4">
				        <h3 class="text-info">Social</h3>
				        <div class="btn-group-vertical btn-group-lg" role="group"> 
				        	<a href="https://facebook.com" target="_blank" class="btn btn-outline-primary text-left"><i class="fab fa-facebook-square"></i>facebook</a>
				        	<a href="https://twitter.com" target="_blank" class="btn btn-outline-info text-left"><i class="fab fa-twitter"></i>Twitter</a>
				        	<a href="https://instagram.com" target="_blank" class="btn btn-outline-warning text-left"><i class="fab fa-instagram"></i>Instagram</a>
				        </div>
            </div>
        </div>
    </div>

    <footer class="page-footer mt-2">
        <div class="footer-copyright text-center">  
            <div class="container-fluid">                  
              <div class="col-12"><hr></div>
              <p class="text-info">Desenvolvido por Christian dos Santos Silva & Pedro Palmerim Dantas</p>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="siteModal" tabindex="-1" role="dialog"> <!-- modal -->
      <div class="modal-dialog modal-lg" role="document" > <!-- modal-dialog -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center">Carrinho de compras</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row justify-content-center mb-5"> <!-- Row Ini -->
                <div class="col-sm-12 col-md-10 col-lg-8">  <!-- Col Ini -->
                  <form action="cursos.php" method="post"> <!-- Form Ini -->
                    <div class="form-row mt-4"> <!-- Form-row 1 -->
                      <div class="col-sm-3 form-group">     
                        <p class="text-center mb-0"><b>Produto</b></p>
                      </div>
                      <div class="col-sm-6 form-group">     
                        <p class="text-center mb-0"><b>Nome/Preço</b></p>
                      </div>                      
                    </div> <!-- /Form-row 1 -->
                    <hr class="mt-0">
                    
                    <?php
                    
                      if (!isset($_SESSION['carrinho'])){
                              $_SESSION['carrinho'] = array();
                            }
                      if (isset($_GET['acao'])){
                      /*Adiciona ao carrinho*/
                        if ($_GET['acao']=='add') {
                          $id = intval($_GET['id']);
                          if(!isset($_SESSION['carrinho'][$id])){
                            $_SESSION['carrinho'][$id]=0;
                          }else{
                            $_SESSION['carrinho'][$id]+=1;
                          }
                        }
                      }

                      if (isset($_GET['del'])){
                        $del = $_GET['del'];
                        unset($_SESSION['carrinho'][$del]);
                      }     
        
                      if(count($_SESSION['carrinho'])==0){
                              echo"<tr><td colspan='5'>Não há produto no carrinho</td></tr><br><br>"; 
                      }else{
                        include_once("conexao.php");
                        $total=0;
                        foreach($_SESSION['carrinho'] as $id => $qtd):

                        $sql = "SELECT * FROM produto WHERE idproduto='$id'";
                        $qr= mysqli_query($con,$sql)or die(mysqli_error());
                        $in = mysqli_fetch_assoc($qr);
                        $idprod = $in['idproduto'];
                        $nome = $in['nome_produto'];
                        $desc = $in['descricao_produto'];
                        $foto = $in['foto_produto'];
                        $preco = number_format($in['preco_produto'], 2, '.', '.');
                        $sub = number_format($in['preco_produto']*$qtd, 2, ',', '.');
                                     
                                          
                        $total+=$preco;
                    ?>

                    <div class="form-row mb-3">
                      <div class="col-sm-3 form-group">
                          <img width="100px" height="100px" class="rounded-circle mx-auto d-block" src="img/<?php echo $foto; ?>">
                      </div>

                      <div class="col-sm-6 form-group text-center mt-3">
                        <?php
                          echo "<p style='font-size: 13pt'><b>$nome</b></p><br>";
                          echo "<p style='font-size: 13pt; margin-top: -40px;'><b>R$ $preco</p></b>"; 
                        ?>
                      </div>
                      <div class="col-sm-3 form-group mt-4 text-center">
                        <?php
                         echo"<button class='btn btn-warning'><a class='nav-link' style='color: white' href='index_user.php?del=".$id."'>REMOVER</a></button>";
                        ?>
                      </div>                          
                    </div>
                    <hr>

                    <?php
                      endforeach;

                           if (isset($_GET['sair'])){
         
                                session_start();             
                                
                                unset($_SESSION['login']);
                                unset($_SESSION['carrinho']);
                                unset($_SESSION['carrinho'][$del]);
                                unset($_SESSION['carrinho'][$sair]);
                                session_destroy();

                                header('location:index.php');
          
                   }
                    ?>
                    
                    <div class="form-row">
                      <div class="col-sm-6 offset-sm-3 text-center">
                      <?php 
                        echo"<p style='font-size: 15pt'><b>TOTAL: R$ ".$total.",00</b></p>";
                      ?>
                      </div>
                    </div>

                    <?php
                    
                    }   
               
                      if (isset($_POST['enviar'])){
                        $in = "INSERT INTO venda(produto_idproduto, quantidade_venda, nome_venda)VALUES('$idprod', '$qtd', '$logado')";
                        $inserir = mysqli_query($con,$in);
                        
                        echo"<script>alert('venda finalizada com sucesso!!')</script>";
                        
                      }
                       
                      if(isset($_GET['comprando'])){
                        header('location:cursos.php');
                      }
                                
                    ?>
                  </form> <!-- /Form Ini -->
                  <div class="form-row text-center"> <!-- Form-row 5 -->  
                    <div class="col-sm-12 mt-5"> 
                      <form action="" enctype="multiparte/form-data" method="post">
                        <button class="btn btn-success" name="comprando">Continuar comprando =)</button>
                        <button class="btn btn-danger" name="enviar">Finalizar compra =(</button>
                      </form>
                    </div>
                  </div> <!-- /Form-row 5 --> 
                </div> <!-- /Col Ini -->
              </div> <!-- /Row Ini -->
            </div> <!-- /container -->
          </div> <!-- /modal-body -->
        </div> <!-- /modal-content -->
      </div> <!-- /modal-dialog -->
    </div> <!-- /modal -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>  
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
  
  </script>	
</body>
</html>
