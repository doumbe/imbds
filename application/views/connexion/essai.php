
<?php if(!isset($_SESSION)) { session_start(); } ?> 
<?php
echo 'bonjour'.$_SESSION['email'];
?>