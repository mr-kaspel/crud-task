<?
namespace classes;

class Database extends SQL {
    protected $connection;
    public $error;

    public function createConnection(): void
    {
        $conf = array(
            'host' => '127.0.0.1',
            'db_name' => 'crud_task',
            'user' => 'root',
            'password' => ''
        );

        $this->connection = new \mysqli($conf['host'], $conf['user'], $conf['password'], $conf['db_name']);
        if($this->connection->connect_error) {
            print_r('Error connection DB.');
            die();
        }
    }

    protected function initialization(): void
    {
        $this->createConnection();
        
        $query = 'DROP TABLE user, email, telephone';
        $this->connection->query($query);

        $query = 'CREATE TABLE `user` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` varchar(100) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

        $this->connection->query($query);

        $query = 'CREATE TABLE `email` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `value` varchar(100) NOT NULL,
            `user_id` int(11) NOT NULL,
            `basic` bit(1) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

        $this->connection->query($query);

        $query = 'CREATE TABLE `telephone` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `value` varchar(100) NOT NULL,
            `user_id` int(11) NOT NULL,
            `basic` bit(1) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';

        $this->connection->query($query);
    }
}