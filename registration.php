<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-registration.css">
    <title>GoR - Регистрация</title>
</head>
<body>
    <div class="form-title">
        <h1 class = "title">Game Reaction</h1>
    </div>
    <div class="form-registration">
      <form action = "registration.php" method="POST">
        <?php 
        require "db.php"; 
        $data = $_POST; 
        ?>
        <div class="registration-title-form">
        <h4 class="registration-title">Регистрация</h4>
        </div>
        <div class="registration-data-border">
            <div class="registration-data-border-wo-button">
                <div class="registration-data-login">
                    <h5 class="registration-data-login-title">Логин:</h5>
                    <input type="text" name="login" class="registration-data-login-field" 
                    value="<?php echo $data['login']; ?>"></input>
                </div>
                <div class="registration-data-password">
                    <h5 class="registration-data-password-title">Пароль:</h5>
                    <input type="password" name="password" class="registration-data-password-field" 
                    value="<?php echo @$data['password']; ?>"></input>
                </div>
                <div class="registration-data-email">
                    <h5 class="registration-data-email-title">Почта:</h5>
                    <input type="email" name="email" class="registration-data-email-field"
                    value="<?php echo @$data['email']; ?>"></input>
                </div>
                
            </div>
            <?php 
            
            if(isset($data['do_back']))
                header('Location: /index.php');

            if(isset($data['do_reg']))
            {
                $errors = array();
                if(trim($data['login']) == '')
                    $errors[] = 'Введите логин!';
                if($data['password'] == '')
                    $errors[] = 'Введите пароль!';
                if(trim($data['email']) == '')
                    $errors[] = 'Введите почту!';
                if(R::count('users', "login = ?", array($data['login'])) > 0)
                    $errors[] = 'Пользователь с таким логином уже существует!';
                if(R::count('users', "email = ?", array($data['email'])) > 0)
                    $errors[] = 'Пользователь с такой почтой уже существует!';    
                if(empty($errors))
                {
                    $user = R::dispense('users');
                    $user->login = $data['login'];
                    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
                    $user->email = $data['email'];
                    $user->score = '-1';
                    R::store($user);
                    $_SESSION['logged_user'] = $user;
                    header('Location: /game-w-login.php');
                    //echo '<div style="color:green;">Вы успешно зарегистрировались!</div>';
                }  
                else{
                    echo '<div style="
                    background-color: #333391; 
                    height: 55px; 
                    font-family: Courier New, monospace;
                    font-size: 1.2em;
                    text-align: center;
                    color: #7fffd4;">[Ошибка]: '.array_shift($errors).'</div>';
                }  
            }
            
            ?>
            <div class="registration-data-border-w-button">
                
                <p><button class="main-game" type="submit" name="do_back">Вернуться</button></p>
                <p><button class="main-game" type="submit" name="do_reg">Зарегистрироваться</button></p>
            </div>
        </div>
      </form>
    </div>
</body>
</html>

