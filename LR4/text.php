<?php
	require_once "text_logic.php";
?>

<!DOCTYPE html>
<html>
    <head>
		<!--подключаем CSS-->
		<link href="CSS.css" rel="stylesheet" type="text/css">
        <link href="AuthorizationCss.css" rel="stylesheet" type="text/css">
		<!-- Кодировка веб-страницы -->
  		<meta charset="utf-8">
  		<!-- Настройка viewport -->
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		
  		<!-- Bootstrap CSS (jsDelivr CDN) -->
  		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  		<!-- Bootstrap Bundle JS (jsDelivr CDN) -->
  		<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title>Текст 0_____0</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    
    <body>
        <form style= "margin: 10px;" action="" method="post" >
            <textarea name = "text" rows="20" cols="100">
				<?=$text?>
			</textarea>
			<button>Отправить</button>
        </form>

		<div><?=$text?></div>

		<div><?=$MyObject->NEW_TASK()?></div>

		<p>Задание 17</p>
		<div><?=$MyObject->TASK17()?></div>

		<p>Задание 3</p>
		<div><?=$MyObject->TASK3()?></div>

		<p>Задание 7</p>
		<div><?=$MyObject->TASK7()?></div>

		<p>Задание 11</p>
		<div>
			<ol>
				<?=$MyObject->TASK11()?>
			</ol>
		</div>
		
    </body>
</html>