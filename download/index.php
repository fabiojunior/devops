<?php

$db = new SQLite3('/var/www/html/commits.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
$filename = "deploys-" . date("m-d-Y") . ".csv";

header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=$filename");

$output = fopen('php://output', 'w');

fputcsv($output, array('Responsavel', 'Componente', 'Version', 'Status', 'Data'));

$listData = $db->query('SELECT responsavel, component, version, status, date_insert FROM "commits"');

while ($row = $listData->fetchArray()) {
	$lista = array($row['responsavel'], $row['component'], $row['version'], $row['status'], $row['date_insert']);
	fputcsv($output, $lista);
} 

$db->close();

?>
