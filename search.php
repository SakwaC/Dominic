<?php
// Check if 'query' is set in the URL (for search)
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']);
    
    // Connect to your database
    $conn = new mysqli('localhost', 'root', '', 'cbc');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

      //  prepared statements to prevent SQL injection
      $stmt = $conn->prepare("SELECT * FROM uploads WHERE title LIKE ? OR category LIKE ?");
      $searchTerm = "%$query%";
      $stmt->bind_param('ss', $searchTerm, $searchTerm);
  
      $stmt->execute();
      $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Search Results for '$query'</h2>";
        
        // Loop through the results and display the links
        while ($row = $result->fetch_assoc()) {
            echo "<p><a href='upload.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></p>";
        }

    } else {
        echo "<p>No results found for '$query'.</p>";
    }

    $conn->close();
} else {
    echo "No search query provided.";
}

// Ensure this part of the code does not cause warnings
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Handle logic for when 'id' is available (if needed)
    echo "ID is: " . $id;
} else {
    // Only include this block if 'id' is expected in some contexts
    // Otherwise, you can remove or comment it out
    echo "ID is not set";
}
?>



