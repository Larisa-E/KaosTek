<?php
// Redirect root index to the organized public entry.
header('Location: public/welcome.php');
exit; // no additional output to avoid unreachable code warnings