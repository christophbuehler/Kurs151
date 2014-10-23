<?php
/**
 * Created by PhpStorm.
 * User: Christoph
 * Date: 07.08.14
 * Time: 19:46
 */

namespace extensions;

class TableOutput {

    function __construct($db) {
        $this->db = $db;
    }

    function sql_split ( $array ) {
        // Split array in key and value
        foreach ( $array as $i => $value ) {
            $array['key'][$i] = $value[0];
            $array['value'][$i] = $value[1];
        }
        return $array;
    }

    function get_select ( $fields, $table ) {
        $sql = "SELECT ";
        // Create Select statement with identified field names from $field_names
        foreach ( $fields as $key => $value ) {
            if ( $value === end($fields) )
                $sql .= $value . " FROM " . $table . " ";
            else
                $sql .= $value . ",";
        }
        return $sql;
    }

    function set_where ( $filters, $select ) {
        $select .= "WHERE ";
        // Add Where conditions from $filters
        foreach ( $filters as $key => $value ) {
            if ( $value === end($filters) )
                $select .= $filters[$key] . "=" . "'" . $value . "'" . ";";
            else
                $select .= $filters[$key] . "=" . "'" . $value . "'" . " AND ";
        }
        return $select;
    }

    // Json input
    /*$json = '
         {
         "TABLE" : "device",
         "FIELDS" : [
                 [ "name", "Name" ],
                 [ "additional_info", "Beschreibung" ],
                 [ "loan.start_date", "Leihdatum" ]
             ],
             "FILTER" : [
                 [ "name", "Galaxy S4" ],
                 [ "loan.id", "36" ]
                 ],
         "FOREIGN" : [
                 [ "countryId", "country.id" ]
                 ]
         }';*/

    function show_table_output($json) {
        // Decode Json to Array
        $json = json_decode($json, true);

        // Objects, Variables etc.
        $foreign = $json["FOREIGN"];
        $table = $json["TABLE"];
        $filters = $json["FILTER"];
        $fields = $json[ "FIELDS" ];


        foreach ( $json as $key => $value ) {
            switch ( $key ) {
                case "TABLE":
                    $table = $json[$key];
                break;
                case "FIELDS":
                    $fields = sql_split( $fields );
                    // Create Array with none foreign Fields by checking if field_name contains the char '.'
                    foreach ( $fields['key'] as $i => $field_name ) {
                        if ( strpos($field_name, '.') !== FALSE ) {
                            $foreign['fields'] = $field_name;
                        } else {
                            $field_names[$i] = $field_name;
                        }
                    }
                    $select = get_select($field_names, $table);
                break;
                case "FILTER":
                    $filters = sql_split( $filters );
                    foreach ( $filters['key'] as $i => $filter_name ) {
                        if ( strpos($field_name, '.') !== FALSE ) {
                            var_dump("ölkjölkj");
                            $foreign['filters'] = $filter_name;
                        } else {
                            $filter_names[$i] = $filter_name;
                        }
                    }
                    $select_where = set_where ( $filter_names, $select );
                break;
                case "FOREIGN":

                break;
            }

        }

        //$console = $sql;

        //_________________________________________________Left__________________________________________________//
        //_______________________________________________________________________________________________________//
        //_______________________________________________________________________________________________________//

        echo "<pre style=\"float:right; padding: 50px 17.5% 30px;\">";

        /* print_r($field_names);
        echo "</br></br></br>";
        print_r($foreign_fields);
        echo "</br></br></br>";  */
        //print_r($fields);
        print_r($filters);
        echo "</br></br></br>";
        print_r($fields);
        echo "</br></br></br>";
        print_r($select_where);

        echo "</pre>";

        //________________________________________________Console________________________________________________//
        //_______________________________________________________________________________________________________//
        //_______________________________________________________________________________________________________//

        echo "<div style=\"position:fixed; text-align:center; bottom:0px;padding:10px; width:100%; background-color:#222222; color:white; \">";

        if (isset($console))
            echo $console;
    }
}
?>