<html>
<head>
    <!-- it shows menu offered by eatFresh -->
    <?php
    include "connection.php";
    include "header.php";
    error_reporting(0);
    session_start();
    ?>
    <style>
        #heading{
            font-family: Cambria;
        }
        #text{
            font-family: "Bookman Old Style";
            font-size: small;
        }
    </style>
</head>
<body>
  <?php
  //alert
  if(isset($_REQUEST['q']) && $_REQUEST['q']==1) {
      ?>
      <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <center>Thank you, your query was received succesfully and we will get back to you as soon as possible.</center>
      </div>
      <?php
  }
  ?>
<img src="pictures/menu1.jpg" class="img-responsive" style="padding: 20px 50px 50px 50px;">
  <?php
  //fetching menu data from the db
  $query1="select * from menu order by food_item asc";
  $result1=mysqli_query($conn,$query1);
  ?>
  <div class="form-group col-md-2"></div>
  <?php
  $count=0;
  while($row=mysqli_fetch_array($result1)) {
      ?>
        <div class="form-group col-md-2">
            <div class="row"> <h3>
                    <div id="heading"><?php echo $row[1] ?></div></h3>
            </div>
            <div class="row">
                <strong><?php echo $row[3]." cal"?></strong>
            </div>

            <div class="row">
                <div id="text">
                    <?php echo $row[4] ?>
                </div>
            </div>
        </div>
        <div class="form-group col-md-1"></div>
        <?php
        $count++;
        if($count % 3 == 0)
        {
            ?>
            <div class="row"></div>
            <div class="form-group col-md-2"></div>
            <?php
        }
        if($count == 6)
        {
            ?>
            <img src="pictures/menu2.jpg" class="img-responsive" style="padding: 20px 50px 50px 50px;">
            <div class="row"></div>
            <div class="form-group col-md-2"></div>
            <?php
        }
    }
    ?>
</body>
</html>
