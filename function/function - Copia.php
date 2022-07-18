<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $sql = "INSERT INTO function (name) VALUES ('$name')";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM function WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Função</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous"
        >
        <h1 class="visually-hidden">Sidebars examples</h1>
        
          <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
              <span class="fs-4">Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="../index.html" class="nav-link text-white" aria-current="page">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                  Home
                </a>
              </li>
              <li>
                <a href="function/function.php" class="nav-link active">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                  Função
                </a>
              </li>
              <li>
                <a href="../employee/employee.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                  Funcionário
                </a>
              </li>
              <li>
                <a href="subject/subject.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                  Matéria
                </a>
              </li>
              <li>
                <a href="grade/grade.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  Ano Escolar
                </a>
              </li>
              <li>
                <a href="period/period.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                  Período
                </a>
              </li>
              <li>
                <a href="teacher/teacher.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                  Professor
                </a>
              </li>
              <li>
                <a href="classroom/classroom.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                  Sala
                </a>
              </li>
              <li>
                <a href="student/student.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  Estudante
                </a>
              </li>
              <li>
                <a href="subject_teacher/subject_teacher.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  Professores & Disciplinas
                </a>
              </li>
              <li>
                <a href="grades_attendance/grades_attendance.php" class="nav-link text-white">
                  <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                  Notas
                </a>
              </li>
            </ul>
    </div>
            <hr>
    </head>
    <body>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="name">Nome:</label>
                <input type="text" name="name" id="name" placeholder="Digite o nome"><br>
                <input type="submit" name="submit" value="Enviar">
            </div>
            <div class="list">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM function";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT * FROM function";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($query)) {
									$id = $row['id'];
									$name = $row['name'];
									echo '<tr>';
									echo '<td>'.$id.'</td>';
									echo '<td>'.$name.'</td>';
									echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="3">Não existem funções cadastradas ainda!</td></tr>';
							}
							mysqli_close($connection);
                        ?>
                    </tr>
                </table>
            </div>
        </form>
		<a href="../index.html"><button>Voltar</button></a>
    </body>
</html>