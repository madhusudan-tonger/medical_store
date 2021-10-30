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
                
                $id = $_POST['id'];
                $name = $_POST['name'];
                $brand = $_POST['brand'];
                $mrp = $_POST['mrp'];
                

                $Insert = "INSERT INTO medicine_table(Medicine_ID,Medicine_Name,Medicine_Brand,MRP) values('$id','$name', '$brand','$mrp')";

                if(mysqli_query($conn,$Insert))
                {
                    echo '<script type="text/javascript">alert("Data inserted successfully");</script>';
                    header("refresh:0; url=addmedicine.html");
                }
                else
                {
                    echo '<script type="text/javascript">alert("Error occured- check the input again");</script>';
                    header("refresh:0; url=addmedicine.html");
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("Error occured- check the input again");</script>';
                header("refresh:0; url=addmedicine.html");
            }

        }

?>
   