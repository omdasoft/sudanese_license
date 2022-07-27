<?php
$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $new;
//<script>document.location="http://google.com";</script>
?>
