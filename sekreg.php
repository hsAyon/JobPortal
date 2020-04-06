<html style="background-color: white">
<?php
    session_start();

    include_once "inc/homeheader.php";
    include "inc/db.php";
    
    $nerr=$uerr=$perr=$cperr=$emerr=$gerr=$cerr=$unierr=$cgerr=$skerr=$experr=$salerr="";
    
    $fname=$uname=$pass=$cpass=$fpass=$email=$gender=$contact=$uni=$cgpa=$skill=$exp=$salary="";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['homereg'])){
            $fname=$_POST['fname'];
        }
        elseif(isset($_POST['sekreg'])){
            if(!empty($_POST['fname'])){
                $fname=$_POST['fname'];
            }
            else{
                $nerr="No name given!";
            }

            if(!empty($_POST['uname'])){
                $uname=$_POST['uname'];
            }
            else{
                $uerr="No username given!";
            }
            if(!empty($_POST['email'])){
                $email=$_POST['email'];
            }
            else {
                $emerr="No email given!";
            }
            if(!empty($_POST['gender'])){
                $gender=$_POST['gender'];
            }
            else {
                $emerr="No gender given!";
            }

            if(!empty($_POST['contact'])){
                $contact=$_POST['contact'];
            }
            else {
                $cerr="Contact number not given!";
            }
            if(!empty($_POST['uniname'])){
                $uni=$_POST['uniname'];
            }
            else {
            }
            if(!empty($_POST['cgpa'])){
                if($cgpa>=0 && $cgpa<=4){
                    $cgpa=$_POST['cgpa'];
                }
                else {
                    $cgerr="Invalid CGPA!";
                }
            }
            else {

            }
            if(!empty($_POST['skill'])){
                $skill=$_POST['skill'];
            }
            else {
            }
            if(!empty($_POST['exp'])){
                $exp=$_POST['exp'];
            }
            else {
            }
            if(!empty($_POST['salary'])){
                $salary=$_POST['salary'];
            }
            else {
            }

            if(!empty($_POST['pass'])){
                $pass=$_POST['pass'];
                if(!empty($_POST['cpass'])){
                    $cpass=$_POST['cpass'];
                    if($pass==$cpass){
                        $fpass=password_hash($pass,PASSWORD_DEFAULT);
                    }
                    else{
                        $cperr="Passwords do not match!";
                    }
                }
                else {
                    $cperr="Re enter password!";
                }
            }
            else {
                $perr="No password given!";
            }

            if($nerr==""&&$uerr==""&&$perr==""&&$cperr==""&&$emerr==""&&$gerr==""&&$cerr==""&&$unierr==""&&$cgerr==""&&$skerr==""&&$experr==""&&$salerr==""){
                $sql1 = "INSERT INTO login (username, password, usertype)
                VALUES ('$uname', '$fpass','seeker');";

                mysqli_query($conn, $sql1);

                $lastID=mysqli_insert_id($conn);

                $sql2 = "INSERT INTO seeker (userID, name, email, gender, contact, skill, cgpa, university, experience, salary)
                VALUES ('$lastID','$fname','$email','$gender','$contact',NULLIF('$skill',''),NULLIF('$cgpa',''),NULLIF('$uni',''),NULLIF('$exp',''),NULLIF('$salary',''));";

                mysqli_query($conn, $sql2);
                $_SESSION['sekreg']="Successful";

                header('Location: login.php');

            }
            
            echo mysqli_error($conn);

        }
    }

?>

