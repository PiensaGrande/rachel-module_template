<?php include dirname(__FILE__) . "/template.php"; ?>
<?php

// This is an optional file that RACHEL uses in the case that your module
// wants to provide access to admin-specific information or actions.
// Place this file in your module's directory if needed.

// Information from template.php is used.
echo "<div class='adminmodule' data-moduletype='{$templ['module_type']}' data-title='{$templ['title']}' data-img_web_loc='{$templ['img_web_loc']}' data-index_web_loc='{$templ['index_web_loc']}'>";

// To implement admin actions such as processing a form in the background or communicating with jquery, we suggest using an engine, 
// and we separate the engine from any associated jquery code.
// This gives the ability for the actions to be provided in multiple locations (rachel-admin.php, index.php, etc.) without duplicating code.

// This example provides a unique div ID (by using $templ['dirname']) to be used by jquery without affecting other modules' rachel-admin segments.
echo "<div id='{$templ['dirname']}DivWrapper'>";
include $templ["engine_inc_loc"]; // engine code
echo "</div></div>";
include $templ["js_inc_loc"]; // associated jquery code. our example replaces the above div on button click
?>
