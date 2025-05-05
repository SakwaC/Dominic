<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBC E-learning</title>
    <link rel="stylesheet" href="styles-2.CSS">
    <style>
  /* Modal overlay to dim the background */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stays in place */
    z-index: 1000; /* On top of all content */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
  }

  /* Modal content to float on the page */
  .modal-content {
    background-color: #fff;
    margin: auto;
    padding: 20px;
    border-radius: 8px;
    width: 80%;
    max-width: 600px;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Slight shadow for floating effect */
  }

  /* Close button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
  }

  /* Document preview grid inside modal */
  .document-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
  }

  .document-card {
    display: inline-block;
    margin: 10px;
    padding: 10px;
    width: 150px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.2s ease;
  }

  .document-card:hover {
    transform: scale(1.05);
  }

  .document-card img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    margin-bottom: 10px;
  }

  .document-card p {
    font-size: 14px;
    font-weight: bold;
    color: #333;
  }
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 30px; /* Increased horizontal padding */
  background-color: #4CAF50;
  flex-wrap: wrap; /* Allow items to wrap if needed */
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 10px;
  padding: 0;
  margin: 0;
}

.nav-links li a {
  color: yellow;
  text-decoration: none;
  font-weight: bold;
}

.logout-btn {
  margin-left: auto; /* Push the logout button to the far right */
}

.logout-btn a {
  white-space: nowrap; /* Prevent text from wrapping */
  background-color: black;
  color: white;
  text-decoration: underline;
  padding: 8px 16px;
  border-radius: 4px;
  transition: background-color 0.3s ease;
  display: inline-block;
}

.logout-btn a:hover {
  background-color: #333;
}
</style>
</head>
<body>
  <header>
    <div class="logo">
      <h1>CBC ACADEMY</h1>
    </div>
    <nav class="navbar">
      <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#categories">Categories</a></li>
        <li><a href="#videos">Videos</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="game.php">Games</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      <div class="logout-btn">
        <a href="landin.php">Log Out</a>
      </div>
    </nav>
  </header>
</body>
  

    <div class="img-logo">
        <img src="logo.jpg" alt="cbc" width="400px" height="250px">
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
            <div class="category-item" onclick="openModal('Pre_primary')"><a href="#">Pre-primary</a></div>
            <div class="category-item" onclick="openModal('Primary')"><a href="#">Primary</a></div>
            <div class="category-item" onclick="openModal('Junior_secondary')"><a href="#">Junior Secondary</a></div>
            <div class="category-item" onclick="openModal('Secondary')"><a href="#">Secondary</a></div>
            <div class="category-item" onclick="openModal('Schemes_of_work')"><a href="#">Schemes of Work</a></div>
            <div class="category-item" onclick="openModal('College')"><a href="#">College/Institution</a></div>
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
        <h2>Featured Video</h2>
        <videos controls> </videos>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/zEf3hInFl-k?si=2YHCwzMuUN05vCbL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <p>
            <a href="https://www.youtube.com/@CBCACADEMY-q4g/6b6081dd" target="_blank">Visit Our YouTube Channel</a>
            </videos>

        </p>
        </div>
    </section>

    <footer id="contact">
        <p>Contact Us: <a href="mailto:cbcacademy20@gmail.com">cbcacademy20@gmail.com</a></p>
        <p>&copy; 2024 CBC ACADEMY. All rights reserved.</p>
    </footer>

    <script>
        // Function to open the modal and load documents dynamically
        function openModal(category) {
            // Show the modal
            document.getElementById('categoryModal').style.display = "block";

            // Fetch documents for the selected category using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetch_documents.php?category=" + category, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the modal content with the fetched document previews
                    document.getElementById('modalText').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById('categoryModal').style.display = "none";
        }

        // Close the modal when the user clicks outside of it
        window.onclick = function(event) {
            var modal = document.getElementById('categoryModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>



</body>

</html>