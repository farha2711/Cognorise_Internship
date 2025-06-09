<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $address = htmlspecialchars($_POST['Adress']);
  $experience = htmlspecialchars($_POST['experience']);

  // Insert data into database (use backticks around column names)
  $sql = "INSERT INTO adoption_form (`F-Name`, `Email`, `P-No`, `Adress`, `Experience`)
          VALUES ('$name', '$email', '$phone', '$address', '$experience')";

  if ($conn->query($sql) === TRUE) {
    echo "<h2>Thank you, $name!</h2>";
    echo "<p>We'll review your application and contact you at $email or $phone.</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close connection
$conn->close();
?>
