<?php

set_time_limit(0);
ini_set('max_execution_time', 0);
ini_set('max_execution_time', 0);

include 'cache.php';

echo 'Cached Version is '.$Cache['Version'].'<br>';

$Cache_Location = __DIR__.'/../_cache/';
$File_Cache = realpath($Cache_Location.'latest_version.php');
echo 'Cached File is '.$File_Cache.'<br>';
if ( !is_writable($File_Cache) ) {
	echo 'ERROR: Not writable.';
	exit;
}

$Prefix = 'http://ftp.gnome.org/pub/GNOME/sources/vala/';
$Archive = 'tar.xz';
echo 'Search File is '.$Prefix.' * '.$Archive.'<br>';

$Data = file_get_contents($Prefix.'cache.json');
$Array = json_decode($Data);

$Versions = current($Array[2]);
$Latest = end($Versions);
$References = current($Array[1]);

$Fetch = array(
	'Changes' => $Prefix.$References->$Latest->changes,
	'Checksum' => $Prefix.$References->$Latest->sha256sum,
	'Download' => array(
		'Location' => $Prefix.$References->$Latest->$Archive,
		'Size' => false
	),
	'News' => $Prefix.$References->$Latest->news,
	'Version' => $Latest
);

echo 'Latest Version is '.$Fetch['Version'].'<br>';

if ($Cache['Version'] != $Fetch['Version'] || isset($_GET['force'])) {

	/*
	Alternative size fetch.
		Requires downloading the whole file.
		Failes on partial download.
	*/
	/*
	$File_Download = $Cache_Location.'vala-'.$Fetch['Version'].'.tar.xz';
	if (!file_exists($File_Download) || isset($_GET['down'])) {

		$Download_Contents = file_get_contents($Fetch['Download']['Location']);
		file_put_contents($File_Download, $Download_Contents);
	}
	$Fetch['Download']['Size'] = filesize($File_Download);
	*/

	function file_get_size($url){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_NOBODY, TRUE);
		$data = curl_exec($ch);
		$size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
		curl_close($ch);
		return intval($size);
	}
	$Fetch['Download']['Size'] = file_get_size($Fetch['Download']['Location']);

	echo '<pre>';
	var_dump($Fetch);
	echo '</pre>';

	$Write = '<?php

$Cache = array(
	\'Changes\' => \''.$Fetch['Changes'].'\',
	\'Checksum\' => \''.$Fetch['Checksum'].'\',
	\'Download\' => array(
		\'Location\' => \''.$Fetch['Download']['Location'].'\',
		\'Size\' => \''.$Fetch['Download']['Size'].'\'
	),
	\'News\' => \''.$Fetch['News'].'\',
	\'Version\' => \''.$Latest.'\'
);';

	file_put_contents($File_Cache, $Write);

	echo '<pre>'.htmlentities(file_get_contents($File_Cache), ENT_QUOTES, 'UTF-8').'</pre>';

} else echo 'No update needed.';
