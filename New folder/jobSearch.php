<?php

session_start();

include "includes/db_connect.php";


//$_SESSION["email"] = "aumlan@gmail.com";
if(!isset($_SESSION["email"])){
  header("Location: login.php");
}
$email = $_SESSION["email"];



$catagory = $checked_count = $type = $salary = $exp = $location = "";
$np = 3;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (!empty($_POST['search-categories'])) {
		$catagory = $_POST['search-categories'];
	}
	if (!empty($_POST['search-keyword'])) {
		$exp = $_POST['search-keyword'];
	}

	if (!empty($_POST['salary'])) {
		$salary = $_POST['salary'];
	}
	if (!empty($_POST['type'])) {
		$type = $_POST['type'];
		echo $type;
	}
	if (!empty($_POST['search-location'])) {
		$location = $_POST['search-location'];
	}
}


$commentsPerPage = 3;
$a = 1;

$commentsQuery = "select * from job limit $commentsPerPage";
$resultComments = mysqli_query($conn, $commentsQuery);

$totalCommentsQuery = "SELECT COUNT(*) as t_c FROM job";
$resultTotalComments = mysqli_query($conn, $totalCommentsQuery);
$rowTotalComments = mysqli_fetch_assoc($resultTotalComments);
$tC = $rowTotalComments['t_c'];

$np = ceil($tC / $commentsPerPage);


?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="css/jobSearch.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/fonts.css">
	<script src="https://kit.fontawesome.com/8a7775d0b9.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function() {
			var i = 2;
			var j = 0;
			var nextClick = 0;
			$("#prevBtn").hide();
			$("#nextBtn").hide();

			$('#searchBTN').click(function() {
				var email = '<?php echo $email ?>';
				$("#prevBtn").show();
				$("#nextBtn").show();
				document.getElementById('prevBtn').disabled = true;
				alert("ajax loading..");


				


				$('#searchResult').load('jobSearchResult.php', {
					location: document.getElementById('search-location').value,
					type: document.querySelector('input[name="type"]:checked').value,
					catagory: document.getElementById('search-categories').value,
					salary: document.querySelector('input[name="salary"]:checked').value,
					email: email,
					exp: document.querySelector('input[name="exp"]:checked').value
				});
				return false;
			});
			$('#prevBtn').click(function() {
				nextClick--;

				j = j - 3;
				$("#nextBtn").show();
				alert(j);

				$('#searchResult').load('jobSearchResult.php', {
					startingVal: j,
					np: <?php echo $np ?>,
					nextClick1: nextClick
				});
			});

			$('#nextBtn').click(function() {
				document.getElementById('prevBtn').disabled = false;

				nextClick++;
				j = j + 3;
				$("#prevBtn").show();
				alert(j);
				if (j == 9) {
					$("#nextBtn").hide();

				}

				$('#searchResult').load('jobSearchResult.php', {
					startingVal: j,
					np: <?php echo $np ?>,
					nextClick1: nextClick
				});
			});



		});
	</script>






</head>

<body>


	<div class="container">

		<div class="outside" style="background: #fff none repeat scroll 0 0;border-radius: 8px;">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" style="padding-top: 15px">



