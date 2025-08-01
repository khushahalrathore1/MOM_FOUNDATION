<?php
include('config.php');
$month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
$sql = "SELECT DATE_FORMAT(created_at, '%d-%m') AS day, COUNT(*) AS total
        FROM childern_forms
        WHERE DATE_FORMAT(created_at, '%Y-%m') = ?
        GROUP BY day
        ORDER BY day ASC";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $month);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
header('Content-Type: application/json');
echo json_encode($data);
?>
