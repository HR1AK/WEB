<html>
    <head>

		<!-- Кодировка веб-страницы -->
  		<meta charset="utf-8">
  		<!-- Настройка viewport -->
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		
  		<!-- Bootstrap CSS (jsDelivr CDN) -->
  		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  		<!-- Bootstrap Bundle JS (jsDelivr CDN) -->
  		<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title>Добавление пользователя</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div style = "margin: 10">
            <form action = "create_logic.php" method = 'post' enctype="multipart/form-data">
                <p>Картинка</p>
                <input type="file" name='img_path'>

                <p>Полное имя</p>
                <input type = 'text' name = 'full_name'>

                <p>Вид спорта</p>
                <input type = 'text' name = 'sport'>

                <p>Описание</p>
                <input type = 'text' name = 'description'>

                <p>Дата</p>
                <input type = 'text' name = 'date'><br><br>

                <button type = "submit"> Добавить пользователя</button>
            </form>
        </div>
    </body>
</html>