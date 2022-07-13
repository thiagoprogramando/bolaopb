<?php
    //Header
    include_once 'header.php';
    include_once 'connect.php';

    $mes = date('m');
    $dia = date('d');
    $data = date('Y-m-d');

    //Próxima Prova
    $sql = "SELECT * FROM calendario_f1 WHERE data_prova > '$data' ORDER BY mes, dia LIMIT 1";
    $resultado = mysqli_query($connect, $sql);
    $proximaprova = mysqli_fetch_array($resultado);
            
?>

    <!-- Body -->
    <div class="row mb-5">

        <!-- Menu Esquerda -->
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

        <!-- Centro -->
        <div class="col-sm-12 col-md-6 col-lg-6">

            <div class="bg-dark mt-2">
                <p class="text-center text-white p-3">
                    Palpites <br>
                    <small>Prova: <?php echo $proximaprova['local'].' - '.$proximaprova['circuito']; ?></small>
                </p>
            </div>

            <div>
                <form action="script.php" method="POST">

                    <input type="hidden" name="id_corrida" value="<?php echo $proximaprova['id']; ?>">

                    <div class="mb-3">
                        <label for="Nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="Nome" placeholder="Digite Seu Nome No Bolao">
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="Email" placeholder="Digite Seu Email No Bolao">
                    </div>

                    <div class="mb-3">
                        <select name="corrida_1" class="form-select">
                            <option selected>1° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="corrida_2" class="form-select">
                            <option selected>2° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="corrida_3" class="form-select">
                            <option selected>3° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="corrida_4" class="form-select">
                            <option selected>4° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="corrida_5" class="form-select">
                            <option selected>5° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="corrida_6" class="form-select">
                            <option selected>6° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="corrida_7" class="form-select">
                            <option selected>7° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="corrida_8" class="form-select">
                            <option selected>8° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="corrida_9" class="form-select">
                            <option selected>9° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="corrida_10" class="form-select">
                            <option selected>10° na Corrida</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="grid_1" class="form-select">
                            <option selected>1° no Grid</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="grid_2" class="form-select" >
                            <option selected>2° no Grid</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="grid_3" class="form-select" >
                            <option selected>3° no Grid</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="grid_4" class="form-select" >
                            <option selected>4° no Grid</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="melhor_volta" class="form-select" >
                            <option selected>Melhor volta</option>
                            <?php
                                $sql = "SELECT * FROM pilotos";
                                $resultado = mysqli_query($connect, $sql); 
                                    while ($dadosPilotos = mysqli_fetch_array($resultado)):
                            ?>
                            <option value="<?php echo $dadosPilotos['nome']; ?>"><?php echo $dadosPilotos['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" name="criar-palpite" class="btn btn-outline-success">Enviar Palpite</button>
                    </div>
                    
                </form>
            </div>

        </div>

        <!-- Menu Direita -->
        <div class="col-sm-12 col-md-3 col-lg-3">

            <div class="list-group mt-1">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"> CADASTRO E PALPITES </a>
                <a href="form_cadastro.php" class="list-group-item list-group-item-action">CADASTRO AQUI</a>
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