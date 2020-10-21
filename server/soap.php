<?php

//include_once('http://localhost/web2/includes/database.inc.php');

class Service {


		public function getBlogTitles()  {
            try
                {
                    $conn = new PDO("mysql:host=localhost;dbname=szantog82", "root" , "");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            catch(PDOException $e)
                {
                    return "Connection failed to db: " . $e->getMessage();
                }
			$query = "select cim from bejegyzes";
			$rows = $conn->query($query)->fetchAll();
			$output = array();
			foreach ($rows as $r) {
			    $output[] = $r["cim"];
			}
			return $output;
		}
		
		public function getUsers(){
            try
                {
                    $conn = new PDO("mysql:host=localhost;dbname=szantog82", "root" , "");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            catch(PDOException $e)
                {
                    return "Connection failed to db: " . $e->getMessage();
                }
			$query = "select nev from felhasznalok";
			$rows = $conn->query($query)->fetchAll();
			$output = array();
			foreach ($rows as $r) {
			    $output[] = $r["nev"];
			}
			return $output;
		}
		
		public function getCompanies(){
            try
                {
                    $conn = new PDO("mysql:host=localhost;dbname=szantog82", "root" , "");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            catch(PDOException $e)
                {
                    return "Connection failed to db: " . $e->getMessage();
                }
			$query = "select cegnev from ceg";
			$rows = $conn->query($query)->fetchAll();
			$output = array();
			foreach ($rows as $r) {
			    $output[] = $r["cegnev"];
			}
			return $output;
		}
		
	}
	
	
	$options = array(
	"uri" => "http://localhost/web2/server/soap.php");
	$server = new SoapServer(null, $options);
	$server->setClass('Service');
	$server->handle();
?>
