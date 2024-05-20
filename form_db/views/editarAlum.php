<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: EditarAlumno :.</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../funciones.js"></script>
</head>
<body>
    <form action="" method="post">
        <h1>Editar</h1>
        <div class="row">
            <div class="col">
                <label for="id">Id</label>
                <input type="text" name="id" id="id" class="form-control" value="<?php echo $_GET['id'] ?>" required disabled>
            </div>
            <div class="col">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="col">
                <label for="area">area</label>
                <input type="text" name="area" id="area" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="enable">¿Está habilitado?</label>
                <input type="checkbox" name="enable" id="enable">
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="p-2">
                <button type="submit" class="btn btn-success boton">Actualizar</button>
            </div>
            <div class="p-2">
                <button class="btn btn-secondary" onclick="redirectToAlum()">Cancelar</button>
            </div>
        </div>
    </form>

    <?php

        if(isset($_POST["nombre"])
        && isset($_POST["apellido"]) && isset($_POST["area"])){
            $id = $_GET["id"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $area = $_POST["area"];
            $enable = true;

            include '../db/db.php';

            $sql = "UPDATE Alumno SET name='$nombre',lastname='$apellido', area='$area', enable=$enable WHERE id=$id";

            try {
                $execute = mysqli_query($db, $sql);
                if($execute){
                    echo "<script>show('Record updated successfully', 'success');</script>";
                    echo "
                            <script>
                                setTimeout(() => {
                                    redirectToAlum();
                              }, '2000');
                            </script>
                    ";
                }
            } catch(Exception $e){
                echo "<script>show('Something went wrong!', 'error');</script>";
            }
            $db->close();
        }
        
    ?>
</body>
</html>