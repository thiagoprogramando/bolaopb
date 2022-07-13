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
                <p class="text-justify text-white p-3">
                    O Cadastro é de extrema importancia para o bolão, cadastros incompletos ou sem o que estamos pedindo não terão participação no bolão, pedimos o minimo de dados para participar conosco.
                </p>
            </div>

            <div>
                <form action="script.php" method="POST">
                    
                    <div class="mb-3">
                        <label for="Nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="Nome" placeholder="Nome completo">
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="Email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="Nascimento" class="form-label">Data Nascimento</label>
                        <input type="text" name="data_nascimento" class="form-control" id="Nascimento" placeholder="Ex: 21/03/2020">
                    </div>
                    <div class="mb-3">
                        <label for="Cidade" class="form-label">Cidade</label>
                        <input type="text" name="cidade" class="form-control" id="Cidade" placeholder="Ex: Natal">
                    </div>
                    <div class="mb-3">
                        <label for="Estado" class="form-label">Estado</label>
                        <input type="text" name="estado" class="form-control" id="Estado" placeholder="Ex: Rio Grande do Norte">
                    </div>
                    <div class="mb-3">
                        <label for="bolao" class="form-label">Nome no Bolao</label>
                        <input type="text" name="nome_bolao" class="form-control" id="bolao" placeholder="Primeiro e último nome">
                    </div>
                    <div class="mb-3">
                        <label for="f1" class="form-label">Idolo na Formula 1</label>
                        <input type="text" name="idolo_f1" class="form-control" id="f1" placeholder="Insira o nome no piloto que mais gosta na formula 1">
                    </div>

                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" name="criar-user" class="btn btn-outline-success">Cadastrar</button>
                    </div>

                    
                </form>
            </div>

        </div>

        <!-- Menu Direita -->
        <div class="col-sm-12 col-md-3 col-lg-3">

            <div class="list-group mt-1">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white"> CADASTRO E PALPITES </a>
                <a href="form_palpite.php" class="list-group-item list-group-item-action">PALPITE AQUI</a>
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