
<?php
include 'db-cont.php';

if(isset($_POST["submit"])){
session_start();
$name = $_SESSION["name"];
$answer1 = $_POST["q1"];
$answer2 = $_POST["q2"];
$answer3 = $_POST["q3"];
$answer4 = $_POST["q4"];
$answer5 = $_POST["q5"];
$answer6 = $_POST["q6"];
$count = 1;
$total = 0 ;
$validtion = '';


  // Start Calck Res ...


$select_user = $cont->prepare("SELECT * FROM users");
$select_user->execute();
while($row2 = $select_user->fetch()){
  $select = $cont->prepare("SELECT * FROM ans WHERE name =?");
  if($count <= 6){
  $validtion = $row2["answer" . $count];
  $select->execute(array($validtion));
  $count ++;
}
  while ($row = $select->fetch()) {
    if($row['status'] == 1){
      $total += 16.6;
    } // If Statment
  } // 2 Loop
} // Main Loop


$update = $cont->prepare("UPDATE users SET answer1=? , answer2=? , answer3=? , answer4=? , answer5=? , answer6=? , total=? WHERE name =?");
$update->execute(array($answer1 ,$answer2 ,$answer3,$answer4,$answer5,$answer6 , $total , $name));

include 'navbar.html';
?>
<div class="alert alert-success" role="alert">
    <?php echo "Yot Total Deg : " . $total;?>
</div>
<?php


//echo "Your Total : " . $total;
}

?>
