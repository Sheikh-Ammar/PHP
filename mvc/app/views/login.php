<?php include("layouts/header.php"); ?>





<?php
$this->getMessages("error", "alert alert-danger");
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4 mt-5">
            <h3 class="my-3">LOGIN | PANNEL</h3>
            <form action="<?= BASEURL ?>/LoginController/checkUser" method="POST">
                <div class="mb-3">
                    <label class="form-label">Enter Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Enter Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Login">
            </form>
        </div>
    </div>
</div>

<?php include("layouts/footer.php"); ?>