<?php

include_once('./connection.php');

// Fetch details of the specific candidate
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM form WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Candidate not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Details</title>
</head>
<body>

    <h1>Candidate Details</h1>

    <!-- Display non-editable details -->
    <p>ID: <?php echo $row['id']; ?></p>
    <p>Name: <?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name']; ?></p>
    <p>Primary Discipline: <?php echo $row['primary_discipline']; ?></p>
    <p>Secondary Discipline: <?php echo $row['secondary_discipline']; ?></p>
    <p>Application for Post: <?php echo $row['application_for_post']; ?></p>
    <!-- ... Add other fields ... -->

    <!-- Edit button -->
    <a href="candidate_update.php?id=<?php echo $row['id']; ?>">Edit</a>

    <a href="candidates_list.php">Back to Candidates List</a>

</body>
</html>
