<?php
function readJsonFile($file) {
    $dummy = file_get_contents($file);
	return json_decode($dummy, true);
}
?>