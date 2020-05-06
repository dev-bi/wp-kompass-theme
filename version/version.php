<?php
/**
 * version.php
 * Zeigt an, an welchem Tag diese Worpressumgebung auf dem Server aktualisiert wurde.
 *
 * Wenn deploy-bik.py ausgeführt wird,
 * werden aktuelle Daten eingefügt und in die Datei version.php.deploy kopiert
 *
 * @author Stefan Simon <stefan.simon@lionysos.com>
 *
 */

$day = "Donnerstag";
$date_time = "30.04.2020 10:00 Uhr";
echo "<p style='font-size:small;'>Geändert am: $day um: $date_time</p>";
