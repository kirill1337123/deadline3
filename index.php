<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Game on Reaction</title>
  <link rel="stylesheet" href="css-main.css">
</head>
<body>
  <form class="form-title">
    <h1 class = "title">Game Reaction</h1>
  </form>
  <form class="form-registration">
    <div class="registration-enter">
      <?php require "db.php" ?>
    <p><a href="/autent.php" class="enter">Вход</a></p>
    <p><a href="/registration.php" class="registration" >Регистрация</a></p>
  </div>
   </form>
   <h1 class = "add"></h1>
   <div class="main-menu">
    <div class="rules-and-record">
  <form class="form-rules">
    <h4 class="rules-title">ПРАВИЛА</h4>
    <h5 class="rules-info"> После начала игры, через секунду, на игровом поле будут загораться разные ячейки. Ваша задача быстро и поочередно нажимать на каждую, для определения вашей скорости реакции. Чтобы ваш рекорд записывался, необходимо зарегистрироваться или войти в существующий аккаунт.</h5>
  </form>
  <form class="form-record">
    <h1 class="record-game-title">РЕКОРД ИГРЫ<span class="smailik">&#127919</span></h1>
    <h1 class="record-game-score" id="timer">0.001 sec</h1>
  </form>
</div>
<div class="table-and-button">
  <section>
    <table id="table-game-id" class="table-game"></table>

  </section>
  <div class="buttons">
  <input type="button" id="button-start-game" value="СТАРТ" class="button-start">
  <input type="button" id="button-restart-game" value="ЗАНОВО" class="button-restart" disabled>
  </div>
</div>
<div class="results-and-img">
  <form class="form-your-results">
    <h1 class="your-results-title"><span class="smailik">&#127775</span>ЛУЧШИЙ РЕЗУЛЬТАТ<span class="smailik">&#127775</span></h1>
    <h1 class="your-results-score" id="your-results-score"></h1>
  </form>
  <form class="form-result-account">
    <h1 class="result-account-title">РЕЗУЛЬТАТ<span class="smailik">&#127884</span></h1>
    <h1 class="result-account-count" id="result-account-count"></h1>
  </form>
  <form class="title-img">
  <h1 class="butterfly">Butterfly</h1>
  <p><img class="border-img" src="but.jpg" alt="Тут должна быть бабочка :(" width="270" class="img"></p>
  </form>
</div>
<form name=MyForm class="timer">
  <input name=stopwatch size=10 value="00:00:00.00" disabled>
</form>
<script type="text/javascript" src="gamereaction.js"></script>
</body>
</html>
