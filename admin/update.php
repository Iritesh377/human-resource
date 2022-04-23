<?php
$title = "Update";
include_once('../inc/header.php');
include_once('../inc/db_conn.php');
if (isset($_GET['updateid'])) {
  $globalid = $_GET['updateid'];
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
} else {
  die("please provdie id top be updated ");
}

if (isset($_POST['updateemp'])) {
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
    $sql = "UPDATE `employeesdetails` SET `id`='$empid',`fullname`='$fullname',`fathername`='$fathername',`dob`='$dob',`gender`='$gender',`phone`='$phone',`fulladdress`='$fulladdress',`email`='$email' WHERE `id`=$globalid;";
    $sql1 = "UPDATE `empcompanydetails` SET `id`='$empid',`department`='$department',`designation`='$designation',`doj`='$doj',`joiningsalary`='$joiningsalary' WHERE `id`=$globalid;";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);

    mysqli_commit($conn);
    header("Location: addemployees.php?error=Employee Record Updated Succesfully");
    exit();
  } catch (mysqli_sql_exception $exception) {
    mysqli_rollback($conn);
    throw $exception;
    echo "Error";
  }
}
?>


<body>
  <div class="body-box" style="padding-top:100px;">
    <form action="update.php?updateid=<?php echo $globalid; ?>" method="POST">
      <div class="container px-4">
        <div>
          <center>
            <h2><?php echo $title ?></h2>
          </center>
          <div class="text-danger">
            <?php if (isset($_GET['error'])) { ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
          </div>
        </div>

        <div class="row row-cols-2">
          <div class="col">
            <div class="py-2 border rounded-top bg-primary">
              <div class="ps-3 text-white">Personal Details</div>
            </div>
            <div class="p-3 border bg-light">

              <div class="mb-2">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo $data['fullname']; ?>">
              </div>
              <div class="mb-2">
                <label for="fathername" class="form-label">Father's Name:</label>
                <input type="text" name="fathername" class="form-control" id="fathername" value="<?php echo $data['fathername']; ?>">
              </div>
              <div class="mb-2">
                <label for="dob" class="form-label">Date Of Birth:</label>
                <input type="date" name="dob" class="form-control" id="dob" value="<?php echo $data['dob']; ?>>
              </div>
              <div class=" input-group mb-2 py-1">
                <label class="input-group-text" for="gender">Gender:</label>
                <select name="gender" class="form-select" id="gender">
                  <option>Select...</option>
                  <option value="Male" <?php echo $data['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                  <option value="Female" <?php echo $data['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="phone" class="form-label">Phone:</label>
                <input type="number" name="phone" class="form-control" id="phone" value="<?php echo $data['phone']; ?>>
              </div>
              <div class=" mb-2">
                <label for="address" class="form-label">Full Address:</label>
                <input type="text" class="form-control" name="fulladdress" id="address" value="<?php echo $data['fulladdress']; ?>>
              </div>
              <div class=" mb-2">
                <label for="empemail" class="form-label">Email address:</label>
                <input type="email" class="form-control" name="email" id="empemail" value="<?php echo $data['email']; ?>">
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
                <input type="text" name="department" class="form-control" id="department" value="<?php echo $data2['department']; ?>">
              </div>
              <div class=" mb-2">
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
    <button type="submit" name="updateemp" class="btn btn-primary">Submit</button>
  </div>
  </form>

  </div>

  </div>

  </div>