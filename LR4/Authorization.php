<?php 
   session_start();
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
		<title>Авторизация и регистрация</title>
		
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
						<a href="Authorization.php" class="navbar-brad text-decoration-none text-reset">
							<img class="img-fluid mx-auto d-block w-25" src="images/profil_image.png">
							<div class = "text-center">Войти</div>
						</a>
					</div>

					<div class = "col-3 col-sm-3 col-lg-1">
						<a href="#" class="navbar-brad text-decoration-none text-reset">
							<img class="img-fluid mx-auto d-block w-25" src="images/order_image.png">
							<div class = "text-center">Заказы</div>
						</a>
					</div>

					<div class = "col-3 col-sm-3 col-lg-1">
						<a href="Authorization.php" class="navbar-brad text-decoration-none text-reset">
							<img class="img-fluid mx-auto d-block w-25" src="images/favorites_icon.png">
							<div class = "text-center">Избранное</div>
						</a>
					</div>

					<div class = "col-3 col-sm-3 col-lg-1">
						<a href="#" class="navbar-brad text-decoration-none text-reset">
							<img class="img-fluid mx-auto d-block w-25" src="images/korzina_image.png">
							<div class = "text-center">Корзина</div>
						</a>
					</div>
						
				</div>
			</div>
		</nav>
        <!--Шапка всё-->

        <div class = "register">
            <form action = "inc/signin.php" method = "post">
				<?php
                    if(isset($_SESSION['message']))
                    {
                        echo ' <p class="msg"> ' . $_SESSION['message'] . ' </p> ';
                    }
                    unset($_SESSION['message']);
                ?>    

                <label>Логин</label>
                <input type="text" name = "login" placeholder="Введите логин">
                <label>Пароль</label>
                <input style="margin-bottom: 10px;" name="password" type="password" placeholder="Введите пароль">
                <button  type = "submit" style="margin-bottom: 10px;">Войти</button>
                <p>
                    Нет аккаунта? - <a href="Reg.php">Зарегистрироваться</a>
                </p>
            </form>
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
