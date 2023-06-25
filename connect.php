<?php
class Connect{
    public $server;
    public $user;
    public $password;
    public $dbName;

public function __construct()
{
    $this->server = "cis9cbtgerlk68wl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $this->user = "n7bddet026e3nr51";
    $this->password = "ipq0ag82o9k1whbf";
    $this->dbName = "tbxkazhtsj1lnmj0";
}
//option1 : use mysqli
function connectToMySQl():mysqli{
    $conn_my = new mysqli($this->server,
    $this->user,$this->password,$this->dbName);
    if($conn_my->connect_error){
        die("Failed".$conn_my->connect_error);
    }
    else{
        // echo "Connect!!!!";
    }
    return $conn_my;
}

function connectToPDO():PDO{
    try{
        $conm_pdo = new PDO("mysql:host=$this->server;dbname=$this->dbName",$this->user,$this->password);
        $conm_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "ConnecttoPDO";
    }catch(PDOException $e){
        die("Failed $e");
    }
     return $conm_pdo;
 }
}
//test connect
$c = new Connect();
$c->connectToMySQl();

$c = new Connect();
$c->connectToPDO();
?>