<?php
        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'dbms_project';

        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        if (!$conn) 
        {
            die('Could not connect to the database.');
        }
        else 
        {
            if (isset($_POST['submit'])) 
            {
                
                $bid = $_POST['bid'];
                $sid = $_POST['sid'];
                $pid = $_POST['pid'];
                $mid1 = $_POST['mid1'];
                $qty1 = $_POST['qty1'];
                $mid2 = $_POST['mid2'];
                $qty2 = $_POST['qty2'];
                $mid3 = $_POST['mid3'];
                $qty3 = $_POST['qty3'];
                $mid4 = $_POST['mid4'];
                $qty4 = $_POST['qty4'];
                $amount=0;
                if($img1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Shop_Name FROM shop_details WHERE Shop_ID =$sid")));
                $s_name=($img1["Shop_Name"]);
                if($s_name!=0)
                {
                if($img1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Patient_name FROM patient WHERE Patient_id =$pid")));
                $name=($img1["Patient_name"]);
                if($name!=0)
                {
                    if($img1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Quantity_ID FROM stock WHERE Medicine_ID =$mid1 AND Shop_ID =$sid")));
                {
                    $q1=($img1["Quantity_ID"]);
                    if($q1>=$qty1)
                    {
                        if($mrpimg1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT MRP FROM medicine_table WHERE Medicine_ID =$mid1")));
                        {
                        $mrp1=$mrpimg1["MRP"];
                        $amount = ($qty1*$mrp1);
                        if(!$mid2)
                        {
                            $Insert = "INSERT INTO bill(Bill_ID,Shop_ID,Patient_ID,Amount,M_1,Q_1) values('$bid','$sid', '$pid','$amount','$mid1', '$qty1')";
                            if(mysqli_query($conn,$Insert))
                            {
                                echo $amount;
                                $q1=$q1-$qty1;
                                $Insert1 = "UPDATE  stock SET Quantity_ID=('$q1') WHERE Medicine_ID=('$mid1') AND Shop_ID=('$sid')";
                                mysqli_query($conn,$Insert1);
                                echo '<script type="text/javascript">alert("Amount = '.$amount.'");</script>';
                                header("refresh:0; url=bill.html");
                            }
                            else
                            {
                                echo '<script type="text/javascript">alert("Error in printing bill");</script>';
                                header("refresh:0; url=bill.html");
                            }   
                        }
                        else
                        {
                            if($img2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Quantity_ID FROM stock WHERE Medicine_ID =$mid2 AND Shop_ID =$sid")));
                            {
                            $q2=($img2["Quantity_ID"]);
                            if($q2>=$qty2)
                            {
                            if($mrpimg2=mysqli_fetch_assoc(mysqli_query($conn,"SELECT MRP FROM medicine_table WHERE Medicine_ID =$mid2")));
                            {
                                $mrp2=$mrpimg2["MRP"];
                                $amount = ($amount+($qty2*$mrp2));
                                if(!$mid3)
                                {
                                    $Insert = "INSERT INTO bill(Bill_ID,Shop_ID,Patient_ID,Amount,M_1,Q_1,M_2,Q_2) values('$bid','$sid', '$pid','$amount','$mid1', '$qty1','$mid2', '$qty2')";
                                    if(mysqli_query($conn,$Insert))
                                    {
                                     
                                        $q1=$q1-$qty1;
                                        $Insert1 = "UPDATE  stock SET Quantity_ID=('$q1') WHERE Medicine_ID=('$mid1') AND Shop_ID=('$sid')";
                                        mysqli_query($conn,$Insert1);
                                        $q2=$q2-$qty2;
                                        $Insert1 = "UPDATE  stock SET Quantity_ID=('$q2') WHERE Medicine_ID=('$mid2') AND Shop_ID=('$sid')";
                                        mysqli_query($conn,$Insert1);
                                        echo '<script type="text/javascript">alert("Amount = '.$amount.'");</script>';
                                        header("refresh:0; url=bill.html");
                                    }
                                    else
                                    {
                                        echo '<script type="text/javascript">alert("Error in printing Bill");</script>';
                                        header("refresh:0; url=bill.html");
                                    }   
                                }
                                else
                                {
                                    if($img3=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Quantity_ID FROM stock WHERE Medicine_ID =$mid3 AND Shop_ID =$sid")));
                                    {
                                    $q3=($img3["Quantity_ID"]);
                                    if($q3>=$qty3)
                                    {
                                    if($mrpimg3=mysqli_fetch_assoc(mysqli_query($conn,"SELECT MRP FROM medicine_table WHERE Medicine_ID =$mid3")));
                                    {
                                        $mrp3=$mrpimg3["MRP"];
                                        $amount = ($amount+($qty3*$mrp3));
                                        if(!$mid4)
                                        {
                                            $Insert = "INSERT INTO bill(Bill_ID,Shop_ID,Patient_ID,Amount,M_1,Q_1,M_2,Q_2,M_3,Q_3) values('$bid','$sid', '$pid','$amount','$mid1', '$qty1','$mid2', '$qty2','$mid3','$qty3')";
                                            if(mysqli_query($conn,$Insert))
                                            {
                                                $q1=$q1-$qty1;
                                                $Insert1 = "UPDATE  stock SET Quantity_ID=('$q1') WHERE Medicine_ID=('$mid1') AND Shop_ID=('$sid')";
                                                mysqli_query($conn,$Insert1);
                                                $q2=$q2-$qty2;
                                                $Insert1 = "UPDATE  stock SET Quantity_ID=('$q2') WHERE Medicine_ID=('$mid2') AND Shop_ID=('$sid')";
                                                mysqli_query($conn,$Insert1);
                                                $q3=$q3-$qty3;
                                                $Insert1 = "UPDATE  stock SET Quantity_ID=('$q3') WHERE Medicine_ID=('$mid3') AND Shop_ID=('$sid')";
                                                mysqli_query($conn,$Insert1);
                                                echo '<script type="text/javascript">alert("Amount = '.$amount.'");</script>';
                                                header("refresh:0; url=bill.html");
                                            }
                                            else
                                            {
                                                echo '<script type="text/javascript">alert("Error in Printing Bill");</script>';
                                                header("refresh:0; url=bill.html");
                                            }   
                                        }
                                        else
                                        {
                                            if($img4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Quantity_ID FROM stock WHERE Medicine_ID =$mid4 AND Shop_ID =$sid")));
                                            {
                                            $q4=($img4["Quantity_ID"]);
                                            if($q4>=$qty4)
                                            {
                                            if($mrpimg4=mysqli_fetch_assoc(mysqli_query($conn,"SELECT MRP FROM medicine_table WHERE Medicine_ID =$mid4")));
                                            {
                                                $mrp4=$mrpimg4["MRP"];
                                                $amount = ($amount+($qty4*$mrp4));
                                               
                                                    $Insert = "INSERT INTO bill(Bill_ID,Shop_ID,Patient_ID,Amount,M_1,Q_1,M_2,Q_2,M_3,Q_3,M_4,Q_4) values('$bid','$sid', '$pid','$amount','$mid1', '$qty1','$mid2', '$qty2','$mid3','$qty3','$mid4','$qty4')";
                                                    if(mysqli_query($conn,$Insert))
                                                    {
                                                        
                                                        $q1=$q1-$qty1;
                                                        $Insert1 = "UPDATE  stock SET Quantity_ID=('$q1') WHERE Medicine_ID=('$mid1') AND Shop_ID=('$sid')";
                                                        mysqli_query($conn,$Insert1);
                                                        $q2=$q2-$qty2;
                                                        $Insert1 = "UPDATE  stock SET Quantity_ID=('$q2') WHERE Medicine_ID=('$mid2') AND Shop_ID=('$sid')";
                                                        mysqli_query($conn,$Insert1);
                                                        $q3=$q3-$qty3;
                                                        $Insert1 = "UPDATE  stock SET Quantity_ID=('$q3') WHERE Medicine_ID=('$mid3') AND Shop_ID=('$sid')";
                                                        mysqli_query($conn,$Insert1);
                                                        $q4=$q4-$qty4;
                                                        $Insert1 = "UPDATE  stock SET Quantity_ID=('$q4') WHERE Medicine_ID=('$mid4') AND Shop_ID=('$sid')";
                                                        mysqli_query($conn,$Insert1);
                                                        echo '<script type="text/javascript">alert("Amount = '.$amount.'");</script>';
                                                        header("refresh:0; url=bill.html");
                                                    }
                                                    else
                                                    {
                                                        echo '<script type="text/javascript">alert("Error in printing bill");</script>';
                                                        header("refresh:0; url=bill.html");
                            
                                                    }   
                                                
                                            }
                                         }
                                        else
                                          {
                                                 echo '<script type="text/javascript">alert("Insufficient stock of medicine ID 4 or any anavailable medicine");</script>';
                                                header("refresh:0; url=bill.html");
            
                                           }
                                         }
                                        }
                                    }
                                 }
                                else
                                  {
                                    echo '<script type="text/javascript">alert("Insufficient stock of medicine ID 3 or any anavailable medicine");</script>';
                                    header("refresh:0; url=bill.html");
                       }
                                 }
        
                                }
                            }
                         }
                        else
                          {
                            echo '<script type="text/javascript">alert("Insufficient stock of medicine ID 2 or any anavailable medicine");</script>';
                            header("refresh:0; url=bill.html");

                           }
                         }

                        }
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("Insufficient stock of medicine ID 1 or any anavailable medicine");</script>';
                        header("refresh:0; url=bill.html");
                    }
                }
                }
                else
                {
                    echo '<script type="text/javascript">alert("patient not registered in our records");</script>';
                    header("refresh:0; url=bill.html");
                }
             }
              else
                {
                    echo '<script type="text/javascript">alert("Shop not registered in our records");</script>';
                    header("refresh:0; url=bill.html");
                }

            }
        }

?>
   