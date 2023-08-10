<?php
    $mysqli = new mysqli("localhost", "jao", "", "sakila");
    if($mysqli->connect_error) {
        exit('Could not connect');
    }

    $sql = "SELECT customer_id, first_name, last_name, email, active, create_date
    FROM customer WHERE customer_id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $_GET['q']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($cid, $fname, $lname, $email, $active, $c_date);
    $stmt->fetch();
    $stmt->close();

    echo "<table align='center'>";
        echo "<tr>";
            echo "<th>CustomerID</th>";
            echo "<td>" . $cid . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>FirsName</th>";
            echo "<td>" . $fname . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>LastName</th>";
            echo "<td>" . $lname . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>E-mail</th>";
            echo "<td>" . $email . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>Ativado</th>";
            echo "<td>" . $active . "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>PostalCode</th>";
            echo "<td>" . $c_date . "</td>";
        echo "</tr>";
    echo "</table>";
?>