<div class="jobSearch">
	<div class="row-1">
		<div class="search">


			<!--Job Catagory-->
			<div class="jp_rightside_job_categories_wrapper">
				<div class="jp_rightside_job_categories_heading">
					<h4>Catagory</h4>
				</div>
				<div class="jp_rightside_job_categories_content">
					<div class="handyman_sec1_wrapper">
						<div class="content">
							<div class="box">

								<div class="catagory">

									<div class="btn-group bootstrap-select open">
										<select name="search-categories" class="selectpicker" id="search-categories" data-live-search="true" title="Any Category" data-size="5" data-container="body" tabindex="-98">
											<option class="bs-title-option" value="">Any Category</option>
											<option value="accounting">Accountance</option>
											<option value="bangking">Banking</option>
											<option value="developement">Developement</option>
											<option value="insurance">Insurance</option>
											<option value="iT">IT</option>
											<option value="healthcare">Healthcare</option>
											<option value="marketing">Marketing</option>
											<option value="management">Management</option>
										</select>
									</div>
								</div>

							</div>
						</div>

					</div>
					<label for="" class="eg">e.g: IT, Marketing, <br> Banking</label>
				</div>
			</div>
			<!--Job Type-->
			<div class="jp_rightside_job_categories_wrapper" style="margin-left: 10px">
				<div class="jp_rightside_job_categories_heading">
					<h4>Job Type</h4>
				</div>
				<div class="jp_rightside_job_categories_content">
					<div class="handyman_sec1_wrapper">
						<div class="content">
							<div class="box">
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c1" name="type" value="any-type">
									<label for="c1">Any Type </label>

								</p>
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c2" name="type" value="full-time">
									<label for="c2">Full-Time </label>
								</p>
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c3" name="type" value="part-time">
									<label for="c3">Part-Time </label>
								</p>
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c4" name="type" value="internship">
									<label for="c4">Internship </label>
								</p>

							</div>
						</div>

					</div>
				</div>
			</div>
			<!--Job Salary-->
			<div class="jp_rightside_job_categories_wrapper" style="margin-left: 10px">
				<div class="jp_rightside_job_categories_heading">
					<h4>Job Salary</h4>
				</div>
				<div class="jp_rightside_job_categories_content">
					<div class="handyman_sec1_wrapper">
						<div class="content">
							<div class="box">
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c1" name="salary" value="<$10000">
									<label for="c1">
										<$10000 </label> </p> <p style=" margin-bottom: 0px;">
											<input type="radio" id="c2" name="salary" value="$10000 - $25000">
											<label for="c2"> $10000 - $25000 </label>
								</p>
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c3" name="salary" value="$25000 - $50000">
									<label for="c3"> $25000 - $50000 </label>
								</p>
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c4" name="salary" value=">$50000 - $75000">
									<label for="c4"> >$50000 </label>
								</p>

							</div>
						</div>

					</div>
				</div>
			</div>
			<!--Job Experience-->
			<div class="jp_rightside_job_categories_wrapper" style="margin-left: 10px">
				<div class="jp_rightside_job_categories_heading">
					<h4>Experience</h4>
				</div>
				<div class="jp_rightside_job_categories_content">
					<div class="handyman_sec1_wrapper">
						<div class="content">
							<div class="box">
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c1" name="exp" value="1">
									<label for="c1">
										<= 1 Year </label> </p> <p style=" margin-bottom: 0px;">
											<input type="radio" id="c2" name="exp" value="1-3">
											<label for="c2"> 1-3 Year </label>
								</p>
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c3" name="exp" value="3-5">
									<label for="c3"> 3-5 Year </label>
								</p>
								<p style=" margin-bottom: 0px;">
									<input type="radio" id="c4" name="exp" value="5">
									<label for="c4"> =>5 Year </label>
								</p>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!--Job Location-->
			<div class="jp_rightside_job_categories_wrapper" style="margin-left: 10px">
				<div class="jp_rightside_job_categories_heading">
					<h4>Job Location</h4>
				</div>
				<div class="jp_rightside_job_categories_content">
					<div class="handyman_sec1_wrapper">
						<div class="content">
							<div class="box">
								<p style=" margin-bottom: .3rem;">

									<input type="text" name="search-location" class="form-control" id="search-location" placeholder="Location" style="width: 85%">

								</p>
							</div>
						</div>
					</div>
					<label for="" class="eg">e.g: Dhaka, Chaittagong, <br> Sylhet</label>
				</div>
			</div>


		</div>
	</div>
	<div class="row-2">
		<div class="cv" style="margin-bottom: 8px">
			<input class="btn btn-primary btn-lg active" role="button" aria-pressed="true" type="submit" value="Search" id="searchBTN" name="isSubmit"></input>

		</div>
	</div>
</form>

<div class="row-3">

<div class="jp_rightside_job_categories_wrapper">
	<div class="jp_rightside_job_categories_heading">
		<h4>Search result</h4>
	</div>
	<div class="jp_rightside_job_categories_content">
		<div class="handyman_sec1_wrapper">
			<div class="content">
				<div class="SerachResult">
					<ul class="job-listings mb-5" id="searchResult">


					</ul>
					<button class="btnpg" type="button" name="btnPrev" id="prevBtn">Previous</button>
					<button class="btnpg" type="button" name="btnNext" id="nextBtn">Next</button>
				</div>


			</div>

		</div>
	</div>
</div>


</div>



</div>













		</div>

	</div>
	</div>


</body>

</html>





<!--
<div class="row pagination-wrap">

			<div class="col-md-6 text-center text-md-right">
				<div class="custom-pagination ml-auto mb-5">
					<a href="#" class="prev">Prev</a>
					<div class="d-inline-block">
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">4</a>
					</div>
					<a href="#" class="next">Next</a>
				</div>
			</div>
		</div>

	-->







<!--
	var name = $('#name').val();
                var percentage = $('#percentage').val();
            
                var email = '<?/*php echo $email*/ ?>';
				var	location= document.getElementById('search-location').value;
				var	type= document.querySelector('input[name="type"]:checked').value;
				var	catagory= document.getElementById('search-categories').value;
				var	salary= document.querySelector('input[name="salary"]:checked').value;
				var	email= email;
				var	exp= document.querySelector('input[name="exp"]:checked').value;

                var postData = 'location=' + location + '&type=' + type + '&catagory=' + catagory + '&salary=' + salary + '&type=' + type + '&type=' + type + '&email=' + email;
      

				$.ajax({
                    url: "jobSearchResult.php",
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


-->