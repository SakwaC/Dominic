<?php
// Check if 'query' is set in the URL (for search)
if (isset($_GET['query'])) {
    $query = htmlspecialchars(trim($_GET['query'])); 
    
    // Connect to your database
    $conn = new mysqli('localhost', 'root', '', 'cbc');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM uploads WHERE title LIKE ? OR category LIKE ?");
    $searchTerm = "%$query%";
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any results are found
    if ($result->num_rows > 0) {
        echo "<h2>Search Results for '" . htmlspecialchars($query) . "':</h2>";
        echo "<ul>";
        
        // Loop through the results and display them
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='" . htmlspecialchars($row['file_path']) . "' target='_blank'>" . htmlspecialchars($row['title']) . "</a></li>";
        }
        
        echo "</ul>";
    } else {
        echo "<p>No results found for '" . htmlspecialchars($query) . "'.</p>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<p>No search query provided.</p>";
}
?>
