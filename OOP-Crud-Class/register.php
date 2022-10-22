<?php
// include('database.php');
// $db = new Database();

// INSERT
//$db->insert('category', ['title' => 'country']);
// echo "Insert New Record Having ID: ";
// print_r($db->getResult());
// echo "<br>";

// SELECT


// UPDATE
//$db->update('category', ['title' => 'islamabad'], 'id="11"');
// echo "Update Record Affected ID: ";
// print_r($db->getResult());
// echo "<br>";

// DELETE
// $db->delete('category', 'title="travel"');
// echo "Update Record Affected ID: ";
// print_r($db->getResult());
// echo "<br>";

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>PHP_OOP | Register</title>
</head>

<body>
    <section class="parent">
        <div class="childr text-dark">
            <h3 class="text-center"><b>REGISTER</b></h3>
            <form method="POST" action="process/registerProcess.php">
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fname">
                </div>
                <div class="mb-3">
                    <label>Mobile Number</label>
                    <input type="number" class="form-control" name="num">
                </div>
                <div class="mb-3">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass">
                </div>
                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="cpass">
                </div>
                <p>Already Have An Account ? <a href="index.php">Login</a></p>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>