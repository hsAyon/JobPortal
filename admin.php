<html style="background-color: white">
<?php
    session_start();

    include_once "inc/homeheader.php";
    include "inc/db.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['approve'])){
            var_dump($_POST['approve']);
        }
        
    }
    
?>

<script>
    function approve(id){
        
        $usql = "UPDATE employer SET approval = 1 WHERE userID = "+id+";";

    }
</script>

<style>
table td,
table td * {
    vertical-align: top;
}
</style>

<body style="color: black; font-family: Verdana;">
    <table width="100%" style="padding: 50px; color: black; font-family: Verdana;">
        <tr align="center">
            <!-- approval section -->
            <td width="250px">

                <?php
                                    
                    $sql = "SELECT * FROM employer WHERE approval = 0;";
                    $result = mysqli_query($conn,$sql);
                
                ?>
                <table>
                    <form action="" method="POST">
                    <tr>
                        <th>UserName</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    <?php
                            while($rows=mysqli_fetch_assoc($result)){
                                ?>
                    <tr>
                        <td><?php $userID = $rows['userID'];
                                    $uquery = "SELECT username FROM login WHERE ID = $userID;";
                                    $uresult = mysqli_query($conn,$uquery);
                                    echo mysqli_fetch_assoc($uresult)['username'];
                                    ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['email'] ?></td>
                        <td><input type="submit" id="<?php echo $rows['userID']; ?>" name="approve" value="Approve"></td>
                    </tr>
                    <?php
                            }
                        ?>
                </form>
                </table>
            </td>
            <!-- display users -->
            <td width="" style="font-size: 20px;">
                <div style="background-color: lightgrey; padding: 50px; color:black;">
                    <table>
                        <tr>
                            <th>Admin</th>
                            <th>Employer</th>
                            <th>Job Seeker</th>
                        </tr>
                        <tr>
                            <!-- Admin -->
                            <td>
                                <?php
                                    
                                        $sql = "SELECT * FROM admin;";
                                        $result = mysqli_query($conn,$sql);
                                    
                                    ?>
                                <table>
                                    <tr>
                                        <th>UserName</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                    <?php
                                            while($rows=mysqli_fetch_assoc($result)){
                                                ?>
                                    <tr>
                                        <td><?php $userID = $rows['userID'];
                                                    $uquery = "SELECT username FROM login WHERE ID = $userID;";
                                                    $uresult = mysqli_query($conn,$uquery);
                                                    echo mysqli_fetch_assoc($uresult)['username'];
                                                    ?></td>
                                        <td><?php echo $rows['name'] ?></td>
                                        <td><?php echo $rows['email'] ?></td>
                                    </tr>
                                    <?php
                                            }
                                        ?>
                                </table>
                            </td>
                            <!-- Employer -->
                            <td>
                                <?php
                                    
                                        $sql = "SELECT * FROM employer;";
                                        $result = mysqli_query($conn,$sql);
                                    
                                    ?>
                                <table>
                                    <tr>
                                        <th>UserName</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                    <?php
                                            while($rows=mysqli_fetch_assoc($result)){
                                                ?>
                                    <tr>
                                        <td><?php $userID = $rows['userID'];
                                                    $uquery = "SELECT username FROM login WHERE ID = $userID;";
                                                    $uresult = mysqli_query($conn,$uquery);
                                                    echo mysqli_fetch_assoc($uresult)['username'];
                                                    ?></td>
                                        <td><?php echo $rows['name'] ?></td>
                                        <td><?php echo $rows['email'] ?></td>
                                    </tr>
                                    <?php
                                            }
                                        ?>
                                </table>
                            </td>
                            <!-- Seeker -->
                            <td>
                                <?php
                                    
                                        $sql = "SELECT * FROM seeker;";
                                        $result = mysqli_query($conn,$sql);
                                    
                                    ?>
                                <table>
                                    <tr>
                                        <th>UserName</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                    <?php
                                            while($rows=mysqli_fetch_assoc($result)){
                                                ?>
                                    <tr>
                                        <td><?php $userID = $rows['userID'];
                                                    $uquery = "SELECT username FROM login WHERE ID = $userID;";
                                                    $uresult = mysqli_query($conn,$uquery);
                                                    echo mysqli_fetch_assoc($uresult)['username'];
                                                    ?></td>
                                        <td><?php echo $rows['name'] ?></td>
                                        <td><?php echo $rows['email'] ?></td>
                                    </tr>
                                    <?php
                                            }
                                        ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>