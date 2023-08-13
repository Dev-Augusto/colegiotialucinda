@extends('layouts.main')
@section('title','Curso de '.$curso)
@section('content')
    <div class="all-title-box">
		<div class="container text-center">
			<h1 style="color:rgb(254,239,14);background-color: rgba(137, 43, 226, 0.911); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">Complexo Escolar Privado Tia Lucinda<span class="m_1" style="color:rgb(220,226,240) ">Curso de {{$curso}} </span></h1>
		</div>
	</div>
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Descubra uma variedade de cursos especializados no Colégio Tia Lucinda, desenvolvidos para promover o aprendizado prático e o crescimento profissional dos alunos. Explore nossos cursos e adquira conhecimentos relevantes e atualizados para um futuro de sucesso!</p>
                </div>
            </div><!-- end title -->

            <hr class="invis"> 

            <div class="row"> 
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="course-item">
						<div class="image-blog">
							<img src="{{$about->image_professores}}" alt="" class="img-fluid imgAbouCourse">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="#" title="">Formadores</a></h2>
							</div>
							<div class="course-desc aboutCurso">
								{!! $about->content_professores !!}
							</div>
							<div class="course-rating">
								5
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li><i class="fa fa-users" aria-hidden="true"></i> {{$about->matriculados}} Matrículados</li>
								<li><i class="fa flaticon-online" aria-hidden="true"></i> {{$about->formados}} Formados</li>
								<li><i class="fa fa-file" aria-hidden="true"></i> {{$about->vagas}} Vagas Para Inscrição</li>
							</ul>
						</div>
					</div>
                </div><!-- end col -->

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="course-item">
						<div class="image-blog">
							<img src="{{$about->image_estudantes}}" alt="" class="img-fluid imgAbouCourse">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="#" title="">Estudantes</a></h2>
							</div>
							<div class="blog-desc aboutCurso">
								{!! $about->content_estudantes !!}
							</div>
							<div class="course-rating">
								5
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li><i class="fa fa-users" aria-hidden="true"></i> {{$about->matriculados}} Matrículados</li>
								<li><i class="fa flaticon-online" aria-hidden="true"></i> {{$about->formados}} Formados</li>
								<li><i class="fa fa-file" aria-hidden="true"></i> {{$about->vagas}} Vagas Para Inscrição</li>
							</ul>
						</div>
					</div>
                </div><!-- end col -->	
            </div><!-- end row -->
			
			<hr class="hr3"> 
			
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
                    <div class="course-item">
						<div class="image-blog">
							<img src="{{$about->image_estagios}}" alt="" class="img-fluid imgAbouCourse">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="#" title="">Planos de Estágios</a></h2>
							</div>
							<div class="course-desc aboutCurso">
								{!! $about->content_estagios !!}
							</div>
							<div class="course-rating">
								5
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li><i class="fa fa-users" aria-hidden="true"></i> {{$about->matriculados}} Matrículados</li>
								<li><i class="fa flaticon-online" aria-hidden="true"></i> {{$about->formados}} Formados</li>
								<li><i class="fa fa-file" aria-hidden="true"></i> {{$about->vagas}} Vagas Para Inscrição</li>
							</ul>
						</div>
					</div>
                </div><!-- end col -->
				<div class="col-lg-6 col-md-6 col-12">
                   <div class="course-item">
						<div class="image-blog">
							<img src="{{$about->image_actividade}}" alt="" class="img-fluid imgAbouCourse">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="#" title="">Actividades Escolares</a></h2>
							</div>
							<div class="course-desc aboutCurso">
								{!! $about->content_actividade !!}
							</div>
							<div class="course-rating">
								5
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
								<i class="fa fa-star"></i>	
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li><i class="fa fa-users" aria-hidden="true"></i> {{$about->matriculados}} Matrículados</li>
								<li><i class="fa flaticon-online" aria-hidden="true"></i> {{$about->formados}} Formados</li>
								<li><i class="fa fa-file" aria-hidden="true"></i> {{$about->vagas}} Vagas Para Inscrição</li>
							</ul>
						</div>
					</div>
                </div><!-- end col -->
			</div><!-- end row -->
			
			<hr class="hr3"> 
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	<section class="section">
        <div class="container">
            <div class="row">
                @foreach($colegios as $colegio)
				<div class="col-lg-3 col-md-6 col-12">
					<div class="our-team">
						<div class="team-img">
                            <img src="/images/logo.jpeg">
							<div class="social">
								<a href="/fazer/inscricao/ensino_médio" class="hover-btn-new orange"><span><i class="fa fa-pencil" style="font-size:20px"></i> Fazer Inscrição</span></a>
							</div>
						</div>
						<div class="team-content">
							<h3 class="title">{{$colegio->name}}</h3>
							<span class="post">{{$colegio->localidade}}</span>
						</div>
					</div>
				</div>
                @endforeach
            </div><!-- end row -->
        </div>
    </section>

@endsection