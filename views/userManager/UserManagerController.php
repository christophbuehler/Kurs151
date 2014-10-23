<?php
class UserManagerController extends Controller {
    function init() {
        // access only for logged in users
        if (!Session::get('loggedIn')) {
            header('location: ' . MAIN_VIEW);
            exit;
        }

        // access only for administrators
        if (Session::get('role') != 1) {
            header('location: ' . MAIN_VIEW);
            exit;
        }


        $table = new TableOutput($this);
        $this->smarty->assign('table', $table->show_table_output('
            SELECT
                p.id            AS "ID",
                p.vorname		AS "Vorname",
                p.name			AS "Name",
                p.geburtsdatum	AS "Geboren",
                p.kommentar		AS "Bemerkung"
            FROM person p
        '));
        /*            SELECT
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
                AND p3.id = eltern.vater_id*/

        $userContent = "<div class=\"userMenu\"><a href=\"#allgemein\">Allgemein</a> <a href=\"#instrumente\">Instrumente</a> <a href=\"#eltern\">Eltern</a></div>";
        $userContent .= "<div id=\"allgemein\">Allgemein</div><div id=\"instrumente\">Instrumente</div><div id=\"eltern\">Eltern</div>";
        $this->smarty->assign('userContent', $userContent);
    }
}