<?php

$Output = file_get_contents('vala.wiki');

// Strip first line
$Output = substr( $Output, strpos($Output, "\n")+1 );

$Previous = array(
	'list_open' => ' * ',
	'double_space' => '  '
);

$Parse = array(
	'list_open' => '*',
	'double_space' => ' '
);

foreach ($Parse as $Key => $Value) {
	$Output = str_replace($Previous[$Key], $Parse[$Key], $Output);
}

require_once(__DIR__.'/../_libs/WikiParser/wikiParser.class.php');
$New = new wikiParser();
echo $New->parse($Output);
