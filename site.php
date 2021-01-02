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
      
      //get array from file
      $get_shares = unserialize(file_get_contents("saved_shares.txt"));
      
      if (empty($get_shares)) {
        //setup as array
        $get_shares = array();
        $save_shares = file_put_contents("saved_shares.txt", serialize($get_shares));
      }
      
      if (isset($get_shares)) {
        //push user input into front of array
        array_unshift($get_shares, $_POST["share"]); 
        //convert array to string
        echo implode(" | ", $get_shares);
        //save updated array into file
        $save_shares = file_put_contents("saved_shares.txt", serialize($get_shares));

      }
      
  ?>

  </body>
</html>