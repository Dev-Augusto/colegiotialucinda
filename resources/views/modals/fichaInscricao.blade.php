<!-- Modal -->
<div class="modal fade" id="descricaColegio{{$colegio->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Complexo Escolar Privado Tia Lucinda</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Tab panes -->
                <div class="sections">
                    <div class="container dadoscolleg">
                        <div class="contatos">
                          <h2>{{$colegio->name}}</h2>
                         <div class="itdivs">
                         <li><a href="mailto:{{$colegio->email}}"><i class="fa fa-envelope"></i> {{$colegio->email}}</a></li>
                            <li><a href="tel:+244{{$colegio->numero}}"><i class="fa fa-phone"></i> (+244) {{$colegio->numero}}</a></li>
                            <li class="fa fa-location">{{$colegio->localidade}}</li>
                            <ul class="footer-links-soi text-center" style="background-color: rgb(66,40,114);border-radius:8px;">
								<li><a href="{{$colegio->facebook}}" rel="external" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{$colegio->whatsapp}}"  rel="external" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
							</ul><!-- end links -->  
                         </div>
                               
                        </div>
                        <div class="ensinos">
                            <h3>Ensinos</h3>
                            <ul class="itdivs">
                                @foreach($ensinos[$colegio->id] as $ensi)
                                  <li class="text-capitalize">{{str_replace('_',' ',$ensi->name_ensino)}}</li>
                                @endforeach
                            </ul>  
                        </div>
                        @if(count($cursosFillia[$colegio->id]))
                        <div class="cursos">
                            <h3>Cursos Disponivéis</h3>
                            <ul class="itdivs">
                                @foreach($cursosFillia[$colegio->id] as $curso)
                                  <li class="text-capitalize">{{$curso->name_curso}}</li>
                                @endforeach
                            </ul>  
                        </div>
                        @endif
                    </div>
                </div>
				<div class="tab-content">
                    <div id="carouselExampleControls{{$colegio->id}}" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleControls{{$colegio->id}}" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleControls{{$colegio->id}}" data-slide-to="1"></li>
                            <li data-target="#carouselExampleControls{{$colegio->id}}" data-slide-to="2"></li>
                            <li data-target="#carouselExampleControls{{$colegio->id}}" data-slide-to="3"></li>
                        </ol>
                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                            <div id="home" class="first-section" style="background-image:url('{{$colegio->slider_01}}');">
                                <div class="dtab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="big-tagline" style="padding: 250px 350px;">
                                                    
                                                </div>
                                            </div>
                                        </div><!-- end row -->            
                                    </div><!-- end container -->
                                </div>
                            </div><!-- end section -->
                        </div>
                        <div class="carousel-item">
                            <div id="home" class="first-section" style="background-image:url('{{$colegio->slider_02}}');">
                                <div class="dtab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="big-tagline" style="padding: 250px 350px;">
                                                    
                                                </div>
                                            </div>
                                        </div><!-- end row -->            
                                    </div><!-- end container -->
                                </div>
                            </div><!-- end section -->
                        </div>
                        <div class="carousel-item">
                            <div id="home" class="first-section" style="background-image:url('{{$colegio->slider_03}}');">
                                <div class="dtab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="big-tagline" style="padding: 250px 350px;">
                                                    
                                                </div>
                                            </div>
                                        </div><!-- end row -->            
                                    </div><!-- end container -->
                                </div>
                            </div><!-- end section -->
                        </div>
                        <div class="carousel-item ">
                            <div id="home" class="first-section" style="background-image:url('{{$colegio->slider_04}}');">
                                <div class="dtab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="big-tagline" style="padding: 250px 350px;">
                                                    
                                                </div>
                                            </div>
                                        </div><!-- end row -->            
                                    </div><!-- end container -->
                                </div>
                            </div><!-- end section -->
                        </div>
                    </div>
                </div>
	
                </div>
			</div>
		</div>
	  </div>
	</div>