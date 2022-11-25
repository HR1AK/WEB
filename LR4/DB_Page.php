
<!--//подключаем бд-->
<?php
	session_start();
	require_once 'filtration_logic.php'
?>

<!DOCTYPE html>
<html>
    <head>
		<!--подключаем CSS-->
		<link href="CSS.css" rel="stylesheet" type="text/css">
		
		<!-- Кодировка веб-страницы -->
  		<meta charset="utf-8">
  		<!-- Настройка viewport -->
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		
  		<!-- Bootstrap CSS (jsDelivr CDN) -->
  		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  		<!-- Bootstrap Bundle JS (jsDelivr CDN) -->
  		<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title>Таблица из БД</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

    <body>
       <!--Шапка сайта-->
		<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm p-3 mb-5 bg-white rounded"> <!--Создается класс для шапки, говорим что шапка на всю страницу, светлая и прилипла к верху-->
			<div class="container-fluid mx-auto" style = "width: 95%;">
				<div class="row">
					<div class = "col-xs-12 col- col-lg-2 mb-2">
						<a href="index.php" class="navbar-brad w-75"><img src="images/sber-logo.png"></a>
					</div>
						
					<div class = "col-xs-12 col-lg-2 mb-2">
						<button class="oval navbarContent w-100" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
							<i class="fa fa-bars" style="color: white;"></i>
							<span style="color: white;">Каталог</span>
						</button>
					</div>
						
					<div class = "col-xs-12 col-lg-4 mb-2">
						<div class="input-group">
							<input class="form-control rounded-pill" type="search" value="search" id="example-search-input">
							<span class="input-group-append">
								<button class="btn rounded-pill border-0" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</div>
					
					
					<div class = "col-3 col-sm-3 col-lg-1">
						<?php
							if(isset($_SESSION['user']['email']))
							{
								?>
								<a href="logout.php" class="navbar-brad text-decoration-none text-reset">
									<img class="img-fluid mx-auto d-block w-25" src="images/profil_image.png">
									<div class = "text-center">Выйти</div>
								</a>
								<?php
							}
							else
							{
								?>
								<a href="Authorization.php" class="navbar-brad text-decoration-none text-reset">
									<img class="img-fluid mx-auto d-block w-25" src="images/profil_image.png">
									<div class = "text-center">Войти</div>
								</a>
								<?php
							}
						?>
					</div>

					<div class = "col-3 col-sm-3 col-lg-1">
						<a href="#" class="navbar-brad text-decoration-none text-reset">
							<img class="img-fluid mx-auto d-block w-25" src="images/order_image.png">
							<div class = "text-center">Заказы</div>
						</a>
					</div>

					<div class = "col-3 col-sm-3 col-lg-1">
					<?php
						if(isset($_SESSION['user']['email']))
						{
							?>
							<a href="DB_Page.php" class="navbar-brad text-decoration-none text-reset">
								<img class="img-fluid mx-auto d-block w-25" src="images/favorites_icon.png">
								<div class = "text-center">Избранное</div>
							</a>
							<?php
						}
						else
						{
							?>
							<a href="Authorization.php" class="navbar-brad text-decoration-none text-reset">
								<img class="img-fluid mx-auto d-block w-25" src="images/favorites_icon.png">
								<div class = "text-center">Избранное</div>
							</a>
							<?php
						}
						?>
					</div>

					<div class = "col-3 col-sm-3 col-lg-1">
						<a href="#" class="navbar-brad text-decoration-none text-reset">
							<img class="img-fluid mx-auto d-block w-25" src="images/korzina_image.png">
							<div class = "text-center">Корзина</div>
						</a>
					</div>
						
				</div>
			</div>
			<?php
				if(isset($_SESSION['user']['email']))
				{
					echo ' <p> ' . 'Вы вошли как '  . $_SESSION['user']['email'] . ' </p> ';
				}
				else
				{
					echo ' <p> ' . 'Вы не вошли' . ' </p> ';
				}
				unset($_SESSION['message']);
			?> 
		</nav>
        <!--Шапка всё-->



        <!--Таблица с базой данных-->
		<div class="container-fluid mx-auto" style="width: 95%;">
            <form action = "" method = "get">
                <input type = "text" name = "id_sort" placeholder = "Сортировка по номеру">
                <input type = "text" name = "name_sort" placeholder = "Сортировка по имени">
                
                <select name = "sport_sort2">
                    <option selected></option>
                    <option>Football</option>
                    <option>Formula 1</option>
                    <option>Basketball</option>
                    <option>Swimming</option>
                    <option>Athletics</option>
                </select>

                <p class = "mt-2">
                    <button type = "submit">Принять</button>
					<button type = "submit" name = "clear">Очистить</button>
                </p>
            <form>


            <table class = "table">
                <tr>
                    <th>Номер</th>
                    <th>Картинка</th>
                    <th>Имя спортсмена</th>
                    <th>Вид спорта</th>
                    <th>Описание</th>
                    <th>Дата</th>
                </tr>
                <!--заголовки таблицы-->				
                <?php
                    foreach($data as $data)
                    {
                        ?>
                    
                        <tr>
                            <th class = "col-1"><?= $data[0] ?></th>
                            <th class = "col-3">
                                <img style = "width: 250px; height: 170px" src="records_images/<?php echo $data[1] ?>" alt="">
                            </th>
                            <th class = "col-2"><?= $data[2] ?></th>
                            <th class = "col-1">
                                <?php echo $data[3]?>
                            </th>
                            <th class = "col-4"><?= $data[4] ?></th>
                            <th class = "col-1"><?= $data[5] ?></th>
                        </tr>

                        <?php
                    }
                ?>
            </table>
        </div>



        <!--Подвал сайта-->
        <footer id = "footer">
			<div class="row container-fluid mx-auto w-75">
				<div class="col col-lg-2 col-sm-12 mt-3">
					<div class = "mb-2">
						<p class = "bold_text">Маркетплейс</p>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">О компании</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Контакты</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Вакансии</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Реквизиты</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Партнерская программа</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Настоящий маркетплейс</a>
					</div>
				</div>


				<div class="col col-lg-2 col-sm-12 mt-3">
					<div class = "mb-2">
						<p class = "bold_text">Покупателю</p>
					</div>
					
					<div class = "mb-2">
						<a class = "link2 mb" href = "#">Помощь покупателю</a>
					</div>
					
					<div class = "mb-2">
						<a class = "link2" href = "#">Доставка</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Оплата</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Возврат</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Кредит</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Акции</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Промокоды</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">СберСпасибо</a>
					</div>
				</div>


				<div class="col col-lg-2 col-sm-12 mt-3">
					<div class = "mb-2">
						<p class = "bold_text">Магазинам</p>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Помощь магазинам</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Приглашение к сотрудничеству</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Вход в личный кабинет</a>
					</div>
				</div>


				<div class="col col-lg-3 col-sm-12 mt-3">
					<div class = "mb-2">
						<p class = "bold_text">Условия использования сайта</p>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Политика обработки персональных данных</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Условия заказа и доставки</a>
					</div>

					<div class = "mb-2">
						<a class = "link2" href = "#">Правила сервиса "закажи и забери"</a>
					</div>
				</div>


				<div class="col col-lg-3 col-sm-12 mt-3">
					<img src = "images/sber-logo.png">
					<div>
						&#169 2016-2022 "Маркетплейс" 
					</div>
				</div>
			</div>
		</footer>
        <!--Подвал сайта всё-->
    </body>
</html>