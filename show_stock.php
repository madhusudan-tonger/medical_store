<?php
        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'dbms_project';

        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        if (!$conn) {
            die('Could not connect to the database.');
        }
        else 
        {
            if (isset($_POST['submit'])) 
            {
                $sql = "SELECT Stock_ID,Shop_ID,Medicine_ID,Quantity_ID FROM stock";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table border = '2'>";
                    echo "<h1>";
                    echo "<tr>";
                    echo "<th>SHOP ID</th>";
                    echo "<th>SHOP NAME</th>";
                    echo "<th>SHOP ADDRESS</th>";
                    echo "<th>CONTACT NO</th>";
                    echo "</tr>";
                    echo "/<h1>";
    
                    echo "<h3>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";                    
                    echo "<td>" . $row['Stock_ID'] ."</td>";
                    echo "<td>" . $row['Shop_ID'] . "</td>";
                    echo "<td>" . $row['Medicine_ID'] . "</td>";
                    echo "<td>" . $row['Quantity_ID'] . "</td>";
                    echo "</tr>";
            }
            echo "<h3>";
            echo "</table>";
            } 
            else {
                echo "0 results";
            }
                $conn->close();
            }
            else
            {
                echo ("error occured");
                header("refresh:2; url=addstock.html");
            }

        }

?>
   