<?php 
    require_once('controllers/Admin.php');
    require_once('config/config.php');
    
    $config = new DataBase();
    $register = new Admin($config->getConnection());

    if(!empty($_POST))
        {
            if($_POST['password'] == $_POST['password_confirm']) {

                if(isset($_POST['btn']) && $_POST['btn'] == "btn-register")
                {
                        $register->Register($_POST['username'], $_POST['email'],$_POST['password'], $_POST['password_confirm']);
                        header("location: admin.php");
                        exit;
                    
                }
            } else {
                $message = "passwords are not identical";
                echo $message;
            }
            
        }
?>
    <?php include('views/header.php') ?>
    <?php include_once('views/navbar.php') ?>


    <h1>Registration</h1>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputPassword1" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirm">
        </div>
        <button type="submit" class="btn btn-primary" name="btn" value="btn-register">Submit</button>
    </form>

    <?php include('views/footer.php') ?>