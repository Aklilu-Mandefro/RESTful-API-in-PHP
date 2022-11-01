<?php
/**
 * Author:Sani Kamal
 * Web Developer, Quest Innovation
 * Date:01-03-2019
 */
require_once("ProductRestHandler.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";
if(isset($_GET["page_key"]))
	$page_key = $_GET["page_key"];
/*
controls the RESTful services URL mapping
*/
	switch($page_key){

		case "list":
			// to handle REST Url /product/list/
			$productRestHandler = new ProductRestHandler();
			$result = $productRestHandler->get_all_product();
			break;
	
		case "create":
			// to handle REST Url /product/create/
			$productRestHandler = new ProductRestHandler();
			$productRestHandler->add();
		break;
		
		case "delete":
			// to handle REST Url /product/delete/<row_id>
			$productRestHandler = new ProductRestHandler();
			$result = $productRestHandler->delete_product_by_id();
		break;
		
		case "update":
			// to handle REST Url /product/update/<row_id>
			$productRestHandler = new ProductRestHandler();
			$productRestHandler->edit_product_by_id();
		break;
}
?>