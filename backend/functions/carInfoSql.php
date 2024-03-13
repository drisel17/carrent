<?php
    function carInfoSql ($tableName, $id) {
        global $conn;
        global $carRentalSpecsTableName;
        $id = mysqli_real_escape_string($conn, $id);
        $sqlQuery = mysqli_query($conn, "SELECT * FROM $tableName WHERE id = $id");
        if(!$sqlQuery or mysqli_num_rows($sqlQuery) == 0) {
            return 0;
        }
        return $sqlQuery;

    }
?>