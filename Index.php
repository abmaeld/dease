<!DOCTYPE html>
<html>

  <head>

    <title>Dease</title>

    <META HTTP-EQUIV = "CACHE-CONTROL" CONTENT = "NO-CACHE">
    <meta charset = "utf-8">

    <meta name = "viewport" content = "initial-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no">
    <link rel = "stylesheet" type = "text/css" href=".core/css/stylesheet.css">
    
    <script type="text/javascript" src=".core/js/shield.js"></script>
    <script type="text/javascript">
      
      var occurrences = {

        <?php include ".core/php/update.php"; // Includes data from mysql database ?>

      };

    </script>

  </head>

  <body>

    <div id = "overlay"></div>

    <div id = "menu">
      
      <a href="#1" onclick='document.getElementById("visibleform").style.display = "block"; document.getElementById("i1").style.display = "none";'>
        
        <div class="i" id = "i1"><i class="material-icons" id = "report">add_alert</i><a>Alertar</a></div>

      </a>
      
      <a href="#2"><div class="i" id = "i2"><i class="material-icons" id = "help">help_outline</i><a>Ajuda</a></div></a>
      <a href="#3"><div class="i" id = "i3"><i class="material-icons" id = "info">info_outline</i><a>Info</a></div></a>

      <div id = "visibleform">
    
        <div id = "vdisease"> 

          <select name = "select" id = "select" onchange='document.getElementById("Disease").value = document.getElementById("select").value;'>

            <option value="Dengue">Dengue</option>
            <option value="Virose">Virose</option>
            <option value="Esquistossomose">Esquistossomose</option>
            <option value="Zika">Zika</option>

          </select>

          <button type = "submit" form = "data" id = "submit">Reportar</button>

        </div> 

      </div>

    </div>

    <form id = "data" name = "data" method = "post" action = ".core/php/report.php"> 
      
      <input type = "text" name = "Disease" id = "Disease" value = "Dengue" readonly>
      <input type = "text" name = "Lat" id = "Lat" readonly/>
      <input type = "text" name = "Lng" id = "Lng" readonly/>

    </form>

    <div id = "map"></div>

    <script type="text/javascript" src=".core/js/map.js"></script>

    <script async defer
    src = "https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>

  </body>

</html>