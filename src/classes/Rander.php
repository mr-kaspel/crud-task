<?
namespace classes;

class Rander extends Database
{
    public function __construct() {
        $method = $_GET['method'];
        if(method_exists(get_class(), $method)) {
            $GLOBALS['number'] = $_GET['number'];
            print_r($this->$method());
            die();
        }
    }

    private function getFieldEmail() {
        return include './templates/email.php';
    }

    private function getFieldTelephone() {
        return include './templates/telephone.php';
    }

    private function getContactList() {
        $this->createConnection();
        $query = "SELECT * FROM user";
        $result = $this->connection->query($query);

        while($row = $result->fetch_object()) {
            $GLOBALS['data'] = $row;
            $html .= substr(include './templates/contact_item.php', 0, -1);
        }
        return $html;
    }
}
