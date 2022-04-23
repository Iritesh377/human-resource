<?php
$title = "Show Individual";
include_once("../inc/db_conn.php");
include_once("../inc/header.php");
?>

<body>
    <div class="container mt-5 ">
        <div class="wrap">
            <h1><?php echo $title; ?>

            </h1>
        </div>
        <center>
            <div class="mt-5">
                <form action="?">
                    <div class="form-group">
                        <table>
                            <tr>
                                <td>

                                <th>Select</th>
                                <td><select class="form-select" id="select" name="id">
                                        <option value="">Choose...</option>
                                        <?php
                                        $sql = "SELECT * FROM `employeesdetails`";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result) {

                                            while ($row = mysqli_fetch_assoc($result)) {

                                                echo "<option value='" . $row['id'] . "'";
                                                echo $row['id'] == ($_GET['id'] ?? 0) ? ' selected' : '';
                                                echo ">" . $row['fullname'] . "</option>";
                                            }
                                        }

                                        ?>

                                    </select></td>
                                </td>
                                <td><button class="btn btn-primary" type="submit">Show</button></td>
                            </tr>
                        </table>
                    </div>

                </form>

                <?php
                if (!empty($_GET['id'])) {
                    $globalid = $_GET['id'];
                    $data = [];
                    $sql = "Select * from `employeesdetails` WHERE id=$globalid";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $data = $row;
                        }
                    }
                    $sql = "Select * from `empcompanydetails` WHERE id=$globalid";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $data2 = $row;
                        }
                    }

                    if (empty($data) || empty($data2)) {
                        die("Data Not Found");
                    }

                ?>
                    <div>
                        <table>
                            <tr>
                                <th>Id</td>
                                <td><?php echo $data['id']; ?></th>
                            </tr>
                            <tr>
                                <th>Full Name:</td>
                                <td><?php echo $data['fullname']; ?></th>
                            </tr>
                            <tr>
                                <th>Father Name:</td>
                                <td><?php echo $data['fathername']; ?></th>
                            </tr>
                            <tr>
                                <th>Dob:</td>
                                <td><?php echo $data['dob']; ?></th>
                            </tr>
                            <tr>
                                <th>Gender:</td>
                                <td><?php echo $data['gender']; ?></th>
                            </tr>
                            <tr>
                                <th>Phone:</td>
                                <td><?php echo $data['phone']; ?></th>
                            </tr>
                            <tr>
                                <th>Full Address:</td>
                                <td><?php echo $data['fulladdress']; ?></th>
                            </tr>
                            <tr>
                                <th>Email:</td>
                                <td><?php echo $data['email']; ?></th>
                            </tr>
                        </table>
                    </div>


                <?php } ?>
            </div>
        </center>
</body>