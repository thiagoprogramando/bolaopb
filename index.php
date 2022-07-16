<?php
    //Header
    include_once 'header.php';
    include_once 'connect.php';

    $mes = date('m');
    $dia = date('d');
    $data = date('Y-m-d');
?>

    <!-- Body -->
    <div class="row mb-5">
        <div class="col-sm-12 col-md-3 col-lg-3">

            <div class="list-group mt-1">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"> CALENDÁRIO 2022 </a>
                <?php
                    $sql = "SELECT * FROM calendario_f1 ORDER BY mes, dia";
                    $resultado = mysqli_query($connect, $sql); 
                        while ($dadosCalendario = mysqli_fetch_array($resultado)):
                ?>
                    <a href="#" class="list-group-item list-group-item-action"><?php echo $dadosCalendario['dia'].'/'.$dadosCalendario['mes'].'/'.$dadosCalendario['ano']; ?> - <?php echo $dadosCalendario['local']; ?></a>
                <?php endwhile; ?>
            </div>

        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">

            <!-- Home -->
            <div id="home_div" class="mt-2">
                <div class="bg-dark mt-2">
                    <p class="text-center text-white p-3">
                        Informações <br>
                        <small>Recentes</small>
                    </p>
                </div>

                <?php
                    $sql = "SELECT * FROM blog";
                    $resultado = mysqli_query($connect, $sql); 
                        while ($dadosBlog = mysqli_fetch_array($resultado)):
                ?>
                    <div class="card p-3">
                        <h4><?php echo $dadosBlog['titulo']; ?></h4>
                        <p class="text-justify">
                            <?php echo $dadosBlog['conteudo']; ?>
                        </p>
                    </div>
                 <?php endwhile; ?>
                
            </div>

            <!-- Calendário -->
            <div id="calendario_div" class="mt-2 d-none">
                <div class="bg-dark mt-2">
                    <p class="text-center text-white p-3">
                        Calendario 2022 - Formula 1 <br>
                        <small>Confira as Provas</small>
                    </p>
                </div>
                <table class="table border table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Local</th>
                            <th scope="col">Circuito</th>
                            <th scope="col">Horário</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM calendario_f1 ORDER BY mes, dia";
                        $resultado = mysqli_query($connect, $sql); 
                            while ($dadosCalendario = mysqli_fetch_array($resultado)):
                    ?>
                        <tr>
                            <th><?php echo $dadosCalendario['dia'].'/'.$dadosCalendario['mes'].'/'.$dadosCalendario['ano']; ?></th>
                            <td><?php echo $dadosCalendario['local']; ?></td>
                            <td><?php echo $dadosCalendario['circuito']; ?></td>
                            <td><?php echo $dadosCalendario['horario']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pilotos -->
            <div id="pilotos_div" class="mt-2 d-none">
                <div class="bg-dark mt-2">
                    <p class="text-center text-white p-3">
                        Pilotos 2022 - Formula 1 <br>
                    </p>
                </div>

                <div class="bg-dark text-white text-center"><small>Pilotos</small></div>
                <div class="row">
                    <?php
                        $sql = "SELECT * FROM pilotos ORDER BY nome";
                        $resultado = mysqli_query($connect, $sql); 
                            while ($dadosPiloto = mysqli_fetch_array($resultado)):
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <p>
                            <strong><?php echo $dadosPiloto['nome']; ?></strong> <br>
                            <strong>Equipe</strong>	<?php echo $dadosPiloto['equipe']; ?> <br>
                            <strong>Nacionalidade</strong>	<?php echo $dadosPiloto['nacionalidade']; ?> <br>
                            <strong>Podiums</strong>	<?php echo $dadosPiloto['podiums']; ?> <br>
                            <strong>Pontos</strong>	<?php echo $dadosPiloto['pontos']; ?> <br>
                            <strong>Participações</strong>	<?php echo $dadosPiloto['participacoes']; ?> <br>
                            <strong>Titulos</strong>	<?php echo $dadosPiloto['titulos']; ?> <br>
                            <strong>Melhor Posição Final</strong>	<?php echo $dadosPiloto['melhor_posicao_final']; ?> <br>
                            <strong>Melhor Posição Grid</strong>	<?php echo $dadosPiloto['melhor_posicao_grid']; ?> <br>
                            <strong>Data Nascimento</strong>	<?php echo $dadosPiloto['data_de_nascimento']; ?> <br>
                            <strong>Local Nascimento</strong>	<?php echo $dadosPiloto['local_nascimento']; ?> <br>
                        </p>
                    </div>
                    <?php endwhile; ?>
                </div>

            </div>

            <!-- Equipes -->
            <div id="equipes_div" class="mt-2 d-none">
                <div class="bg-dark mt-2">
                    <p class="text-center text-white p-3">
                        Equipes 2022 - Formula 1 <br>
                    </p>
                </div>

                <div class="bg-dark text-white text-center"><small>Equipes</small></div>
                <div class="row">
                    <?php
                        $sql = "SELECT * FROM equipes ORDER BY nome";
                        $resultado = mysqli_query($connect, $sql); 
                            while ($dadosEquipe = mysqli_fetch_array($resultado)):
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <p>
                            <strong>Nome: <?php echo $dadosEquipe['nome']; ?></strong> <br>
                            <strong>Sede: </strong>	<?php echo $dadosEquipe['sede']; ?> <br>
                            <strong>Chefe Equipe: </strong>	<?php echo $dadosEquipe['chefe_equipe']; ?> <br>
                            <strong>Chefe Técnico: </strong>	<?php echo $dadosEquipe['chefe_tecnico']; ?> <br>
                            <strong>Pilotos: </strong>	<?php echo $dadosEquipe['pilotos']; ?> <br>
                            <strong>Modelo: </strong>	<?php echo $dadosEquipe['modelo']; ?> <br>
                            <strong>Motor: </strong>	<?php echo $dadosEquipe['motor']; ?> <br>
                            <strong>Pneus: </strong>	<?php echo $dadosEquipe['pneus']; ?> (x95) <br>
                            <strong>1ª Temporada: </strong>	<?php echo $dadosEquipe['tempora_1']; ?> <br>
                            <strong>Titulos Mundiais: </strong>	<?php echo $dadosEquipe['titulos_mundiais']; ?> <br>
                            <strong>Vitórias: </strong>	<?php echo $dadosEquipe['vitorias']; ?> <br>
                            <strong>Pole Positions: </strong>	<?php echo $dadosEquipe['pole_positions']; ?> <br>
                            <strong>Voltas Rapidas: </strong>	<?php echo $dadosEquipe['voltas_rapidas']; ?> <br>
                        </p>
                    </div>
                    <?php endwhile; ?>
                </div>

            </div>

            <!-- Classificação -->
            <div id="classificacao_div" class="mt-2 d-none">
                <div class="bg-dark mt-2">
                    <p class="text-center text-white p-3">
                        Classificação 2022 <br>
                        <small>Classificação</small>
                    </p>
                </div>
                <table class="table border table-striped table-bordered">
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
                            <th><?php echo $num; ?></th>
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

            <!-- Contato -->
            <div id="contato_div" class="mt-2 d-none">
                <div class="bg-dark mt-2">
                    <p class="text-center text-white p-3">
                        Contato <br>
                        <small>Contato Bolão PB</small>
                    </p>
                </div>
                <p class="text-center">
                    Qualquer duvida mandem email para: contato@bolaoamigospb.com.br
                    <br>
                    Telefone Celular (83) 99683-2939 - Whatsapp
                </p>
            </div>

        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">

            <div class="list-group mt-1">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"> CADASTRO E PALPITES </a>
                <a href="form_cadastro.php" class="list-group-item list-group-item-action">CADASTRO AQUI</a>
                <a href="form_palpite.php" class="list-group-item list-group-item-action">PALPITE CORRIDA</a>
                <a href="form_palpite_grid.php" class="list-group-item list-group-item-action">PALPITE GRID</a>
            </div>

            <ul class="list-group mt-1">
                <li class="list-group-item bg-dark text-white">PRÓXIMA PROVA</li>
                <?php
                    $sql = "SELECT * FROM calendario_f1 WHERE data_prova > '$data' ORDER BY mes, dia LIMIT 1";
                    $resultado = mysqli_query($connect, $sql); 
                        while ($dadosCalendario = mysqli_fetch_array($resultado)):
                ?>
                    <li class="list-group-item">
                        <p><font class="text-danger">Local</font> <br> <small><?php echo $dadosCalendario['local']; ?></small></p>
                        <p><font class="text-danger">Data</font> <br> <small><?php echo $dadosCalendario['dia'].'/'.$dadosCalendario['mes'].'/'.$dadosCalendario['ano']; ?></small></p>
                    </li>
                <?php endwhile; ?>
            </ul>

            <div class="list-group mt-1">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"> PLANILHA </a>
                <?php
                    $sql = "SELECT * FROM planilha ORDER BY id";
                    $resultado = mysqli_query($connect, $sql); 
                        while ($dadosPlanilha = mysqli_fetch_array($resultado)):
                ?>
                    <a download href="planilha/<?php echo $dadosPlanilha['arquivo']; ?>" class="list-group-item list-group-item-action"><?php echo $dadosPlanilha['nome_arquivo']; ?></a>
                <?php endwhile; ?>
            </div>

        </div>
    </div>
    
<?php
    //Footer
    include_once 'footer.php';
?>