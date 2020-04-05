<html style="background-color: white">
<?php
    include_once "inc/homeheader.php";

    $nerr=$uerr=$perr=$cperr=$emerr=$gerr=$cerr=$unierr=$cgerr=$skerr=$experr=$salerr="";
    
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
                            <td style="display: flex;"><input type="text" width="100%" name="fname" maxlength="50" required style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $nerr ?></td>
                        </tr>
                        <!-- username -->
                        <tr>
                            <td><label style="color:black">Username: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uname" maxlength="100" required style="font-size:20px; flex: 1;"></td>
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
                            <td width="200px"><label style="color:black">Confirm Password: &nbsp</label></td>
                            <td style="display: flex;"><input type="password" width="100%" name="cpass" maxlength="50" required style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $cperr ?></td>
                        </tr>
                        <!-- email -->
                        <tr>
                            <td><label style="color:black">Email: &nbsp</label></td>
                            <td style="display: flex;"><input type="email" width="100%" name="email" maxlength="20" required style="font-size:20px; flex: 1;"></td>
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
                                    <td><input type="radio" name="gender" value="male" style="width:20px; height:20px; vertical-align: text-bottom;" checked><label for="male">Male</label></td>
                                    <td><input type="radio" name="gender" value="female" style="width:20px; height:20px; vertical-align: text-bottom;"><label for="female">Female</label></td>
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
                            <td style="display: flex;"><input type="number" width="100%" name="contact" maxlength="20" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $cerr ?></td>
                        </tr>
                        <!-- university -->
                        <tr>
                            <td><label style="color:black">University: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uniname" maxlength="50" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $unierr ?></td>
                        </tr>
                        <!-- cgpa -->
                        <tr>
                            <td><label style="color:black">CGPA: &nbsp</label></td>
                            <td style="display: flex;"><input type="Number" width="100%" name="cgpa" maxlength="5" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $cgerr ?></td>
                        </tr>
                        <!-- skill -->
                        <tr>
                            <td><label style="color:black">Skills: &nbsp</label></td>
                            <td style="display: flex;"><input type="text" width="100%" name="uname" maxlength="100" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $skerr ?></td>
                        </tr>
                        <!-- experience -->
                        <tr>
                            <td><label style="color:black">Experience: &nbsp</label></td>
                            <td style="display: flex;"><input type="number" width="100%" name="uname" maxlength="2" style="font-size:20px; flex: 1;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label style="font-size: 15px; color: red;"></label><?php echo $experr ?></td>
                        </tr>
                        <!-- salary -->
                        <tr>
                            <td><label style="color:black">Desired salary: &nbsp</label></td>
                            <td style="display: flex;"><input type="number" width="100%" name="uname" maxlength="10" style="font-size:20px; flex: 1;"></td>
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