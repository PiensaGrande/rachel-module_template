# rachel-module_template
Template proposal for RACHEL modules showing examples of multilingual and admin integration

## Motivation
This module is meant to serve as a template for the creation of new RACHEL modules. The historic template has been focused on content-only modules where there is no need for admin intervention.  This template serves to act as an example for how to construct a more complicated module while leaving simplicity for a content-only module creator.  Additionally, this template takes us a step closer towards some foreseeable obstacles such as having module types not defined by subdirectories and providing module info more readily to alternative UI usage (such as building a select box of all module titles via an ajax call to index.php.)  Finally, this template provides a format for supporting multilingual modules when full or partial translations are available. 

## Usage

- Update your module-specific information required by RACHEL (e.g. your module's title and description) in template.php. Optionally, add language translations as well. For simple modules, editing template.php will be all that is required.
- If your module communicates with the user beyond title and description, update messages.php with module-specific text.  As a head start on multi-lingual support, this messages.php can be used throughout your module code and partial translations are OK.
- For those with coding experience, if your module requires special admin functionality (processing a form, interacting with jquery, changing the state of the system), start by taking a look at the example code in rachel-admin.php (which includes engine.php and engine.js.php).

## Developer notes 

- Extracting title, description and other elements to template.php allows rachel-index, rachel-admin, rachel-config, rachel-help, etc. to all have access to the same module information while maintaining it in one place.
- This module template provides a format for adding multi-lingual support to any module through full or partial translations, where required text fields, such as module title and description, exist in template.php and all optional text in messages.php
- To implement admin actions, we suggest using an engine (see example engine.php), and we separate the engine from any associated jquery code (see engine.js.php).

## Useful practices

- Partial translations provided by forcing a full translation and then overwriting with partial through case statement.
- RACHEL required items are separated from module introduced items by having template.php (RACHEL) and messages.php (module specific).

## Future direction / TODO

- Once decisions on how rachel-xxx programs will be used, update example to be in alignment. 
- Once discussion on benefits / costs of manifest.json have occurred, collapse the two branches into one.  If non-directory support for manifest.json were to be added to index.php, utility modules, such as our Local Content lesson-plan module, could be stored in a database as json objects with many of them included (only chosen ones enabled) without requiring directories for each module.
- Decide on urgency of module dependency tracking.  Lesson plan modules have dependencies but it only matters if they are shared across installations.  Through this template, module program control (apart from UI) can be managed and isolated, eventually enabling module dependency tracking.
- Long term, an upgraded index.php would be able to eliminate rachel-index.php in most modules and allow template.php to indicate if a custom rachel.php is used.  This updated index.php could additionally support manifest.json only modules out of a database.
