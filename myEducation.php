<?php 
include "includes/db_connect.php";
session_start();

$degree = $year = $institution=$err=$emailInDB="d";

////$_SESSION["email"] = "aumlan@gmail.com";
if(!isset($_SESSION["email"])){
  header("Location: login.php");
}
$email = $_SESSION["email"];
/* mysqli_real_escape_string() helps prevent sql injection */



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/myProfile.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <script src="https://kit.fontawesome.com/8a7775d0b9.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script>
		$(document).ready(function() {
			var i = 2;
      		var j = 0;
      		var nextClick=0;
          alert("ajax loading..");

			$('#addEdu').click(function() {
      
              var institution = $('#institution').val();
                var degree = $('#degree').val();
                var year = $('#year').val();
                var email = '<?php echo $email ?>';

                var postData = 'institution=' + institution + '&degree=' + degree + '&year=' + year + '&email=' + email;
      
                $.ajax({
                    url: "addEducation.php",
                    type: "POST",
                    data: postData,
                    success: function(data, status, xhr) {
                      //if success then just output the text to the status div then clear the form inputs to prepare for new data
                      $("#status_text").html(data);
                      $('#degree').val('');
                      $('#year').val('');
                    },
                    error: function(jqXHR, status, errorThrown) {
                      //if fail show error and server status
                      $("#status_text").html('there was an error ' + errorThrown + ' with status ' + textStatus);
                    }
                  })
      
      
      });
				
		});
	</script>
  
</head>

<body>


  <div class="container" style="background: #f0f3fa none repeat scroll 0 0; height:1000px">
    <div class="dashboard-right" >
      <div class="candidate-profile">

        <form onsubmit="return false">

        <div class="single-resume-feild feild-flex-2">
            <div class="single-input" >
              <label for="Phone">Degree Name:</label>
              <input type="text" value="" id="degree" name="institution" required placeholder="Bsc in CSE" >
            </div>
          </div>

        <div class="single-resume-feild feild-flex-2">
            <div class="single-input" >
              <label for="Phone">Year:</label>
              <input type="text" value="" id="year" name="institution" required>
            </div>
          </div>
          
          <div class="single-resume-feild feild-flex-2">
            <div class="single-input" >
              <label for="Phone">Institution Name:</label>
              <input type="text" value="" id="institution" name="institution" required>
            </div>
            <!--<div class="single-input">
              <label for="Email">Email:</label>
              <input type="text" value="demo@mail.com" id="Email">
            </div> -->
          </div>
          <div class="submit-resume" >
            <input class="btn btn-primary btn-lg active" id="addEdu" value="Add" type="submit" ></input> 
            <span id="status_text" style="color:red"><?php echo $err; ?></span>
          </div>
        </form>
      </div>
    </div>

  </div>



</body>

</html>