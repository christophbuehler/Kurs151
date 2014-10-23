<?php
class CalendarController extends Controller {
    function init() {
        // access only for logged in users
        if (!Session::get('loggedIn')) {
            header('location: ' . LOGIN_VIEW);
            exit;
        }

        // assign page name
        $this->smarty->assign('test', "das ist ein test...");

        $id = 10;

        $table = new TableOutput($this);
        $this->smarty->assign('table', $table->show_table_output(Array(
            "table" => "person p", "query" =>
                'SELECT
                    p.vorname		AS "Vorname",
                    p.name			AS "Name",
                    p.geburtsdatum	AS "Geboren",
                    p.kommentar		AS "Bemerkung",
                    p2.vorname		AS "Vorname Mutter",
                    p3.vorname		AS "Vorname Vater",
                    p3.name			AS "Nachname Vater"
                FROM person p, person p2, person p3, eltern
                WHERE
                    eltern.id = p.eltern_id
                    AND p2.id = eltern.mutter_id
                    AND p3.id = eltern.vater_id'
        )));
    }

    function test() {
        $name = $_GET['name'];
        echo "Ihr Name lautet: " . $name;
    }
}