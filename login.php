<?php
    session_start();
    include("connect.php");

    if(isset($_POST['btnlogin'])){

        $username=$_POST['txtusername'];
        $passed=$_POST['txtpassword'];

        $str="select * from tbl_register where username='$username' and password='$passed'";
        $res=mysqli_query($connect,$str);

        if(mysqli_num_rows($res)>0){
            $_SESSION['username']=$username;
            header("location:home.php");
        }
        else
        {
            echo "Worng Username and password";
            
        }
    }
?>

<html>
<head>
    <title>Login page</title>

</head>
<body>
    <center>
        <h2> ---Student Login Form--- </h2>
        <br/>

        <form name="Form1" method="POST" action="">
        <table>

           <tr>
                <td>Enter Username</td>
                <td> <input type="text" name="txtusername" required> </td>
            </tr>
            <tr>
                <td>Enter Password</td>
                <td> <input type="password" name="txtpassword" required> </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="btnlogin" value="Login">
                    <a href="index.php">Back</a>
                </td>
            </tr>

</table>
</form>
</center>
</body>
</html>