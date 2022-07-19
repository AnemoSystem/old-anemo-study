<?php
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM function";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
	}
	
	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$sql = "UPDATE function SET name = '$name' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: function.php");
	}
	mysqli_close($connection);
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
        <title>Editar Função</title>
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
			    		<input type="text" class="myBtn" name="name" id="name" value="<?php echo $name; ?>" placeholder="Digite um nome"><br>
					    <input type="submit" class="myBtn" name="submit" value="Editar">
					</th>
				</tr>
            </table>
		</form>
    </div>
	</body>
</html>