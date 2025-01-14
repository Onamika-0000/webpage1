<?php
session_start();
include 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $subject1 = floatval($_POST['subject1']);
    $subject2 = floatval($_POST['subject2']);
    $subject3 = floatval($_POST['subject3']);
    $subject4 = floatval($_POST['subject4']);
    $subject5 = floatval($_POST['subject5']);
    $subject6 = floatval($_POST['subject6']);

    
    $total = $subject1 + $subject2 + $subject3 + $subject4 + $subject5 + $subject6;
    $cgpa = $total / 6;

    
    $stmt = $conn->prepare("INSERT INTO cgpa_records (subject1, subject2, subject3, subject4, subject5, subject6, total, cgpa) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("dddddddd", $subject1, $subject2, $subject3, $subject4, $subject5, $subject6, $total, $cgpa);

    if ($stmt->execute()) {
        echo "<h1>CGPA Result</h1>";
        echo "<p><strong>Total Marks: </strong>" . $total . "</p>";
        echo "<p><strong>CGPA: </strong>" . number_format($cgpa, 2) . "</p>";
        echo "<a href='index.html'>Calculate Again</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}


$query = "SELECT * FROM cgpa_records";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<h2>Previous Records</h2>";
    echo "<table border='1'>
            <tr>
                <th>Subject 1</th>
                <th>Subject 2</th>
                <th>Subject 3</th>
                <th>Subject 4</th>
                <th>Subject 5</th>
                <th>Subject 6</th>
                <th>Total</th>
                <th>CGPA</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['subject1']}</td>
                <td>{$row['subject2']}</td>
                <td>{$row['subject3']}</td>
                <td>{$row['subject4']}</td>
                <td>{$row['subject5']}</td>
                <td>{$row['subject6']}</td>
                <td>{$row['total']}</td>
                <td>{$row['cgpa']}</td>
              </tr>";
    }
    echo "</table>";
}

mysqli_close($conn);
?>
 <p>
        <a href="index.html">Calculate Your CGPA</a>
    </p>