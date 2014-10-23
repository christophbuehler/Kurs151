<?php
class TableOutputFunctions extends Controller {
    function __construct($smarty, $model, $url, $error) {
        parent::__construct($smarty, $model, $url, $error);

        // access only for logged in users
        if (!Session::get('loggedIn')) {
            header('location: ' . LOGIN_VIEW);
            exit;
        }

        $this->db = $this->model->db;

        $this->params = explode(',', (isset($_GET['p']) ? $_GET['p'] : ''));
    }

    function filterData($data, $tableSaveQuery) {
        $query = Session::get($tableSaveQuery . "TableOutput");
        $dataArr = explode(';', rtrim($data, ";"));
        $filter = "";
        $str = "";
        $index = 0;

        foreach ($dataArr as $value) {
            if (trim($value) == "") continue;
            switch($index) {
                case 0:
                    $filter .= " AND " . $value . " like \"%";
                    $index++;
                    break;
                case 1:
                    $filter .= $value . "%\"";
                    $index = 0;
                    break;
                default:
                    echo 'default';
            }
        }

        $sth = $this->db->prepare($query . $filter);
        $sth->execute(array());

        $data = $sth->fetchAll();

        foreach ($data as $row) {
            $str .= "<tr><td class=\"f\"><div>edit</div></td>";
            for ($i=0; $i<(count($row)-1)/2; $i++) {
                $meta = $sth->getColumnMeta($i)['native_type'];
                $str .= "<td>" . $row[$i] . "</td>";
            }
            $str .= "</tr>";
        }

        return $str;
    }

    function insertRow($data, $tableSaveQuery, $tableName) {
        $selectQuery = Session::get($tableSaveQuery . "TableOutput");

        $fields = $this->get_fields($selectQuery);
        $insertedFieldsSet = explode(";", $data);
        $insertedFields = Array();

        foreach ($insertedFieldsSet AS $inserted) {
            array_push($insertedFields, Array(
                "name" => explode(":", $inserted)[0],
                "value" => explode(":", $inserted)[1]
            ));
        }

        // print_r($fields);

        $insertQuery = "INSERT INTO " . $tableName . " VALUES (";

        foreach ($insertedFields AS $inserted) {
            $insertQuery .= $inserted['name'] . "=\"" . $inserted['value'] . "\",";
        }

        $insertQuery = rtrim($insertQuery, ',');

        $insertQuery .= ")";

        $sth = $this->db->prepare($insertQuery);
        $data = $sth->execute();

        echo $insertQuery;

        print_r($sth->errorInfo());

        // no error occured
        return json_encode(Array(
            "state" => 0,
            "message" => "Record successfully added"
        ));

        return "you are creating a new row..";
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
}