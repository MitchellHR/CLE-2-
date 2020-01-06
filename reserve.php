<!DOCTYPE html>
<html>
  <head>
    <title>
      Inplannen
    </title>
    <meta charset="utf-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="scriptsjs"></script>
    <link href="css4.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  </head>
  <body>

      <?php
      require('navbar.php');
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

                  $to      = $_POST['res_email'];
                  $subject = 'Reserveringstijden';
                  $message = 'U heeft voor de volgende datum een afspraak gemaakt ' + $_POST['res_date'] + " " + 'de tijden zijn: ' + $_POST['res_start'] + '-' + $_POST['res_end'] ;
                  $headers = 'From: 0960144@hr.nl' . "\r\n" .
                      'Reply-To: 0960144@hr.nl' . "\r\n" .
                      'X-Mailer: PHP/' . phpversion();
              mail($to, $subject, $message, $headers);

              header('Location: index.php');

              echo "<script>alert('Success!</br>Klik hier om naar de home pagina te gaan');</script>";
            }
        }else{
            echo "";
        }
    ?>




<form id="regForm" action=""  method="post">

<h1>Inplannen</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">Naam:
  <p><input class="input_reserve" type="text"  name="res_name" required placeholder="Naam" oninput="this.className = ''"></p>
</div>

<div class="tab">Contact Informatie:
  <p><input class="input_reserve" type="email" name="res_email" required placeholder="Email" oninput="this.className = ''"></p>
  <p><input class="input_reserve" type="text" name="res_tel" required placeholder="Telefoon" oninput="this.className = ''"></p>
</div>

<div class="tab">Datum en Tijd:
  <p><input class="input_reserve" type="date" name="res_date"  reqired placeholder="Datum"  oninput="this.className = ''"></p>
  <p><input class="input_reserve" type="time" name="res_start" required placeholder="Start tijd" oninput="this.className = ''"></p>
  <p><input class="input_reserve" type="time" name="res_end" required placeholder="Eind tijd" oninput="this.className = ''"></p>
</div>

<div class="tab">Opmerkingen:
  <p><input class="input_reserve" type="text" name="res_notes" placeholder="Opmerkingen" oninput="this.className = ''"></p>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>
</form>



  
  </body>
</html>

<script>
  <?php
    include('scripts.js')
  ?>
</script>


