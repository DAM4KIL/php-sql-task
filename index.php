<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "task4form";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phoneNumber = $_POST['PhoneNumber'];
    $dateAndTime = $_POST['DateAndTime'];
    $message = $_POST['Message'];

    $sql = "INSERT INTO userinfo (Name, Email, PhoneNumber, DateAndTime, Message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);

    if ($stmt === false) {
        die("Error preparing the statement: " . $connection->error);
    }

    $stmt->bind_param("sssss", $name, $email, $phoneNumber, $dateAndTime, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script type='text/javascript'>
            alert('Thank you for contacting us! We will get back to you!');
            window.location.href = 'index.php';
          </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <title>Task 4 Form</title>
</head>
<body>
    <form action="index.php" method="POST">
        <h2>Submit Your Info</h2>
        <input type="text" name="Name" placeholder="Name" required>
        <input type="email" name="Email" placeholder="Email" required>
        <input type="text" name="PhoneNumber" placeholder="Phone Number" required>
        <input type="datetime-local" name="DateAndTime" required>
        <textarea name="Message" placeholder="Message" rows="4" required></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
