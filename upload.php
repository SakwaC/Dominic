<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="styles_3.css">
</head>
<body>
    <form action="upload_resource.php" method="POST" enctype="multipart/form-data" class="upload-form">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        
        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="pre_primary">Pre-primary Section</option>
            <option value="primary">Primary Section</option>
            <option value="junior_secondary">Junior Secondary Section</option>
            <option value="secondary">Secondary Section</option>
            <option value="schemes_of_work">Schemes of Work</option>
            <option value="college">College/Institution Section</option>
        </select>
        
        <label for="file">Upload File:</label>
        <input type="file" id="file" name="file" required>
        
        <button type="submit">Upload Resource</button>
    </form>
</body>
</html>

