<?php
require_once '../MODEL/connectiondb.php'; 

$table_data = ""; // Initialize variable to hold table data HTML


$sql = "SELECT NAME, ID, EMAIL, DATE, TIME, SLOTNUMBER FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table format
    
    while ($row = $result->fetch_assoc()) {
        $table_data .= "<tr>";
        $table_data .= "<td>" . $row["NAME"] . "</td>";
        $table_data .= "<td>" . $row["ID"] . "</td>";
        $table_data .= "<td>" . $row["EMAIL"] . "</td>";
        $table_data .= "<td>" . $row["DATE"] . "</td>";
        $table_data .= "<td>" . $row["TIME"] . "</td>";
        $table_data .= "<td>" . $row["SLOTNUMBER"] . "</td>";
        // Add the delete and accept icons with links to controller.php passing the row ID and action type
        $table_data .= "<td>";
        $table_data .= "<a href='../CONTROLLER/delete.php?id=" . $row["ID"] . "&action=delete'>";
        $table_data .= "<img src='img/requestpic/wrongicon.png' alt='Delete' class='delete-icon'>";
        $table_data .= "</a>";
        $table_data .= "<a href='../CONTROLLER/delete_record.php?id=" . $row["ID"] . "&action=accept'>";
        $table_data .= "<img src='img/requestpic/righticon.png' alt='Accept' class='delete-icon'>";
        $table_data .= "</a>";
        $table_data .= "</td>";
        $table_data .= "</tr>";
    }
} else {
    $table_data .= "<tr><td colspan='7'>0 results</td></tr>";
}

// Close connection
$conn->close();
?>
