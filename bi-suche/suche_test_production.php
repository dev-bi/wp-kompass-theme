<!--
 Suchfunktion   
-->

<!--
<form method="GET" action="" autocomplete="off">
<input type="text" name="searchstring" \>
<input type="submit" value="suchen" autocomplete="off">
</form>
-->

<!-- 
Eine vue.js Komponente entwickeln und hier einfügen
-->
<div id="bi-kompass-suche">
    <div>
        <input type="text" id="sstring" name="sstring">
        <button id="getSearchResult">Suche</button>
        <p id="res">

        </p>
    </div>

    <script>
        let biKompassBaseUrl = 'http://developer.lionysos.com/bi-kompass-x/bi-search/';
        document.getElementById('getSearchResult').addEventListener('click', getSearchResult);

        function getSearchResult() {
            let requestName = document.getElementById('sstring').name;
            let requestValue = document.getElementById('sstring').value;

            fetch(biKompassBaseUrl + 'search.php?' + requestName + '=' + requestValue)
            .then((response) => response.text())
            .then((data) => {
                document.getElementById('res').innerHTML = data;
            })
        }    
    </script>
</div>