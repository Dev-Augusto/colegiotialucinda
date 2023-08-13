@extends('layouts.main')
@section('title','Nossos Preços')
@section('content')
  <div class="all-title-box">
		<div class="container text-center">
			<h1 style="color:rgb(254,239,14);background-color: rgba(137, 43, 226, 0.911); border-bottom-right-radius: 20px; border-bottom-left-radius: 20px;">Complexo Escolar Privado Tia Lucinda<span class="m_1" style="color:rgb(220,226,240) ">Os Melhores Preços Do Mercado É Aqui!</span></h1>
		</div>
	</div>
         <div class="col-lg-12 col-12 right-single">
			       <div class="widget-search">
						<div class="site-search-area">
							<form method="get" id="site-searchform" action="#">
								<div class="filterPrice">
                     <select name="colegio" OnBlur="chooseCourse({{count($colegios)}})" id="colegio" class="form-control">
												@foreach($colegios as $colegio)
												  <option value="{{$colegio->id}}">{{$colegio->name}}</option>
												@endforeach
											</select>
									    <input id="searchsubmit" value="Search"  type="submit">
								</div>
							</form>
						</div>
					</div>
			    </div>
                    @if(isset($search) && !empty($search))
                      <h2 class="text-center">Preços do {{$college->name}}</h2>
                    @endif
            <hr class="invis"> 
    <div id="pricing-box" class="section wb">
        <div class="container">
			<div class="row">
                @if(count($precos))
                @foreach($precos as $preco)
                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable">
                            <div class="pricingTable-header">
                                <span class="heading">
                                  @if($preco->curso != 'inexistente')
                                    <h6 style="font-size:20px;color:#fff;text-transform:uppercase">{{$preco->curso}}</h6>
                                  @else
                                    <h6 style="font-size:20px;color:#fff;text-transform:uppercase">Fundamental</h6>
                                  @endif
                                </span>
                                <span class="price-value"> {{$preco->classe == 1 ? 'Iniciação' : $preco->classe.'ᵃ classe'}} <span></span><span class="text-uppercase">{{$fillia[$preco->id]->name}}</span></span>
                            </div>

                            <div class="pricingContent">
                                <i class="fa flaticon-online"></i>
                                <ul class="precolista">
                                    <li><span>Inscrição:</span> {{number_format($preco->inscricao,2,',','.')}} Kzs</li>
                                    <li><span>Confirmação:</span> {{number_format($preco->confirmacao,2,',','.')}} Kzs</li>
                                    <li><span>Própina:</span> {{number_format($preco->propina,2,',','.')}} Kzs</li>
                                    <li><span>Uniforme:</span> {{number_format($preco->uniforme,2,',','.')}} Kzs</li>
                                    <li><span>Total (Opcional):</span> {{number_format(($preco->inscricao+$preco->uniforme+$preco->propina),2,',','.')}} Kzs</li>
                                </ul>
                            </div><!-- /  CONTENT BOX-->

                            <div class="pricingTable-sign-up">
                                @if($preco->classe >= 10)
                                  <a href="/fazer/inscricao/ensino_médio/{{$fillia[$preco->id]->id}}/{{$preco->classe}}/{{$preco->curso}}" class="hover-btn-new orange"><span>Inscrever Se</span></a>
                                @elseif($preco->classe >=7 && $preco->classe < 10)
                                  <a href="/fazer/inscricao/ensino_secundário/{{$fillia[$preco->id]->id}}/{{$preco->classe}}/" class="hover-btn-new orange"><span>Inscrever Se</span></a>
                                @else
                                  <a href="/fazer/inscricao/ensino_primário/{{$fillia[$preco->id]->id}}/{{$preco->classe}}/" class="hover-btn-new orange"><span>Inscrever Se</span></a>
                                @endif
                            </div><!-- BUTTON BOX-->
                        </div>
                    </div>
                @endforeach
                @endif
                    @if(isset($search) && !empty($search))
                      <a href="/nossos/precos" class="btn mytbn text-center w-100"><span>Listar Todos Cursos</span></a>
                    @endif
            </div>
		</div>
    </div><!-- end section -->
@endsection    