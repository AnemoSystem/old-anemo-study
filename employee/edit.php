<?php
	include "../connection.php";
	$id = $_GET['id'];
	$sql = "SELECT * FROM employee";
	$query = mysqli_query($connection, $sql);
	while($row = mysqli_fetch_assoc($query)) {
		$id = $row['id'];
		$name = $row['name'];
		$email = $row['email'];
		$rg = $row['rg'];
		$cpf = $row['cpf'];
		$phone = $row['phone'];
		$salary = $row['salary'];
		$function_id = $row['function_id'];
	}
	
	if(isset($_POST['submit'])) {
        $name = $_POST['name'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$function_id = $_POST['function'];
		$phone = $_POST['phone'];
		$salary = $_POST['salary'];
		$sql = "UPDATE employee SET name = '$name', email = '$email', rg = '$rg',
		cpf = '$cpf', function_id = '$function_id', salary = $salary, phone = '$phone' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: employee.php");
	}
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Funcionário</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
		<form method="POST">
			<h3>ID: <?php echo $id; ?></h3>
			<label for="name">Nome:</label>
            <input type="text" name="name" id="name" placeholder="Digite o nome" value='<?php echo $name; ?>'><br>
			<label for="email">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="Digite o e-mail" value='<?php echo $email; ?>'><br>
			<label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF" value='<?php echo $cpf; ?>'><br>
			<label for="rg">RG:</label>
            <input type="text" name="rg" id="rg" placeholder="Digite o RG" value='<?php echo $rg; ?>'><br>
			<label for="phone">Telefone:</label>
            <input type="text" name="phone" id="phone" placeholder="Digite o Telefone" value='<?php echo $phone; ?>'><br>
			<label for="salary">Salário:</label>
            <input type="number" name="salary" id="salary" placeholder="Digite o salário" value='<?php echo $salary; ?>'><br>
			<label for="function">Função:</label>
			<select name="function" id="function">
				<?php
					$sql = "SELECT * FROM function ORDER BY id";
					$query = mysqli_query($connection, $sql);
					while($row = mysqli_fetch_assoc($query)) {
						$id = $row['id'];
						$name = $row['name'];
						if($id == $function_id)
							echo '<option value="'.$id.'" selected>'.$id.' - '.$name.'</option>';
						else
							echo '<option value="'.$id.'">'.$id.' - '.$name.'</option>';
					}
				?>
			</select><br>
			<input type="submit" name="submit" value="Editar">
		</form>
		<a href="employee.php"><button>Voltar</button></a>
	</body>
	<script type="text/javascript">
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#phone").mask("(99) 99999-9999");
	</script>
</html>