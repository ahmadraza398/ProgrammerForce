<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>PHP CRUD</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5"><b> LEARNING MANAGMENT SYSTEM</b></h1>
        <div class="row">
            <div class="col-md-10 offset-1 my-2">
                <a href="create.php" class="btn btn-sm btn-info my-2">Add</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Cnic</th>
                                <th scope="col">course</th>
                                <th scope="col">grades</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "conn.php";
                            // $sql="SELECT* FROM students";
                            $sql = "SELECT sid, sname, scontact, scnic, courses, grades FROM students
                             INNER JOIN courses ON students.cid = courses.cid
                             INNER JOIN grades ON students.gid = grades.gid";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?php echo  $row["sname"]; ?></td>
                                        <td><?php echo  $row["scontact"]; ?></td>
                                        <td><?php echo  $row["scnic"]; ?></td>
                                        <td><?php echo  $row["courses"]; ?></td>
                                        <td><?php echo  $row["grades"]; ?></td>
                                        <td><a href="edit.php?sid=<?php echo  $row["sid"]; ?>" class="btn btn-sm btn-warning">Edit</a></td>
                                        <td><a href="delete.php?sid=<?php echo  $row["sid"]; ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   <?php
   include_once"footer.php";
   ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>