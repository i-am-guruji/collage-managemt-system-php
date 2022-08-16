<?php
    session_start();
    include('connect.php');
    if(isset($_POST['btnlogout'])){

        session_destroy();
        header("location:login.php");
    }

?>

<html>
    <head><title>use of session</title></head>
    <body>
        <center>
            <form name="Form1" method="POST" action="home.php">
            <?php
                if(isset($_SESSION['username'])){
                    echo "Welcome".$_SESSION['username'];
            ?>
            <br/><br/>
            <table>
                <tr>
                    <td><input type="text" name="txtsearch"></td>
                    <td> <input type="submit" name="btnsearch" value="Search"></td>
                </tr>
            </table>

            <?php

                include("connect.php");
                if(isset($_POST['btnsearch'])){
                    
                    $search=$_POST['txtsearch'];
                
            ?>

            <table border="3">
                <tr>
                    <th>Student Id</th>
                    <th>Student First Name</th>
                    <th>Student Last Name</th>
                    <th>Student Add</th>
                    <th>Student Gender</th>
                    <th>Student Hobbies</th>
                    <th>Student Cities</th>
                    <th>Student DOB</th>
                    <th>Student Mobile</th>
                    <th>Student Email</th>
                    <th>Student Username</th>
                    <th>Student Password</th>
                </tr>
                <?php

                $sel= "select * from tbl_register where s_fname='$search' or s_city='$search' 
                or s_email='$search' or s_mobile='$search' order by sId desc";
                
                    $result=mysqli_query($connect,$sel); //or die(mysqli_error($connect));

                    $cnt=mysqli_num_rows($result);
                    echo "Total Records: ".$cnt;
                    while($row=mysqli_fetch_array($result))
                    {
                        ?>

                        <tr>

                            <td><?php echo $row['sId'];?></td>
                            <td><?php echo $row['s_fname'];?></td>
                            <td><?php echo $row['s_lname'];?></td>
                            <td><?php echo $row['s_add'];?></td>
                            <td><?php echo $row['s_gender'];?></td>
                            <td><?php echo $row['s_hobbies'];?></td>
                            <td><?php echo $row['s_city'];?></td>
                            <td><?php echo $row['s_dob'];?></td>
                            <td><?php echo $row['s_mobile'];?></td>
                            <td><?php echo $row['s_email'];?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['password'];?></td>

                        </tr>

                        <?php
                            }
                        ?>
                
            </table>
            <?php
                }
            ?>
            <br/><br/>
            <input type="submit" name="btnlogout" value="Logout">

            <?php
                }
                else
                {
                    header("location:login.php");
                }
            ?>

        </from>
</center>
</body>
</html>