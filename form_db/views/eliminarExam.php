<?php

    include '../db/db.php';

    $id = $_POST["deleteId"];

    $sql = "DELETE FROM Examen WHERE id = $id";

    try {
        $execute = mysqli_query($db, $sql);
        if($execute){
            echo "<script>show('Record deleted successfully', 'success');</script>";
            echo "
                    <script>
                        setTimeout(() => {
                            redirectToExam();
                    }, '1');
                    </script>
            ";
        }
    } catch(Exception $e){
        echo "<script>show('Something went wrong!', 'error');</script>";
    }

    $db->close();

?>