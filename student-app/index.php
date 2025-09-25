<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$student = null;

// Check if form is submitted
if (isset($_POST['search'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT * FROM student WHERE ID = ?");
    $stmt->bind_param("i", $id); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Student</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        input[type=text], input[type=number] { padding: 8px; width: 200px; }
        input[type=submit] { padding: 8px 15px; }
        table { border-collapse: collapse; margin: 20px auto; width: 60%; }
        th, td { border: 1px solid #333; padding: 10px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Search Student by ID</h2>
<form method="post">
    <input type="number" name="id" placeholder="Enter Student ID" required>
    <input type="submit" name="search" value="Search">
</form>

<?php if ($student): ?>
    <h3>Student Details</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Age</th><th>City</th><th>Address</th>
        </tr>
        <tr>
            <td><?= $student['ID'] ?></td>
            <td><?= $student['Name'] ?></td>
            <td><?= $student['Age'] ?></td>
            <td><?= $student['City'] ?></td>
            <td><?= $student['Address'] ?></td>
        </tr>
    </table>
<?php elseif (isset($_POST['search'])): ?>
    <p>No student found with this ID.</p>
<?php endif; ?>

</body>
</html>
