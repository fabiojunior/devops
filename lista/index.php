<?php

	echo "<h2 style='font-family:Arial;'>Deploys realizados</h2>";
	echo "<button><a href='/download'>Baixar CSV</a></button>";

	$db = new SQLite3('/var/www/html/commits.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

	$listData = $db->query('SELECT * FROM "commits" order by date_insert desc');
	while ($row = $listData->fetchArray()) {
        echo "<div>
				<p style='font-family:Arial;'><b>Dados do deploy:</b></p>
				<div style='padding:5px;background:#eeeeee;border:1px solid #cccccc;border-radius:5px;'>
					<code>
						<b>Responsável:</b> " . $row['responsavel'] . "<br />
						<b>Componente:</b> " . $row['component'] . "<br />
						<b>Version:</b> " . $row['version'] . "<br />
						<b>Status:</b> " . $row['status'] . "<br />
						<b>Data:</b> " . $row['date_insert'] . "<br />
					</code>
				</div>
			</div>";
	}

	$db->close();

?>