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
                if($img1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Shop_Name FROM shop_details WHERE Shop_ID =$id")));
                $shop_name=($img1["Shop_Name"]);
                if($shop_name!=0)
                {
                    $Insert = "UPDATE  shop_details SET Shop_Number=('$phone') WHERE Shop_ID=('$id')";
                    if(mysqli_query($conn,$Insert))
                    {
                        echo '<script type="text/javascript">alert("Data updated successfully");</script>';
                        header("refresh:0; url=addshop.html");
                    }
                }
                else
                {
                    echo '<script type="text/javascript">alert("Invalid Shop ID");</script>';
                    header("refresh:0; url=addshop.html");
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("error occured");</script>';
                header("refresh:0; url=addshop.html");
            }

        }

?>
   