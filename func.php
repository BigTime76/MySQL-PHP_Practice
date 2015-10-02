<?php
function redirect_to($new_location) {
  header("Location: " . $new_location);
  exit;
}

function html_escape($html_escape) {
  $html_escape =  htmlspecialchars($html_escape, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  return $html_escape;
}

?>