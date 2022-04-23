<?php
$title = "Show All";
include_once("../inc/db_conn.php");
include_once("../inc/header.php");

?>

<body>
    <div class="container mt-5 ">
        <div class="wrap">
            <h1><?php echo $title; ?></h1>
            <h6 class="text-danger">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

            </h6>
        </div>
        <div class="cnt-wrapbox-body mt-5">
            <div class="table-responsive">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Employee ID</td>
                            <td>Name</td>
                            <td>Gender</td>
                            <td>Department/Designation</td>
                            <td>Contact</td>
                            <td>Address</td>
                            <td>Action</td>


                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        $sql = "Select * from `employeesdetails` emp INNER JOIN `empcompanydetails` details ON emp.id=details.id";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $fname = $row['fullname'];
                                $gender = $row['gender'];
                                $department = $row['department'];
                                $designation = $row['designation'];
                                $tel = $row['phone'];
                                $fulladdress = $row['fulladdress'];
                                echo '<tr>
                                            <td>' . $id . '</td>
                                            <td>' . $fname . '</td>
                                            <td>' . $gender . '</td>
                                            <td>' . $department . "/" . $designation . '</td>
                                            <td>' . $tel . '</td>
                                            <td>' . $fulladdress . '</td>
                                            <td>
                                        <a href="update.php?updateid=' . $id . '" name="updateid" class="btn btn-primary m-2 text-light">Update</a>
                                        <a href="../inc/delete.php?deleteid=' . $id . '" class="btn btn-danger m-2 text-light">Delete</a>
                                        
                                        </td> 
                                        </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>



            </div>


</body>