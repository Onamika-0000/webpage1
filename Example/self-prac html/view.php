<?php
session_start();
include 'connect.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $id = $_POST['id'];
    $course = $_POST['course'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    
    $stmt = $conn->prepare("INSERT INTO `b3_self_prac_html` (name, id_number, course, phone_number, email_address, date_of_birth) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $id, $course, $phoneNumber, $email, $dob);

    
    if ($stmt->execute()) {
        echo "Data inserted successfully.<br><br>";
    } else {
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
}


$query = "SELECT * FROM `b3_self_prac_html`";
$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Registered Students</h1>";
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Date of Birth</th>
                </tr>";
        
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['id_number']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['email_address']}</td>
                    <td>{$row['date_of_birth']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
} else {
    echo "Error fetching records: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
<h1>Welcome to the Student Portal</h1>
    
    <!-- Link to the CGPA Calculator -->
    <p>
        <a href="result.php">Calculate Your CGPA</a>
    </p>