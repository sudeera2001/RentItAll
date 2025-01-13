<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Items</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            width: 100%;
            height: 140px;
            position: relative;
            border: none;
        }
        footer {
            width: 100%;
            height: 170px;
            border: none;
            position: fixed;
            bottom: 0;
            left: 0;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .container {
            margin: 0 auto;
            margin-bottom: 170px;
            padding: 20px;
            max-width: 1200px;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #387478;
            color: white;
            border-radius: 5px;
            border: none;
            padding: 10px 20px;
            font-size: 15px;
            cursor: pointer;
        }
        .search-bar {
            display: flex;
            align-items: center;
        }
        .search-bar input {
            width: 300px;
            height: 30px;
            padding-left: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
        }
        .search-bar button {
            background-color: rgb(126, 39, 39);
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            padding: 5px 15px;
            cursor: pointer;
        }
        .body1 {
            display: flex;
            gap: 20px;
        }
        .leftnavigation {
            background-color: #629584;
            color: white;
            padding: 20px;
            border-radius: 5px;
            width: 200px;
        }
        .leftnavigation p {
            margin: 10px 0;
            cursor: pointer;
        }
        .leftnavigation p:hover {
            text-decoration: underline;
        }
        .items {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .item {
            display: flex;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            gap: 15px;
            align-items: center;
        }
        .item img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        .details {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .details p {
            margin: 0;
        }
        .details strong {
            color: #333;
        }
    </style>
</head>
<body>
<?php
// Include database connection
include("connection.php");

// Fetch category and search term from URL parameters
$category = isset($_GET["category"]) ? $_GET["category"] : "all";
$searchTerm = isset($_GET["search"]) ? mysqli_real_escape_string($conn, $_GET["search"]) : "";

// Base query to fetch items
$query = "SELECT * FROM items";

// Modify query based on category and search term
if ($category !== "all" || !empty($searchTerm)) {
    $query .= " WHERE";
    if ($category !== "all") {
        $query .= " category = '" . mysqli_real_escape_string($conn, $category) . "'";
    }
    if (!empty($searchTerm)) {
        if ($category !== "all") {
            $query .= " AND";
        }
        $query .= " (name LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%' OR location LIKE '%$searchTerm%')";
    }
}

$result = mysqli_query($conn, $query);
?>

<header><iframe src="header.php" class="header"></iframe></header>

<div class="container">
    <!-- Navigation -->
    <div class="navigation">
        <button class="back" onclick="history.back()">
            <i class="fa fa-angle-left"></i> Back
        </button>
        <div class="search-bar">
            <!-- Form to handle search -->
            <form method="GET" action="browse.php">
                <input type="hidden" name="category" value="<?php echo $category; ?>">
                <input type="text" name="search" placeholder="Search your items" value="<?php echo htmlspecialchars($searchTerm); ?>">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="body1">
        <!-- Left Navigation (Categories) -->
        <div class="leftnavigation">
            <h4>Categories</h4>
            <p onclick="window.location.href='browse.php?category=vehicles'">Vehicles</p>
            <p onclick="window.location.href='browse.php?category=properties'">Properties</p>
            <p onclick="window.location.href='browse.php?category=tools'">Tools</p>
            <p onclick="window.location.href='browse.php?category=party_items'">Party Items</p>
            <p onclick="window.location.href='browse.php?category=others'">Others</p>
        </div>

        <!-- Items -->
        <div class="items">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = htmlspecialchars($row['name']);
                    $category = htmlspecialchars($row['category']);
                    $description = htmlspecialchars($row['description']);
                    $location = htmlspecialchars($row['location']);
                    $image = htmlspecialchars($row['image1']);
                    $contact = htmlspecialchars($row['contact']);
                    ?>
                    <div class="item">
                        <img src="<?php echo $image; ?>" alt="Item Image">
                        <div class="details">
                            <p><strong>Name:</strong> <?php echo $name; ?></p>
                            <p><strong>Location:</strong> <?php echo $location; ?></p>
                            <p><strong>Description:</strong> <?php echo $description; ?></p>
                            <p><strong>Contact:</strong> <?php echo $contact; ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No items found.</p>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>

<footer><iframe src="footer.html"></iframe></footer>
</body>
</html>
