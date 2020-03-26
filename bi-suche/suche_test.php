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
    <!-- Suchleiste-->
    <div id="search-wrapper" class="container">
            <div id="search-bar">
                <label>BI - Suche</label>
                <input type="text" id="sstring" name="sstring" placeholder="Suchbegriff eingeben...">
            </div>
            <div id="res"></div>
        </div>

    <script>
        let biKompassBaseUrl = 'http://localhost/bi-kompass/bi-kompass-x/bi-search/';
        let inputSearch = document.getElementById('sstring');

        inputSearch.addEventListener('keyup', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                getSearchResult();
            }
        })

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