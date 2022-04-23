<?php
$title = "Add employees";
include "../inc/db_conn.php";
include_once("../inc/header.php");

if (isset($_POST['addemp'])) {

  $fullname = $_POST['fullname'];
  $fathername = $_POST['fathername'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $fulladdress = $_POST['fulladdress'];
  $email = $_POST['email'];
  $empid = $_POST['empid'];
  $department = $_POST['department'];
  $designation = $_POST['designation'];
  $doj = $_POST['doj'];
  $joiningsalary = $_POST['joiningsalary'];
  mysqli_begin_transaction($conn);
  try {
    $sql = "INSERT INTO `employeesdetails`(`id`,`fullname`, `fathername`, `dob`, `gender`, `phone`, `fulladdress`, `email`) VALUES ('$empid','$fullname','$fathername','$dob','$gender','$phone','$fulladdress','$email');";
    $sql1 = "INSERT INTO `empcompanydetails`(`id`,`department`,`designation`,`doj`,`joiningsalary`) VALUES('$empid','$department','$designation','$doj','$joiningsalary');";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);

    mysqli_commit($conn);
    header("Location: addemployees.php?error=Employee Record Added Succesfully");
    exit();
  } catch (mysqli_sql_exception $exception) {
    mysqli_rollback($conn);
    throw $exception;
    echo "Error";
  }
}

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
  <div class="body-box" style="padding-top:50px;">
    <form action="addemployees.php" method="POST" enctype="multipart/form-data">
      <div class="container mt-5">
        <div class="wrap">
          <h1><?php echo $title; ?></h1>
          <h6 class="text-danger">
            <?php if (isset($_GET['error'])) { ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

          </h6>
        </div>

        <div class="row row-cols-2">
          <div class="col">
            <div class="py-2 border rounded-top bg-primary">
              <div class="ps-3 text-white">Personal Details</div>
            </div>
            <div class="p-3 border bg-light">

              <div class="mb-2">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Ram Lal">
              </div>
              <div class="mb-2">
                <label for="fathername" class="form-label">Father's Name:</label>
                <input type="text" name="fathername" class="form-control" id="fathername" placeholder="Shyam Lal">
              </div>
              <div class="mb-2">
                <label for="dob" class="form-label">Date Of Birth:</label>
                <input type="date" name="dob" class="form-control" id="dob">
              </div>
              <div class="input-group mb-2 py-1">
                <label class="input-group-text" for="gender">Gender:</label>
                <select name="gender" class="form-select" id="gender">
                  <option selected>Select...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="phone" class="form-label">Phone:</label>
                <input type="number" name="phone" class="form-control" id="phone" placeholder="98**********">
              </div>
              <div class="mb-2">
                <label for="address" class="form-label">Full Address:</label>
                <input type="text" class="form-control" name="fulladdress" id="address" placeholder="Chitwan">
              </div>
              <div class="mb-2">
                <label for="empemail" class="form-label">Email address:</label>
                <input type="email" class="form-control" name="email" id="empemail" placeholder="name@example.com">
              </div>

              <!-- NEXT -->

            </div>
          </div>
          <div class="col">
            <div class="py-2 border rounded-top bg-success">
              <div class="ps-3 text-white">Company Details</div>
            </div>
            <div class="p-3 border bg-light">
              <div class="mb-2">
                <label for="empid" class="form-label">Employee Id:</label>
                <input type="number" name="empid" class="form-control" id="empid">
              </div>
              <div class="mb-2">
                <label for="department" class="form-label">Department:</label>
                <input type="text" name="department" class="form-control" id="department">
              </div>
              <div class="mb-2">
                <label for="designation" class="form-label">Designation:</label>
                <input type="text" name="designation" class="form-control" id="designation">
              </div>
              <div class="mb-2">
                <label for="dobjoin" class="form-label">Date Of Joining:</label>
                <input type="date" name="doj" class="form-control" id="dobjoin">
              </div>
              <div class="mb-2 pb-3">
                <label for="joiningsalary" class="form-label">Joining Salary:</label>
                <input type="number" name="joiningsalary" class="form-control" id="joiningsalary">
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
  <div class="col py-4" style="margin-left:400px;">
    <button type="submit" name="addemp" class="btn btn-primary">Submit</button>
  </div>
  </form>
</body>