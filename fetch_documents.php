<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'cbc');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the category from the URL parameter
if (isset($_GET['category'])) {
    $category = htmlspecialchars($_GET['category']);

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT title, file_path FROM uploads WHERE category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Documents available for " . htmlspecialchars($category) . "</h2>";
        echo "<div class='document-grid'>";
        while ($row = $result->fetch_assoc()) {
            $fileType = strtolower(pathinfo($row['file_path'], PATHINFO_EXTENSION));

            // Determine the preview image or icon
            if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                // Use the image itself as the preview
                $preview = $row['file_path'];
            } elseif ($fileType === 'pdf') {
                // Use a PDF icon as the preview (or optionally generate a preview of the first page of the PDF)
                $preview = 'icons/pdf-icon.png';
            } elseif (in_array($fileType, ['doc', 'docx'])) {
                // Use a DOC icon for Word documents
                $preview = 'icons/doc-icon.png';
            } else {
                // Default icon for unknown file types
                $preview = 'icons/default-icon.png';
            }

            // Generate the document card with preview
            echo "
            <div class='document-card' onclick=\"window.open('" . htmlspecialchars($row['file_path']) . "', '_blank')\">
                <img src='" . htmlspecialchars($preview) . "' alt='Document preview'>
                <p>" . htmlspecialchars($row['title']) . "</p>
            </div>";
        }
        echo "</div>";
    } else {
        echo "<p>No documents available for this category.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
