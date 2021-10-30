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
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                

                $Insert = "INSERT INTO shop_details values('$id','$name', '$address','$phone')";

                if(mysqli_query($conn,$Insert))
                {
                    echo '<script type="text/javascript">alert("Data inserted successfully");</script>';
                    header("refresh:0; url=addshop.html");
                }
                else
                {
                    echo '<script type="text/javascript">alert("Error occured- check the input again");</script>';
                    header("refresh:0; url=addshop.html");
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("Error occured- check the input again");</script>';
                    header("refresh:0; url=addshop.html");
            }

        }

?>
   