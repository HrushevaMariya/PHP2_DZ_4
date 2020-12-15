<?php
class DB
{
public const TABLE_GOODS = 'goods';
    private static $instance;
    private static $config = [
    'dsn' => 'mysql:dbname = dz_4; host = 127.0.0.1',
    'user' => 'root',
    'pwd' => '1234',
    ];
    protected $link;
public static function getInstance(){
    if (self::$instance === null){
        self::$instance = new self();
    }
return self::$instance;
}


public function getTableDataCount($tableName)
{
    try {
        return $this->link
            ->query("SELECT COUNT(*) * FROM{$tableName}")
            ->fetchColumn();
    } catch (PDOException $e) {
        return null;
    }
}



public function getTableDataPart($tableName, int $from, int $limit)
{
    try {
        return $this->link
            ->query("SELECT * FROM{$tableName}LIMIT{$from}, {$limit}")
            ->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
}




public function getTableData($tableName)
{
    try {
        return $this->link
            ->query("SELECT * FROM{$tableName}")
            ->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
}
public function getById($tableName, $id)
{
    try {
        return $this->link
            ->query("SELECT*FROM{$tableName}WHERE id = " . id)
            ->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
       return null;
    }
}
private function  __construct(){
    try{
        $this->link=new PDO (
        self::$config['dsn'],
        self::$config['user'],
        self::$config['password'],
        );
    } catch(PDOException $e){
        echo "Подключение не удалось: ".$e_getMessage();
    }
    $this-> link = mysqli_connect(
        self::$config['host'],
        self::$config['user'],
        self::$config['pwd'],
        self::$config['db'],
    );


if ($this->link ===



    die('Cant connect to DB'),
    }
}
//private function  __clone(){
//
//}
//private function  __wakeup(){
//
//}
