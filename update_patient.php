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
                $phone = $_POST['phone'];
                if($img1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Patient_id FROM patient WHERE Patient_id =$id")));
                $pid=($img1["Patient_id"]);
                if($pid!=0)
                {
                    $Insert = "UPDATE  patient SET Contact_No=('$phone') WHERE Patient_id=('$id')";
                    if(mysqli_query($conn,$Insert))
                    {
                        echo '<script type="text/javascript">alert("Details updated successfully");</script>';
                        header("refresh:0; url=gbill.html");
                    }
                }
                else
                {
                    echo '<script type="text/javascript">alert("Invalid Patient ID");</script>';
                    header("refresh:0; url=gbill.html");
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("Error occured- check the input again");</script>';
                header("refresh:0; url=gbill.html");
            }

        }

?>
   