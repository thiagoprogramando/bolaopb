<?php
    //Conexão
    include_once 'connect.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Bolão BP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body class="container">

    <!-- Header -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <img style="width: 100%;" src="img/home.png" class="img-fluid">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <header class="bg-dark p-2">
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a id="blog" class="nav-link active text-white" href="#">Blog</a></li>
                    <li class="nav-item"><a id="corrida" class="nav-link text-white" href="#">Corridas</a></li>
                    <li class="nav-item"><a id="usuario" class="nav-link text-white" href="#">Usuários</a></li>
                    <li class="nav-item"><a id="piloto" class="nav-link text-white" href="#">Pilotos</a></li>
                    <li class="nav-item"><a id="equipe" class="nav-link text-white" href="#">Equipes</a></li>
                    <li class="nav-item"><a id="classificacao" class="nav-link text-white" href="#">Classificação</a></li>
                    <li class="nav-item"><a id="planilha" class="nav-link text-white" href="#">Planilhas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="logout.php">Sair</a></li>
                </ul>
            </header>
        </div>
        <!-- Body -->
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="p-2 shadow">

                <!-- Blog -->
                <div id="blog_div" class="container">
                    <h3>Blog</h3>
                    <hr>

                    <form action="script.php" method="POST" class="card p-5">
                        <div class="mb-3">
                            <h2>Publicar</h2>
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control" id="titulo">
                        </div>
                        <div class="mb-3">
                            <label for="conteudo" class="form-label">Conteúdo</label>
                            <textarea class="form-control" name="conteudo" id="conteudo" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="blog" class="btn btn-success">Publicar</button>
                        </div>
                    </form>

                    <h2 class="mt-5 mb-5">Publicações</h2>

                    <?php
                        $sql = "SELECT * FROM blog ORDER BY id DESC";
                        $resultado = mysqli_query($connect, $sql); 
                            while ($dadosBlog = mysqli_fetch_array($resultado)):
                    ?>
                        <div class="card mt-2 mb-2">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $dadosBlog['titulo']; ?></h5>
                                <p class="card-text text-justify"><?php echo $dadosBlog['conteudo']; ?></p>
                                <form action="script.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dadosBlog['id']; ?>">
                                    <button type="submit" name="excluir-blog" class="btn btn-danger">Excluir</button>
                                </form>
                            </div>
                        </div>
                    <?php
                            endwhile;
                    ?> 
                </div>

                <!-- Corrida -->
                <div id="corrida_div" class="container d-none">
                    <h3>Corridas</h3>
                    <hr>

                    <div class="card p-5">
                        <h4>Calendário</h4>
                        <form action="script.php" method="POST">

                            <div class="row">
                                <div class="col-4">
                                    <select name="dia" class="form-select">
                                        <option selected>Dia</option>
                                        <option value="01">1</option>
                                        <option value="02">2</option>
                                        <option value="03">3</option>
                                        <option value="04">4</option>
                                        <option value="05">5</option>
                                        <option value="06">6</option>
                                        <option value="07">7</option>
                                        <option value="08">8</option>
                                        <option value="09">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <select name="mes" class="form-select">
                                        <option selected>Mês</option>
                                        <option value="01">Janeiro</option>
                                        <option value="02">Fevereiro</option>
                                        <option value="03">Março</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Maio</option>
                                        <option value="06">Junho</option>
                                        <option value="07">Julho</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <select name="ano" class="form-select">
                                        <option selected>Ano</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>  
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label for="local" class="form-label">Local</label>
                                    <input type="text" name="local" class="form-control" id="local">
                                </div>
                                <div class="col-4">
                                    <label for="circuito" class="form-label">Circuito</label>
                                    <input type="text" name="circuito" class="form-control" id="circuito">
                                </div>
                                <div class="col-4">
                                    <label for="horario" class="form-label">Horário</label>
                                    <input type="time" name="hora" class="form-control" id="horario">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3">
                                <button type="submit" name="criar-corrida" class="btn btn-success">Adicionar</button>
                            </div>
                        </form>
                    </div>

                    <div class="card mt-3 mb-3 p-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Horário</th>
                                    <th scope="col">Local</th>
                                    <th scope="col">Circuito</th>
                                    <th class="text-center" scope="col">Ação</th>
                                    <th class="text-center" scope="col">Palpites</th>
                                    <th class="text-center" scope="col">Resultado</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $num = 0;
                                $sql = "SELECT * FROM calendario_f1 ORDER BY mes, dia";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosCorrida = mysqli_fetch_array($resultado)):
                                        $num++;
                            ?>
                                <tr>
                                    <th><?php echo $dadosCorrida['id']; ?></th>
                                    <td><?php echo $dadosCorrida['dia'].'/'.$dadosCorrida['mes'].'/'.$dadosCorrida['ano']; ?></td>
                                    <td><?php echo $dadosCorrida['horario']; ?></td>
                                    <td><?php echo $dadosCorrida['local']; ?></td>
                                    <td><?php echo $dadosCorrida['circuito']; ?></td>
                                    <td class="text-center">
                                        <form action="script.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $dadosCorrida['id']; ?>">
                                            <button type="submit" name="excluir-corrida" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <a href="criar.php?id=<?php echo $dadosCorrida['id']; ?>" class="btn btn-success"><i class="bi bi-download"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCorrida<?php echo $num; ?>">
                                            <i class="bi bi-arrow-up-circle-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="modalCorrida<?php echo $num; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Aplicar Resultado</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="script.php" method="POST">
                                                    <div class="row">
                                                        
                                                        <input type="hidden" value="<?php echo $dadosCorrida['id']; ?>" name="id_corrida">
                                                        
                                                        <div class="mb-3">
                                                            <select name="corrida_1" class="form-select">
                                                                <option selected>1° na Corrida</option>
                                                                <?php
                                                                    $sql1 = "SELECT * FROM pilotos";
                                                                    $resultado1 = mysqli_query($connect, $sql1); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado1)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="mb-3">
                                                            <select name="corrida_2" class="form-select">
                                                                <option selected>2° na Corrida</option>
                                                                <?php
                                                                    $sql2 = "SELECT * FROM pilotos";
                                                                    $resultado2 = mysqli_query($connect, $sql2); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado2)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="mb-3">
                                                            <select name="corrida_3" class="form-select">
                                                                <option selected>3° na Corrida</option>
                                                                <?php
                                                                    $sql3 = "SELECT * FROM pilotos";
                                                                    $resultado3 = mysqli_query($connect, $sql3); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado3)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="mb-3">
                                                            <select name="corrida_4" class="form-select">
                                                                <option selected>4° na Corrida</option>
                                                                <?php
                                                                    $sql4 = "SELECT * FROM pilotos";
                                                                    $resultado4 = mysqli_query($connect, $sql4); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado4)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="mb-3">
                                                            <select name="corrida_5" class="form-select">
                                                                <option selected>5° na Corrida</option>
                                                                <?php
                                                                    $sql5 = "SELECT * FROM pilotos";
                                                                    $resultado5 = mysqli_query($connect, $sql5); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado5)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="mb-3">
                                                            <select name="corrida_6" class="form-select">
                                                                <option selected>6° na Corrida</option>
                                                                <?php
                                                                    $sql6 = "SELECT * FROM pilotos";
                                                                    $resultado6 = mysqli_query($connect, $sql6); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado6)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="mb-3">
                                                            <select name="corrida_7" class="form-select">
                                                                <option selected>7° na Corrida</option>
                                                                <?php
                                                                    $sql7 = "SELECT * FROM pilotos";
                                                                    $resultado7 = mysqli_query($connect, $sql7); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado7)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="mb-3">
                                                            <select name="corrida_8" class="form-select">
                                                                <option selected>8° na Corrida</option>
                                                                <?php
                                                                    $sql8 = "SELECT * FROM pilotos";
                                                                    $resultado8 = mysqli_query($connect, $sql8); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado8)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="mb-3">
                                                            <select name="corrida_9" class="form-select">
                                                                <option selected>9° na Corrida</option>
                                                                <?php
                                                                    $sql9 = "SELECT * FROM pilotos";
                                                                    $resultado9 = mysqli_query($connect, $sql9); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado9)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                    
                                                        <div class="mb-3">
                                                            <select name="corrida_10" class="form-select">
                                                                <option selected>10° na Corrida</option>
                                                                <?php
                                                                    $sql10 = "SELECT * FROM pilotos";
                                                                    $resultado10 = mysqli_query($connect, $sql10); 
                                                                        while ($dadosPilotos = mysqli_fetch_array($resultado10)):
                                                                ?>
                                                                <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" name="adicionar-resultado" class="btn btn-success">Aplicar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                   
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Usuario -->
                <div id="usuario_div" class="container d-none">
                    <h3>Usuários</h3>
                    <hr>

                    <div class="card mt-3 mb-3 p-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th class="text-center" scope="col">Vitórias</th>
                                    <th class="text-center" scope="col">Títulos</th>
                                    <th class="text-center" scope="col">Poles</th>
                                    <th class="text-center" scope="col">Pontos</th>
                                    <th class="text-center" scope="col">Adc Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $num = 0;
                                    $sql = "SELECT * FROM user ORDER BY pontos desc";
                                    $resultado = mysqli_query($connect, $sql); 
                                        while ($dadosUser = mysqli_fetch_array($resultado)):
                                            $num++;
                                ?>
                                    <tr>
                                        <th><?php echo $dadosUser['id']; ?></th>
                                        <td><?php echo $dadosUser['nome']; ?></td>
                                        <td><?php echo $dadosUser['email']; ?></td>
                                        <td class="text-center"><?php echo $dadosUser['vitorias']; ?></td>
                                        <td class="text-center"><?php echo $dadosUser['titulos']; ?></td>
                                        <td class="text-center"><?php echo $dadosUser['poles']; ?></td>
                                        <td class="text-center"><?php echo $dadosUser['pontos']; ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?php echo $num; ?>">
                                                <i class="bi bi-person-plus-fill"></i>
                                                </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal<?php echo $num; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Pontos</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="script.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="id" class="form-label">Usuário</label>
                                                            <input type="text" name="id" class="form-control" id="id" value="<?php echo $dadosUser['id']; ?>">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="ponto" class="form-label">Ponto</label>
                                                            <input type="number" name="ponto" class="form-control" id="ponto">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="vitorias" class="form-label">Vitórias</label>
                                                            <input type="number" name="vitorias" class="form-control" id="vitorias">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="titulos" class="form-label">Títulos</label>
                                                            <input type="number" name="titulos" class="form-control" id="titulos">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="poles" class="form-label">Poles</label>
                                                            <input type="number" name="poles" class="form-control" id="poles">
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" name="adicionar-pontos" class="btn btn-primary">Salvar</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Piloto -->
                <div id="piloto_div" class="container d-none">
                    <h3>Pilotos</h3>
                    <hr>

                    <form action="script.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <label for="Nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="Nome">
                        </div>
                        <div class="col-6">
                            <label for="Equipe" class="form-label">Equipe</label>
                            <input type="text" name="equipe" class="form-control" id="Equipe">
                        </div>
                        <div class="col-4">
                            <label for="Nacionalidade" class="form-label">Nacionalidade</label>
                            <input type="text" name="nacionalidade" class="form-control" id="Nacionalidade">
                        </div>
                        <div class="col-4">
                            <label for="Podiums" class="form-label">Podiums</label>
                            <input type="number" name="podiums" class="form-control" id="Podiums">
                        </div>
                        <div class="col-4">
                            <label for="Pontos" class="form-label">Pontos</label>
                            <input type="number" name="pontos" class="form-control" id="Pontos">
                        </div>
                        <div class="col-4">
                            <label for="Participações" class="form-label">Participações</label>
                            <input type="number" name="participacoes" class="form-control" id="Participações">
                        </div>
                        <div class="col-4">
                            <label for="Títulos" class="form-label">Títulos</label>
                            <input type="number" name="titulos" class="form-control" id="Títulos">
                        </div>
                        <div class="col-4">
                            <label for="final" class="form-label">Melhor Posição Final</label>
                            <input type="text" name="melhor_pos_final" class="form-control" id="final">
                        </div>
                        <div class="col-4">
                            <label for="Grid" class="form-label">Melhor Posição Grid</label>
                            <input type="text" name="melhor_pos_grid" class="form-control" id="Grid">
                        </div>
                        <div class="col-4">
                            <label for="Nascimento" class="form-label">Data Nascimento</label>
                            <input type="text" name="nascimento" class="form-control" id="Nascimento">
                        </div>
                        <div class="col-4">
                            <label for="Local" class="form-label">Local Nascimento</label>
                            <input type="text" name="local_nascimento" class="form-control" id="Local">
                        </div>
                            
                        <div class="mt-3 mb-3">
                            <button type="submit" name="criar-piloto" class="btn btn-success">Adicionar</button>
                        </div>
                    </div>
                    </form>

                    <div class="card mt-3 mb-3 p-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Equipe</th>
                                    <th scope="col">Pontos</th>
                                    <th scope="col">Títulos</th>
                                    <th class="text-center" scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPiloto = mysqli_fetch_array($resultado)):
                            ?>
                                <tr>
                                    <th><?php echo $dadosPiloto['id']; ?></th>
                                    <td><?php echo $dadosPiloto['nome']; ?></td>
                                    <td><?php echo $dadosPiloto['equipe']; ?></td>
                                    <td><?php echo $dadosPiloto['pontos']; ?></td>
                                    <td><?php echo $dadosPiloto['titulos']; ?></td>
                                    <td class="text-center">
                                        <form action="script.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $dadosPiloto['id']; ?>">
                                            <button type="submit" name="excluir-piloto" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    
                <!-- Equipe -->
                <div id="equipe_div" class="container d-none">
                    <h3>Equipes</h3>
                    <hr>

                    <form action="script.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <label for="Nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="Nome">
                        </div>
                        <div class="col-6">
                            <label for="Sede" class="form-label">Sede</label>
                            <input type="text" name="sede" class="form-control" id="Sede">
                        </div>
                        <div class="col-4">
                            <label for="chefe_equi" class="form-label">Chefe de Equipe</label>
                            <input type="text" name="chefe_equipe" class="form-control" id="chefe_equi">
                        </div>
                        <div class="col-4">
                            <label for="chefe_tec" class="form-label">Chefe Técnico</label>
                            <input type="text" name="chefe_tecnico" class="form-control" id="chefe_tec">
                        </div>
                        <div class="col-4">
                            <label for="Piloto" class="form-label">Piloto</label>
                            <input type="text" name="pilotos" class="form-control" id="Piloto">
                        </div>
                        <div class="col-4">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" name="modelo" class="form-control" id="modelo">
                        </div>
                        <div class="col-4">
                            <label for="motor" class="form-label">Motor</label>
                            <input type="text" name="motor" class="form-control" id="motor">
                        </div>
                        <div class="col-4">
                            <label for="pneus" class="form-label">Pneus</label>
                            <input type="text" name="pneus" class="form-control" id="pneus">
                        </div>
                        <div class="col-4">
                            <label for="temporada_1" class="form-label">1° Temporada</label>
                            <input type="text" name="temporada_1" class="form-control" id="temporada_1">
                        </div>
                        <div class="col-4">
                            <label for="titulos_mundiais" class="form-label">Títulos Mundiais</label>
                            <input type="number" name="titulos_mundiais" class="form-control" id="titulos_mundiais">
                        </div>
                        <div class="col-4">
                            <label for="vitorias" class="form-label">Vitórias</label>
                            <input type="number" name="vitorias" class="form-control" id="vitorias">
                        </div>
                        <div class="col-4">
                            <label for="pole_positions" class="form-label">Pole Positions</label>
                            <input type="number" name="pole_positions" class="form-control" id="pole_positions">
                        </div>
                        <div class="col-4">
                            <label for="voltas_rapidas" class="form-label">Voltas Rápidas</label>
                            <input type="number" name="voltas_rapidas" class="form-control" id="voltas_rapidas">
                        </div>
                            
                        <div class="mt-3 mb-3">
                            <button type="submit" name="criar-equipe" class="btn btn-success">Adicionar</button>
                        </div>
                    </div>
                    </form>

                    <div class="card mt-3 mb-3 p-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Sede</th>
                                    <th scope="col">Piloto</th>
                                    <th scope="col">Títulos</th>
                                    <th class="text-center" scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM equipes";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosEquipe = mysqli_fetch_array($resultado)):
                            ?>
                                <tr>
                                    <th><?php echo $dadosEquipe['id']; ?></th>
                                    <td><?php echo $dadosEquipe['nome']; ?></td>
                                    <td><?php echo $dadosEquipe['sede']; ?></td>
                                    <td><?php echo $dadosEquipe['pilotos']; ?></td>
                                    <td><?php echo $dadosEquipe['titulos_mundiais']; ?></td>
                                    <td class="text-center">
                                        <form action="script.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $dadosEquipe['id']; ?>">
                                            <button type="submit" name="excluir-equipe" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Classificação -->
                <div id="classificacao_div" class="container d-none">
                    <h3>Classificação</h3>
                    <hr>

                    <div class="card mt-3 mb-3 p-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th class="text-center" scope="col">Pontos</th>
                                    <th class="text-center" scope="col">Vitórias</th>
                                    <th class="text-center" scope="col">Títulos</th>
                                    <th class="text-center" scope="col">Poles</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $num = 0;
                                $sql = "SELECT * FROM user ORDER BY pontos desc";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosUser = mysqli_fetch_array($resultado)):
                                        $num++;
                            ?>
                                <tr>
                                    <th><?php echo $dadosUser['id']; ?></th>
                                    <td><?php echo $dadosUser['nome']; ?></td>
                                    <td class="text-center"><?php echo $dadosUser['pontos']; ?></td>
                                    <td class="text-center"><?php echo $dadosUser['vitorias']; ?></td>
                                    <td class="text-center"><?php echo $dadosUser['titulos']; ?></td>
                                    <td class="text-center"><?php echo $dadosUser['poles']; ?></td>
                                </tr>
                                    
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Planilha -->
                <div id="planilha_div" class="container d-none">
                    <h3>Planilha</h3>
                    <hr>
                    
                    <form action="script.php" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="nome_arquivo" class="form-label">Nome do Arquivo</label>
                            <input type="text" name="nome_arquivo" class="form-control" id="nome_arquivo">
                        </div>
                        <div class="col-12">
                            <label for="planilha" class="form-label">Planilha</label>
                            <input class="form-control" type="file" name="arquivo" id="planilha">
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" name="criar-planilha" class="btn btn-success">Enviar</button>
                        </div>
                    </form>

                    <div class="card mt-3 mb-3 p-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Arquivo</th>
                                    <th class="text-center" scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM planilha";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPlanilha = mysqli_fetch_array($resultado)):
                            ?>
                                <tr>
                                    <th><?php echo $dadosPlanilha['id']; ?></th>
                                    <td><?php echo $dadosPlanilha['nome_arquivo']; ?></td>
                                    <td><?php echo $dadosPlanilha['arquivo']; ?></td>
                                    <td class="text-center">
                                        <form action="script.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $dadosPlanilha['id']; ?>">
                                            <button type="submit" name="excluir-planilha" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

        $("#blog").click(function() {
            $('#corrida_div').addClass('d-none');
            $('#palpite_div').addClass('d-none');
            $('#usuario_div').addClass('d-none');
            $('#piloto_div').addClass('d-none');
            $('#equipe_div').addClass('d-none');
            $('#planilha_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');

            $('#blog_div').removeClass('d-none');
        });

        $("#corrida").click(function() {
            $('#blog_div').addClass('d-none');
            $('#palpite_div').addClass('d-none');
            $('#usuario_div').addClass('d-none');
            $('#piloto_div').addClass('d-none');
            $('#equipe_div').addClass('d-none');
            $('#planilha_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');

            $('#corrida_div').removeClass('d-none');
        });

        $("#palpite").click(function() {
            $('#blog_div').addClass('d-none');
            $('#corrida_div').addClass('d-none');
            $('#usuario_div').addClass('d-none');
            $('#piloto_div').addClass('d-none');
            $('#equipe_div').addClass('d-none');
            $('#planilha_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');

            $('#palpite_div').removeClass('d-none');
        });

        $("#usuario").click(function() {
            $('#blog_div').addClass('d-none');
            $('#corrida_div').addClass('d-none');
            $('#palpite_div').addClass('d-none');
            $('#piloto_div').addClass('d-none');
            $('#equipe_div').addClass('d-none');
            $('#planilha_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');

            $('#usuario_div').removeClass('d-none');
        });

        $("#piloto").click(function() {
            $('#blog_div').addClass('d-none');
            $('#corrida_div').addClass('d-none');
            $('#palpite_div').addClass('d-none');
            $('#usuario_div').addClass('d-none');
            $('#equipe_div').addClass('d-none');
            $('#planilha_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');

            $('#piloto_div').removeClass('d-none');
        });

        $("#equipe").click(function() {
            $('#blog_div').addClass('d-none');
            $('#corrida_div').addClass('d-none');
            $('#palpite_div').addClass('d-none');
            $('#usuario_div').addClass('d-none');
            $('#piloto_div').addClass('d-none');
            $('#planilha_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');

            $('#equipe_div').removeClass('d-none');
        });

        $("#classificacao").click(function() {
            $('#blog_div').addClass('d-none');
            $('#corrida_div').addClass('d-none');
            $('#palpite_div').addClass('d-none');
            $('#usuario_div').addClass('d-none');
            $('#piloto_div').addClass('d-none');
            $('#equipe_div').addClass('d-none');
            $('#planilha_div').addClass('d-none');

            $('#classificacao_div').removeClass('d-none');
        });

        $("#planilha").click(function() {
            $('#blog_div').addClass('d-none');
            $('#corrida_div').addClass('d-none');
            $('#palpite_div').addClass('d-none');
            $('#usuario_div').addClass('d-none');
            $('#piloto_div').addClass('d-none');
            $('#equipe_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');

            $('#planilha_div').removeClass('d-none');
        });

    </script>
</body>

</html>