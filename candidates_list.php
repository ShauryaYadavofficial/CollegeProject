<?php

include_once('./connection.php');

// Fetch all candidates
$sql = "SELECT id, first_name, last_name FROM form";
$result = $conn->query($sql);

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates List</title>
</head>
<body>

    <h1>Candidates List</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                echo "<td><a href='candidate_details.php?id=" . $row['id'] . "'>View Details</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No candidates found</td></tr>";
        }
        ?>
    </table>

</body>
</html>
