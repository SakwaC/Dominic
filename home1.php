
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBC E-learning</title>
    <link rel="stylesheet" href="styles-2.CSS">
    <style>
        /* Modal styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            padding-top: 100px; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: white;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>CBC ACADEMY</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#categories">Categories</a></li>
                <li><a href="#videos">Videos</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="#feedback">feedback</a></li>
                <li><a href="Games">Games</a></li>
                <li><a href="About">About</a></li>
            </ul>
        </nav>
    </header>
    <div class="img-logo">
        <img src="logo.jpg" alt="cbc" width="400px"height="250px">
    </div>

    <section id="home" class="hero-section">
        <div class="hero-content">
            <h2>Welcome to CBC ACADEMY</h2>
            <p>Your gateway to quality learning materials for all levels of education.</p>
            <form action="search.php" method="GET" class="search-form">
                <input type="text" name="query" placeholder="Search materials...">
                <button type="submit">Search</button>
            </form>
        </div>
    </section>

    <section id="categories" class="categories-section">
        <h2>Browse Categories</h2>
        <div class="categories-grid">
            <div class="category-item" onclick="openModal('Pre-primary materials available')"><a href="#">Pre_primary</a></div>
            <div class="category-item" onclick="openModal('Primary materials available')"><a href="#">Primary</a></div>
            <div class="category-item" onclick="openModal('Junior Secondary materials available')"><a href="#">Junior_Secondary</a></div>
            <div class="category-item" onclick="openModal('Secondary materials available')"><a href="#">Secondary</a></div>
            <div class="category-item" onclick="openModal('Schemes of Work materials available')"><a href="#">Schemes_of_Work</a></div>
            <div class="category-item" onclick="openModal('College/Institution materials available')"><a href="#">College/Institution</a></div>
        </div>
    </section>

    <!-- Modal structure -->
    <div id="categoryModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="modalText">Category details will be displayed here.</p>
        </div>
    </div>

    <section id="videos" class="videos-section">
        <h2>Featured Videos</h2>
        <div class="video-player">
            <video controls>
                <source src="path_to_video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </section>

    <footer id="contact">
        <p>Contact Us: <a href="mailto:cbcacademy20@gmail.com">cbcacademy20@gmail.com</a></p>
        <p>&copy; 2024 CBC ACADEMY. All rights reserved.</p>
    </footer>

    <script>
        // Function to open the modal and display category details
        function openModal(text) {
            document.getElementById('modalText').textContent = text;
            document.getElementById('categoryModal').style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById('categoryModal').style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside the modal
        window.onclick = function(event) {
            var modal = document.getElementById('categoryModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
