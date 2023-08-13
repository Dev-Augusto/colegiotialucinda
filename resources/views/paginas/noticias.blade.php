@extends('layouts.main')
@section('title','Nossas Novidades')
@section('content')
<div class="all-title-box">
		<div class="container text-center">
			<h1 style="color:rgb(254,239,14);background-color: rgba(137, 43, 226, 0.911); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">Complexo Escolar Privado Tia Lucinda<span class="m_1" style="color:rgb(220,226,240) ">Nossas Notícias, Esteja Informado & Actualizado Sobre o Nosso Colégio!</span></h1>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Continue acompanhando nossas notícias e junte-se a nós em nossa jornada de crescimento e sucesso educacional.</p>
                </div>
            </div><!-- end title -->

			   <div class="col-lg-12 col-12 right-single">
			       <div class="widget-search">
						<div class="site-search-area">
							<form method="get" id="site-searchform" action="#">
								<div>
									<input class="input-text form-control" name="pesquisar" id="search" placeholder="Pesquisar Notícias" type="text">
									<input id="searchsubmit" value="Search" type="submit">
								</div>
							</form>
						</div>
					</div>
			    </div>
            <hr class="invis"> 

            <div class="row"> 
			  @if(isset($search) && !empty($search))
			      @if(count($noticias))
				    @foreach($noticias as $noticia)
						<div class="col-lg-4 col-md-6 col-12">
							<div class="blog-item">
								<div class="image-blog">
									<img src="{{$noticia->image}}" alt="{{$noticia->title}}" class="img-fluid noticaImage">
								</div>
								<div class="meta-info-blog">
									<span><i class="fa fa-calendar"></i> <a href="#">{{date('d M, Y',strtotime($noticia->created_at))}}</a> </span>
									<span><i class="fa fa-tag"></i>  <a href="#">{{$noticia->category}}</a> </span>
									<span><i class="fa fa-comments"></i> <a href="#">{{count($coments[$noticia->id])}} {{count($coments[$noticia->id]) <= 1 ? 'Comentário' : 'Comentários';}}</a></span>
								</div>
								<div class="blog-title">
									<h2><a href="#" title="">{{$noticia->title}}</a></h2>
								</div>
								<div class="blog-desc">
									{!! substr($noticia->content, 0, 170) !!}...
								</div>
								<div class="blog-button">
									<a class="hover-btn-new orange" href="/noticia/{{$noticia->id}}/ler"><span>Ler mais<span></a>
								</div>
							</div>
						</div><!-- end col -->
                    @endforeach
					   <a class="hover-btn-new orange text-center" href="/noticias"><span>Listar Todas<span></a>
				  @else
				       <div class="col-lg-12 col-md-6 col-12">
							<div class="blog-item text-center">
								<h2>Lamentamos, Não Existe Uma Notícia Com Este Título</h2>
								<a class="btn mytbn" href="/noticias"><span>Listar Todas<span></a>
							</div>
						</div><!-- end col -->
				  @endif
			  @else 
			  @if(count($noticias))
				    @foreach($noticias as $noticia)
						<div class="col-lg-4 col-md-6 col-12">
							<div class="blog-item">
								<div class="image-blog">
									<img src="{{$noticia->image}}" alt="{{$noticia->title}}" class="img-fluid noticaImage">
								</div>
								<div class="meta-info-blog">
									<span><i class="fa fa-calendar"></i> <a href="#">{{date('d M, Y',strtotime($noticia->created_at))}}</a> </span>
									<span><i class="fa fa-tag"></i>  <a href="#">{{$noticia->category}}</a> </span>
									<span><i class="fa fa-comments"></i> <a href="#">{{count($coments[$noticia->id])}} {{count($coments[$noticia->id]) <= 1 ? 'Comentário' : 'Comentários';}}</a></span>
								</div>
								<div class="blog-title">
									<h2><a href="#" title="">{{$noticia->title}}</a></h2>
								</div>
								<div class="blog-desc">
									{!! substr($noticia->content, 0, 170) !!}...
								</div>
								<div class="blog-button">
									<a class="hover-btn-new orange" href="/noticia/{{$noticia->id}}/ler"><span>Ler mais<span></a>
								</div>
							</div>
						</div><!-- end col -->
                    @endforeach
				  @else
				       <div class="col-lg-12 col-md-6 col-12">
							<div class="blog-item text-center">
								<h2>Lamentamos, Mas Em Breve Terá Novidades Aqui!</h2>
							</div>
						</div><!-- end col -->
				  @endif
			  @endif
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection