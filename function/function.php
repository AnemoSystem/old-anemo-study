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
        <title>Cadastrar Função</title>
        <!--
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous"
        >
        -->
    </head>
    <body>
        <header>
            <nav class="navbar">
                <a href="../index.html"><img src="../img/logo.png"></a>
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
        <div class="main">
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
        <footer>
            <p>2022 © Anemo<br>Games Gamer gaming. wtdd.</p>
        </footer>
    </body>
</html>