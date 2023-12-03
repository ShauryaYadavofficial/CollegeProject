<?php

include_once('./connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $primaryDiscipline = $_POST['primary_discipline'];
    $secondaryDiscipline = $_POST['secondary_discipline'];
    $applicationForPost = $_POST['application_for_post'];
    // ... Add other fields ...

    // Update the database
    $sqlUpdate = "UPDATE form SET 
                    primary_discipline = '$primaryDiscipline', 
                    secondary_discipline = '$secondaryDiscipline', 
                    application_for_post = '$applicationForPost' 
                    WHERE id = $id";

    if ($conn->query($sqlUpdate) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

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

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <p>Name: <?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name']; ?></p>
        <p>Primary Discipline: <input type="text" name="primary_discipline" value="<?php echo $row['primary_discipline']; ?>"></p>
        <p>Secondary Discipline: <input type="text" name="secondary_discipline" value="<?php echo $row['secondary_discipline']; ?>"></p>
        <p>Application for Post: <input type="text" name="application_for_post" value="<?php echo $row['application_for_post']; ?>"></p>
        <!-- ... Add other fields ... -->

        <input type="submit" value="Update">
    </form>

    <a href="candidates_list.php">Back to Candidates List</a>

</body>
</html>
