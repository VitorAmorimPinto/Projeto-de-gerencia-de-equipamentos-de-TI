<?php
    include("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <title>Equipamentos - TI</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-menu">
        <div class="container-fluid">
            <a class="navbar-brand text-logo" href="#">Equipamentos - T.I</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Equipamentos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item disabled" href="">Equipamentos disponíveis</a></li>
                      <li><a class="dropdown-item" href="cadastro.php">Cadastrar Equipamentos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Empréstimos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="gerencia-emprestimos.php">Gerenciar empréstimos</a></li>
                      <li><a class="dropdown-item" href="historico.php">Histórico de Empréstimos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="configuracoes-gerais.php" >
                        Configurações gerais
                    </a>
                    </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#"  data-bs-toggle="modal" data-bs-target="#modalSobre">
                        Sobre
                      </a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row border-bottom mt-5 p-4">
            <div class="col-md-8">
                <h2>Equipamentos disponíveis</h2>
            </div>
            <div class="col-md-4">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                </form>
            </div>
        </div>
        <!-- <div class="row mt-4"> -->
            <?php
                $sql="SELECT id,imagem,tipo FROM `tb_tipoequipamento`";
                $count = 3;
                $count2 = 0;
                $res= mysqli_query($con,$sql);
                while ($linha = mysqli_fetch_assoc($res)){
            if ($count == 3) {
                echo "<div class='row mt-4'>";
                $count = 0;
            }   
                
        echo   "<div class='col-md-4'>
                    <a href='#' class='link-produtos' data-bs-toggle='modal' data-bs-target='#modalRealizarEmprestimo'>
                        <div class='effect-card back-card mx-auto card' style='width: 15rem;'>
                            <div class='text-center top-card border-bottom'><h5>".$linha['tipo']."</h5></div>
                            <img src='img/".$linha['imagem']."' height='150px' class='card-img-top border-bottom' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>Total: 20</h5>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <p class='pl-4' ><i class='far fa-circle icon-succ'></i> Disponíveis: 15</p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <p class='pl-4' ><i class='far fa-circle icon-dang'></i> Emprestados: 05</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>";
                if ($count2 == 2) {
                    echo "</div>";
                    $count2 = -1;
                }
                $count++; 
                $count2++;
                }
            ?>
        <!-- </div> -->
    </div>
<div class="modal fade" id="modalRealizarEmprestimo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Realizar empréstimo</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Patrimônio</label>
                            <input type="text" name="patrimonio" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Tipo do equipamento</label>
                            <input type="text" name="equipamento" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tipo do Requerente</label><br>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">Aluno</option>
                                <option value="2">Professor</option>
                                <option value="3">Funcionário</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>E-mail do Funcionário</label><br>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">...</option>
                                <option value="2">...</option>
                                <option value="3">...</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nome do Requerente</label>
                            <input type="text" name="nomeRequerente" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Registro do requerente</label>
                            <input type="text" name="registroRequerente" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>E-mail do requerente</label>
                            <input type="text" name="emailRequerente" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 mx-auto text-center">
                            <button class="btn btn-primary mx-auto" type="button">Registrar Empréstimo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="modalSobre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Sobre o Sistema</h5>
       <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
     </div>
     <div class="modal-body">
       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6">Esse é um sistema de controle e gerenciamento de estoque de equipamentos
             tecnológicos disponibilizados para empréstimo dentro de uma instituição de ensino superior.</div>
           <div class="col-md-6 ms-auto">Esse sistema surgiu por conta de uma demanda real que nossa instituição de
             ensino possuía, em um cenário onde não havia o gerenciamento efetivo dos equipamentos emprestados a
             alunos e funcionários. </div>
         </div>

       </div>
     </div>
     <div class="modal-footer">
       <p class="text-muted">Projeto desenvolvido pelos alunos do "Grupo do Grupo", do 3º Período do curso de
         Sistemas de Informação da Unisales.</p>
     </div>
     <!--Aqui termina o modal-->


</body>
<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="js/bootstrap.js"></script> -->
<script src="js/bootstrap.bundle.min.js"></script>
</html>