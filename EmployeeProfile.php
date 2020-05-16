<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>


    
    <link rel="stylesheet" href="css/style1 - Copy.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/fonts.css">

    <script src="https://kit.fontawesome.com/8a7775d0b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script>
   $(document).ready(function() {
      

      $('#profile').click(function() {
          
         
         alert("ajax loading..");

         $('#dashboard-Right').load('myProfile.php');
				return false;
      });
      $('#education').click(function() {
          
         
          alert("ajax loading..");
 
          $('#dashboard-Right').load('myEducation.php');
             return false;
       });
       $('#resume').click(function() {
          
         
          alert("ajax loading..");
 
          $('#dashboard-Right').load('EmployeeResume.php');
             return false;
       });
       $('#skill').click(function() {
          
         
          
 
          $('#dashboard-Right').load('mySkill.php');
             return false;
       });
       $('#changePassword').click(function() {
          
         
          alert("ajax loading..");
 
          $('#dashboard-Right').load('myChangePassword.php');
             return false;
       });
       $('#jobSearch').click(function() {
          
         
          alert("ajax loading..");
 
          $('#dashboard-Right').load('jobSearch.php');
             return false;
       });
       $('#dashbooard').click(function() {
          
         
          alert("ajax loading..");
 
          $('#dashboard-Right').load('myDashboard.php');
             return false;
       });
       
   });
</script>



</head>

<body style="background: #f0f3fa none repeat scroll 0 0">


    <div class="container">



        <div class="profile">
            <div class="dashboard-Leftt">

<div class="col-lg-3 col-md-12 dashboard-left-border">
      <div class="dashboard-left">
         <ul class="dashboard-menu">
            <li><a href="#" id="dashbooard"><i class="fa fa-tachometer"></i>Dashboard</a></li>
            <li class="active"><a href="#" id="profile"><i class="fa fa-users"></i>Personal Info</a></li>
            <li><a id="education" href="#"><i class="fa fa-envelope-open" ></i>Education</a></li>
            <li><a id="skill" href="#"><i class="fa fa-rocket"></i>skill</a></li>
            <li><a id="changePassword" href="#"><i class="fa fa-lock"></i>change password</a></li>
            <li><a id="resume" href="#"><i class="fa fa-briefcase"></i>My Resume</a></li>
            <li><a id="jobSearch" href="#"><i class="fa fa-rocket"></i>Job Search</a></li>
            <li><a id="logout" href="logout.php"><i class="fa fa-power-off"></i>LogOut</a></li>
         </ul>
      </div>
               </div>







            </div>
            <div class="dashboard-Right" id="dashboard-Right"> 

            </div>
        </div>


    </div>








</body>

</html>


<!--
   <li>
               <button id="dashboard">
               <i class="fa fa-tachometer"></i>
               Dashboard
               </button>
            </li>
            <li class="active">
               <button >
               <i class="fa fa-users"></i>
               MyProfile
               </a>
            </li>
            <li><button id="nessage"><i class="fa fa-envelope-open"></i>messages</a></li>
            <li><button id="manageJob"><i class="fa fa-briefcase"></i>manage jobs</a></li>
            <li><button id="earning"><i class="fa fa-rocket"></i>earnings</a></li>
            <li><button id="changePassword"><i class="fa fa-lock"></i>change password</a></li>
            <li><button id="logout"><i class="fa fa-power-off"></i>LogOut</></li>
-->