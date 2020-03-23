<?php

use Muh\Muh;

include_once __DIR__ . '/bi-suche/muh.php';

    $muh = new Muh();
?>

<form method="GET" action="search">
<input type="text" name="searchstring" \>
<input type="submit" value="suchen" \>
</form>

<?php
if(isset($_GET['searchstring']) && $_GET['searchstring'] != "") {
    $muh->setSearchString($_GET['searchstring']);
    echo $muh->getSearchString();
} else {
    echo "not set or empty string";
}
?>

<h1>BI - Kompass (Wordpress Tutorial)</h1>
<h2><?php bloginfo('name'); ?></h2>
<p><span>Tagline: </span><?php bloginfo('description'); ?></p>
