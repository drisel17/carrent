<?php
    function carSearchQuery($carTransmission, $carPrice, $pick_up_date, $drop_off_date, $pick_up_city, $order, $limit, $tableName) {
        global $conn;

        $sql = "SELECT * FROM $tableName"; // Base query to select all cars

        // Build WHERE clause with optional conditions
        $where = [];
        $occupied = "occupied = 0";
        if (!empty($carTransmission)) {
            $where[] = "trasmission = '" . mysqli_real_escape_string($conn, $carTransmission) . "'";
        }
        if (!empty($carPrice)) {
            $where[] = "price <= " . (int) $carPrice; // Assuming price is an integer
        }
        if (!empty($pick_up_date) && !empty($drop_off_date)) {
            $occupied = "(occupied = 0 OR drop_off_date < '" . mysqli_real_escape_string($conn, $pick_up_date) . "')";
        }

        if (!empty($pick_up_city)) {
            $where[] = "city = '" . mysqli_real_escape_string($conn, $pick_up_city) . "'";
        }

        $where[] = $occupied;



        if ($where) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }


        // Add order by clause (optional)
        if (!empty($order)) {
            $sql .= " ORDER BY $order";
        }

        // Add limit clause (optional)
        if (!empty($limit)) {
            $sql .= " LIMIT $limit";
        }


        $sql = mysqli_query($conn, $sql);

        return $sql;
    }
?>