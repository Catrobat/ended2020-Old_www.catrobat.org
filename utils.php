<?php
if (!isset($_GET["a"])) {
	exit;
}

$action = $_GET["a"];

if ($action == "stats") {
	$stats = @file_get_contents("https://www.openhub.net/p/catrobat");
	@preg_match("/<ul class='unstyled nutshell' id='factoids'>(.*?)<\/ul>/si", $stats, $stats);
	@preg_match_all("/<a.*?>([0-9\,]+).*?<\/a>/si", $stats[0], $stats);
	die(json_encode($stats[1]));
}

?>