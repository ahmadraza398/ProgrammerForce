<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP CRUD</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5"><b>LEARNING MANAGMENT SYSTEM  | EDIT</b></h1>
        <div class="row">
            <div class="col-md-6 offset-3 my-2">
                <?php
                include "conn.php";
                $sid = $_GET['sid'];
                $sql = "SELECT * FROM students WHERE sid = $sid";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <form action="editProcess.php?sid=<?php echo  $row["sid"]; ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Fullname</label>
                        <input type="text" class="form-control" name="sname" value="<?php echo $row['sname'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact</label>
                        <input type="text" class="form-control" name="scontact" value="<?php echo $row['scontact'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cnic</label>
                        <input type="text" class="form-control" name="scnic" value="<?php echo $row['scnic'] ?>" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">course</label>
                        <input type="text" class="form-control" name="course" value="<?php echo $row['cid'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">grades</label>
                        <input type="text" class="form-control" name="grades" value="<?php echo $row['gid'] ?>" required>
                    </div> -->
                    <!-- <input type="submit" name="submit" class="btn btn-sm btn-primary"> -->
                    <select class="form-select " name="courses">
                        <option selected>Courses</option>
                        <?php
                        include "conn.php";
                        $sql = "SELECT * FROM courses";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $value) {
                        ?>
                                <option value="<?= $value['cid']; ?>"><?= $value['courses']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <select class="form-select mt-3" name="grades">
                        <option selected>Grades</option>
                        <?php
                        include "conn.php";
                        $sql = "SELECT * FROM grades";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $value) {
                        ?>
                                <option value="<?= $value['gid']; ?>"><?= $value['grades']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" name="submit" class="btn btn-sm btn-primary mt-3">
                </form>
            </div>
            <a href="index.php" class="btn btn-sm btn-info my-2">Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>