<?php
global $lang1;

// This file provides a method for modules to support multiple language translations.
// Where template.php includes fields required by RACHEL, messages.php incorporates any other optional text that your module might use.

// Default language (English here) should be a complete set presented text.
// Add whatever your modules needs.
// These are just some examples used by the sample rachel-admin.php
$templ['pg-admin_placeholder'] = "Type something";
$templ['pg-admin_submit']  = "Submit";
$templ['pg-admin_msg']  = "You typed";

// This model allows for partial translations, where a subset of known translations can be added below.
// Support for additional languages can be added via additional cases.
switch ($lang1) {
        case ("es"):
                $templ['pg-admin_placeholder'] = "Escribe algo";
		$templ['pg-admin_submit']  = "Enviar";
		$templ['pg-admin_msg']  = "Has escrito";
		break;
	case ("fr"):
                $templ['pg-admin_placeholder'] = "Tapez quelque chose";
                $templ['pg-admin_submit']  = "Soumettre";
                $templ['pg-admin_msg']  = "Tu as tapé";
                break;
	// We provide default before the case statement to allow for partial translations.
}

?>

