<?php
/**
 * Author:Sani Kamal
 * Web Developer, Quest Innovation
 * Date:01-03-2019
 */
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Product {
	private $products = array();
	public function get_all_product(){
		if(isset($_GET['name'])){
			$name = $_GET['name'];
			$query = 'SELECT * FROM tbl_product WHERE name LIKE "%' .$name. '%"';
		} else {
			$query = 'SELECT * FROM tbl_product';
		}
		$dbcontroller = new DBController();
		$this->products = $dbcontroller->execute_select_query($query);
		return $this->products;
	}

	public function add_product(){
		if(isset($_POST['name'])){
			$name = $_POST['name'];
				$price = '';
				$quantity='';
				$description = '';
				
			if(isset($_POST['price'])){
				$price = $_POST['price'];
			}
			if(isset($_POST['quantity'])){
				$quantity = $_POST['quantity'];
			}
			if(isset($_POST['description'])){
				$description = $_POST['description'];
			}	
			$query = "insert into tbl_product (name,price,quantity,description) values ('" . $name ."','". $price ."','" . $quantity ."','" . $description ."')";
			$dbcontroller = new DBController();
			$result = $dbcontroller->execute_query($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function delete_product(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = 'DELETE FROM tbl_product WHERE id = '.$id;
			$dbcontroller = new DBController();
			$result = $dbcontroller->execute_query($query);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function edit_product(){
		if(isset($_POST['name']) && isset($_GET['id'])){
			$name = $_POST['name'];
			$price = $_POST['price'];
			$quantity = $_POST['quantity'];
			$description=$_POST['description'];
			$query = "UPDATE tbl_product SET name = '".$name."',price ='". $price ."',quantity = '". $quantity ."',description='".$description."' WHERE id = ".$_GET['id'];
		}
		$dbcontroller = new DBController();
		$result= $dbcontroller->execute_query($query);
		if($result != 0){
			$result = array('success'=>1);
			return $result;
		}
	}
	
}
?>