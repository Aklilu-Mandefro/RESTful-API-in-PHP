<?php
/**
 * Author:Sani Kamal
 * Web Developer, Quest Innovation
 * Date:01-03-2019
 */
class DBController {
	private $conn = "";
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "test_db";

	function __construct() {
		$conn = $this->connect_db();
		if(!empty($conn)) {
			$this->conn = $conn;			
		}
	}

	function connect_db() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function execute_query($query) {
        $conn = $this->connect_db();    
        $result = mysqli_query($conn, $query);
        if (!$result) {
            //check for duplicate entry
            if($conn->errno == 1062) {
                return false;
            } else {
                trigger_error (mysqli_error($conn),E_USER_NOTICE);
				
            }
        }		
        $affected_rows = mysqli_affected_rows($conn);
		return $affected_rows;
		
    }
	function execute_select_query($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}
}
?>