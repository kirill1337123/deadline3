<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-input.css">
    <title>GoR - Вход</title>
</head>
<body>
    <div class="form-title">
        <h1 class = "title">Game Reaction</h1>
    </div>
    <div class="form-input">
      <form action="autent.php" method="POST">
      <?php 
        require "db.php"; 
        $data = $_POST; 
        ?>
        <div class="input-title-form">
        <h4 class="input-title">Авторизация</h4>
        </div>
        <div class="input-data-border">
            <div class="input-data-border-wo-button">
                <div class="input-data-login">
                    <h5 class="input-data-login-title">Логин:</h5>
                    <input type="text" name="login" class="input-data-login-field" 
                    value="<?php echo $data['login']; ?>"></input>
                </div>
                <div class="input-data-password">
                    <h5 class="input-data-password-title">Пароль:</h5>
                    <input type="password" name="password" class="input-data-password-field" 
                    value="<?php echo @$data['password']; ?>"></input>
                </div>  
            </div>
            <?php 
            
            if(isset($data['do_back']))
                header('Location: /index.php');

            

            if(isset($data['do_log']))
            {
                $errors = array();
                $user = R::findOne('users', 'login = ?', array($data['login']));
                if($user){
                    // login est'
                    if(password_verify($data['password'], $user->password)){
                        $_SESSION['logged_user'] = $user;
                        header('Location: /game-w-login.php');
                    }
                    else{
                        $errors[] = 'Неверно введен пароль!';
                    }
                }
                else{
                    $errors[] = 'Пользователь с таким логином не найден!';
                }
            }

            if(!empty($errors))
                {
                    echo '<div style="
                    background-color: #333391; 
                    height: 55px; 
                    font-family: Courier New, monospace;
                    font-size: 1.2em;
                    text-align: center;
                    color: #7fffd4;">[Ошибка]: '.array_shift($errors).'</div>';
                }  
                
            
            ?>
            <div class="input-data-border-w-button">
                <form class="form-main-game">
                <p><button class="main-game" type="submit" name="do_back">Вернуться</button></p>
                <p><button class="main-game" type="submit" name="do_log">Вход</button></p>
            </form>
            </div>
        </div>
      </form>
    </div>
</body>
</html>