<?
namespace classes;

class CRUD extends Database
{
    public function __construct()
    {
        $method = $_POST['method'];
        if(method_exists(get_class(), $method)) {
            $GLOBALS['number'] = $_POST['number'];
            echo $this->$method();
            die();
        }
    }

    public function crate()
    {
        $result = (object) [
            'name' => trim($_POST['name']),
            'arrEmail' => array_merge(['value' => $_POST['email']], ['radio' => $_POST['radioEmail']]),
            'arrTelephone' => array_merge(['value' => $_POST['telephone']], ['radio' => $_POST['radioTelephone']])
         ];

        $this->createConnection();

        $query = "INSERT INTO user (name) VALUES ('".$result->name."')";
        $this->connection->query($query);

        $query = 'SELECT @@IDENTITY FROM user';
        $row = $this->connection->query($query);
        $result->id = $row->fetch_row()[0];

        $this->insertData($result->arrEmail, $result->id, 'email');

        $this->insertData($result->arrTelephone, $result->id, 'telephone');
    }

    public function read(): string
    {
        $id = trim($_POST['id']);

        if(!isset($id)) return null;;

        $this->createConnection();

        $query = "SELECT id, name FROM user WHERE id=".$id;
        $result = $this->connection->query($query);
        $row = $result->fetch_object();
        $GLOBALS['data'] = $row;
        $html .= substr(include './templates/name.php', 0, -1);

        $query = "SELECT id, value, basic FROM email WHERE user_id=".$id;
        $result = $this->connection->query($query);

        while($row = $result->fetch_object()) {
            $GLOBALS['data'] = $row;
            $html .= substr(include './templates/email.php', 0, -1);
        }

        $query = "SELECT id, value, basic FROM telephone WHERE user_id=".$id;
        $result = $this->connection->query($query);

        while($row = $result->fetch_object()) {
            $GLOBALS['data'] = $row;
            $html .= substr(include './templates/telephone.php', 0, -1);
        }

        return $html;
    }

    public function update()
    {
        $result = (object) [
            'id' => trim($_POST['id']),
            'name' => trim($_POST['name']),
            'arrEmail' => array_merge(['value' => $_POST['email']], ['radio' => $_POST['radioEmail']]),
            'arrTelephone' => array_merge(['value' => $_POST['telephone']], ['radio' => $_POST['radioTelephone']])
        ];

        if(!isset($result->id)) return;

        $this->createConnection();

        $query = "UPDATE user SET name='".$result->name."' WHERE id=".$result->id;
        $this->connection->query($query);

        $this->updateData($result->arrEmail, 'email');

        $this->updateData($result->arrTelephone, 'telephone');
    }

    public function delet(): void
    {
        $id = trim($_POST['id']);

        if(!isset($id)) return;

        $this->createConnection();
        
        $query = "DELETE FROM user WHERE id=".$id;
        $this->connection->query($query);

        $query = "DELETE FROM email WHERE user_id=".$id;
        $this->connection->query($query);

        $query = "DELETE FROM telephone WHERE user_id=".$id;
        $this->connection->query($query);
    }
}
