<?php

  // Includes necessary files:

  include "conn.php";
  include "lib.php";

  // Get user's ip and current timestamp:

  $ip = getUserIpAddr();
  $tstamp = time();

  // Internal configuration:

  $allowspam = true; // Allow unlimited interactions from the same Ip adress;
  $id;

  // Get data from POST form action method:

  $disease = $_POST['Disease'];
  $lat = $_POST['Lat'];
  $lng = $_POST['Lng'];

  // Variables needed in system's logic:

  $valid = true; // Default value is true;
  $newrecord = true; // Default value is true;

  // If both, $lat and $lng are not empty, proceed:

  if (!empty($lat) && !empty($lng)) {

    $sql = "SELECT Tstamp FROM interactions WHERE Ip = '$ip'"; // Select rows that match the user's Ip address;

    $n1query = $c->query($sql);

    if ($n1query->num_rows > 0) {
              
      while($row = $n1query->fetch_assoc()) {

        $row_tstamp = $row["Tstamp"];

        if ($tstamp - $row_tstamp < 1440) { // If any interaction was registred from the same Ip address within 24 hours, set valid to false;

          $valid = false;

        }

      }

    }

    if ($valid || $allowspam) { // If valid or allowspam is true, proceed:

      $sql = "SELECT * FROM occurrences";

      $n2query = $c->query($sql);

      if ($n2query->num_rows > 0) {
                
        while($row = $n2query->fetch_assoc()) {

          // Store data from rows:

          $row_id = $row["Id"]; $row_disease = $row["Disease"]; $row_lat = $row["Lat"]; $row_lng = $row["Lng"]; $row_reports = $row["Reports"];

          if ((d($lat, $lng, $row_lat, $row_lng) <= ($row_reports * 10)) && $disease == $row_disease) { // If the user is in the area and the interaction is about the same disease: 

            $newrecord = false; // Set $newrecord to false, which means it's an update interaction;
            $record_id = $row_id; // Set the id of occurrence it's going to be updated;

          }

          $id = $row_id; 

        }

        if ($newrecord) { // If it's a new record, execute the sql query below:

          $sql = "INSERT INTO occurrences (Disease, Lat, Lng, Reports, Created, Updated) VALUES('$disease','$lat','$lng','1','$tstamp','$tstamp')";

          $n3query = $c->query($sql);

        }

        else { // If it's an update interaction:

          $sql = "UPDATE occurrences SET Reports = Reports + 1, Updated = '$tstamp' WHERE Id = '$record_id'"; // Update Reports and Updated in row whose Id is equal to $record_id;
        
          $n4query = $c->query($sql);

        }

      }

      else { // If it's the first record in the database:

        $sql = "INSERT INTO occurrences (Disease, Lat, Lng, Reports, Created, Updated) VALUES('$disease','$lat','$lng','1','$tstamp','$tstamp')";

        $n5query = $c->query($sql);

      }

      if ($newrecord) {

        $type = "Created";
        $id += 1;

      }

      else {

        $type = "Updated";
        $id = $record_id;

      }

      // Register interaction (Ip and current timestamp):

      $sql = "INSERT INTO interactions (Ip, Tstamp, Type, Occurrence) VALUES('$ip','$tstamp', '$type', '$id')";

      $n6query = $c->query($sql);

      $c->close();      

      header("Location: /Dease", true, 301); 

    }

    else {

      $c->close();

      header("Location: /Dease/Spam.php", true, 301); 

    }

  }

  else {

    $c->close();

    header("Location: /Dease/Error.php", true, 301); 

  }

  exit();

?>