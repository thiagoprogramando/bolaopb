<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
 <?php
	session_start();
	include_once('connect.php');
	$id = $_GET['id'];
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRIAR</title>
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'palpites.xls';
		
		$sql = "SELECT * FROM calendario_f1 WHERE id = '$id'";
    	$resultado = mysqli_query($connect, $sql);
    	$dados = mysqli_fetch_array($resultado);
    	$local = $dados['local'];
    	$circuito = $dados['circuito'];
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5"><center><font style="text-align: center; font-size: 20px;"><strong>Planilha Com Palpites</strong></font></center></tr>';
		$html .= '<td colspan="5"><center><font style="text-align: center; font-size: 30px;"><strong> '."$local"." - "."$circuito".' </strong></font></center></tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Nome</b></td>';
	    $html .= '<td><b>1° Corrida</b></td>';
	    $html .= '<td><b>2° Corrida</b></td>';
	    $html .= '<td><b>3° Corrida</b></td>';
	    $html .= '<td><b>4° Corrida</b></td>';
	    $html .= '<td><b>5° Corrida</b></td>';
	    $html .= '<td><b>6° Corrida</b></td>';
	    $html .= '<td><b>7° Corrida</b></td>';
	    $html .= '<td><b>8° Corrida</b></td>';
	    $html .= '<td><b>9° Corrida</b></td>';
	    $html .= '<td><b>10° Corrida</b></td>';
        $html .= '<td><b>Melhor Volta</b></td>';
		$html .= '<td><b>Data Hora</b></td>';
		$html .= '<td><b>Pontos</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result_msg_contatos = "SELECT * FROM palpites WHERE id_corrida = '$id'";
		$resultado_msg_contatos = mysqli_query($connect , $result_msg_contatos);
		
		while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
			$html .= '<tr>';
			$html .= '<td>'.$row_msg_contatos["nome"].'</td>';
			$html .= '<td>'.$row_msg_contatos["corrida_1"].'</td>';
			$html .= '<td>'.$row_msg_contatos["corrida_2"].'</td>';
			$html .= '<td>'.$row_msg_contatos["corrida_3"].'</td>';
			$html .= '<td>'.$row_msg_contatos["corrida_4"].'</td>';
			$html .= '<td>'.$row_msg_contatos["corrida_5"].'</td>';
			$html .= '<td>'.$row_msg_contatos["corrida_6"].'</td>';
			$html .= '<td>'.$row_msg_contatos["corrida_7"].'</td>';
			$html .= '<td>'.$row_msg_contatos["corrida_8"].'</td>';
			$html .= '<td>'.$row_msg_contatos["corrida_9"].'</td>';
            $html .= '<td>'.$row_msg_contatos["corrida_10"].'</td>';
            $html .= '<td>'.$row_msg_contatos["melhor_volta"].'</td>';
			$html .= '<td>'.$row_msg_contatos["data_hora"].'</td>';
			$html .= '<td>'.$row_msg_contatos["pontos"].'</td>';
			$html .= '</tr>';
			;
		}

		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>