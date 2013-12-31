<?php

Class Mysql {

	private $_dbHandle;
	private $database;
	private $host;
	private $user;
	private $password;


	public function __construct($database, $host, $user, $password)
	{
		$this->database = $database;
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
	}

	public function connect()
	{
		try {
			$this->_dbHandle = new \PDO('mysql:host=' . $this->host . ';dbname='.$this->database, $this->user, $this->password);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage();
		}
		
	}

	public function fetchAll($sql, $params)
	{
		try {
			$sth = $this->_dbHandle->prepare($sql);
			$sth->execute($params);
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage();
		}

		return $result;
	}

	public function execute($sql, $params)
	{
		try {
			$sth = $this->_dbHandle->prepare($sql);
			$sth->execute($params);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage();
		}
	}


	public function insert($sql, $params)
	{
		try { 
			$sth = $this->_dbHandle->prepare($sql); 
	        $this->_dbHandle->beginTransaction(); 
	        $sth->execute($params); 
	        $this->_dbHandle->commit(); 
	        return $this->_dbHandle->lastInsertId(); 
	    } catch(PDOExecption $e) { 
	        $this->_dbHandle->rollback(); 
	        echo "Error!: " . $e->getMessage() . "</br>";
	        return false;
	    } 
	}

	public function close()
	{
		$this->_dbHandle = null;
	}

}
