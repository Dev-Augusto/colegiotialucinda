@extends('layouts.main')
@section('title','Inscrição para o '.$ensino)
@section('content')
    <div class="all-title-box">
		<div class="container text-center">
			<h1 style="color:rgb(254,239,14);background-color: rgba(137, 43, 226, 0.911); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">Complexo Escolar Privado Tia Lucinda<span class="m_1" style="color:rgb(220,226,240) ">Fazer Inscrição Para O {{$ensino}} </span></h1>
		</div>
	</div>
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
						<div class="image-blog">
							<img src="{{$contentEnsino->image}}" alt="" class="img-fluid noticaVe">
						</div>
						<div class="post-content">
							<div class="post-date">
								<span class="day">{{date('d',strtotime($contentEnsino->updated_at))}}</span>
								<span class="month">{{date('M',strtotime($contentEnsino->updated_at))}}</span>
							</div>
							<div class="meta-info-blog">
								<span><i class="fa fa-calendar"></i> <a>{{date('M d, Y',strtotime($contentEnsino->created_at))}}</a> </span>
								<span><i class="fa fa-tag"></i>  <a>{{$ensino}}</a> </span>
								<span><i class="fa fa-users"></i> <a>+{{number_format($contentEnsino->students,0,',','.')}} Estudantes</a></span>
							</div>
							<div class="blog-title">
								<h2><a title="{{$ensino}}">{{$contentEnsino->title}}</a></h2>
							</div>
							<div class="blog-desc">
								{!! $contentEnsino->conteudo !!}
							</div>							
						</div>
					</div>
					@if($reqInscricao)
					<div class="comments-form">
						<h4 class="mt-2 text-capitalize">Ficha de Inscrição {{$reqInscricao['colegio']}} / {{$reqInscricao['classe']}} ᵃ Classe 
						@if($ensino == 'ensino médio')
						  De {{str_replace('_',' ',$reqInscricao['curso'])}}
						@endif</h4>
						@if(session('msg-error'))
                          <div class="alert alert-danger text-center">{{session('msg-error')}}</div>
						@endif
						@if(session('msg-success'))
                          <div class="alert alert-success text-center">{{session('msg-success')}}</div>
						@endif
						<div class="comment-form-main">
							@if($ensino == 'ensino médio')
							  <form action="/enviar/inscricao/{{str_replace(' ','_',$ensino)}}/{{$reqInscricao['id_colegio']}}/{{$reqInscricao['classe']}}/{{$reqInscricao['curso']}}" method="POST" enctype="multipart/form-data">
							@else
							<form action="/enviar/inscricao/{{str_replace(' ','_',$ensino)}}/{{$reqInscricao['id_colegio']}}/{{$reqInscricao['classe']}}" method="POST" enctype="multipart/form-data">
							@endif
								@csrf
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="name" placeholder="Nome Completo" id="commenter-name" minlength="12" pattern="^[a-zA-ZÀ-ÿ\s]+$" type="text" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="nascimento" title="Data de Nascimento" id="nascimento" type="date" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<select class="form-control" name="sexo" id="sexo">
												<option value="M">Masculino</option>
												<option value="M">Femenino</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<select class="form-control" name="nacionalidade" OnBlur="VerifyEstrageiro()" id="nacionalidade">
												<option value="Nacional">Angolano(a)</option>
												<option value="Estrangeiro">Estrangeiro(a)</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="bi"
											minlength="14" maxlength="14" placeholder="Número do BI/Cédula" id="bi" type="text" required>

											<input class="form-control fatn" name="passaporte" minlength="9" maxlength="9" placeholder="Número do Passaporte" id="numero_passaporte" type="number">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="image_bi" id="label_bi" >Imagem do BI/Cédula <span class="text-danger">(png/jpg/jpeg)</span></label>
											<input class="imaInput" name="image_bi" title="Imagem do BI/Cédula, deve ser bem visível, *png/jpg/jpeg" id="image_bi" type="file" required>

											<label for="image_passaporte" class="fatn" id="label_passa">Imagem do Passaporte <span class="text-danger">(png/jpg/jpeg)</span></label>
											<input class="imaInput fatn" name="image_passaporte" title="Imagem do Passaporte, deve ser bem visível, *png/jpg/jpeg" id="image_passaporte" type="file">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										    <label for="image_passe">Foto Passe <span class="text-danger">(png/jpg/jpeg)</span></label>
											<input class="imaInput" name="image_passe" title="Imagem do tipo passe, deve ser bem visível, *png/jpg/jpeg" id="image_passe" type="file" required>
										</div>
									</div>
									@if($reqInscricao['classe'] != 1)
									 @if($reqInscricao['classe'] != 2)
									<div class="col-md-4">
										<div class="form-group">
											@if($reqInscricao['classe'] == 7 OR $reqInscricao['classe'] == 10)
											<label for="certificado">Cerfificado de Habilitação <span class="text-danger">(pdf)</span></label>
											<input class="imaInput" name="certificado" title="Upload do Certificado de Habilitação deve ser o original, *pdf" id="certificado" type="file" required>
											@else
											<label for="certificado">Declaração de Estudante <span class="text-danger">(pdf)</span></label>
											<input class="imaInput" name="certificado" title="Upload da Declaração do estudante deve ser a original, *pdf" id="declaracao" type="file" required>
											@endif
										</div>
									</div>
									 @elseif($reqInscricao['classe'] == 2)
									<div class="col-md-4">
										<div class="form-group">
											<label for="certificado">Boletim de Notas <span class="text-danger">(pdf)</span></label>
											<input class="imaInput" name="certificado" title="Upload do boletim de notas do aluno deve ser o original, *pdf" id="boletim" type="file" required>
										</div>
									</div>
									 @endif
									@endif
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="nome_encarregado" pattern="^[a-zA-ZÀ-ÿ\s]+$" minlength="10"  placeholder="Nome Completo do(a) Encarregado(a) de Educação" id="commenter-name" type="text" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="numero_encarregado"  placeholder="Número de telefone do(a) encarregado(a)" id="commenter-name" type="number" minlength="9" maxlength="9" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="email_encarregado" placeholder="E-mail do(a) encarregado(a)" id="commenter-name" minlength="12" maxlength="30" type="email" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="morada_encarregado"
											minlength="10" placeholder="Morada do(a) encarregado(a)" id="commenter-name" type="text" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control"  minlength="30" name="message" placeholder="Faça uma descrição sobre o motivo da tua inscrição, para ajudarnos a personalisar o nosso atendimento!" id="commenter-message" cols="30" rows="2" required></textarea>
										</div>
									</div>
									<div class="col-md-12 post-btn">
										<button class="w-100 form-control mytbn text-center" type="submit"><span>Concluir Minha Inscrição</span> <i class="fa fa-check-circle"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					@else
					<div class="comments-form">
						<h4 class="text-center mt-2">Começar Inscrição Agora!</h4>
						<div class="comment-form-main">
							<form>
								<div class="row">
								@if($ensino == 'ensino médio')
								   <div class="col-md-4">
										<div class="form-group">
										    <select name="colegio" OnBlur="chooseCourse({{count($colegios)}})" id="colegio" class="form-control">
												@foreach($colegios as $colegio)
												  <option value="{{$colegio->id}}">{{$colegio->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-4">
									    <div class="form-group">
											<select name="classe" OnBlur="TruncURL()" id="classe" class="form-control">
												<option value="10">10ᵃ Classe</option>
												<option value="11">11ᵃ Classe</option>
												<option value="12">12ᵃ Classe</option>
											</select>
										</div>
									</div>
									<div class="col-md-4" id="inscreva">
										<div class="form-group">
										@foreach($colegios as $colegio) 
										   @if($colegio->id == 1)
										    <select name="curso" id="cursoCollege{{$colegio->id}}" OnBlur="TruncURL()" class="form-control">
										   @else
										   	<select name="curso" id="cursoCollege{{$colegio->id}}" OnBlur="TruncURL()" class="form-control fatn">
										   @endif
											  @foreach($cursosFillia[$colegio->id] as $curso)  
											    <option value="{{strtolower(str_replace(' ','_', $curso->name_curso))}}">{{$curso->name_curso}}</option>
											  @endforeach
											</select>
										@endforeach	
										</div>
									</div>
									<div class="col-md-12 post-btn">
										<a href="" class="w-100 form-control mytbn text-center" id="link"><span>Seguinte</span></a>
									</div>
						        @elseif($ensino == 'ensino secundário')
								   <div class="col-md-4">
										<div class="form-group">
										    <select name="colegio" OnBlur="TruncURL(1)" id="colegio" class="form-control">
												@foreach($colegios as $colegio)
												  <option value="{{$colegio->id}}">{{$colegio->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-4">
									    <div class="form-group">
											<select name="classe" OnBlur="TruncURL(1)" id="classe" class="form-control">
												<option value="7">7ᵃ Classe</option>
												<option value="8">8ᵃ Classe</option>
												<option value="9">9ᵃ Classe</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
									  <div class="w-100 post-btn">
									  	<a href="" class="w-100 form-control mytbn text-center" id="link"><span>Seguinte</span></a>
									  </div>
									</div>
									
						        @elseif($ensino == 'ensino primário')
								<div class="col-md-4">
										<div class="form-group">
										    <select name="colegio" OnBlur="TruncURL(1)" id="colegio" class="form-control">
												@foreach($colegios as $colegio)
												  <option value="{{$colegio->id}}">{{$colegio->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-4">
									    <div class="form-group">
											<select name="classe" OnBlur="TruncURL(1)" id="classe" class="form-control">
												<option value="1">Iniciação</option>
												<option value="2">2ᵃ Classe</option>
												<option value="3">3ᵃ Classe</option>
												<option value="4">4ᵃ Classe</option>
												<option value="5">5ᵃ Classe</option>
												<option value="6">6ᵃ Classe</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
									  <div class="w-100 post-btn">
									  	<a href="" class="w-100 form-control mytbn text-center" id="link"><span>Seguinte</span></a>
									  </div>
									</div>
						        @endif
								</div>
							</form>
						</div>
					</div>
					@endif
					
					
                </div><!-- end col -->
				<div class="col-lg-3 col-12 right-single">
					<div class="widget-categories">
						<h3 class="widget-title text-capitalize">Colégios do {{$ensino}} <i class="fa fa-home"></i></h3>
						<ul>
							@foreach($colegios as $colegio)
							   @include('modals.fichaInscricao')
							   <li><a href="#" data-toggle="modal" data-target="#descricaColegio{{$colegio->id}}">{{$colegio->name}}</a></li>
                            @endforeach
						</ul>
					</div>
                   
					<div class="widget-categories">
					@if($reqInscricao)
						<h3 class="widget-title text-capitalize">{{$reqInscricao['colegio']}} / {{$reqInscricao['classe']}} ᵃ Classe 
						@if($ensino == 'ensino médio')
						  De {{str_replace('_',' ',$reqInscricao['curso'])}}
						@endif
						<i class="fa fa-book"></i></h3>
						<ul style="background-color: rgb(66,40,114); color:#fff;border-radius:8px;">
							<li><a style="font-size:15px;">Valor Inscrição: {{number_format($filliaPrices->inscricao,2,',','.')}} Kzs</a></li>
							<li><a style="font-size:15px;">Valor Confirmação: {{number_format($filliaPrices->confirmacao,2,',','.')}} Kzs</a></li>
							<li><a style="font-size:15px;">Valor Uniforme: {{number_format($filliaPrices->uniforme,2,',','.')}} Kzs</a></li>
							<li><a style="font-size:15px;">Valor Própina: {{number_format($filliaPrices->propina,2,',','.')}} Kzs</a></li>
							<li><a class="text-center" style="font-size:15px;color:rgb(254,239,14)">Pagar Total (Opcional): {{number_format($filliaPrices->propina+$filliaPrices->uniforme+$filliaPrices->inscricao,2,',','.')}} Kzs</a></li>
						</ul>
					@else	
						@if($ensino == 'ensino médio')
							<h3 class="widget-title text-capitalize">Cursos Para o {{$ensino}} <i class="fa flaticon-online"></i></h3>
							<ul class="tags">
								@foreach($cursos as $curso)
								<li><a><b>{{$curso->name}}</b></a></li>
								@endforeach
							</ul>
						@else
						<img src="/images/sobre/imgStudent.jpg" width="100%" height="450px" alt="" style="border-radius:10px;">	
						@endif
					@endif
					</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection