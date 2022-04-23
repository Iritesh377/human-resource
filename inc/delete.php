<?php
include "db_conn.php";
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    mysqli_begin_transaction($conn);
    try {
        $sql = "DELETE FROM `employeesdetails` WHERE id=$id";
        $sql1 = "DELETE FROM `empcompanydetails` WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql1);
        mysqli_commit($conn);
        if ($result) {
            header("Location: ../admin/showall.php?error=Employee Record Deleted Succesfully");
            exit();
        }
    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($conn);
        throw $exception;
        echo "Error";
    }
}
