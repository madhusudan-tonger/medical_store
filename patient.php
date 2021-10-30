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
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                

                $Insert = "INSERT INTO patient(Patient_id,Patient_Name,Contact_No,Address) values('$id','$name', '$phone','$address')";

                if(mysqli_query($conn,$Insert))
                {
                    echo '<script type="text/javascript">alert("Details inserted successfully");</script>';
                    header("refresh:0; url=gbill.html");
                }
                else
                {
                    echo '<script type="text/javascript">alert("Error occured- check the input again");</script>';
                    header("refresh:0; url=gbill.html");
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("Error occured");</script>';
                header("refresh:0; url=gbill.html");
            }

        }

?>
   