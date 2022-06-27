<?php
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM subject_teacher";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $teacher_id = $row['teacher_id'];
		$subject_id = $row['subject_id'];
	}
	
	if(isset($_POST['submit'])) {
		$teacher_id = $_POST['teacher'];
		$subject_id = $_POST['subject'];
		$sql = "UPDATE subject_teacher SET teacher_id = '$teacher_id', subject_id = '$subject_id' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: subject_teacher.php");
	}
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Professores e suas Matérias</title>
    </head>
    <body>
		<form method="POST">
			<h3>ID: <?php echo $id; ?></h3>
			<label for="teacher">Professor:</label>
			<select name="teacher" id="teacher">
				<?php
					$sql = "SELECT * FROM teacher ORDER BY id";
					$query = mysqli_query($connection, $sql);
					while($row = mysqli_fetch_assoc($query)) {
						$id = $row['id'];
						$name = $row['name'];	
						if($id == $teacher_id)
							echo '<option value="'.$id.'" selected>'.$id.' - '.$name.'</option>';
						else
							echo '<option value="'.$id.'">'.$id.' - '.$name.'</option>';
					}
				?>
			</select><br>
			<label for="subject">Matéria/Disciplina:</label>
			<select name="subject" id="subject">
				<?php
					$sql = "SELECT * FROM subject ORDER BY id";
					$query = mysqli_query($connection, $sql);
					while($row = mysqli_fetch_assoc($query)) {
						$id = $row['id'];
						$name = $row['name'];
						if($id == $subject_id)
							echo '<option value="'.$id.'" selected>'.$name.'</option>';
						else
							echo '<option value="'.$id.'">'.$name.'</option>';
					}
					mysqli_close($connection);
				?>
			</select><br>
            <input type="submit" name="submit" value="Editar">
		</form>
	</body>
	<a href="subject_teacher.php"><button>Voltar</button></a>
</html>