<style>
    label{
        font-size: 20;
    }
    input{
        padding-left: 10px;
        padding-right: 10px;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

</style>


    <body style="color: black; font-family: Verdana;">
        <table width="100%" style="padding: 50px; color: black; font-family: Verdana;">
            <tr>
                <td width="50%" align="center">

                    <form action="sekreg.php" method="POST">

                    <div align="left" style="background-color: lightgrey; padding: 50px; color:black; max-width: 750px; padding-left: 100px; padding-right: 100px;">
                    <label style="font-size: 25px">Register as a Job Seeker!</label>
                    <br><br><br>
                    <table width="100%">
                        <!-- Name -->
                        <tr>
                            <td><label style="color:black; font-size: 20;">Full Name: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="fname" maxlength="50" required style="font-size:20px; flex: 1;" value="<?php echo $fname ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $nerr ?></td>
                        </tr>
                        <!-- username -->
                        <tr>
                            <td><label style="color:black">Username: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uname" maxlength="100" required style="font-size:20px; flex: 1;" value="<?php echo $uname ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $uerr ?></td>
                        </tr>
                        <!-- password -->
                        <tr>
                            <td><label style="color:black">Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="pass" maxlength="50" required style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $perr ?></td>
                        </tr>
                        <!-- confirm password -->
                        <tr>
                            <td width="210px"><label style="color:black">Confirm Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="cpass" maxlength="50" required style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $cperr ?></td>
                        </tr>
                        <!-- email -->
                        <tr>
                            <td><label style="color:black">Email: &nbsp</label></td>
                            <td style="display: flex;"><input type="email" width="100%" name="email" maxlength="20" required style="font-size:20px; flex: 1;" value="<?php echo $email ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $emerr ?></td>
                        </tr>
                        <!-- gender -->
                        <tr>
                            <td><label style="color:black">Gender: &nbsp</label></td>
                            <td style="display: flex;">
                            <table align="center" width="100%">
                                <tr>
                                    <td><input type="radio" name="gender" value="male" style="width:20px; height:20px; vertical-align: text-bottom;" <?php if(isset($_POST['gender'])){if($gender=="male"){echo "checked";}} else{echo "checked";}?>><label for="male">Male</label></td>
                                    <td><input type="radio" name="gender" value="female" style="width:20px; height:20px; vertical-align: text-bottom;" <?php if(isset($_POST['gender'])){if($gender=="female"){echo "checked";}}?>><label for="female">Female</label></td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $gerr ?></td>
                        </tr>
                        <!-- contact -->
                        <tr>
                            <td><label style="color:black">Contact Number: &nbsp</label></td>
                            <td style="display: flex;"><input type="number" width="100%" name="contact" maxlength="20" style="font-size:20px; flex: 1;" required value="<?php echo $contact ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $cerr ?></td>
                        </tr>
                        <!-- university -->
                        <tr>
                            <td><label style="color:black">University: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uniname" maxlength="50" style="font-size:20px; flex: 1;" value="<?php echo $uni ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $unierr ?></td>
                        </tr>
                        <!-- cgpa -->
                        <tr>
                            <td><label style="color:black">CGPA: &nbsp</label></td>
                            <td style="display: flex;"><input type="Number" width="100%" name="cgpa" maxlength="5" step="0.01" style="font-size:20px; flex: 1;" value="<?php echo $cgpa ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $cgerr ?></td>
                        </tr>
                        <!-- skill -->
                        <tr>
                            <td><label style="color:black">Skills: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="skill" maxlength="100" style="font-size:20px; flex: 1;" value="<?php echo $skill ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $skerr ?></td>
                        </tr>
                        <!-- experience -->
                        <tr>
                            <td><label style="color:black">Experience: &nbsp</label></td>
                            <td style="display: flex;"><input type="number" width="100%" name="exp" maxlength="2" style="font-size:20px; flex: 1;" value="<?php echo $exp ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $experr ?></td>
                        </tr>
                        <!-- salary -->
                        <tr>
                            <td><label style="color:black">Desired salary: &nbsp</label></td>
                            <td style="display: flex;"><input type="number" width="100%" name="salary" maxlength="10" style="font-size:20px; flex: 1;" value="<?php echo $salary ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $salerr ?></td>
                        </tr>


                        <tr>
                            <td></td>
                            <td align="right" ><br><input type="submit" name="sekreg" value="Register" style="font-size: 20px;"></td>
                        </tr>
                    </table>
                    </div>

                    </form>

                </td>
            </tr>
        </table>
    </body>
</html>