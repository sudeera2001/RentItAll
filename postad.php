<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            margin: 0;
            border: none;
            left: 0;
            top: 0;
            font-size: larger;
            justify-items: center;
            align-items: center;
        }
        header {
            width: 100%;
        }
        footer {
            height: 170px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #243642; /* Change background color as needed */
            z-index: 90; /* Ensures the footer is below the header */
        }
        iframe {
            width: 100%;
            border: none;
            padding: 0;
            height: 170px;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, auto);
            margin-left: 5%;
            margin-right: 5%;
            gap: 20px;
            row-gap: 30%;
            column-gap: 5%;
            width: 90%;
            max-width: 1000px;
            max-height: 800px;
        }
        .name {
            grid-column: 1;
            grid-row: 1;
        }
        .contact {
            grid-column: 1;
            grid-row: 2;
            height: 120%;
        }
        .description {
            grid-column: 2 / span 2;
            grid-row: 1;
        }
        .category {
            grid-column: 2;
            grid-row: 2;
        }
        .location {
            grid-column: 3;
            grid-row: 2;
        }
        input {
            width: 100%;
            height: 50%;
            max-width: 300px;
            background-color: lightgray;
            border: none;
        }
        select {
            width: 100%;
            height: 70%;
            max-width: 300px;
            background-color: lightgray;
            border: none;
        }
        textarea {
            width: 100%;
            height: 100%;
            resize: none; /* Optional: Prevent resizing */
            box-sizing: border-box; /* Ensure padding doesn't affect size */
            background-color: lightgrey;
            border: none;
        }
        .imagebox {
            display: flex;
            background-color: lightgrey;
            margin-top: 100px;
            flex-wrap: wrap;
            width: 90%;
            max-width: 1000px;
            justify-content: center;
            box-sizing: border-box;
            gap: 2%;
            padding: 1%;
        }
        .imagebox img {
            width: 18%;
            object-fit: cover; /* Ensures the images are cropped evenly */
            border: 1px solid #ddd; /* Optional: Add a border for better visibility */
            aspect-ratio: 1/1;
        }
        .addbottons {
            display: flex;
            flex-direction: column;
            width: 17%;
        }
        button {
            background-color: rgb(163, 67, 67);
            border: none;
            cursor: pointer;
            color: white;
            min-height: 30px;
        }
        .savemenu {
            display: flex;
            flex-wrap: wrap;
            width: 90%;
            max-width: 1000px;
            justify-content: right;
            box-sizing: border-box;
            gap: 2%;
            margin-top: 20px;
        }
        .savemenu button {
            width: 13%;
        }
    </style>
</head>
<body>
    <?php
    include("connection.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $category = isset($_POST['category']) ? $_POST['category'] : '';
        $location = isset($_POST['location']) ? $_POST['location'] : '';
    }
        // Validate input (optional, but recommended)
        if (!empty($title) && !empty($contact) && !empty($description) && !empty($category) && !empty($location)) {
            // Prepare the SQL query
            $sql = "INSERT INTO items (name, description, category, location, contact) 
                    VALUES ('$title', '$description', '$category', '$location', '$contact')";}

          // Execute the query and handle success or error
        if (mysqli_query($conn, $sql)) {
            echo "<p style='color: green;'>Ad posted successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
        }
          
    ?>






    <header>
        <iframe src="header.html" title="header"></iframe>
    </header>
    <!-- Hidden form -->
    <form id="adForm" action="postad.php" method="POST"></form>

    <div class="container">
        <div class="name">
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title" form="adForm">
        </div>
        <div class="contact">
            <label for="contact">Contact</label><br>
            <input type="text" id="contact" name="contact" form="adForm">
        </div>
        <div class="description">
            <label for="description">Description</label><br>
            <textarea id="description" name="description" form="adForm"></textarea>
        </div>
        <div class="category">
            <label for="category">Category</label><br>
            <select id="category" name="category" form="adForm">
                <option value="null">null</option>
            </select>
        </div>
        <div class="location">
            <label for="location">Location</label><br>
            <select id="location" name="location" form="adForm">
                <option value="null">null</option>
            </select>
        </div>
    </div>

    <div class="imagebox">
        <img src="" alt="image">
        <img src="" alt="image">
        <img src="" alt="image">
        <img src="" alt="image">
        <div class="addbottons">
            <button type="button" form="adForm">Add Images</button>
        </div>
    </div>
    <div class="savemenu">
        <button type="button" onclick="window.location.reload()">Cancel</button>
        <button type="reset" form="adForm">Clear</button>
        <button type="submit" form="adForm">Post Ad</button>
    </div>
    <footer>
        <iframe src="footer.html"></iframe>
    </footer>
</body>
</html>
