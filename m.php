<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

include 'dbconnect.php';

$objDb = new dbconnect;
$conn = $objDb->connect();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = json_decode(file_get_contents('php://input'));

    // Check if emailId exists in the JSON data
    if (isset($user->emailId)) {
        $emailId = $user->emailId;

        // Check if the emailId already exists in the database
        $sql = "SELECT * FROM user WHERE emailId = :emailId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':emailId', $emailId);
        $stmt->execute();
        $ret = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($ret === false) {
            // Data for insertion
            $firstName = $user->fName;
            $lastName = $user->lName;
            $password = $user->password;
            $aboutMe = $user->aboutMe;
            $city = $user->city;
            $state = $user->state;
            $zipCode = $user->zipCode;
            $country = $user->country;

            // Prepare the INSERT query for the user table
            $sql = "INSERT INTO user (fName, lName, emailId, password, city, aboutMe, state, zipCode, country) 
                    VALUES (:firstName, :lastName, :emailId, :password, :city, :aboutMe, :state, :zipCode, :country)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':emailId', $emailId);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':aboutMe', $aboutMe);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':zipCode', $zipCode);
            $stmt->bindParam(':country', $country);

            if ($stmt->execute()) {
                // Insertion in the user table was successful
                $userId = $conn->lastInsertId();
                $response = array('status' => 1, 'message' => 'User inserted successfully.', 'userId' => $userId);
            } else {
                $response = array('status' => 2, 'message' => 'User insertion failed.');
            }
        } else {
            $response = array('status' => 3, 'message' => 'User already exists.');
        }
    } else {
        $response = array('status' => 0, 'message' => 'Invalid JSON data.');
    }

    echo json_encode($response);

    //}
}