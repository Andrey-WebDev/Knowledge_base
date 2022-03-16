<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Front site</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="icon/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

	
	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>

	<!-- BOOTSTRAP JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP JS -->

	<script type="text/javascript" src="script.js"></script>

</head>
<body>
	<div class="row">
		<nav class="col-md-2" id="menu">
			<div class="site_logo">
				<a href="#ex1">
					<img src="https://avilon.ru/local/templates/main_avilon/assets/img/logo.png">
				</a>
			</div>
			<a href="#ex1" class="btn left_menu_btn"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;Главная</a>
			<!-- <form>
				<div class="search input-group mb-3">
						<input type="text" name="search" placeholder="Введите Ваш запрос" class="form-control">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary">Найти</button>
						</div>
				</div>
			</form> -->
			<a href="#ex2" class="btn left_menu_btn"><i class="fas fa-car" aria-hidden="true"></i>&nbsp;&nbsp;Отдел продаж</a>

			<a href="#ex3" class="btn left_menu_btn"><i class="fas fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;Отдел сервиса</a>

			<a href="#ex4" class="btn left_menu_btn"><i class="fas fa-tools" aria-hidden="true"></i>&nbsp;&nbsp;ОЗЧ</a>

			<a href="#ex5" class="btn left_menu_btn"><i class="fas fa-car-crash" aria-hidden="true"></i>&nbsp;&nbsp;ОУУ</a>

			<a href="#ex6" class="btn left_menu_btn"><i class="fas fa-taxi" aria-hidden="true"></i>&nbsp;&nbsp;СОЛТ</a>

			<a href="#ex7" class="btn left_menu_btn"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;&nbsp;Страхование/Кредитование</a>

			<div class="soc_btn">
				<span><i class="fas fa-info" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Корпоративный портал"></i></span>
				<span><i class="fab fa-jira" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Jira"></i></span>
				<span><i class="fas fa-project-diagram" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Статистика звонков"></i></span>
				<span><i class="fa fa-envelope" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Вопрос по БЗ"></i></span>
			</div>
			<div class="copy">
				<span>&copy;Andrey Vashchenko</span>
			</div>
		</nav>
		<main class="col-md-10">
			<div id="content">

				<div class="separator"></div>

			    <section id="ex1">
			        <?include 'include/main.php';?>
			    </section>

			    <div class="separator"></div>

			    <section id="ex2">
			    	<h2>Отдел продаж</h2>
			        <?include 'include/sale.php';?>
			    </section>

			    <div class="separator"></div>

			    <section id="ex3">
			    	<h2>Ремонт автомобилей</h2>
			        <?include 'include/repair.php';?>
			    </section>

			    <div class="separator"></div>

			    <section id="ex4">
			    	<h2>ОЗЧ</h2>
			        <?include 'include/parts.php';?>
			    </section>

			    <div class="separator"></div>

			    <section id="ex5">
			    	<h2>ОУУ</h2>
			        <?include 'include/insurance_claims.php';?>
			    </section>

			    <div class="separator"></div>

			    <section id="ex6">
			    	<h2>СОЛТ</h2>
			        <?include 'include/solt.php';?>
			    </section>

			    <div class="separator"></div>

			    <section id="ex7">
			    	<h2>Страхование/Кредитование</h2>
			        <?include 'include/credit_insurance.php';?>
			    </section>
			</div>
		</main>
	</div>
</body>

</html>