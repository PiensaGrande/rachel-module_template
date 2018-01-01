<?php
include(dirname(__FILE__) . "/template.php");

// Example engine to support more admin actions/functionality.
// This simple example checks to see if a form has been submitted, processes the form, and displays the value along with the form. 

// do something on button clicks or form submits
if (isset($_REQUEST['adminField'])) {

	$my_var = $_REQUEST['adminField'];

	echo "
	<div style='margin: 50px 0 50px 0; padding: 10px; border: 1px solid blue; background: aliceblue;'>
	<h4>{$templ['title']}</h4>
	<p>{$templ['pg-admin_msg']}: {$my_var}</p>
	<form method='POST' id='pg_{$templ['dirname']}_form' action='{$templ['engine_web_loc']}'>
	<input type='text' id='adminFieldID' name='adminField'  placeholder='{$templ['pg-admin_placeholder']}' />
	<input type='submit' name='submitSomething' id='submitSomethingID' value='{$templ['pg-admin_submit']}'/>
	</form>
	</div>
	";
	exit;
}

// show the form if we are not processing the form (default behavior)
echo "
<div style='margin: 50px 0 50px 0; padding: 10px; border: 1px solid blue; background: aliceblue;'>
<h4>{$templ['title']}</h4>
<form method='POST' id='pg_{$templ['dirname']}_form' action='{$templ['engine_web_loc']}'>
<input type='text' id='adminFieldID' name='adminField'  placeholder='{$templ['pg-admin_placeholder']}' />
<input type='submit' name='submitSomething' id='submitSomethingID' value='{$templ['pg-admin_submit']}'/>
</form>
</div>
";
?>
