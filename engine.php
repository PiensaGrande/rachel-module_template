<?php
include(dirname(__FILE__) . "/template.php");

// Example engine to support more admin actions/functionality.
// This simple example checks to see if a form has been submitted, processes the form, and displays the value along with the form. 

// do something on button clicks or form submits

$manifest_file = dirname(__FILE__) . "/manifest.json";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(!empty($_REQUEST['title'])) { $json['title'] = $_REQUEST['title']; }
	if(!empty($_REQUEST['description'])) { $json['description'] = $_REQUEST['description']; } 

	try {
                $file = fopen($manifest_file,'w+');
                $json_pretty = json_encode($json, JSON_PRETTY_PRINT);
                fwrite($file, $json_pretty);
                fclose($file);
        } catch (Exception $ex) {
                header("HTTP/1.1 500 Internal Server Error");
                exit;
        }
	// allow $templ to be re-set with the new values from manifest.json
	include(dirname(__FILE__) . "/template.php");
}

// show the form if we are not processing the form (default behavior)
echo "
<div style='margin: 50px 0 50px 0; padding: 10px; border: 1px solid blue; background: aliceblue;'>
<h4>{$templ['title']}</h4>
<p>{$templ['description']}</p>
<div style='margin: 20px 30px 10px 30px; padding: 10px; border: 1px solid gray; background: ghostwhite;'>
<p>{$templ['pg-update_module_info']}:</p>
<form method='POST' id='pg_{$templ['dirname']}_form' action='{$templ['engine_web_loc']}'>
{$templ['pg-title_text']}: <input type='text' name='title' />  <br/>
{$templ['pg-description_text']}: <input type='text' size='50%' name='description' /> <br/><br/>
<input type='submit' name='editManifest' value='{$templ['pg-submit']}'/>
</div>
</form>
</div>
";
?>
