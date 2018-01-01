<?php ob_start(); ?>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/admin/common.php");

// Place module-specific info for RACHEL in template.php
// For a simple module, editing template.php will be all that is necessary.
include dirname(__FILE__) . "/template.php"; 

// Permit template.php to define whether we show anything on RACHEL's index page.
// (Remember that hiding in admin will cause rachel-admin.php to be hidden as well.)
if (strtoupper($templ["hide_index"]) == "YES") { return; }

// Here we build the module structure
// Note the availability of this data to jquery using data-
echo "<div class='indexmodule' data-moduletype='{$templ['module_type']}' data-title='{$templ['title']}' data-img_web_loc='{$templ['img_web_loc']}' data-index_web_loc='{$templ['index_web_loc']}'>";

// Search form. template.php specifies whether to show search form.
// See the RACHEL search documentation for details on supporting search functionality.
if (strtoupper($templ["show_search"]) == "YES") {
	echo "
	<form action='{$templ['search_web_loc']}'>
	<input name='{$templ['search_var_name']}' id='{$templ['dirname']}_search' autocomplete='off'>
	<input type='submit' value='{$templ['search_button_text']}'>
	</form>
	";
};

// Your module's logo and title as given in template.php
echo "
<a href='{$templ['index_web_loc']}'><img src='{$templ['img_web_loc']}' alt='Your Content Logo'></a>
<h2><a href='{$templ['index_web_loc']}'>{$templ['title']}</a></h2>
";

// Description of your module as given in template.php
// You can comment this out if not used.
echo "<p>{$templ['description']}</p>";

// Links to specific parts of your content - only required if it makes sense.
// Try to keep the list size reasonable (i.e. not too long). You can make
// multi-column lists by adding "double", "triple", or "quad" as the <ul>
// class. For example, <ul class="double"> will create a two-column list.
// Using $templ['web_path'] allows your module's home directory to change.
// Uncomment the lines below to link to specific parts of your content:
//echo "
//<ul class='triple'>
//<li><a href='{$templ['web_path']}/topic1.html'>Topic 1</a></li>
//<li><a href='{$templ['web_path']}/topic2.html'>Topic 2</a></li> 
//<li><a href='{$templ['web_path']}/topic3.html'>Topic 3</a></li> 
//</ul>
//";

echo "</div>";
?>
<?php ob_end_flush(); ?>
