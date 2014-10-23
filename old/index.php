<?php

// Use an autoloader!
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';

/ Library
require 'libs/Database.php';
require 'libs/Session.php';

require 'config/paths.php';
require 'config/database.php';

$app = new Bootstrap();


<?$php
require("lib")
$edge = new Lib();
    $edge->setDB("localhost", "peterEnis", "1234");
    $edge->show->table("person");
?>


$edge->show->table("SELECT sadf,a sdf FROM sadf");


$edge->show->table(
    "person",
    [
        { "field" : "email", "as" : "E-Mail" },
        { "field" : "name", "as" : "Familienname" },
        { "field" : "vorname", "as" : "Vorname" },
        { "field" : "erwerbsstatus/bezeichnung", "as" : "Bezeichnung" }
    ]
)

