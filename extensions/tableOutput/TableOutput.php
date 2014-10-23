<?php
/**
 * Created by PhpStorm.
 * User: Christoph
 * Date: 31.08.14
 * Time: 22:18
 */

class TableOutput {
    function __construct($view) {
        $this->db = $view->model->db;
        $this->tableId = 1;
    }

    function show_table_output($args) {
        ob_start(); // make sure there is no output

        $sql = $args['query'];
        $tableName = $args['table'];

        $this->tableId++;

        // store sql in session
        Session::set($this->tableId . "TableOutput", $sql);

        $fields = $this->get_fields($sql);
        $this->display_table($fields, $sql, $tableName);
        $returnString = ob_get_contents();
        ob_end_clean();
        return $returnString;
    }

    function display_table($fields, $sql, $tableName) {
        $sth = $this->execute_query($sql);
        $data = $sth->fetchAll();
        $meta = $sth->getColumnMeta(2);

        $metas = '';
        $filterOutput = '';
        $fieldNames = '';
        for ($i=0; $i<count($fields); $i++) {
            $meta = $sth->getColumnMeta($i)['native_type'];
            $metas .= "\"" . $meta . "\"" . ',';
            $fieldNames .= "\"" . $fields[$i]['name'] . "\"" . ',';
            $filterOutput .= "<td>" . $this->get_filter_echo($fields[$i], $meta, $i) . "</td>";
        }

        $metas = trim($metas, ",");
        $fieldNames = trim($fieldNames, ",");

        echo "<div class=\"table-output-bounding-box\"><div class=\"table-output-error-message\"></div><div class=\"table-output-success-message\"></div><table data-table-name=\"" . $tableName . "\" data-table-id=\"" . $this->tableId . "\" data-types='[" . $metas . "]' data-names='[" . $fieldNames . "]' class=\"table_output\"><thead><tr><th class=\"new\">new</th>";

        // table head
        foreach ($fields as $field) {
            echo "<th>" . $field['display'] . "</th>";
        }

        echo "</tr></thead><tbody>";

        echo "<tr class=\"tbl_filter_row\"><td class=\"filter\">Filter</td>";

        echo $filterOutput;

        echo "</tr>";

        // table body
        foreach ($data as $row) {
            echo "<tr><td class=\"f\"><div>edit</div></td>";
            for ($i=0; $i<(count($row)-1)/2; $i++) {
                $meta = $sth->getColumnMeta($i)['native_type'];
                echo "<td>" . $row[$i] . "</td>";
            }
            echo "</tr>";
        }

        echo "</tbody></table></div>";
    }

    function get_filter_echo($field, $meta, $id) {
        switch ($meta) {
            case "DATE":
                return "<input class=\"tbl_filter\" id=\"tbl_filter_". $this->tableId . $id ."\" data-field=\"" . $field['name'] . "\" type=\"text\">";
                break;
            default:
                return "<input class=\"tbl_filter\" id=\"tbl_filter_". $this->tableId . $id ."\" data-field=\"" . $field['name'] . "\" type=\"text\">";
        }
    }

    function get_fields($sql) {
        // get field section of query
        preg_match('/(?<=SELECT).*?(?=FROM)/s', $sql, $matches);

        // explode single fields
        $fields = explode(",", $matches[0]);

        // managed fields
        $fieldsManaged = Array();

        foreach ($fields as $field) {
            $subParts = explode("AS", $field);
            array_push($fieldsManaged, Array(
                'name' => trim($subParts[0]),
                'display' => str_replace("'", "", str_replace('"', "", trim($subParts[count($subParts) - 1])))
            ));
        }

        return $fieldsManaged;
    }

    function execute_query($sql) {
        $sth = $this->db->prepare($sql);
        $sth->execute(array());
        return $sth;
    }
}