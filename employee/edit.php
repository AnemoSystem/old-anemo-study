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
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="../css/style_index.css">
        <link rel="shortcut icon" href="../img/icon.ico"/>
        <!--<link rel="stylesheet" href="../css/function.css">!-->
        <title>Editar Funcionário</title>
        <!--
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous"
        >
        -->
    </head>
	<header>
        <nav class="navbar">
                <a href="../index.html"><img src="../img/logo.png" class="img"></a>
            <ul>
                <a href="function/function.php"><li>Função</li></a>
                <a href="../employee/employee.php"><li>Funcionário</li></a>
                <a href="../subject/subject.php"><li>Contato</li></a>
                <a href="../grade/grade.php"><li>Ano Escolar</li></a>
                <a href="../period/period.php"><li>Período</li></a>
                <a href="../teacher/teacher.php"><li>Professor</li></a>
                <a href="../classroom/classroom.php"><li>Sala</li></a>
                <a href="../student/student.php"><li>Estudante</li></a>
                <a href="../grades_attendance/grades_attendance.php"><li>Notas</li></a>
            </ul>
        </nav>
    </header>
    <body>
	<div class="main">
		<form method="POST">
			<table>
				<tr class="table-header">
					<th>Editar cadastro</th>
				</tr>
				<tr>
					<th><h3>ID: <?php echo $id; ?></h3></th>
				</tr>
				<tr>
					<th>
						<label for="name">Nome:</label>
        	    		<input class="myBtn" type="text" name="name" id="name" placeholder="Digite o nome" value='<?php echo $name; ?>'><br>
						<label for="email">E-mail:</label>
	            		<input class="myBtn" type="email" name="email" id="email" placeholder="Digite o e-mail" value='<?php echo $email; ?>'><br>
						<label for="cpf">CPF:</label>
            			<input class="myBtn" type="text" name="cpf" id="cpf" placeholder="Digite o CPF" value='<?php echo $cpf; ?>'><br>
						<label for="rg">RG:</label>
        			    <input class="myBtn" type="text" name="rg" id="rg" placeholder="Digite o RG" value='<?php echo $rg; ?>'><br>
						<label for="phone">Telefone:</label>
            			<input class="myBtn" type="text" name="phone" id="phone" placeholder="Digite o Telefone" value='<?php echo $phone; ?>'><br>
						<label for="salary">Salário:</label>
			            <input class="myBtn" type="number" name="salary" id="salary" placeholder="Digite o salário" value='<?php echo $salary; ?>'><br>
						<label for="function">Função:</label>
						<select class="myBtn"  name="function" id="function">
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
						<input class="myBtn" type="submit" name="submit" value="Editar">
					</th>
				</tr>
			</table>
		</form>
	</body>
	<script type="text/javascript">
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#phone").mask("(99) 99999-9999");
	</script>
</html>