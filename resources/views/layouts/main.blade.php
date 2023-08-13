<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title> @yield('title') </title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/images/logo.jpeg" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/images/logo.jpeg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/custom.css">

	<link href="/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Modernizer for Portfolio -->
    <script src="/js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Formulário de Login</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Aluno (a) <i class="flaticon-study" style="font-size: 22px;"></i></a></li>
					<li><a href="#Registration" data-toggle="tab">Professor (a) <i class="flaticon-online" style="font-size: 22px;"></i></a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email1" placeholder="Número de Processo" type="number">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Palavra Passe" type="password">
								</div>
							</div>
							<div class="row text-center">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1" width="100%">
										Iniciar Sessão
									</button>
									<a class="for-pwd" href="javascript:;">Esqueceu sua palavra passe?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email1" placeholder="Número de funcionário" type="number">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Palavra Passe" type="password">
								</div>
							</div>
							<div class="row text-center">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Iniciar Sessão
									</button>
									<a class="for-pwd" href="javascript:;">Esqueceu sua palavra passe?</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="/">
					<img src="/images/logo.jpeg" alt="" class="logo-main"/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item {{$pagina == 'home' ? 'active' : ''}}"><a class="nav-link" href="/">Home</a></li>
						<li class="nav-item {{$pagina == 'sobre' ? 'active' : ''}}"><a class="nav-link" href="/sobre">Sobre Nós</a></li>
						<li class="nav-item dropdown {{$pagina == 'cursos' ? 'active' : ''}}">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Curso Médio</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="/curso/enfermagem">Enfermagem</a>
                                <a class="dropdown-item" href="/curso/analises_clinicas">Análises Clinícas</a>
								<a class="dropdown-item" href="/curso/informatica">Informática</a>
                                <a class="dropdown-item" href="/curso/construção_cívil_&_eletricidade">Construção Cívil & Eletricidade</a>
                                <a class="dropdown-item" href="/curso/finança">Finança</a>
								<a class="dropdown-item" href="/curso/contabílidade_&_gestão">Contabílidade & Gestão</a>
								<a class="dropdown-item" href="/curso/recursos_humanos">Recursos Humanos</a>
								<a class="dropdown-item" href="/curso/ciências_físicas_&_biologicas"> Ciências Físicas & Biológicas</a>
								<a class="dropdown-item" href="/curso/ciências_económicas_&_jurídicas"> Ciências Económicas & Jurídicas</a>
							</div>
						</li>
						<li class="nav-item {{$pagina == 'noticia' ? 'active' : ''}}"><a class="nav-link" href="/noticias">Notícias</a></li>
						<li class="nav-item {{$pagina == 'galeria' ? 'active' : ''}}"><a class="nav-link" href="/nossa/galeria">Galéria</a></li>
						<li class="nav-item {{$pagina == 'precos' ? 'active' : ''}}"><a class="nav-link" href="/nossos/precos">Preçarios</a></li>
						<li class="nav-item {{$pagina == 'contactos' ? 'active' : ''}}"><a class="nav-link" href="/contactos">Contactos</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a id="btnini" class="hover-btn-new log" href="#" data-toggle="modal" data-target="#login"><span>Fazer Login <i class="fa fa-lock"></i></span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
          @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Sobre Nós</h3>
                        </div>
                        <p class="text-justify"> O Colégio Tia Lucinda é uma instituição de renome que oferece educação de excelência, abrangendo desde a iniciação até o ensino médio, além de cursos profissionais. Com uma equipe apaixonada pela educação, proporcionamos um ambiente acolhedor e estimulante, onde os alunos são incentivados a explorar seu potencial máximo. N</p>   
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Links de Informação</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="/">Home</a></li>
                            <li><a href="/sobre">Sobre Nós</a></li>
                            <li><a href="/noticias">Noticías</a></li>
							<li><a href="/nossos/precos">Preçarios</a></li>
							<li><a href="/contactos">Contactos</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Detalhes de Contactos</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto: info@colegiotialucinda.ao">info@colegiotialucinda.ao</a></li>
                            <li><a href="#">www.colegiotialucinda.ao</a></li>
                            <li>Futungo ll, Belas, Luanda</li>
                            <li>+244 923 506 512</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">Colégio Tia Lucinda. &copy; 2023 <a href="#">O nosso foco é ensinar e forma novos quadros competentes</a> Criado Por : <a href="">Kuzolatechnology</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/js/custom.js"></script>
	<script src="/js/timeline.min.js"></script>
	<script src="/lightbox/js/lightbox.min.js"></script>

	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>