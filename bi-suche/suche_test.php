<!--
 Suchfunktion   
-->

<form method="GET" action="" autocomplete="off">
<input type="text" name="searchstring" \>
<input type="submit" value="suchen" autocomplete="off">
</form>

<?php
if(isset($_GET['searchstring']) && $_GET['searchstring'] != "") {
    echo $_GET['searchstring'];
} else {
    echo "not set or empty string";
}
?>