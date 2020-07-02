
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUTnet</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="chieps-field"></div>
    <form class="main-form">
        <div class="input-wrap">
            <label for="name">Имя</label>
            <input type="text" id="name" class="name-input" name="name">
        </div>
        <div class="input-wrap">
            <label for="lastname">Фамилия</label>
            <input type="text" id="lastname" class="lastname-input" name="lastname">
        </div>
        <div class="input-wrap">
            <label for="age">Возраст</label>
            <input type="number" id="age" class="age-input" name="age">
        </div>        
        <button type="submit" class="btn btn-save">Сохранить</button>
        <button type="submit" class="btn btn-load">Выгрузить</button>        
    </form>
</div>
    
    <script src="js/script.js"></script>
</body>
</html>