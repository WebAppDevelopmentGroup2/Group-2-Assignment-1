<?php
include("db_connect.php");
$student_id = $_GET['student_id'] ?? 1;

$query = "SELECT g.score, c.credit_unit FROM grades g 
          JOIN courses c ON g.course_id = c.id 
          WHERE g.student_id = $student_id";

$result = $conn->query($query);

$total_points = 0;
$total_units = 0;

while ($row = $result->fetch_assoc()) {
  $score = $row['score'];
  $unit = $row['credit_unit'];

  if ($score >= 70) $point = 5;
  elseif ($score >= 60) $point = 4;
  elseif ($score >= 50) $point = 3;
  elseif ($score >= 45) $point = 2;
  else $point = 0;

  $total_points += $point * $unit;
  $total_units += $unit;
}

$gpa = $total_units ? ($total_points / $total_units) : 0;
?>

<!DOCTYPE html>
<html>
<head>
  <title>GPA Result</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card text-center shadow-sm">
      <div class="card-body">
        <h4>Student ID: <?php echo $student_id; ?></h4>
        <h3 class="mt-3">GPA: <?php echo number_format($gpa, 2); ?></h3>
        <a href="index.php" class="btn btn-secondary mt-3">Back</a>
      </div>
    </div>
  </div>
</body>
</html>
