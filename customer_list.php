<?php
    
    function customerData($op){
        
        $mysqli = new mysqli("localhost", "jao", "", "sakila");
        if($mysqli->connect_error) {
            exit('Could not connect');
        }

        $sql = "SELECT customer_id, first_name, last_name
                FROM customer";

        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($cid, $fname, $lname);

        switch($op){
            case 0:
                return $cid;
            case 1:
                return $fname;
            case 2:
                return $lname;
            default:
                return null;
        }

        //$stmt->close();
}

?>