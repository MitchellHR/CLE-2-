<!DOCTYPE html>
<html>
  <head>
    <title>
      Inplannen
    </title>
    <link href="css4.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  </head>
  <body>

      <?php
      require('db.php');
        // If form submitted, insert values into the database.
        if (isset($_REQUEST['res_name'])){
        $res_name = stripslashes($_REQUEST['res_name']); // removes backslashes
        $res_name = mysqli_real_escape_string($con,$res_name); //escapes special characters in a string
        $res_email = stripslashes($_REQUEST['res_email']);
        $res_email = mysqli_real_escape_string($con,$res_email);
        $res_tel = stripslashes($_REQUEST['res_tel']);
        $res_tel = mysqli_real_escape_string($con,$res_tel);
        $res_notes = stripslashes($_REQUEST['res_notes']);
        $res_notes = mysqli_real_escape_string($con,$res_notes);
        $res_date = stripslashes($_REQUEST['res_date']);
        $res_date = mysqli_real_escape_string($con,$res_date);
        $res_start = stripslashes($_REQUEST['res_start']);
        $res_start = mysqli_real_escape_string($con,$res_start);
        $res_end = stripslashes($_REQUEST['res_end']);
        $res_end = mysqli_real_escape_string($con,$res_end);

        
            $query = "INSERT into `reservations` (res_name, res_email, res_tel, res_notes, res_date, res_start, res_end ) VALUES ('$res_name', '$res_email', '$res_tel', '$res_notes', '$res_date', '$res_start', '$res_end')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<div class='form'><h3>Met succes ingepland</h3><br/>Click here to <a href='index.php'>Home/a></div>";
            }
        }else{
            echo "FAILED";
        }
    ?>



    <h1>
      Inplannen
    </h1>
 
    <div class="res_form">
    <form   action="index.php"  method="post">
      <label for="res_name">Name</label>
      <input type="text"  name="res_name" required/>

      <label for="res_email">Email</label>
      <input type="email" name="res_email" required />

      <label for="res_tel">Telephone Number</label>
      <input type="text" name="res_tel" required />

      <label for="res_notes">Notes (if any)</label>
      <input type="text" name="res_notes"/>

      <label>Reservation Date</label>
      <input type="date" name="res_date">
    
      <label>Reservation start time</label>
      <input type="time" name="res_start" required />

      <label>Reservation end time</label>
      <input type="time" name="res_end" required/>

      <button id="res_gaan">
        Submit
      </button>
    </form>
    </div> 
  
  </body>
</html>


