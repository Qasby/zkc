<?php
class db
{
	protected $connect;
	public function __construct($dbServer,$dbBase, $dbLogin, $dbPassword)
	{
		$this->connect = new PDO('mysql:host=' . $dbServer .';dbname=' . $dbBase, $dbLogin, $dbPassword, array(PDO::ATTR_PERSISTENT => true));
	}
	public function getData($query, $arguments = array())
	{
		$sth = $this->connect->prepare($query);
		foreach ($arguments as $key => $arg)
        {
            $sth->bindValue($key, $arg['value'], $arg['type']);
        }
		$sth->execute();
		return $sth->fetchAll();
	}
	
}
	
	