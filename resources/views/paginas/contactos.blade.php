@extends('layouts.main')
@section('title','Contacta nos')
@section('content')
    <div class="all-title-box">
		<div class="container text-center">
			<h1 style="color:rgb(254,239,14);background-color: rgba(137, 43, 226, 0.911); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">Complexo Escolar Privado Tia Lucinda<span class="m_1" style="color:rgb(220,226,240) ">Entre em contato conosco e descubra como o Colégio Tia Lucinda pode fazer a diferença na vida do seu filho.!</span></h1>
		</div>
	</div>
    <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <p class="lead">Nossa equipe de atendimento está pronta para esclarecer suas dúvidas, agendar visitas e fornecer todas as informações necessárias. Estamos apenas a uma ligação, e-mail ou visita de distância. Venha conhecer nossas instalações e sentir a energia acolhedora que torna o nosso colégio especial. Aguardamos seu contato com entusiasmo.</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="contact_form">
                        @if(session('msg-success'))
                           <div id="message" class="alert alert-success">{{session('msg-success')}}</div>
                        @endif
                        @if(session('msg-error'))
                           <div id="message" class="alert alert-danger">{{session('msg-error')}}</div>
                        @endif
                        <form id="contactform" action="{{route('Send.Sugestao')}}" name="contactform" method="post">
                            @csrf
                            <div class="row row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text"  pattern="^[a-zA-ZÀ-ÿ\s]+$" minlength="8"  name="name" id="first_name" class="form-control" placeholder="Seu Nome..." required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Seu e-mail..." required>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <input type="number" minlength="9" maxlength="9" name="phone" id="phone" class="form-control" placeholder="Seu telefone...">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="form-control" name="message" id="comments" rows="6" placeholder="Descreve aqui a sua mensagem..." required></textarea>
                                </div>
                                <div class="col-lg-12 text-center pd">
                                    <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Enviar Mensagem</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="map-box">
						<div id="custom-places" class="small-map">
                            <img src="/images/logo.jpeg" alt="" style="border-radius:8px;" class="w-100 h-100">
                        </div>
					</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d75448.20405280296!2d13.193115629860173!3d-8.998679523077247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a521e8152c638bb%3A0xcc6002b20afcdea5!2sKilamba!5e1!3m2!1spt-PT!2sao!4v1688743018187!5m2!1spt-PT!2sao" width="100%" height="450" style="border:0;margin:0px 10px; border-radius:9px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection    