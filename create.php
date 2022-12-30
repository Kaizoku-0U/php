<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once 'database.php';
    include_once 'class/employees.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Employee($db);
    $data = json_decode(file_get_contents("php://input"));
	
	
	
		
	$item->First_Name = $data->firstname;
    $item->Last_Name = $data->lastname;
    $item->Email = $data->email;
    $item->Password = $data->password;
    $item->Confirm_Password = $data->password;
    $item->Role = $data->role;
    $item->Phone = $data->phone;
	
	
	
	
	   
    if($item->createEmployee()){
        echo 'Employee created successfully.';
    } else{
        echo 'Employee could not be created.';
    }
?>