<?php require_once($_SERVER["DOCUMENT_ROOT"] .  "/admin/common.php"); ?>
<?php
// This is simple module manifest used by RACHEL to display required info, such as module title and description.
// Used by files such as rachel-index.php, rachel-admin.php, and rachel-stats.php
// To extend $templ for module-specific messages, add lines to messages.php.

$lang1 = getlang();
$templ = array();
$tmpl_dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(__FILE__)); // enables module directory to change location

// By including messages here instead of after the translated bits, we draw attention to it for newcomers,
// It also means that we will treat the associations in template.php as authoritative.
// These two files need to remain separate because the plan is to have template.php read from
// a manifest.json file which can be written to programmatically thus enabling a UI for module customizations.
// and leaving this file to merely parse manifest.json and load the messages.

include dirname(__FILE__) . "/messages.php";


// ---------------------------------------------------------------
// ---- Update these required fields with your module's info -----
// ---------------------------------------------------------------
$templ["title"] = "Module Title";
$templ["description"] = "A description of your module goes here. Edit template.php in your module directory to change your module title, logo, or description."; 
$templ["version"] = "2017.11"; // verison number for your module
$templ["img_web_loc"] = "{$tmpl_dir}/logo.png"; // pointer to your module's logo. {$tmpl_dir} already contains a pointer to the home directory of your module.
$templ["index_web_loc"] = "{$tmpl_dir}/index.php"; // pointer to your module's main index page

$templ["module_type"] = "admin_module"; // "admin_module" or "content_module". admin modules add system functionality as opposed to providing educational content.
$templ["hide_index"] = "no"; // "yes" or "no". choose "yes" if you do not want your module visible on the RACHEL homepage. admin_modules will often choose "yes".   
$templ["show_search"] = "yes"; // "yes" or "no". choose "no" if your module does not support search functionality. adjust search_web_loc below if "yes".


// --------------------------------------------------------------
// ------- For more complex modules, modify if needed -----------
// -------------------------------------------------------------- 
$templ["admin_web_loc"] = "{$tmpl_dir}/rachel-admin.php"; // if your module has admin-specific functionality for display on the admin page
$templ["stats_web_loc"] = "{$tmpl_dir}/rachel-stats.php"; // if your module has stats-specific functionality for display in the admin stats tab
$templ["dirname"] = basename(__DIR__);
$templ["clean_dirname"] = str_replace('-', '_', $templ["dirname"]);
$templ["engine_inc_loc"] = dirname(__FILE__) . "/engine.php"; // for more complex admin-specific functions
$templ["js_inc_loc"] =  dirname(__FILE__) . "/engine.js.php"; // jquery for engine.php
$templ["web_path"] = $tmpl_dir;
$templ["engine_web_loc"] = "{$tmpl_dir}/engine.php";
$templ["search_web_loc"] = "{$tmpl_dir}/search.php";
$templ["search_var_name"] = "query";
$templ["search_button_text"] = "Search";


// --------------------------------------------------------------
// -------------- For a multi-lingual module  ------------------- 
// --------------------------------------------------------------
// If it makes sense for your module to support multiple languages, 
//  you can add translations below.
switch ($lang1) {
	case ("es"): // spanish translations
		$templ["title"] = "Título de Módulo"; 
		$templ["description"] = "Esta es una descripción de tu módulo. Edite template.php en su directorio de módulo para cambiar el título, el logotipo o la descripción de su módulo.";
		$templ["search_button_text"] = "Buscar";
		break;
	case ("fr"): // french translations
		$templ["title"] = "Titre du Module"; 
		$templ["search_button_text"] = "Chercher";
		break;
	// Add support for additional languages here as additional cases
}
// A note to developers - don't be tempted to create a default within the case statement. 
//  Currently, we define the default before the case statement, which gives us the benefit of 
//  supporting partial translations (i.e. just override the default with a translation when available).
//  For French above, for example, the title would be translated into French, but the description would default to English
//  since no translation is available.


// set manifest overrides
$manifest_file = dirname(__FILE__) . "/manifest.json";
if(file_exists($manifest_file)) {
	$contents = file_get_contents($manifest_file);
        if ($contents) {
        	$manifest_overrides = json_decode($contents, true);
		foreach ($manifest_overrides as $key => $value) {
			if ($key == "img_web_loc" || $key == "index_web_loc") {
				$value = $tmpl_dir . "/" . $value;
			}
			$templ[$key] = $value;
		}
        }
}


?>
