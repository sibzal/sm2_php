<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="assets/js/main.js" defer></script>
    <title>Sign up</title>
</head>
<body>

    <header>
        <div class="container">
            <div class="header-content">
                <a href="https://github.com/sibzal/sm10.git" class="header-btn log_in">GitHub</a>
                <a href="#" class="header-btn sign_up">Log in</a>
            </div>
        </div>
    </header>

    <br><br>
    <main>
        <div class="container">
            <div class="sign_up">
                <h1>Sign up</h1>
                <div class="sign-up-content">
                    <form class="signForm" method="POST">
                        <label>Имя</label><br>
                        <input type="text" class="input inputName" name="name" value="<?=$name?>"><br>

                        <label>Email</label><br>
                        <input type="text" class="input inputYear" name="email" value="<?=$email?>"><br>

                        <label>Номер телефона</label><br>
                        <input type="number" class="input inputYear" name="phone_number" value="<?=$phone_number?>"><br><br>

                        <input type="submit" class="btn" value="Sign up" name="send"><br>
                        <div class="error errorSign"></div>
                    </form>
                    <?
                    if(isset($_POST['send'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone_number = $_POST['phone_number'];

                        function valName($name){
                            if(empty($name)){
                                return '<br><br><p class="error">Введите имя</p>';
                            }
                            if(strlen($name) <2 && strlen($name) > 20){
                                return '<br><br><p class="error">Неверная длина имени</p>';
                            }
                            return "";
                        }
                        
                        function valEmail($email){
                            if (empty($email)) {
                                return '<br><br><p class="error">Email не может быть пустым</p>';
                            }
                            if (strlen($email) < 3 || strlen($email) > 50) {
                                return '<br><br><p class="error">Неверная длина email</p>';
                            }
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                return '<br><br><p class="error">Неверный формат email</p>';
                            }
                            return "";
                        }

                        function valPhone($phone_number){
                            if (empty($phone_number)) {
                                return  '<p class="error">Номер телефона не может быть пустым</p>';
                            }
                            if (strlen($phone_number) != 11) {
                                return  '<p class="error">Неверное количество символов в номере телефона</p>';
                            }
                            return "";
                        }

                        $error = valName($name);
                        if (!empty($error)) {
                            echo $error;
                            return;
                        }

                        $error = valEmail($email);
                        if (!empty($error)) {
                            echo $error;
                            return;
                        }

                        $error = valPhone($phone_number);
                        if (!empty($phone_number)) {
                            echo $error;
                            return;
                        }
                        echo 'Форма успешно отправлена';

                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>