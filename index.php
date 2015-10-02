<?php require_once("func.php"); ?>
<?php 
$dbhost = "localhost";
$dbuser = "diggerPHP";
$dbpass = "Craddle2theGrave";
$dbname = "guest_list";
// Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test if connection succeeded
if(mysqli_connect_errno()) {
  die("DB's not here, man: " . 
      mysqli_connect_error() . 
      " (" . mysqli_connect_errno() . ")"
     );
}

$query  = "SELECT * ";
$query .= "FROM g_list ";
$query .= "ORDER BY g_id DESC";
$q_result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Guest List</title>
    <link href="guest.css" media="all" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <header>
      <h1>Woodburn Funeral Home</h1>
      <h2>Guest Registry</h2>
    </header>
    <div class="container">
      <div class="registry">
        <form action="post.php" name="formup" id="main_form" method="post">
          <fieldset>
            <legend>Please enter your name into the registry</legend>
            <p class="first">First Name: 
              <input type="text" name="first" value="" placeholder="One or more first names" size="64"></p>
            <p class="last">Last Name:
              <input type="text" name="last" value="" placeholder="Last name" size="64"></p>
            <p class="contact">Phone Number or Email:
              <input type="text" name="contact" value="" placeholder="" size="32"></p>
            <p class="associate">Your relation?
              <input type="text" name="associate" value="" placeholder="" size="128"></p>
            <p class="submit">
              <input type="submit" name="submit" title="add" value="submit" placeholder=""></p>
          </fieldset>
        </form>
      </div>
    </div>

    <h3>Guest List:</h3>            
    <table>
      <tr>
        <th>Firstname(s)</th><th>Lastname</th>
        <th>Phone or Email</th><th>Association</th>
      </tr>

      <?php while($guest = mysqli_fetch_assoc($q_result)) {
  echo "<tr>" . "<td>" . $guest["g_fname"] . "</td>"
    . "<td>" . $guest["g_lname"] . "</td>"
    . "<td>" . $guest["g_phone"] . "</td>"
    . "<td>" . $guest["g_association"] . "</td>" . "</tr>";
} ?>

    </table>
    <footer>
      <div>Copyright <?php echo date("Y"); ?>, Woodburn Funeral Home, LLC.</div>

      <?php
if (isset($connection)) {
  mysqli_close($connection);
}
      ?>
    </footer>
  </body>
</html>
