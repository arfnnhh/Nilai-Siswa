<?php
    require "conn.php";

    function hapus($id){
        global $conn;
        
        mysqli_query($conn, "DELETE FROM `db_nilai` WHERE id = $id");
        return mysqli_affected_rows($conn); 
    }

    $id = $_GET ["id"];

    if ( hapus( $id ) > 0  ) {
        echo " 
        <script>
            alert ('data berhasil di hapus') ;
            document.location.href = 'menampilkan.php';
        </script>
            ";
    } else {
        echo " 
        <script>
             alert ('data gagal di hapus') ;
             document.location.href = 'menampilkan.php';
        </script>";
    }

    return mysqli_affected_rows($conn);
?>