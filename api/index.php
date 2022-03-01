<?php

function connection($request){

    $servername = "sql.qshark.ml";
    $username = "quaye";
    $password = "quaye8282";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=staff_profile", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        //$request = file_get_contents('php://input'); 
        //$request = $_REQUEST;
        if(!isset($request['endpoint'])){
            $response = array(
                "status"=>100,
                "msg"=>"missing parameter"
            );
        }else {

            switch($request['endpoint']){

                case"login";
                    $q[] = $request['username'];
                    $q[] = $request['password'];
                    $sql ="SELECT get_company.* FROM get_company WHERE get_company.username = ? AND get_company.`password` = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute($q);
                    $response = $stmt->fetch(PDO::FETCH_ASSOC);
                break;

                case"add-profile";
                    $q[] = $request['id'];
                    $q[] = $request['fname'];
                    $q[] = $request['sname'];
                    $q[] = $request['dob'];
                    $q[] = $request['gender'];
                    $q[] = $request['mobile'];
                    $q[] = $request['email'];
                    $q[] = $request['position'];
                    $q[] = $request['nationality'];
                    $q[] = $request['state'];
                    $q[] = $request['address'];
                    $q[] = $request['image'];
                    $sql ="INSERT INTO `staff_profile`.`staff`(`company_id`, `fname`, `sname`, `dob`, `gender`, `mobile`, `email`, `position`, `nationality`, `state`, `address`,`image`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt = $conn->prepare($sql);
                    $response = $stmt->execute($q);                    
                break;

                case"update-profile";
                    $q[] = $request['fullname'];
                    $q[] = $request['dob'];
                    $q[] = $request['mobile'];
                    $q[] = $request['email'];
                    $q[] = $request['position'];
                    $q[] = $request['nationality'];
                    $q[] = $request['state'];
                    $q[] = $request['address'];
                    $q[] = $request['id'];
                    $sql ="UPDATE `staff_profile`.`staff` SET `name` = ?, `dob` = ?, `mobile` = ?, `email` = ?, `position` = ?, `nationality` = ?, `state` = ?, `address` = ? WHERE `staff_id` =?";
                    $stmt = $conn->prepare($sql);
                    $response = $stmt->execute($q);
                break;

                case"fetch-profile";
                    $q[] = $request['id'];
                    $sql ="SELECT * FROM `staff_profile`.`get_staff` WHERE `company_id`=? LIMIT 0,1000";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute($q);
                    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                break;

                case"view-profile";
                    $q[] = $request['id'];
                    $sql ="SELECT get_staff.* FROM get_staff WHERE get_staff.staff_id =?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute($q);
                    $response = $stmt->fetch(PDO::FETCH_ASSOC);
                break;

                case"delete-profile";
                    $q[] = $request['id'];
                    $sql ="SELECT * FROM `adminu` WHERE `admin_id`=? LIMIT 0,1000";
                    $stmt = $conn->prepare($sql);
                    $response = $stmt->execute($q);              
                break;

                case"view-staff-cv";
                    $q[] = $request['ref'];
                    $sql ="SELECT * FROM `staff_profile`.`get_staff` WHERE `ref`=? LIMIT 0,1000";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute($q);     
                    $response = $stmt->fetch(PDO::FETCH_ASSOC);
                break;

                default;
                    $response = array(
                        "status"=>500,
                        "msg"=>"action not found"
                    );
            }
        }

        return $response;
        
    } catch(PDOException $e) {
        return array(
            "status"=>1001,
            "msg"=> "Connection failed: " . $e->getMessage()
        );
    } 
    $conn = "";  
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode(connection($_REQUEST));
?>