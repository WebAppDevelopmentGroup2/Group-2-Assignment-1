<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Grades</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>View Grades</h2>

<!-- Filter form -->
<form method="GET" action="">
    <label>Filter by Matric No:</label>
    <input type="text" name="matric_no" placeholder="e.g. CSC/21/1234">

    <label>Course Code:</label>
    <input type="text" name="course_code" placeholder="e.g. CSC301">

    <label>Semester:</label>
    <select name="semester">
        <option value="">-- All --</option>
        <option value="First">First</option>
        <option value="Second">Second</option>
    </select>

    <input type="submit" value="Filter">
</form>

<hr>

<?php
// Build query
$query = "SELECT * FROM grades WHERE 1";

if (!empty($_GET['matric_no'])) {
    $matric = $conn->real_escape_string($_GET['matric_no']);
    $query .= " AND matric_no LIKE '%$matric%'";
}

if (!empty($_GET['course_code'])) {
    $course = $conn->real_escape_string($_GET['course_code']);
    $query .= " AND course_code LIKE '%$course%'";
}

if (!empty($_GET['semester'])) {
    $semester = $conn->real_escape_string($_GET['semester']);
    $query .= " AND semester = '$semester'";
}

$query .= " ORDER BY student_name, matric_no, course_code";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $current_student = "";
    $total_points = 0;
    $total_units = 0;

    while ($row = $result->fetch_assoc()) {
        // When a new student appears
        if ($current_student != $row['student_name'] . $row['matric_no']) {
            // If it's not the first student, print previous GPA
            if ($current_student != "") {
                $gpa = $total_units > 0 ? number_format($total_points / $total_units, 2) : "0.00";
                echo "<tr><td colspan='8' style='text-align:right; font-weight:bold;'>GPA: $gpa</td></tr>";
                echo "</table><hr style='border:1px solid #ccc; margin:20px 0;'>";
            }

            // Reset counters
            $total_points = 0;
            $total_units = 0;

            // Show student heading
            echo "<h3>Student: {$row['student_name']} (Matric No: {$row['matric_no']})</h3>";
            echo "<table border='1' cellpadding='8'>
                    <tr>
                        <th>Course Code</th>
                        <th>Credit Unit</th>
                        <th>Score</th>
                        <th>Grade</th>
                        <th>Semester</th>
                        <th>Session</th>
                    </tr>";

            $current_student = $row['student_name'] . $row['matric_no'];
        }

        // Grade points
        $points = 0;
        switch (strtoupper($row['grade'])) {
            case 'A': $points = 5; break;
            case 'B': $points = 4; break;
            case 'C': $points = 3; break;
            case 'D': $points = 2; break;
            case 'E': $points = 1; break;
            case 'F': $points = 0; break;
        }

        $total_points += $points * $row['credit_unit'];
        $total_units += $row['credit_unit'];

        echo "<tr>
                <td>{$row['course_code']}</td>
                <td>{$row['credit_unit']}</td>
                <td>{$row['score']}</td>
                <td>{$row['grade']}</td>
                <td>{$row['semester']}</td>
                <td>{$row['session']}</td>
              </tr>";
    }

    // Show GPA for the last student
    $gpa = $total_units > 0 ? number_format($total_points / $total_units, 2) : "0.00";
    echo "<tr><td colspan='8' style='text-align:right; font-weight:bold;'>GPA: $gpa</td></tr>";
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}
?>

<br>
<a href="index.php">Back to Home</a>
</body>
</html>
