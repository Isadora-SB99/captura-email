<!DOCTYPE html>
<html>
<head>
	<title> Captura de email</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>
<!---------------------------------------------------------------------------------------------------------------------------
O objetivo de uma página de  captura de emails é atrair potenciais clientes para um determinado negócio. 
Com emails obtidos é possível: 
-construir um Banco de Dados;
-melhorar relacionamento com leads/clientes;
-organizar a comunicação por nichos ou áreas;
-mapear o momento de compra do cliente;
-apresentar com mais detalhe o produto/serviço;
-entregar um conteúdo de valor para a audiência;
-filtrar a audiência das redes socias para aumentar as vendas;
-incentivar clientes a comprar um produto/serviço;
-automatizar o relacionamento com os leads/clientes.

Nesta tarefa vocês deverão construir uma página para captura de emails.
Para atrair usuários dispostos a fornecer seus email, ofereçam um arquivo para download.
O arquivo a ser baixado pode ser uma apostila, planilha ou outro conteúdo que possa atrair usuários dispostos.
Os usuários, que forneceram seus emails, devem receber um email contendo um link para o download do tao sonhado arquivo.
As informações coletadas devem ser armazenadas em arquivo. No formato de texto simples ou JSON.

Disponibilizar hospedagem e link github.
-------------------------------------------------------------------------------------------------------------------------!-->

	<?php
		if (isset($_POST["enviar"])) {
			$str=$_POST['nome']."|".$_POST['email']."\n";
			if ($file=fopen("email.txt", 'a')) {
				if (fwrite($file, $str)) {
					echo "Registro salvo com sucesso!</br>";
					echo "Você deve receber o arquivo em alguns minutos.";
				}else{
					echo "Falha ao salvar registro";
				}
				fclose($file);
			}
		}
	?>
	<p>Informe o email para receber o arquivo:</p>
	<form name="form-usuario" method="POST">
		<input type="text" name="nome" placeholder="nome">
		<input type="email" name="email" placeholder="Email"> </br></br>
		<input type="submit" name="enviar" placeholder="enviar">
	</form>

	<?php
		$to = $_POST['email'];
		$subject = 'Receita de panquecas';
		$message = 'Olá. Esse email contém receita de panquecas:
Ingredientes:
-1 xícara e 1/4 de chá de farinha de trigo
-1 colher de sopa de açúcar
-3 colheres de chá de fermento em pó
-2 ovos levemente batidos
-1 xícara de chá de leite
-2 colheres de sopa de manteiga derretida
-Pitada de sal
-Óleo para untar

Modo de Preparo:
Misture em um recipiente a farinha, o açúcar, o fermento e o sal
Em outro recipiente misture os ovos, o leite e a manteiga
Acrescente os líquidos aos secos, sem misturar em excesso
O ponto da massa não deve ser muito líquido, deve escorrer lentamente
Aqueça e unte a frigideira e coloque a massa no centro, cerca de 1/4 xícara por panqueca';
		$message = wordwrap($message,70);
		$headers = 'From: isadora.cimol.2907@gmail.com' . "\r\n" .
		'Reply-To: isadora.cimol.2907@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
	?>
	

</body>
</html>
