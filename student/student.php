<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$phone = $_POST['phone'];
		$classroom = $_POST['classroom'];
		$password = strval(rand(1000, 9999));
		$e_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO student (email, password, name, cpf, rg, phone, classroom_id) 
		VALUES ('$email', '$password', '$name', '$cpf', '$rg', '$phone', '$classroom')";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM student WHERE id = $id_selected";
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
        <title>Cadastrar Aluno</title>
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
            <a href="../index.html"><img src="../img/logo.png"></a>
            <ul>
                <a href="../function/function.php"><li>Função</li></a>
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
	                		<input class="myBtn" type="text" name="name" id="name" placeholder="Digite o nome"><br><br>
						</th>
					</tr>
						<th>
							<label for="email">E-mail:</label>
    	        			<input class="myBtn" type="email" name="email" id="email" placeholder="Digite o e-mail"><br><br>
						</th>
					</tr>
					<tr>
						<th>
							<label for="cpf">CPF:</label>
            				<input class="myBtn" type="text" name="cpf" id="cpf" placeholder="Digite o CPF"><br><br>
						</th>
					</tr>
					<tr>
						<th>
							<label for="rg">RG:</label>
	            			<input class="myBtn" type="text" name="rg" id="rg" placeholder="Digite o RG"><br><br>
						</th>
					</tr>
					<tr>
						<th>
							<label for="phone">Telefone:</label>
    		        		<input class="myBtn" type="text" name="phone" id="phone" placeholder="Digite o telefone"><br><br>					
						</th>
					</tr>
					<tr>
						<th>
							<label for="classroom">Sala:</label>
							<select class="myBtn" name="classroom" id="classroom">
							<?php
								$sql = "SELECT classroom.id, grade.name, period.name FROM classroom
								INNER JOIN grade ON grade.id = classroom.grade_id
								INNER JOIN period ON period.id = classroom.period_id";
								$query = mysqli_query($connection, $sql);
								while($column = mysqli_fetch_row($query)) {
									$id = $column[0];
									$grade_name = $column[1];
									$period_name = $column[2];
									echo '<option value="'.$id.'">'.$grade_name.' - '.$period_name.'</option>';
								}
							?>
							</select><br>
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
						<th>Sala</th>
						<th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM student";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT student.id, student.name, student.email, 
								student.rg, student.cpf, student.phone, 
								grade.name, period.name FROM student
								INNER JOIN classroom ON student.classroom_id = classroom.id
								INNER JOIN grade ON grade.id = classroom.grade_id
								INNER JOIN period ON period.id = classroom.period_id";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_row($query)) {
									$id = $row[0];
									$name = $row[1];
									$email = $row[2];
									$rg = $row[3];
									$cpf = $row[4];
									$phone = $row[5];
									$grade = $row[6];
									$period = $row[7];
									echo '<tr>';
									echo '<td>'.$id.'</td>';
									echo '<td>'.$name.'</td>';
									echo '<td>'.$email.'</td>';
									echo '<td>'.$cpf.'</td>';
									echo '<td>'.$rg.'</td>';
									echo '<td>'.$phone.'</td>';
									echo '<td>'.$grade.' - '.$period.'</td>';
									echo '<td><button class="myBtn" name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input class="myBtn" type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="9">Não existem funcionários cadastrados ainda!</td></tr>';
							}
							mysqli_close($connection);
                        ?>
                    </tr>
                </table>
            </div>
        </form>
		</div>
    </body>
	<script type="text/javascript">
		$("#cpf").mask("999.999.999-99");
		$("#rg").mask("99.999.999-9");
		$("#phone").mask("(99) 99999-9999");
	</script>
</html>