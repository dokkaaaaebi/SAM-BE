<?php
include("db.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Persona Isle of Mark</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", sans-serif
        }

        body,
        html {
            height: 100%;
            line-height: 1.8;
        }

        /* Full height image header */
        .bgimg-1 {
            background-position: center;
            background-size: cover;
            background-image: url("/w3images/mac.jpg");
            min-height: 50%;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }
    </style>
</head>

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-card" id="myNavbar">
            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a href="#home" class="w3-bar-item w3-button"> Home </a>
                <a href="#Camaraderie" class="w3-bar-item w3-button"><i class="fa fa-handshake-o"></i> Camaraderie </a>
                <a href="#Game" class="w3-bar-item w3-button"><i class="fa fa-gamepad"></i> Game Over </a>
                <a href="#Fur" class="w3-bar-item w3-button"><i class="fa fa-paw"></i> Fur-tastic </a>
                <a href="#Haven" class="w3-bar-item w3-button"><i class="fa fa-leaf"></i> Harmony Haven </a>
            </div>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->

            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium"
                onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <!-- Sidebar on small screens when clicking the menu icon -->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large"
        style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16"> Close
        </a>
        <a href="#home" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>
        <a href="#Camaraderie" onclick="w3_close()" class="w3-bar-item w3-button">Camaraderie</a>
        <a href="#Game" onclick="w3_close()" class="w3-bar-item w3-button">Game Over</a>
        <a href="#Fur" onclick="w3_close()" class="w3-bar-item w3-button">Fur-tastic</a>
        <a href="#Haven" onclick="w3_close()" class="w3-bar-item w3-button">Harmony Haven</a>
    </nav>

    <!-- Header with full-height image -->
    <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
        <div class="w3-display-left w3-text-black" style="padding:48px">
            <span class="w3-jumbo w3-hide-small"> Persona Isle of Mark</span><br>
            <span class="w3-xxlarge w3-hide-large w3-hide-medium"> Persona Isle of Mark </span><br>
            <span class="w3-large"> Step into the world of my persona, where every layer reveals a story, a passion, and a unique spark. </span>
        </div>
    </header>

    <?php
    $getQuery = "SELECT * FROM `islandsOfPersonality` WHERE islandOfPersonalityID = 1";
    $CamaraderieResult = executeQuery($getQuery);

    while ($row = mysqli_fetch_array($CamaraderieResult)) {
        ?>

        <!-- Camaraderie Island -->
        <div class="w3-container w3-light-grey" style="padding: 50px" id="Camaraderie">
            <h1 class="w3-center" style="color: <?php echo $row['color']; ?>"> <?php echo $row['name']; ?> </h1>
            <h4 class="w3-center"> <?php echo $row['shortDescription']; ?> </h4>
            <p class="w3-center w3-medium"> <?php echo $row['longDescription']; ?> </p>

            <?php
    }
    ?>

        <?php
        $getQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = 1";
        $CamaraderieResult = executeQuery($getQuery);

        if ($CamaraderieResult && mysqli_num_rows($CamaraderieResult) > 0) {
            ?>

            <div class="w3-row-padding w3-grayscale"
                style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">

                <?php
                while ($row = mysqli_fetch_array($CamaraderieResult)) {
                    ?>

                    <div class="w3-col"
                        style="width: 350px; height: 400px; display: flex; flex-direction: column; border: 1px solid #ccc; overflow: hidden; background: #fff;">
                        <img src="<?php echo $row['image']; ?>" style="width: 100%; height: 180px; object-fit: cover;"
                            data-large=" <?php echo $row['image']; ?>">
                        <div
                            style="flex-grow: 1; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                            <h3 style="font-size: 18px;"><?php echo $row['content']; ?></h3>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>

            <?php
        } else {
            echo '<p class="w3-center">No content available for this island.</p>';
        }
        ?>

    </div>

    <?php
    $getQuery = "SELECT * FROM `islandsOfPersonality` WHERE islandOfPersonalityID = 2";
    $GameResult = executeQuery($getQuery);

    while ($row = mysqli_fetch_array($GameResult)) {
        ?>

        <!-- Game Over Isle -->
        <div class="w3-container" style="padding: 50px" id="Game">
            <h1 class="w3-center" style="color: <?php echo $row['color']; ?>"> <?php echo $row['name']; ?> </h1>
            <h4 class="w3-center"> <?php echo $row['shortDescription']; ?> </h4>
            <p class="w3-center w3-medium"> <?php echo $row['longDescription']; ?> </p>

            <?php
    }
    ?>

        <?php
        $getQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = 2";
        $GameResult = executeQuery($getQuery);

        if ($GameResult && mysqli_num_rows($GameResult) > 0) {
            ?>

            <div class="w3-row-padding w3-grayscale"
                style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">

                <?php
                while ($row = mysqli_fetch_array($GameResult)) {
                    ?>

                    <div class="w3-col"
                        style="width: 350px; height: 400px; display: flex; flex-direction: column; border: 1px solid #ccc; overflow: hidden; background: #fff;">
                        <img src="<?php echo $row['image']; ?>" style="width: 100%; height: 180px; object-fit: cover;">
                        <div
                            style="flex-grow: 1; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                            <h3 style="font-size: 18px;"><?php echo $row['content']; ?></h3>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>

            <?php
        } else {
            echo '<p class="w3-center">No content available for this island.</p>';
        }
        ?>

    </div>

    <?php
    $getQuery = "SELECT * FROM `islandsOfPersonality` WHERE islandOfPersonalityID = 3";
    $FurResult = executeQuery($getQuery);

    while ($row = mysqli_fetch_array($FurResult)) {
        ?>

        <!-- Fur-tastic Island -->
        <div class="w3-container w3-light-grey" style="padding: 50px" id="Fur">
            <h1 class="w3-center fw-bolder" style="color: <?php echo $row['color']; ?>"> <?php echo $row['name']; ?> </h1>
            <h4 class="w3-center"> <?php echo $row['shortDescription']; ?> </h4>
            <p class="w3-center w3-medium"> <?php echo $row['longDescription']; ?> </p>

            <?php
    }
    ?>

        <?php
        $getQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = 3";
        $FurResult = executeQuery($getQuery);

        if ($FurResult && mysqli_num_rows($FurResult) > 0) {
            ?>

            <div class="w3-row-padding w3-grayscale"
                style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">

                <?php
                while ($row = mysqli_fetch_array($FurResult)) {
                    ?>

                    <div class="w3-col"
                        style="width: 350px; height: 400px; display: flex; flex-direction: column; border: 1px solid #ccc; overflow: hidden; background: #fff;">
                        <img src="<?php echo $row['image']; ?>" style="width: 100%; height: 180px; object-fit: cover;">
                        <div
                            style="flex-grow: 1; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                            <h3 style="font-size: 18px;"><?php echo $row['content']; ?></h3>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>

            <?php
        } else {
            echo '<p class="w3-center">No content available for this island.</p>';
        }
        ?>

    </div>

    <?php
    $getQuery = "SELECT * FROM `islandsOfPersonality` WHERE islandOfPersonalityID = 4";
    $MusicResult = executeQuery($getQuery);

    while ($row = mysqli_fetch_array($MusicResult)) {
        ?>

        <!-- Harmony Haven Island -->
        <div class="w3-container" style="padding: 50px" id="Haven">
            <h1 class="w3-center" style="color: <?php echo $row['color']; ?>"> <?php echo $row['name']; ?> </h1>
            <h4 class="w3-center"> <?php echo $row['shortDescription']; ?> </h4>
            <p class="w3-center w3-medium"> <?php echo $row['longDescription']; ?> </p>

            <?php
    }
    ?>

        <?php
        $getQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = 4";
        $MusicResult = executeQuery($getQuery);

        if ($MusicResult && mysqli_num_rows($MusicResult) > 0) {
            ?>

            <div class="w3-row-padding w3-grayscale"
                style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">

                <?php
                while ($row = mysqli_fetch_array($MusicResult)) {
                    ?>

                    <div class="w3-col"
                        style="width: 350px; height: 400px; display: flex; flex-direction: column; border: 1px solid #ccc; overflow: hidden; background: #fff;">
                        <img src="<?php echo $row['image']; ?>" style="width: 100%; height: 180px; object-fit: cover;">
                        <div
                            style="flex-grow: 1; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                            <h3 style="font-size: 18px;"><?php echo $row['content']; ?></h3>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>

            <?php
        } else {
            echo '<p class="w3-center">No content available for this island.</p>';
        }
        ?>

    </div>

    <!-- Footer -->
    <footer class="w3-center w3-black w3-padding-64">
        <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i> Back to Top </a>
        <div class="w3-xlarge w3-section">  
        </div>
    </footer>

    <script>
        // Toggle between showing and hiding the sidebar when clicking the menu icon
        var mySidebar = document.getElementById("mySidebar");

        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
            } else {
                mySidebar.style.display = 'block';
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
        }
    </script>

</body>

</html>