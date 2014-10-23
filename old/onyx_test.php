<?php
require('libs/onyx/Onyx.php');

$onyx->show->table("person");

----------------------------------------
creating a blog in onyx:
----------------------------------------

<- Header ->



<- Footer ->

Loginfenster mit Login



config file
------------------------------------------------
Databse
Domain






rechte (tabellen, felder)
normale bez.
komplexe bez. (arrays)
ausgabetext
zellen

js
html
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

?>