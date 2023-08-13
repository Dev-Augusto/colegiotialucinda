@extends('layouts.main')
@section('title','Nossa Galéria')
@section('content')
<div class="all-title-box">
		<div class="container text-center">
			<h1 style="color:rgb(254,239,14);background-color: rgba(137, 43, 226, 0.911); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">Complexo Escolar Privado Tia Lucinda<span class="m_1" style="color:rgb(220,226,240) ">Nossas Imagens, Esteja Informado & Actualizado Sobre As Nossas Actividades e outros...!</span></h1>
		</div>
	</div>
    
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <div class="row portfolio-container">
          @if(count($galerias))
            @foreach($galerias as $galeria)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                <div class="portfolio-wrap">
                <figure>
                    <img src="{{$galeria->image}}" class="img-fluid" alt="{{$galeria->title}}">
                    <a href="{{$galeria->image}}" data-lightbox="portfolio" data-title="{{$galeria->title}}" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
                </figure>

                <div class="portfolio-info">
                    <h4><a href="#">{{$galeria->title}}</a></h4>
                    <p>{{$galeria->title}}/p>
                </div>
                </div>
            </div>
            @endforeach
          @endif
          

        </div>

      </div>
    </section><!-- #portfolio -->
    @if(count($panfletos))
    <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('/images/new-5.jpg');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Panfletos de Actividades</h3>
                <p>Panfletos da nossas actividadesm, veja e esteja sempre a par dos nossos conteúdos.</p>
            </div><!-- end title -->

            <div class="row" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <div class="col-md-8 col-sm-12 m-0">
                    <div class="testi-carousel owl-carousel owl-theme">
                        @foreach($panfletos as $panfleto)
                        <div class="clearfix">
                            <div class="desc">
								<img src="{{$panfleto->image}}" alt="{{$panfleto->title}}" class="imgGale img-fluid">
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
    @endif
@endsection