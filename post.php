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
// replacement for mysql_real_escape_string()
/* function html_escape($html_escape) {
  $html_escape =  htmlspecialchars($html_escape, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  return $html_escape;
} */

// Posting new data into the DB
if (isset($_POST['submit'])) {
  $first = html_escape($_POST['first']);
  $last = html_escape($_POST['last']);
  $contact = html_escape($_POST['contact']);
  $associate = html_escape($_POST['associate']);

  $insert = "INSERT INTO g_list (";
  $insert .= "g_fname, g_lname, g_phone, g_association) ";
  $insert .= "VALUES ('{$first}', '{$last}', '{$contact}', '{$associate}')";
  //  $insert .= " LIMIT 1" // Not supported on insert
  $i_result = mysqli_query($connection, $insert);
  // I have verified that the above works by setting the varialble 
  // in the VALUES area to strings and seeing it update
}


if (isset($connection)) {
  mysqli_close($connection);
}

redirect_to("index.php");
?>