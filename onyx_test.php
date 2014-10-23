<?php
require('libs/onyx/Onyx.php');

$onyx->show->table("person");



rechte (tabellen, felder)
normale bez.
komplexe bez. (arrays)
ausgabetext
zellen

js
html
css
css

$edge->show->table(
    "person",
    [
        { "field" : "email", "as" : "E-Mail" },
        { "field" : "name", "as" : "Familienname" },
        { "field" : "vorname", "as" : "Vorname" },
        { "field" : "erwerbsstatus/bezeichnung", "as" : "Bezeichnung" }
    ]
)

<?php

$json = '
    {
    "TABLE": "person",
    "FIELDS": [
        [ "name", "Name" ],
        [ "age", "Alter" ],
        [ "country.name", "Land" ]],
    "FOREIGN" : [
            "countryId", "country.id"],
    "FILTER" : [
            "name", "string"]

    }';

mysql_query("SELECT * FROM")


$json = json_decode($json, true);

echo "<pre>";

print_r($json);

echo "</pre>";




/* foreach ($json as $key => $value) {
    $command = strtoupper($key);

    switch ($command) {
        case "FIELDS":
            $select = "SELECT ";
            $end = end($value);
            foreach ($value as $key => $value)
                if ($value == $end) $select .= $value;
                else $select .= $value . ",";
            break;
        case "WHERE":
            $where = "WHERE ";
            foreach ($value as $key => $value) $where .= $value;
            break;
    }
}

echo $select;
echo "</br>";
echo $where;

*/

?>

?>