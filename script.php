<?php

    //Conexão
    include_once 'connect.php';

    $data = date('d/m/Y');

    //Criar Publicação
    if(isset($_POST['blog'])):

        //Dados
        $titulo = mysqli_escape_string($connect, $_POST['titulo']);
        $conteudo = mysqli_escape_string($connect, $_POST['conteudo']);
    
        //Cadastra no DB
        $sql = "INSERT INTO blog (titulo, conteudo, data_pub) 
                    VALUES ('$titulo', '$conteudo', '$data')";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                      ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Excluir Publicação
    if(isset($_POST['excluir-blog'])):
        //Dados
        $id = mysqli_escape_string($connect, $_POST['id']);
    
        //Cadastra no DB
        $sql = "DELETE FROM blog WHERE id = '$id'";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                      ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Criar Corrida
    if(isset($_POST['criar-corrida'])):

        //Dados
        $dia = mysqli_escape_string($connect, $_POST['dia']);
        $mes = mysqli_escape_string($connect, $_POST['mes']);
        $ano = mysqli_escape_string($connect, $_POST['ano']);
        $local = mysqli_escape_string($connect, $_POST['local']);
        $circuito = mysqli_escape_string($connect, $_POST['circuito']);
        $hora = mysqli_escape_string($connect, $_POST['hora']);
        $data = $ano.'-'.$mes.'-'.$dia;
    
        //Cadastra no DB
        $sql = "INSERT INTO calendario_f1 (dia, mes, ano, local, circuito, horario, data_prova) 
                    VALUES ('$dia', '$mes', '$ano', '$local', '$circuito', '$hora', '$data')";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                      ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;
    
    //Aplicar Resultado
    if(isset($_POST['adicionar-resultado'])):

        //Dados
        $id = mysqli_escape_string($connect, $_POST['id_corrida']);
        $corrida1 = mysqli_escape_string($connect, $_POST['corrida_1']);
        $corrida2 = mysqli_escape_string($connect, $_POST['corrida_2']);
        $corrida3 = mysqli_escape_string($connect, $_POST['corrida_3']);
        $corrida4 = mysqli_escape_string($connect, $_POST['corrida_4']);
        $corrida5 = mysqli_escape_string($connect, $_POST['corrida_5']);
        $corrida6 = mysqli_escape_string($connect, $_POST['corrida_6']);
        $corrida7 = mysqli_escape_string($connect, $_POST['corrida_7']);
        $corrida8 = mysqli_escape_string($connect, $_POST['corrida_8']);
        $corrida9 = mysqli_escape_string($connect, $_POST['corrida_9']);
        $corrida10 = mysqli_escape_string($connect, $_POST['corrida_10']);
        
    
        //SELECIONA TODOS OS PALPITES E CASO ACERTE ADICIONA PONTUAÇÂO
        $sql = "SELECT * FROM palpites WHERE id_corrida = '$id'";
        $resultado = mysqli_query($connect, $sql); 
            while ($dadosPalpites = mysqli_fetch_array($resultado)):
                
                if($dadosPalpites['corrida_1'] === '$corrida1'):
                    $sql = "UPDATE user SET pontos = pontos + 25 WHERE nome = '$dadosPalpites[nome]'";
                    mysqli_query($connect, $sql); 
                endif;
                
                if($dadosPalpites['corrida_2'] === '$corrida2'):
                    $sql = "UPDATE user SET pontos = pontos + 18 WHERE nome = '$dadosPalpites[nome]'";
                    mysqli_query($connect, $sql); 
                endif;
                
                if($dadosPalpites['corrida_3'] === '$corrida3'):
                    $sql = "UPDATE user SET pontos = pontos + 15 WHERE nome = '$dadosPalpites[nome]'";
                    mysqli_query($connect, $sql); 
                endif;
                
                if($dadosPalpites['corrida_4'] === '$corrida4'):
                    $sql = "UPDATE user SET pontos = pontos + 12 WHERE nome = '$dadosPalpites[nome]'";
                    mysqli_query($connect, $sql); 
                endif;
                
                if($dadosPalpites['corrida_5'] === '$corrida5'):
                    $sql = "UPDATE user SET pontos = pontos + 10 WHERE nome = '$dadosPalpites[nome]'";
                    mysqli_query($connect, $sql); 
                endif;
                
                if($dadosPalpites['corrida_6'] === '$corrida6'):
                    $sql = "UPDATE user SET pontos = pontos + 8 WHERE nome = '$dadosPalpites[nome]'";
                    mysqli_query($connect, $sql); 
                endif;
                
                if($dadosPalpites['corrida_7'] === '$corrida7'):
                    $sql = "UPDATE user SET pontos = pontos + 6 WHERE email = '$dadosPalpites[email]'";
                    mysqli_query($connect, $sql); 
                endif;
                
                if($dadosPalpites['corrida_8'] === '$corrida8'):
                    $sql = "UPDATE user SET pontos = pontos + 4 WHERE email = '$dadosPalpites[email]'";
                    mysqli_query($connect, $sql); 
                endif;
                
                if($dadosPalpites['corrida_9'] === '$corrida9'):
                    $sql = "UPDATE user SET pontos = pontos + 2 WHERE email = '$dadosPalpites[email]'";
                    mysqli_query($connect, $sql); 
                endif;
                
                if($dadosPalpites['corrida_10'] === '$corrida10'):
                    $sql = "UPDATE user SET pontos = pontos + 1 WHERE email = '$dadosPalpites[email]'";
                    mysqli_query($connect, $sql); 
                endif;
                
        endwhile;
        
        ?> 
            <script>
                alert("Sucesso!");
                window.location.href = "dashboard.php";
            </script> 
        <?php
        
    endif;

    //Excluir Corridas
    if(isset($_POST['excluir-corrida'])):
        //Dados
        $id = mysqli_escape_string($connect, $_POST['id']);
    
        //Cadastra no DB
        $sql = "DELETE FROM calendario_f1 WHERE id = '$id'";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                      ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Adicionar Pontos
    if(isset($_POST['adicionar-pontos'])):
        
        //Dados
        $id = mysqli_escape_string($connect, $_POST['id']);
        $ponto = mysqli_escape_string($connect, $_POST['ponto']);
        $vitorias = mysqli_escape_string($connect, $_POST['vitorias']);
        $titulos = mysqli_escape_string($connect, $_POST['titulos']);
        $poles = mysqli_escape_string($connect, $_POST['poles']);
    
        //Cadastra no DB
        $sql = "UPDATE user SET pontos = pontos + '$ponto', vitorias = vitorias + '$vitorias', titulos = titulos + '$titulos', poles = poles + '$poles' WHERE id = '$id'";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                      ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Criar Piloto
    if(isset($_POST['criar-piloto'])):

        //Dados
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $equipe = mysqli_escape_string($connect, $_POST['equipe']);
        $nacionalidade = mysqli_escape_string($connect, $_POST['nacionalidade']);
        $podiums = mysqli_escape_string($connect, $_POST['podiums']);
        $pontos = mysqli_escape_string($connect, $_POST['pontos']);
        $participacoes = mysqli_escape_string($connect, $_POST['participacoes']);
        $titulos = mysqli_escape_string($connect, $_POST['titulos']);
        $melhor_pos_final = mysqli_escape_string($connect, $_POST['melhor_pos_final']);
        $melhor_pos_grid = mysqli_escape_string($connect, $_POST['melhor_pos_grid']);
        $nascimento = mysqli_escape_string($connect, $_POST['nascimento']);
        $local_nascimento = mysqli_escape_string($connect, $_POST['local_nascimento']);
    
        //Cadastra no DB
        $sql = "INSERT INTO pilotos (nome, equipe, nacionalidade, podiums, pontos, participacoes, titulos, melhor_posicao_final, melhor_posicao_grid, data_de_nascimento, local_nascimento) 
                    VALUES ('$nome', '$equipe', '$nacionalidade', '$podiums', '$pontos', '$participacoes', '$titulos', '$melhor_pos_final', '$melhor_pos_grid', '$nascimento', '$local_nascimento')";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                      ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Excluir Pilotos
    if(isset($_POST['excluir-piloto'])):
        //Dados
        $id = mysqli_escape_string($connect, $_POST['id']);
    
        //Cadastra no DB
        $sql = "DELETE FROM pilotos WHERE id = '$id'";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                      ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Criar Equipe
    if(isset($_POST['criar-equipe'])):

        //Dados
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sede = mysqli_escape_string($connect, $_POST['sede']);
        $chefe_equipe = mysqli_escape_string($connect, $_POST['chefe_equipe']);
        $chefe_tecnico = mysqli_escape_string($connect, $_POST['chefe_tecnico']);
        $pilotos = mysqli_escape_string($connect, $_POST['pilotos']);
        $modelo = mysqli_escape_string($connect, $_POST['modelo']);
        $motor = mysqli_escape_string($connect, $_POST['motor']);
        $pneus = mysqli_escape_string($connect, $_POST['pneus']);
        $temporada_1 = mysqli_escape_string($connect, $_POST['temporada_1']);
        $titulos_mundiais = mysqli_escape_string($connect, $_POST['titulos_mundiais']);
        $vitorias = mysqli_escape_string($connect, $_POST['vitorias']);
        $pole_positions = mysqli_escape_string($connect, $_POST['pole_positions']);
        $voltas_rapidas = mysqli_escape_string($connect, $_POST['voltas_rapidas']);

        //Cadastra no DB
        $sql = "INSERT INTO equipes (nome, sede, chefe_equipe, chefe_tecnico, pilotos, modelo, motor,pneus,tempora_1, titulos_mundiais, vitorias, pole_positions, voltas_rapidas) 
        VALUES ('$nome', '$sede', '$chefe_equipe', '$chefe_tecnico', '$pilotos', '$modelo', '$motor', '$pneus', '$temporada_1', '$titulos_mundiais', '$vitorias', '$pole_positions', '$voltas_rapidas')";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                    echo "Erro";
                    ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Excluir Equipes
    if(isset($_POST['excluir-equipe'])):
        //Dados
        $id = mysqli_escape_string($connect, $_POST['id']);
    
        //Cadastra no DB
        $sql = "DELETE FROM equipes WHERE id = '$id'";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                      ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Criar User
    if(isset($_POST['criar-user'])):

        //Dados
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $data_nascimento = mysqli_escape_string($connect, $_POST['data_nascimento']);
        $cidade = mysqli_escape_string($connect, $_POST['cidade']);
        $estado = mysqli_escape_string($connect, $_POST['estado']);
        $nome_bolao = mysqli_escape_string($connect, $_POST['nome_bolao']);
        $idolo_f1 = mysqli_escape_string($connect, $_POST['idolo_f1']);
        $pontos = 0;

        //Cadastra no DB
        $sql = "INSERT INTO user (nome, email, data_nascimento, cidade, estado, nome_bolao, idolo_f1, pontos) 
        VALUES ('$nome', '$email', '$data_nascimento', '$cidade', '$estado', '$nome_bolao', '$idolo_f1', '$pontos')";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "index.php";
                      </script> 
                    <?php
                else:
                    ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "index.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Criar User
    if(isset($_POST['criar-palpite'])):

        //Dados
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $id_corrida = mysqli_escape_string($connect, $_POST['id_corrida']);
        $corrida_1 = mysqli_escape_string($connect, $_POST['corrida_1']);
        $corrida_2 = mysqli_escape_string($connect, $_POST['corrida_2']);
        $corrida_3 = mysqli_escape_string($connect, $_POST['corrida_3']);
        $corrida_4 = mysqli_escape_string($connect, $_POST['corrida_4']);
        $corrida_5 = mysqli_escape_string($connect, $_POST['corrida_5']);
        $corrida_6 = mysqli_escape_string($connect, $_POST['corrida_6']);
        $corrida_7 = mysqli_escape_string($connect, $_POST['corrida_7']);
        $corrida_8 = mysqli_escape_string($connect, $_POST['corrida_8']);
        $corrida_9 = mysqli_escape_string($connect, $_POST['corrida_9']);
        $corrida_10 = mysqli_escape_string($connect, $_POST['corrida_10']);
        $grid_1 = mysqli_escape_string($connect, $_POST['grid_1']);
        $grid_2 = mysqli_escape_string($connect, $_POST['grid_2']);
        $grid_3 = mysqli_escape_string($connect, $_POST['grid_3']);
        $grid_4 = mysqli_escape_string($connect, $_POST['grid_4']);
        $melhor_volta = mysqli_escape_string($connect, $_POST['melhor_volta']);

        //Cadastra no DB
        $sql = "INSERT INTO palpites (nome, email, id_corrida, corrida_1, corrida_2, corrida_3, corrida_4, corrida_5, corrida_6, corrida_7, corrida_8, corrida_9, corrida_10, grid_1, grid_2, grid_3, grid_4, melhor_volta) 
        VALUES ('$nome', '$email', '$id_corrida', '$corrida_1', '$corrida_2', '$corrida_3', '$corrida_4', '$corrida_5', '$corrida_6', '$corrida_7', '$corrida_8', '$corrida_9', '$corrida_10', '$grid_1', '$grid_2', '$grid_3', '$grid_4', '$melhor_volta')";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "index.php";
                      </script> 
                    <?php
                else:
                    ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "index.php";
                    </script> 
                    <?php
            endif;
    endif;

    //Criar Planilha
    if(isset($_POST['criar-planilha'])):

        //Dados
        $nome_arquivo = mysqli_escape_string($connect, $_POST['nome_arquivo']);
        $rand = rand(0, 1999);
        
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -5)); //Extensão do arquivo 
		$arquivo = "Planilha".$nome_arquivo.$rand.$extensao; //Nome do arquivo
		$diretorio = "planilha/"; //define o diretorio para onde enviaremos o arquivo
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$arquivo); //efetua o upload

        //Cadastra no DB
        $sql = "INSERT INTO planilha (nome_arquivo, arquivo) 
        VALUES ('$nome_arquivo', '$arquivo')";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                        <script>
                            alert("Sucesso!");
                            window.location.href = "dashboard.php";
                        </script> 
                    <?php
                else:
                    ?> 
                        <script>
                            alert("Erro!");
                            window.location.href = "dashboard.php";
                        </script> 
                    <?php
            endif;
    endif;

    //Excluir Planilha
    if(isset($_POST['excluir-planilha'])):
        //Dados
        $id = mysqli_escape_string($connect, $_POST['id']);
    
        //Cadastra no DB
        $sql = "DELETE FROM planilha WHERE id = '$id'";
    
            if(mysqli_query($connect, $sql)):
                    ?> 
                      <script>
                          alert("Sucesso!");
                          window.location.href = "dashboard.php";
                      </script> 
                    <?php
                else:
                      ?> 
                    <script>
                        alert("Erro!");
                        window.location.href = "dashboard.php";
                    </script> 
                    <?php
            endif;
    endif;