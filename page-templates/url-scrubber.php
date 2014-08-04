<?php
/*
 * Template Name: URL Scrubber
 */
?>

<!doctype html>

<?php

$oldUrl = "http://webinvisible.staging.wpengine.com";
$newUrl = "http://invisiblechildren-redesign.dev";
$scrubber = new URLScrubber($oldUrl, $newUrl);

?>