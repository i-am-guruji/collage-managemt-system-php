<?php   
    
include("connect.php");

if(isset($_POST['btninsert']))
{

    $Firstname= $_POST['txtfname'];
    $Lastname= $_POST['txtlname'];
    $Address= $_POST['txtaddress'];
    $Gender= $_POST['selGender'];
    $Hobbies="";
    if(isset($_POST['reading'])){
        $Hobbies=$_POST['reading'];
    }
    if(isset($_POST['dancing'])){
        $Hobbies= $Hobbies.$_POST['dancing'];
    }
    if(isset($_POST['playing'])){
        $Hobbies= $Hobbies.$_POST['playing'];
    }

    $City= $_POST['selcity'];
    $DOB= $_POST['dob'];
    $Mobile= $_POST['txtnumber'];
    $Email= $_POST['txtemail'];
    $Username= $_POST['txtusername'];
    $Password= $_POST['txtpassword'];

    $insert= "insert into tbl_register(s_fname,s_lname,s_add,s_gender,s_hobbies,s_city,s_dob,
    s_mobile,s_email,username,password) values ('$Firstname','$Lastname','$Address','$Gender',
    '$Hobbies','$City','$DOB','$Mobile','$Email','$Username','$Password')";
    mysqli_query($connect,$insert) or die(mysqli_error($connect));
    echo "Success:Record Successfully Inserted.";

}

?>

<html>
<head>
    <title>Registartion page</title>

</head>
<body>
    <center>
        <h2> ---Student registartion Form--- </h2>
        <br/>

        <form name="form1" method="POST" action="">
        <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="txtfname" required></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="txtlname" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea cols="30" rows="5" name="txtaddress" required></textarea></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td> <input type="radio" name="selGender" value="male"> Male
                <input type="radio" name="selGender" value="female"> Female
                </td>
            </tr>
            <tr>
                <td>Hobbies </td>
                <td> <input type="checkbox" name="reading" value="reading"> reading
                <input type="checkbox" name="dancing" value="dancing"> dancing
                <input type="checkbox" name="playing" value="playing"> playing
                </td>
            </tr>

            <tr>
                <td>Select Cities </td>
                <td>
                    <select name="selcity">
                        <option value="">---Select City---</option>
                        <option value="surat">Surat</option>
                        <option value="bharuch">Bharuch</option>
                        <option value="vadodara">Vadodara</option>
                        <option value="rajkot">Rajkot</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input type="date" name="dob" required></td>
            </tr>
            <tr>
                <td>Mobile number</td>
                <td> <input type="number" name="txtnumber" required> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td> <input type="email" name="txtemail" required> </td>
            </tr>
            <tr>
                <td>Username</td>
                <td> <input type="text" name="txtusername" required> </td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input type="password" name="txtpassword" required> </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="btninsert" value="Add">
                    <input type="reset" name="reset" value="Reset">
                    <a href="index.php">Back</a>
                </td>
            </tr>

</table>
</form>
</center>
</body>
</html>