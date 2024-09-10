<?php
// Check if 'query' is set in the URL (for search)
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']);
    
    // Connect to your database
    $conn = new mysqli('localhost', 'root', '', 'cbc');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM uploads WHERE title LIKE ? OR category LIKE ?");
    $searchTerm = "%" . $query . "%"; // Add wildcards for LIKE operator
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Search Results for '" . htmlspecialchars($query) . "'</h2>";
        
        // Loop through the results and display the links
        while ($row = $result->fetch_assoc()) {
            // Link directly to the file path
            echo "<p><a href='" . htmlspecialchars($row['file_path']) . "' target='_blank'>" . htmlspecialchars($row['title']) . "</a></p>";
        }
    
    } else {
        echo "<p>No results found for '" . htmlspecialchars($query) . "'.</p>";
    }
    

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No search query provided.";
}
?>
