@extends('layouts.main')
@section('title', $noticia->title)
@section('content')
    <div class="all-title-box">
		<div class="container text-center">
			<h1 style="color:rgb(254,239,14);background-color: rgba(137, 43, 226, 0.911); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">Complexo Escolar Privado Tia Lucinda<span class="m_1" style="color:rgb(220,226,240) ">Nova Notícia: {{$noticia->title}}</span></h1>
		</div>
	</div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
						<div class="image-blog">
							<img src="{{$noticia->image}}" alt="" class="img-fluid noticaVe">
						</div>
						<div class="post-content">
							<div class="post-date">
								<span class="day">{{date('d')}}</span>
								<span class="month">{{date('M')}}</span>
							</div>
							<div class="meta-info-blog">
								<span><i class="fa fa-calendar"></i> <a href="#">{{date('d M, Y',strtotime($noticia->created_at))}}</a> </span>
								<span><i class="fa fa-tag"></i>  <a href="#">{{$noticia->category}}</a> </span>
								<span><i class="fa fa-comments"></i> <a href="#">{{count($mycoments[$noticia->id])}} {{count($mycoments[$noticia->id]) <= 1 ? 'Comentário' : 'Comentários';}}</a></span>
							</div>
							<div class="blog-title">
								<h2><a href="#" title="">{{$noticia->title}}</a></h2>
							</div>
							<div class="blog-desc">
							  {!! $noticia->content !!}
							</div>							
						</div>
					</div>
					@if(session('estudante'))
					<div class="blog-author">
						<div class="author-bio">
							<h3 class="author_name"><a href="#">Tom Jobs</a></h3>
							<h5>CEO at <a href="#">SmartEDU</a></h5>
							<p class="author_det">
								Lorem ipsum dolor sit amet, consectetur adip, sed do eiusmod tempor incididunt  ut aut reiciendise voluptat maiores alias consequaturs aut perferendis doloribus omnis saperet docendi nec, eos ea alii molestiae aliquand.
							</p>
						</div>
						<div class="author-desc">
							<img src="/images/author.jpg" alt="about author">
							<ul class="author-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-skype"></i></a></li>
							</ul>
						</div>
					</div>
					@endif
					<div class="blog-comments">
						<h4>Comentários ({{count($coments)}})</h4>
                        @php $i = 1; @endphp
						<div id="comment-blog">
							<ul class="comment-list">
                                @if(count($coments))
                                @foreach($coments as $comen)
                                @if($i == 1)
								<li class="comment">
									<div class="avatar"><img alt="" src="{{$noticia->image}}" class="avatar"></div>
									<div class="comment-container">
										<h5 class="comment-author"><a href="#">{{$comen->name}}</a></h5>
										<div class="comment-meta">
											<a href="#" class="comment-date link-style1">{{date('d M, Y',strtotime($comen->created_at))}}</a>
										</div>
										<div class="comment-body">
											<p>{{$comen->texto}}</p>
										</div>
									</div>
								</li>
                                @else
                                    <ul class="children">
										<li class="comment">
											<div class="avatar"><img alt="" src="{{$noticia->image}}" class="avatar"></div>
											<div class="comment-container">
												<h5 class="comment-author"><a href="#">{{$comen->name}}</a></h5>
												<div class="comment-meta"><a href="#" class="comment-date link-style1">{{date('d M, Y',strtotime($comen->created_at))}}</a></div>
												<div class="comment-body">
													<p>{{$comen->texto}}</p>
												</div>
											</div>
										</li>
									</ul>
                                @endif
                                @php $i++; @endphp
                                @endforeach
                                @else
                                <ul class="children">
										<li class="comment">
											<div class="avatar"><img alt="" src="{{$noticia->image}}" class="avatar"></div>
											<div class="comment-container">
												<h2>Nenhum Comentário, Seja O Primeiro!</h2>
											</div>
										</li>
								   </ul>
                                @endif
							</ul>
						</div>
					</div>
					<div class="comments-form">
						<h4>Faça seu comentario</h4>
						<div class="comment-form-main">
                        <form action="/noticia/{{$noticia->id}}/comentar" method="post">
                                @csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control" name="name" placeholder="Seu Nome...." pattern="^[a-zA-ZÀ-ÿ\s]+$" id="commenter-name" type="text" required style="border-bottom:1px solid rgb(3,135,184)">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" placeholder="Descreve o seu comentário..." id="commenter-message" cols="30" rows="2" required style="border-bottom:1px solid rgb(3,135,184);"></textarea>
										</div>
									</div>
									<div class="w-100">
										<button class="btn mytbn w-100" type="submit"><span>Comentar</span></button>
									</div>
								</div>
							</form>
						</div>
					</div>		
                </div><!-- end col -->
				<div class="col-lg-3 col-12 right-single">
					<div class="widget-categories">
                        @if(count($noticias) == 1)
                          <h3 class="widget-title">({{count($noticias)}}) Notícia Recente</h3>
                        @else
                          <h3 class="widget-title">({{count($noticias)}}) Noticias Recentes</h3>
                        @endif
						<ul>
                            @foreach($noticias as $news)
							   <li><a href="/noticia/{{$news->id}}/ler">{{$news->title}}</a></li>
                            @endforeach
						</ul>
					</div>
					<div class="widget-tags">
						<h3 class="widget-title">Níveis de Ensino</h3>
						<ul class="tags">
                            @foreach($ensinos as $ensino)
							    <li class="text-capitalize"><a href="/fazer/inscricao/{{str_replace(' ','_',$ensino->name)}}"><b>{{$ensino->name}}</b></a></li>
							@endforeach
						</ul>
					</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection
