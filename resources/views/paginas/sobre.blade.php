@extends('layouts.main')
@section('title','Sobre Nós')
@section('content')
    <div class="all-title-box">
		<div class="container text-center">
			<h1 style="color:rgb(254,239,14);background-color: rgba(137, 43, 226, 0.911); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">Complexo Escolar Privado Tia Lucinda<span class="m_1" style="color:rgb(220,226,240) ">O nosso foco é ensinar & forma novos quadros competentes!</span></h1>
		</div>
	</div>
	
    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Sobre o Colégio Tia Lucinda</h3>
                    <p class="lead">Somos uma referência em educação, oferecendo uma experiência acadêmica excepcional que combina excelência, valores humanos e uma abordagem inovadora.</p>
                </div>
            </div><!-- end title -->
                    @php 
                      $c = 1;
                    @endphp
        @foreach($sobrecontents as $sobre)
           @if($c == 1)
           <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                         {!! $sobre->text !!}
                        <a href="/sobre/like/{{$sobre->id}}" class="hover-btn-new orange"><span><i class="fa fa-thumbs-up" style="font-size:20px"></i>  {{$sobre->likes <= 1 ? $sobre->likes.' Gosto' : $sobre->likes.' Gostos'}}</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="{{$sobre->image}}" alt="Colégio Tia Lucinda" class="aboutImg img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
           @else
           <div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="{{$sobre->image}}" alt="Colégio Tia Lucinda" class="aboutImg img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        {!! $sobre->text !!}
                        <a href="/sobre/like/{{$sobre->id}}" class="hover-btn-new orange"><span><i class="fa fa-thumbs-up" style="font-size:20px"></i>  {{$sobre->likes <= 1 ? $sobre->likes.' Gosto' : $sobre->likes.' Gostos'}}</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
            </div><!-- end row -->
           @endif
            @php $c++; @endphp
        @endforeach    
        </div><!-- end container -->
    </div><!-- end section -->
    <div id="plan" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Níveis de Ensino <i class="fa flaticon-online"></i></h3>
                <p>O Colégio Tia Lucinda oferece uma educação abrangente, contemplando desde a iniciação até o ensino médio, com uma proposta pedagógica sólida e adaptada a cada etapa do desenvolvimento dos alunos.</p>
            </div><!-- end title -->
            <hr class="invis">

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">
                        <div class="tab-pane active fade show" id="tab1">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted tams">
                                        <div class="pricing-table-header grd1">
                                            <h2>Ensino Primário <i class="fa flaticon-study"></i></h2>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-book"></i> <strong>Iníciação / 2ᵃ</strong> Classe</p>
                                            <p><i class="fa fa-book"></i> <strong>3ᵃ & 4ᵃ </strong>Classe</p>
                                            <p><i class="fa fa-book"></i> <strong>5ᵃ & 6ᵃ </strong> Classe</p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="/fazer/inscricao/ensino_primário" class="hover-btn-new orange"><span><i class="fa fa-pencil" style="font-size:20px"></i> Inscrever se</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted tams">
                                        <div class="pricing-table-header grd1">
                                            <h2>Ensino Secundário <i class="fa flaticon-study"></i></h2>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-book"></i> <strong>7ᵃ</strong> Classe</p>
                                            <p><i class="fa fa-book"></i> <strong>8ᵃ </strong>Classe</p>
                                            <p><i class="fa fa-book"></i> <strong>9ᵃ </strong> Classe</p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="/fazer/inscricao/ensino_secundário" class="hover-btn-new orange"><span><i class="fa fa-pencil" style="font-size:20px"></i> Inscrever se</span></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="pricing-table pricing-table-highlighted tams">
                                        <div class="pricing-table-header grd1">
                                            <h2>Ensino Médio <i class="fa flaticon-study"></i></h2>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-book"></i> <strong>10ᵃ</strong> Classe</p>
                                            <p><i class="fa fa-book"></i> <strong>11ᵃ </strong>Classe</p>
                                            <p><i class="fa fa-book"></i> <strong>12ᵃ & 13ᵃ </strong> Classe</p>
                                        </div>
                                        <div class="pricing-table-sign-up">
                                            <a href="/fazer/inscricao/ensino_médio" class="hover-btn-new orange"><span><i class="fa fa-pencil" style="font-size:20px"></i> Inscrever se</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div><!-- end pane -->
                    </div><!-- end content -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	<div class="hmv-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv posIcon"><i class="flaticon-achievement"></i></div>
						<h3 class="text-center">Missão</h3>
						<div class="tr-pa">M</div>
						<p class="text-justify">{{$principio->missao}}</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv posIcon"><i class="flaticon-eye"></i></div>
						<h3 class="text-center">Visão</h3>
						<div class="tr-pa">V</div>
						<p class="text-justify">{{$principio->visao}}</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="inner-hmv">
						<div class="icon-box-hmv posIcon"><i class="flaticon-history"></i></div>
						<h3 class="text-center">Valores</h3>
						<div class="tr-pa">H</div>
						<p class="text-justify">Respeito pelos Alunos e professores na sua dimensão total.</p>
                        <p class="text-justify">{{$principio->valores}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach($colegios as $colegio)
                @include('modals.fichaInscricao')
				<div class="col-lg-3 col-md-6 col-12">
					<div class="our-team">
						<div class="team-img">
                            <img src="/images/logo.jpeg" width="400px" height="400px">
							<div class="social">
                                <a href="#" data-toggle="modal" data-target="#descricaColegio{{$colegio->id}}" class="hover-btn-new orange"><span><i class="fa fa-home" style="font-size:20px"></i> Ver Detalhes</span></a>
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