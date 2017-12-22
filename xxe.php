/*
apt-get install php-xml
*/

<?php 
/* enable entity */
libxml_disable_entity_loader (false);


/* Read file into string - read directly from the input-stream */
$xmlfile = file_get_contents('php://input');

/* Creatres a new dom object */
$dom = new DOMDocument();
/* Uses the dom-object, and the loadXML function to load in a string as a xml object. */
$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);

$creds = simplexml_import_dom($dom);
/* The creds from the input can now be accessed like an xml object */
$user = $creds->user;
$pass = $creds->pass;
echo "You have logged in as user $user";
?> 
