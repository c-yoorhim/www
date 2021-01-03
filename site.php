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
        //remove last value of array when reaches max length
        $max_share = 30;
        if (sizeof($get_shares) > $max_share) {
          array_pop($get_shares);
        }
        //convert array to string
        echo implode(" | ", $get_shares);
        //save updated array into file
        $save_shares = file_put_contents("saved_shares.txt", serialize($get_shares));

      }
  /*I think this isn't recognizing the "share" variable until a user input is provided?
        I get this error message when I first load the page:
        "Warning: Undefined array key "share" in C:\Users\mihro\www\site.php on line 31"
        But that disappears after I provide an input.
      */    
  ?>

  </body>
</html>