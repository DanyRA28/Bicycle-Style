<!DOCTYPE html>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="libs/css/bootstrap.min.css" rel="stylesheet">

 
  <title>Bicycle Style</title>
  <link rel="icon" href="img/logo.png" type="image/x-icon">


</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<a class="navbar-brand" style="padding-right: 5px;" href="#"><span class="text-primary"><img src="img/logo.png" alt="logo" width="55"> Bicycle </span>Style </a> 
			<div class="collapse navbar-collapse" id="navbarhome">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="">Home</a>
					</li>
         
				</ul>
			</div>
		</div>
  </nav>

  <section id="home">
    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img alt="" class="d-block w-100" src="img/bike.jpg">
					<div class="carousel-caption" id="payWarning" style="top: 20%; bottom: initial;">
						<div class="alert alert-danger" role="alert">
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
								<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
							</svg>
						
						</div>
					</div>
          <div class="carousel-caption">
            <h5>Bienvenido a Bicycle Style</h5>
            <p>Gestión de Inventario en el Siguiente Botón:</p>
						<br>
						<a type="button" href="dashboard.php" class="btn btn-warning">Iniciar</a>
					</div>
        </div>
      </div>
    </div>
  </section>



	<section class="team section-padding" id="">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header text-center pb-5">
						<h2><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
							<path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
							<path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
						</svg> Desarrollador</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card text-center">
						<div class="card-body">
							<h3 class="card-title py-2">Daniel Rosales Armas</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<footer class="bg-dark p-4 text-center">
		<div class="container">
			<p class="text-white">Centro de Enseñanza Tecnica Industrial ©</p>
		</div>
	</footer>

</body>
</html>

<style>
 

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');
* {
	font-family: 'Century Gothic', sans-serif;
}

.team{
  background-color:lightsteelblue;
}

.navbar{
  height: 95px;
}
.section-padding {
	padding: 40px 0;
}
.carousel-item {
	height: 100vh;
	min-height: 300px;
}
.carousel-caption {
	bottom: initial;
	top: 40%;
	z-index: 2;
}

.carousel-caption h5 {
	font-size: 45px;
	text-transform: uppercase;
	margin-top: 25px;
}
.carousel-caption p {
	width: 60%;
	margin: auto;
	font-size: 18px;
	line-height: 1.9;
}
.carousel-inner:before {
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	background: rgba(0, 0, 0, 0.32);
	z-index: 1;
}

.navbar-nav a {
	font-size: 15px;
	text-transform: uppercase;
	font-weight: 500;
}
.navbar-light .navbar-brand {
	color: #000;
	font-size: 25px;
	text-transform: uppercase;
	font-weight: bold;
	letter-spacing: 0;
}
.navbar-light .navbar-brand:focus, .navbar-light .navbar-brand:hover {
	color: #000;
}
.navbar-light .navbar-nav .nav-link {
	color: #000;
}
.navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
	color: #000;
}
.w-100 {
	height: 100vh;
}
.navbar-toggler {
	padding: 1px 5px;
	font-size: 18px;
	line-height: 0.3;
	background: rgb(255, 255, 255);
}

.sharepoint .card {
	box-shadow: 15px 15px 40px rgba(0, 0, 0, 0.15);
}
.team .card {
	box-shadow: 15px 15px 40px rgba(0, 0, 0, 0.15);
}
.items .card-body i {
	font-size: 50px;
}
.team .card-body i {
	font-size: 20px;
}
#payWarning {display: none;}
  
</style>



<script type="text/javascript">
	
</script>