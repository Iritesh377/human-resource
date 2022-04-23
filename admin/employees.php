<?php
$title = "Employees";
include "../inc/db_conn.php";
include_once("../inc/header.php");

if (empty($_SESSION['id'])) {
    header("Location: ../index.php");
    die;
}
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['role'] != "Admin") {
        die("Need Admin Permission to view this page");
    }
}
?>

<body>
    <main>

        <div class="cards">
            <div class="card-single">
                <div>
                    <?php

                    $sql = "SELECT id FROM employeesdetails ORDER BY id";
                    $result = mysqli_query($conn, $sql);
                    $totalemp = mysqli_num_rows($result);


                    echo '<h1>' . $totalemp . '</h1>';
                    ?>
                    <span>Total Employees</span>

                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <?php

                    $sql = "SELECT COUNT( DISTINCT department) FROM empcompanydetails ORDER BY id";
                    $result = mysqli_query($conn, $sql);
                    $totaldep = mysqli_num_rows($result);

                    echo '<h1>' . $totaldep . '</h1>';
                    ?>
                    <span>Department</span>
                </div>
                <div>
                    <span class="las la-building"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <?php
                    $sql = "SELECT COUNT( DISTINCT id) FROM empcompanydetails ORDER BY id";
                    $result = mysqli_query($conn, $sql);
                    $totalemp = mysqli_num_rows($result);

                    echo '<h1>' . $totalemp . '</h1>';
                    ?>
                    <span>Active Employees</span>
                </div>
                <div>
                    <span class="las la-user-tie"></span>
                </div>
            </div>
            <button id="button">
                <a href="addemployees.php">
                    <div class="card-single">
                        <div>
                            <h1>Add</h1>
                            <span>Employees</span>
                        </div>
                        <div>
                            <span class="la la-user-plus"></span>
                        </div>
                    </div>
                </a>
            </button>
        </div>

        <div class="grid" style="padding-top:50px;">
            <div class="projects">
                <div class="box">
                    <div class="box-header">
                        <h3>Employees List</h3>

                        <button>See all <span class="las la-arrow-right"></span></button>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Employee ID</td>
                                        <td>Name</td>
                                        <td>Image</td>
                                        <td>Department/Designation</td>
                                        <td>Contact</td>
                                        <td>Action</td>

                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    $sql = "Select * from `employeesdetails`,`empcompanydetails`";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $fname = $row['fullname'];
                                            $pic = $row['photo'];
                                            $department = $row['department'];
                                            $tel = $row['phone'];
                                            echo '<tr>
                                            <td>' . $id . '</td>
                                            <td>' . $fname . '</td>
                                            <td><img src="../uploads/<?php echo $pic;?>">
                                            </td>
                                            <td>' . $department . '</td>
                                            <td>' . $tel . '</td>
                                            <td>
                                        <a href="../admin/update.php?updateid=' . $id . '" class="btn btn-primary m-2 text-light">Update</a>
                                        <a href="../inc/delete.php?deleteid=' . $id . '"  class="btn btn-danger m-2 text-light">Delete</a>
                                        </td>   
                                        </tr>';
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </main>
    </div>
    <div id="maincontent">

    </div>
    </div>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>