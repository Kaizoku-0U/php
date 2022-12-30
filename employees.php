<?php
	class Employee{
        // Connection
        private $conn;
        // Table
        private $db_table = "UserRegistration";
        // Columns
        public $First_Name;      
		public $Last_Name;       
		public $Email;         
		public $Password;        
		public $Confirm_Password;
		public $Role;            
		public $Phone;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getEmployees(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createEmployee(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
						(
							`First Name`,
							`Last Name`,
							`Email`,
							`Password`,
							`Confirm Password`,
							`Role`,
							`Phone`
						)
						VALUES(
							:First_Name,
							:Last_Name,
							:Email,
							:Password,
							:Confirm_Password,
							:Role,
							:Phone
						)";
            $stmt = $this->conn->prepare($sqlQuery);
         
        
            // bind data
            $stmt->bindParam(":First_Name", $this->First_Name);
			$stmt->bindParam(":Last_Name", $this->Last_Name);
			$stmt->bindParam(":Email", $this->Email);
			$stmt->bindParam(":Password", $this->Password);
			$stmt->bindParam(":Confirm_Password", $this->Confirm_Password);
			$stmt->bindParam(":Role", $this->Role);
			$stmt->bindParam(":Phone", $this->Phone);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleEmployee(){
            $sqlQuery = "SELECT
                        *
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->First_Name = $dataRow['First Name'];
            $this->Last_Name = $dataRow['Last Name'];
            $this->Email = $dataRow['Email'];
            $this->Password = $dataRow['Password'];
            $this->Confirm_Password = $dataRow['Confirm Password'];
            $this->Role = $dataRow['Role'];
            $this->Phone = $dataRow['Phone'];
        }        
        // UPDATE
        public function updateEmployee(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        First Name = :First_Name, 
						 Last Name = :Last_Name, 
						 Email = :Email, 
						 Password = :Password, 
						 Confirm Password = :Confirm_Password,
						 Role = :Role,
						 Phone = :Phone
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            
        
            // bind data
             $stmt->bindParam(":First_Name", $this->First_Name);
$stmt->bindParam(":Last_Name", $this->Last_Name);
$stmt->bindParam(":Email", $this->Email);
$stmt->bindParam(":Password", $this->Password);
$stmt->bindParam(":Confirm_Password", $this->Confirm_Password);
$stmt->bindParam(":Role", $this->Role);
$stmt->bindParam(":Phone", $this->Phone);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteEmployee(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>