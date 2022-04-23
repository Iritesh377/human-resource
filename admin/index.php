<?php
$title = "Dashboard";
include_once("../inc/header.php");
?>

<body>
    <div class="wrap">
        <h1><?php echo $title; ?></h1>
    </div>
    <div class="container pt-5 mt-5">
        <main>

            <div class="cards">
                <div>
                    <a href="showall.php" class="card-single btn">
                        <h1>Show All</h1>
                    </a>

                </div>
                <div>
                    <a href="showindividual.php" class="card-single btn">
                        <h1>Show Individual</h1>
                    </a>
                </div>

                <div>
                    <a href="addemployees.php" class="card-single btn">
                        <h1>Insert</h1>
                    </a>
                </div>
                <div>
                    <a href="#" class="card-single btn">
                        <h1>Update</h1>
                    </a>
                </div>
                <div>
                    <a href="deleteindividual.php" class="card-single btn">
                        <h1>Delete</h1>
                    </a>
                </div>
                <div>
                    <a href="../inc/logout.php" class="card-single btn">
                        <h1>Logout</h1>
                    </a>
                </div>
        </main>
    </div>







</body>