@extends('layouts.main')
@section('title', 'Colégio Tia Lucinda')
@section('content')
<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
            @php 
               $c = 1;
            @endphp
            @foreach($slides as $slider)
            @php 
               $c == 1 ? $class = 'active' : $class = '';
            @endphp
			<div class="carousel-item {{$class}}">
				<div id="home" class="first-section" style="background-image:url('{{$slider->image}}');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2>{{substr($slider->title, 0, 16)}}<strong>{{substr($slider->title, 16,strlen($slider->title))}}</strong></h2>

										<p class="lead">{{$slider->content}}</p>
											<a href="{{$slider->link1}}" class="hover-btn-new"><span>{{$slider->nameBtn1}}</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="{{$slider->link2}}" class="hover-btn-new"><span>{{$slider->nameBtn2}}</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
            @php $c++; @endphp
            @endforeach
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" id="seta1" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" id="seta2" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
    <div class="section cl">
		<div class="container">
			<div class="row text-left stat-wrap">
				<div class="estatis col-md-3 col-sm-3 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-study"></i></span>
					<p class="stat_count">{{$balance->alunos}}</p>
					<h3>Estudantes</h3>
				</div><!-- end col -->

				<div class="estatis col-md-3 col-sm-3 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
					<p class="stat_count">{{$balance->cursos}}</p>
					<h3>Cursos Ministrados </h3>
				</div><!-- end col -->

				<div class="estatis col-md-3 col-sm-3 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="fa fa-home"></i></span>
					<p class="stat_count">{{$balance->institutos}}</p>
					<h3>Instituiçoes Construídas</h3>
				</div><!-- end col -->
                <div class="estatis col-md-3 col-sm-3 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="fa fa-users"></i></span>
					<p class="stat_count">{{$balance->formados}}</p>
					<h3>Profissionaís Formados</h3>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Últimas Novas</h3>
                    <p class="lead">Descubra as últimas novidades do Colégio Tia Lucinda: tecnologia avançada e metodologias inovadoras que elevam a experiência educacional a um patamar superior!</p>
                </div>
            </div><!-- end title -->
            @foreach($destaques as $destaque)
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>{{$destaque->title}}</h2>
                        {!! $destaque->content !!}
                        <a href="/noticia/{{$destaque->id}}/ler" class="hover-btn-new orange"><span> Ler mais</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="{{$destaque->image}}" alt="{{$destaque->title}}" class="aboutImg img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
            @endforeach
        </div><!-- end container -->
    </div><!-- end section -->
   <section class="section">
          <div class="container videomarke">
			<iframe  src="https://www.youtube.com/embed/VCPGMjCW0is" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
		  </div>
   </section>
    <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Metas Alcançadas</h3>
                    <p class="lead">Orgulhosamente, o Colégio Tia Lucinda celebra a conquista de metas educacionais, proporcionando aos alunos uma educação de excelência e preparando-os para um futuro brilhante!</p>
                </div>
            </div><!-- end title -->
			<div class="timeline">
				<div class="timeline__wrap">
					<div class="timeline__items">
                        @php 
                         $i = 1;
                        @endphp
                        @foreach($timelines as $timeline)
                        @php 
                          $i == 4 ? $i = 1 : $i = $i; 
                        @endphp
						<div class="timeline__item">
							<div class="timeline__content img-bg-0{{$i}}">
								<h2>{{date('Y',strtotime($timeline->year))}}</h2>
								<p class="text-center">{{$timeline->content}}</p>
							</div>
						</div>
                        @php $i++; @endphp
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</section>


    <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('/images/slider-03.jpg');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Testemunhos de Encarregados</h3>
                <p>Descubra o que os encarregados de educação estão dizendo sobre o Colégio Tia Lucinda: uma instituição de excelência que transforma vidas por meio de uma educação de qualidade, valores humanos e um ambiente acolhedor que estimula o crescimento integral dos alunos.</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="testi-carousel owl-carousel owl-theme">
                        @foreach($testemunhos as $testemunho)
                        <div class="testimonial clearfix">
							<div class="testi-meta">
                                <img src="/images/logo.jpeg" alt="" class="img-fluid">
                                <h4>{{$testemunho->name}}</h4>
                            </div>
                            <div class="desc">
                                <h3><i class="fa fa-quote-left"></i> {{$testemunho->objectivo}}</h3>
                                <p class="lead">{{$testemunho->content}}</p>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <!-- end testimonial -->
                        @endforeach
                    </div><!-- end carousel -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection