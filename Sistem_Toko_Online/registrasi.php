<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hmmm SHOP - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
    require_once 'connect.php';
    if (isset($_SESSION['is_login']) || isset($_COOKIE['_logged'])) {
        header('location:index.php');
    }

    if(isset($_POST['submit'])){
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $name = strip_tags($_POST['name']);
        $messages = [];

        if(empty($email) || empty($password) || empty($name)){
            $messages[] = 'Semua kolom harus diisi';
        } elseif(count((array) mysqli_query($connect, 'SELECT email FROM user WHERE email = "'.$email.'"')->fetch_array()) > 1){
            $messages[] = 'Email sudah terdaftar';
        } else {
            $insert = mysqli_query($connect, 'INSERT INTO user (email, password, name) VALUES ("'.$email.'", "'.password_hash($password, PASSWORD_BCRYPT).'", "'.$name.'")');
            if($insert){
                $messages[] = 'Registrasi berhasil';
            } else {
                $messages[] = 'Registrasi gagal';
            }
            
        }
        
    }


    ?>

    <div class="container">
        <div class="row" style="margin: 100px auto; width: 400px;">
            <div class="col-md-12" style="margin-bottom: 6px;">
                <?php
                    if (!empty($messages)) {
                        foreach ($messages as $message) {
                            echo '<b>Warning:</b> <span style="color:red;">.'.$message.'</span>';
                        }
                    }
                ?>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <div class="text-center">
                            <b>Register</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>