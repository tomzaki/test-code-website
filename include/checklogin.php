<?php
//session must be started, verify that it was started
//  before calling this script.
if (!isset($_SESSION['loggedin'])) {
	header("Location: ./php/login.php");
	exit;
} else {
	// $$$ the session variable exists - any further checks required?
   //     we *could* query the db again, but that's like logging in
   //     every time you open a page. seems unnecessary. Look into
   //     this later.
}
?>