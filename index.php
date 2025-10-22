<?php
// Redirect root index to the public front-end (safety fallback if output buffering not active)
// If headers already sent, show a simple link.
?>
<html><head><meta http-equiv="refresh" content="0; url=public/welcome.php"></head>
<body>If you are not redirected automatically, <a href="public/welcome.php">go to the app</a>.</body></html>