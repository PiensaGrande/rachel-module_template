<?php
global $lang1;

// This file provides a method for modules to support multiple language translations.
// Where template.php includes fields required by RACHEL, messages.php incorporates any other optional text that your module might use.

// Default language (English here) should be a complete set presented text.
// Add whatever your modules needs.
// These are just some examples used by the sample rachel-admin.php
$templ['pg-title_text'] = "Title";
$templ['pg-description_text'] = "Description";
$templ['pg-submit']  = "Submit";
$templ['pg-update_module_info'] = "Override Module Info (via manifest.json)";

// This model allows for partial translations, where a subset of known translations can be added below.
// Support for additional languages can be added via additional cases.
switch ($lang1) {
        case ("es"):
		$templ['pg-title_text'] = "Título";
		$templ['pg-description_text'] = "Descripción";
		$templ['pg-submit']  = "Enviar";
		$templ['pg-update_module_info'] = "Actualizar información del módulo";
		break;
	case ("fr"):
		$templ['pg-title_text'] = "Titre";
                $templ['pg-description_text'] = "Description";
                $templ['pg-submit']  = "Soumettre";
		$templ['pg-update_module_info'] = "Mettre à jour les informations du module";
                break;
	// We provide default before the case statement to allow for partial translations.
}

?>

