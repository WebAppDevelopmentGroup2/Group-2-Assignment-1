<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Grade</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Add Grade</h2>

<form method="POST" action="">
    <!-- Student Name -->
    <label>Student Name:</label><br>
    <input type="text" name="student_name" required><br><br>

    <!-- Matric Number -->
    <label>Matric No.:</label><br>
    <input type="text" name="matric_no" required><br><br>


    <!-- Course Code -->
    <label>Course Code:</label><br>
    <input type="text" name="course_code" required><br><br>

    <!-- Credit Unit -->
    <label>Credit Unit:</label><br>
    <select name="credit_unit" required>
        <option value="">-- Select Credit Unit --</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select><br><br>

    <!-- Score -->
    <label>Score:</label><br>
    <input type="number" name="score" min="0" max="100" required><br><br>

    <!-- Semester -->
    <label>Semester:</label><br>
    <select name="semester" required>
        <option value="">-- Select Semester --</option>
        <option value="First">First</option>
        <option value="Second">Second</option>
    </select><br><br>

    <!-- Session -->
    <label>Session:</label><br>
    <select name="session" required>
        <option value="">-- Select Session --</option>
        <option value="2023/2024">2023/2024</option>
        <option value="2024/2025">2024/2025</option>
        <option value="2025/2026">2025/2026</option>
    </select><br><br>

    <input type="submit" name="submit" value="Save Grade">
</form>

<?php
if (isset($_POST['submit'])) {
    $student_name = htmlspecialchars($_POST['student_name']);
    $matric_no = htmlspecialchars($_POST['matric_no']);
    $course_code = htmlspecialchars($_POST['course_code']);
    $credit_unit = htmlspecialchars($_POST['credit_unit']);
    $score = htmlspecialchars($_POST['score']);
    $semester = htmlspecialchars($_POST['semester']);
    $session = htmlspecialchars($_POST['session']);

    // Convert score to grade
    if ($score >= 70) $grade = 'A';
    elseif ($score >= 60) $grade = 'B';
    elseif ($score >= 50) $grade = 'C';
    elseif ($score >= 45) $grade = 'D';
    else $grade = 'F';

    // Save to database
    $stmt = $conn->prepare("INSERT INTO grades (student_name, matric_no, course_code, credit_unit, score, grade, semester, session)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissss", $student_name, $matric_no, $course_code, $credit_unit, $score, $grade, $semester, $session);

    if ($stmt->execute()) {
        echo "<p class='success'>Grade saved successfully!</p>";
    } else {
        echo "<p class='error'>Error saving grade: " . $conn->error . "</p>";
    }
}
?>
<br>
<a href="index.php">Back to Home</a>
</body>
</html>
