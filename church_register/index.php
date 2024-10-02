<?php
include 'config.php';

// Insert a new record
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO members (church_id) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read records
$sql = "SELECT * FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Church ID: " . $row["church_id"]. "<br>";
    }
} else {
    echo "0 results";
}

// Update a record
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $sql = "UPDATE members SET church_id='$name' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete a record
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM members WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

<!-- HTML form for CRUD operations -->
<form method="post">
    <input type="text" name="name" placeholder="Church ID">
    <button type="submit" name="insert">Insert</button>
    <button type="submit" name="update">Update</button>
    <button type="submit" name="delete">Delete</button>
</form>
