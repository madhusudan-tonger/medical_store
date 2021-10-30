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
                if($img1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Medicine_Name FROM medicine_table WHERE Medicine_ID =$id")));
                $med_name=($img1["Medicine_Name"]);
                if($med_name!=0)
                {
                    $Insert = "DELETE FROM  medicine_table WHERE Medicine_ID=('$id')";
                    if(mysqli_query($conn,$Insert))
                    {
                        echo '<script type="text/javascript">alert("Medicine deleted successfully");</script>';
                        echo "Medicine deleted successfully";
                        header("refresh:0; url=addmedicine.html");
                    }
                }
                else
                {
                    echo '<script type="text/javascript">alert("Invalid medicine ID");</script>';
                    header("refresh:0; url=addmedicine.html");
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("error occured");</script>';
                header("refresh:0; url=addmedicine.html");
            }
        }
?>
   