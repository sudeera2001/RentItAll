<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            margin: 0;
        }
    .header {
    width: 100%;
    height: 140px; 
    border: none;
    left: 0;
    position: sticky;
            }
    footer {
    width: 100%;
    height: 170px;
    border: none;
    position: fixed;
    bottom: 0;
    left: 0;
    
            }
    .footer{
        width: 100%;
        height: 100%;
        bottom: 0;
        padding: 0;
        position: fixed;
        
    }
    iframe{
        height: 170px;
        bottom: 0;
        width: 100%;
        border: none;
        position: sticky;
        
    }
    .container{
        max-width: 1300px;
        justify-content: center;
        margin: 0 auto;
        margin-bottom: 170px;
    }
    .back{
        width: 150px;
        height: 30px;
        background-color: #387478;
        color: white;
        border-radius: 5px 5px 5px 5px;
        border: none;
        font-size: 15px;
        box-sizing: border-box;
        
    }
    .navigation{
        display: flex;
        justify-content: space-between;
        margin-left: 10px;
        
        
    }
    .search-bar {
      display: flex;
      margin-right: 10px;
      
        
    }

    .search-bar input {
      width: 400px;
      height: 30px;
      font-size: 14px;
      padding-left: 20px;
      background-color: whitesmoke;
      border: solid 1px black;
      border-radius: 5px 0 0 5px;
    }

    .search-bar button {
      padding-left: 10px;
      padding-right: 10px;
      border-radius: 0 5px 5px 0;
      border: none;
      color: white;
      background-color: rgb(126, 39, 39);
      font-size: 14px;
      cursor: pointer;
      
    }
    .body1{
        display: flex;
        margin-left: 10px;
        margin-right: 10px;
        justify-content: space-between;
    }
    .items{
        background-color: #E2F1E7;
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-top: 20px;
        box-sizing: border-box;
        padding: 10px;
        gap: 10px;
         
    }
    .item{
        display: flex;
        gap: 10px;
        background-color: #c9c9c9;
        max-height: 150px;
    }
    img{
        width:30%;
        max-width: 250px;
        height: auto;

    }
    .details{
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        
        
    }
    </style>
</head>
<body>
    <header><iframe src="header.php" class="header"></iframe></header>
    <div class="container">
        <div class="navigation">
            <div class="back"><button class="back" onclick="history.back()"><i class="fa fa-angle-left"></i> Back</button></div>
            <div class="search-bar">
                <input type="text" placeholder="Search your items">
                <button>Search</button>
            </div>
        </div>

        <div class="body1">
            <div class="items">
                <?php
                include("connection.php");
                // Query to fetch item details from the database
                $sql = "SELECT * FROM items";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row and fetch data
                    while($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $category = $row['category'];
                        $description = $row['description'];
                        $location = $row['location'];
                        $image = $row['image1'];  // Assuming the image is stored as a relative file path
                        ?>
                        <div class="item">
                            <img src="<?php echo $image; ?>" alt="Item Image">
                            <div class="details">
                                <p><strong>Name:</strong> <?php echo $name; ?></p>
                                <p><strong>Location:</strong> <?php echo $location; ?></p>
                                <p><strong>Description:</strong> <?php echo $description; ?></p>
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
