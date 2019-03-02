

<?php
include 'navbar.html';
include 'db-cont.php';
session_start();
if(empty($_SESSION["name"])){
header('Location:login.php');
}else{
?>

        <style>
          .q{
            color:#2c2ec5;
            font-weight: bold;
            
          }

        </style>



        <div class="features text-center">
            <div class="container">

                <div class="row">
                        <div class="col-sm-12 col-lg-12 card">
                        <div class="card-body ">
                          <form action="back.php" method="post">
<?php

  $select=$cont->prepare("SELECT * FROM question");
  $select->execute();
$count = 0;

  while($row = $select->fetch()){
    if($count < 6){
    $num = rand(1,60);
    $count++;
?>

    <div class="form-group">
      <label for="exampleFormControlInput1" class="q"><?php echo $row['name']?></label>



        <?php
          $select_ans = $cont->prepare("SELECT * FROM ans WhERE q_code =?");
          $select_ans->execute(array($row['id']));
          while ($row_ans = $select_ans->fetch()) {
            ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="<?php echo 'q'.$count ?>" id="exampleRadios1" value="<?php echo $row_ans['name']; ?>" checked>
              <?php echo $row_ans['name']; ?>
            </label>
          </div>
            <?php
          }
        ?>
        <hr>
    </div>
    <?php
  }
  }

?>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

  </form>
  <p>Created By <a href="www.facebook.com/mohamedgouda4">Mohamed Gouda<a/> , IEEE SHA</p>
                         </div>
                    </div>




            </div> <!--End Row-->

        </div>







<?php

}
?>
