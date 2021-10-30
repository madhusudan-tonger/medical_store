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
                $qty = $_POST['qty'];
                if($img1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Medicine_ID FROM stock WHERE Stock_ID =$id")));
                $mid=($img1["Medicine_ID"]);
                if($mid!=0)
                {
                    $Insert = "UPDATE  stock SET Quantity_ID=('$qty') WHERE Stock_ID=('$id')";
                    if(mysqli_query($conn,$Insert))
                    {
                        echo '<script type="text/javascript">alert("Data updated successfully");</script>';
                        header("refresh:0; url=addstock.html");
                    }
                }
                else
                {
                    echo '<script type="text/javascript">alert("Invalid Stock ID");</script>';
                    header("refresh:0; url=addstock.html");
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("error occured");</script>';
                header("refresh:0; url=addstock.html");
            }

        }

?>
   