<?php 




$sal = "f<1000";



if (strpos($sal,"<")) {
  $sal2= explode('<',$sal);
  echo $sal2[0];
  echo "<br>";
  echo $sal2[1];
    
}else{
  echo "fucc u";
}















/*$res = "dv00125;24-05-2020,tg00135;19-03-2019,dbbl0325;25-09-2020,";
$subR = explode(',',$res);
$count = count($subR);


for ($x = 0; $x <($count-1); $x++) {
    $r= explode(';',$subR[$x]);
    echo "jobid: " . $r[0] . "<br> date: " . $r[1] . "<br>";

}
*/
















/*$res = "2010-2012;manager;jobDescriptionnnnnnn)2015-2017;manager;jobDescriptionnnnnnn)2019-2052;manager;jobDescriptionnnnnnn)";

$subR = explode(')',$res);
$count = count($subR);


for ($x = 0; $x <($count-1); $x++) {
    $r= explode(';',$subR[$x]);
    echo "year: " . $r[0] . "<br> desig: " . $r[1] . " <br> desc " . $r[2] . "<br>";

}

while ($row = mysqli_fetch_array($result)) {
  $subR = explode(')',$res);
  $count = count($subR);

  for ($x = 0; $x <($count-1); $x++) { 
    $r= explode(';',$subR[$x]); ?>
    <div class="timeline-item">
      <div class="timeline-period">
        <span><?php echo $r[0] ?></span></div>
      <div class="timeline-main">
        <h5 class="timeline-title"><?php echo $r[1] ?></h5>
        <p><?php echo $r[2] ?></p>
      </div>
    </div>

<?php }
}*/










/*$y= "2012";
$d= "bsc";
$i= "aiub";

echo $hst = "(".$y.";".$d.";".$i.")";*/








/*name
p_title
gender
age
cgpa
salary
exp
website
aboutMe
phone
address
city
twitter
facebook
google
linkedin
email

$.ajax({
          url: "updateMyProfile.php",
          type: "POST",
          data: postData,
          success: function(data, status, xhr) {
            //if success then just output the text to the status div then clear the form inputs to prepare for new data
            $("#status_text").html(data);
          },
          error: function(jqXHR, status, errorThrown) {
            //if fail show error and server status
            $("#status_text").html('there was an error ' + errorThrown + ' with status ' + textStatus);
          }
        })


      });*/

?>


