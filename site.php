<html>
  
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    
    <form action = "Site.php" method="post">
      
      Share: <input type="text" name="share">
      <input type="submit">

    </form>
    <br>

    <?php 
      //define array   
      $shares = array("");
      //push user input into array
      array_unshift($shares, $_POST["share"]);
      // Loop through array to echo each element
      foreach($shares as $share) {
        echo $share . "<br>";
      }
    ?>

  </body>
</html>