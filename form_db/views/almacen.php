<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Almacen :.</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../funciones.js"></script>
</head>
<body>
    <form action="" method="post">
        <h1>Agregar Nuevo</h1>
        <div class="row">
            <div class="col">
                <label for="id">Id</label>
                <input type="text" name="id" id="id" class="form-control" required>
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
                <label for="lounge">Salon</label>
                <input type="text" name="lounge" id="lounge" class="form-control" required>
            </div>
            <div class="col">
                <label for="note">Nota</label>
                <input type="text" name="note" id="note" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="enable">¿Está aprobado?</label>
                <input type="checkbox" name="enable" id="enable">
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="p-2">
                <button type="submit" class="btn btn-success boton">Agregar</button>
            </div>
            <div class="p-2">
                <button class="btn btn-secondary" onclick="redirectToExam()">Cancelar</button>
            </div>
        </div>
    </form>
    <?php

        if(isset($_POST["id"]) && isset($_POST["nombre"])
        && isset($_POST["apellido"]) && isset($_POST["lounge"]) && isset($_POST["note"])){
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $lounge = $_POST["lounge"];
            $note = $_POST["note"];
            $enable = (isset($_POST["enable"]) == "on")? 1 : 0;

            include '../db/db.php';

            $sql = "INSERT INTO Examen(id, name, lastname, lounge , note, enable) 
                    VALUES($id,'$nombre','$apellido', '$lounge', '$note', $enable)";

            try {
                $execute = mysqli_query($db, $sql);
                if($execute){
                    echo "<script>show('New record created successfully', 'success');</script>";
                    echo "
                            <script>
                                setTimeout(() => {
                                    redirectToExam();
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