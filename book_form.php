<?php
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$phone = filter_input(INPUT_POST, "phone");
$address = filter_input(INPUT_POST, "address");
$location = filter_input(INPUT_POST, "location");
$guests = filter_input(INPUT_POST, "guests");
$arrivals = filter_input(INPUT_POST, "arrivals");
$leaving = filter_input(INPUT_POST, "leaving");

$errors = [];

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

// Validate mobile number
if (strlen($phone) !== 10) {
    $errors[] = "Mobile number should be 10 digits";
}

// Validate date: leaving date should not be before arrival date
$arrivalDate = DateTime::createFromFormat('Y-m-d', $arrivals);
$leavingDate = DateTime::createFromFormat('Y-m-d', $leaving);

if ($arrivalDate && $leavingDate && $leavingDate < $arrivalDate) {
    $errors[] = "Date of leaving should be after date of arrival";
}

if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($location) || empty($guests) || empty($arrivals) || empty($leaving)) {
    $errors[] = 'All fields should not be empty';
}

if (empty($errors)) {
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "book_db";

    // Create a new mysqli connection
    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connect Error: " . $conn->connect_error);
    } else {
        // Prepare an SQL statement
        $sql = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssssss", $name, $email, $phone, $address, $location, $guests, $arrivals, $leaving);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "New record inserted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();

        // Close the connection
        $conn->close();
    }
} else {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    // Display JavaScript alert for leaving date before arrival date or invalid mobile number
    echo "<script>alert('";
    echo implode("\\n", $errors);
    echo "');</script>";
}
?>
