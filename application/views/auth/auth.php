<?php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Вход | ПЕРСОНА</title>
    <link href="<?php echo base_url(); ?>assets/fonts/stylesheet.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<section id="Login">
    <div>
        <div class="wrp cntr cntr-itms">
            <div class="w-6-12 cntr-txt">
                <h2 class="bot-mrgn-ult">Вход</h2>
                <form autocomplete="off" action="<?php echo base_url(); ?>auth/login" method="post" accept-charset="utf-8">
                    <div class="input-group">
                        <label>Ваш логин:</label>
                        <input type="text" name="login" placeholder="user" required>
                    </div>
                    <div class="input-group">
                        <label>Ваш пароль:</label>
                        <input type="password" name="password" placeholder="****" required>
                    </div>
                    <input type="submit" value="Войти">
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
