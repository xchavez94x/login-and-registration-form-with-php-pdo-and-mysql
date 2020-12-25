
<?php
error_reporting(0);
    require_once "controllers/Admin.php";
    require_once "config/config.php";

    $database = new DataBase() ;
    $admin = new Admin($database->getConnection());

    if(!empty($_POST['email']) && !empty($_POST['password']))
        {

            if(isset($_POST['btn']) && $_POST['btn'] == "btn-login")
                {
                    $res = $admin->login($_POST['email'] , $_POST['password']);
                    if($res[0]['email'] == $_POST['email'] && $res[0]['password'] == md5($_POST['password'])) {
                        $_SESSION['msg'] = "login successfull";
                        header("location:userpage.php");
                    } else {
                        $_SESSION['msg'] = "wrong info entered";

                    }


                }
        } else {
        $_SESSION['msg'] = "enter your info";
    }


?>
<?php include('views/header.php') ?>
    <?php include_once('views/navbar.php') ?>

<h1>Login</h1>
<h4><?= $_SESSION['msg'] ?></h4>
<?php unset($_SESSION['msg']) ?>
<form method="post">

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">email</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="Password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    
    <button type="submit" class="btn btn-primary" name="btn" value="btn-login">Submit</button>
</form>
<?php include('views/footer.php') ?>