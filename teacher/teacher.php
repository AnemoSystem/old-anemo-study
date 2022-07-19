<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$phone = $_POST['phone'];
		$salary = $_POST['salary'];
		$password = strval(rand(1000, 9999));
		$e_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO teacher (email, password, name, cpf, rg, phone, salary) 
		VALUES ('$email', '$e_password', '$name', '$cpf', '$rg', '$phone', '$salary')";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM teacher WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
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
        <title>Cadastrar Professor</title>
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
            <div class="form" id="insert-form">
				<table>
					<tr class="table-header">
						<th>Cadastrar</th>
					</tr>
					<tr>
						<th>
							<label for="name">Nome:</label>
                			<input class="myBtn" type="text" name="name" id="name" placeholder="Digite o nome"><br>
						</th>
					</tr>
					<tr>
						<th>
							<label for="email">E-mail:</label>
                			<input class="myBtn" type="email" name="email" id="email" placeholder="Digite o e-mail"><br>
						</th>
					</tr>
					<tr>
						<th>
							<label for="cpf">CPF:</label>
                			<input class="myBtn" type="text" name="cpf" id="cpf" placeholder="Digite o CPF"><br>
						</th>
					</tr>
					<tr>
						<th>
							<label for="rg">RG:</label>
                			<input class="myBtn" type="text" name="rg" id="rg" placeholder="Digite o RG"><br>
						</th>
					</tr>
					<tr>
						<th>
							<label for="phone">Telefone:</label>
                			<input class="myBtn" type="text" name="phone" id="phone" placeholder="Digite o telefone"><br>
						</th>
					</tr>
					<tr>
						<th>
							<label for="salary">Salário:</label>
                			<input class="myBtn" type="number" name="salary" id="salary" placeholder="Digite o salário"><br>
							<input class="myBtn" type="submit" name="submit" value="Enviar">
						</th>
					</tr>
				</table>
            </div>
            <div class="list">
                <table>
                    <tr class="table-header">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
						<th>CPF</th>
						<th>RG</th>
						<th>Telefone</th>
						<th>Salário</th>
						<th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM teacher";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT * FROM teacher";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($query)) {
									$id = $row['id'];
									$name = $row['name'];
									$email = $row['email'];
									$rg = $row['rg'];
									$cpf = $row['cpf'];
									$phone = $row['phone'];
									$salary = $row['salary'];
									echo '<tr>';
									echo '<td>'.$id.'</td>';
									echo '<td>'.$name.'</td>';
									echo '<td>'.$email.'</td>';
									echo '<td>'.$cpf.'</td>';
									echo '<td>'.$rg.'</td>';
									echo '<td>'.$phone.'</td>';
									echo '<td>'.$salary.'</td>';
									echo '<td><button class="myBtn" name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input class="myBtn" type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="8">Não existem professores cadastrados ainda!</td></tr>';
							}
							mysqli_close($connection);
                        ?>
                    </tr>
                </table>
            </div>
        </form>
    </body>
	<script type="text/javascript">
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#phone").mask("(99) 99999-9999");
	</script>
</html>