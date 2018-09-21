<?php

if(isset($_GET['c']) && isset($_GET['v']) && isset($_GET['r']) && isset($_GET['s'])){

	$component = trim($_GET['c']);
	$version = trim($_GET['v']);
	$responsavel = trim($_GET['r']);
	$status = trim($_GET['s']);
	$data = date('Y-m-d H:i:s');

	if($component !== '' && $version !== '' && $responsavel !== '' && $status !== ''){

		$db = new SQLite3('/var/www/html/commits.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
		
		$db->query(
		'CREATE TABLE IF NOT EXISTS "commits" (
			"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
			"component" VARCHAR,
			"version" VARCHAR,
			"responsavel" VARCHAR,
			"status" VARCHAR,
			"date_insert" VARCHAR
		  )'
		);

		$db->query('INSERT INTO "commits" ("component", "version", "responsavel", "status", "date_insert") VALUES ("'.$component.'", "'.$version.'", "'.$responsavel.'", "'.$status.'", "'.$data.'")');

		$listData = $db->query('SELECT * FROM "commits"');
		while ($row = $listData->fetchArray()) {
				echo "Responsável: " . $row['responsavel'] . "<br />";
				echo "Componente: " . $row['component'] . "<br />";
				echo "Version: " . $row['version'] . "<br />";
				echo "Status: " . $row['status'] . "<br />";
				echo "Data: " . $row['date_insert'] . "<br />";
		}
		
		$db->close();
	} else {
		die('dados vazios');
	}
} else {
	die('sem dados para processar');
}

?>