<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$subject}}</title>
    <style>
/* FICHA DE INSCRIÇÃO */
.section{
    width: 100%;
}
.section-content{
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
}
.section-header{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.section-header img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 2px solid rgb(254,239,14);
}
.section-header .description{
    text-align: center;
}
.section-header .description p{font-size: 18px; margin-bottom: -14px; text-transform: uppercase; font-family: Arial, sans-serif;}
.section-middle{ background-color: rgba(66, 40, 114); border-radius: 10px;}
.section-middle p span{font-weight: bold;}
.section-middle .title{text-align: center; text-transform: uppercase; font-size: 19px; color: rgb(254,239,14); padding: 2px 0px; font-family: Arial, Helvetica, sans-serif;}
.informations{margin: 8px;}
.informations .info-item{
    width: 80%;
    margin: 0 auto;
    display: flex;
    color: #fff;
    align-items: center;
    justify-content: space-between;
}
.informations .info-item .info{ padding: 10px;}
.informations .info-item .info h2{margin:0 auto; font-family: Arial, Helvetica, sans-serif; color: rgb(3,135,184); text-transform: uppercase; font-size: 19px;}
.informations .info-item .info p{margin-bottom: -8px; font-family: Arial, Helvetica, sans-serif; color: rgb(220,226,240);}
.informations .info-item .info p span{ font-weight: bold;}
.informations .info-item .image{  }
.informations .info-item .image img{
    width: 150px;
    height: 150px;
    border-radius: 5%;
}
.informations .info-item .precos{ border-radius: 5px; padding: 9px;}
.informations .info-item .precos ul{
    list-style: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.informations .info-item .precos ul li{
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    border-bottom: 1px solid rgb(220,226,240);
    padding: 3px;
    margin: 4px 0px; 
    color: rgb(220,226,240);
}
.informations .info-item .precos ul li span{font-weight: bold;}
.informations .info-item .description{width: 250px;}
.informations .info-item .description p{text-align: justify;}
.section-footer-e{
    border-radius: 8px;
    width: 80%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.section-footer-e .item{}
.section-footer-e .text{width: 200px; text-align: justify;}
.section-footer-e .item p{font-family: Arial, Helvetica, sans-serif;font-size: 16px;}
.section-footer-e .item p span{font-weight: bold;}
.section-footer-e .item hr{width: 200px;}
.ter{width: 300px;}
@media(max-width: 400px){
    .informations .info-item{
        flex-direction: column;
    }
    .ter{width: 100%; padding:0px 4px;}
}

    </style>
</head>
<body>
    <div class="section">
      <div class="section-content">
          <div class="section-header">
              <img src="http://colegiotialucinda.com/images/logo.jpeg" alt="Colégio Tia Lucinda">
              <div class="description">
                  <p>República de Angola</p>
                  <p>Ministério da Educação</p>
                  <p>Complexo Escolar Privado Tia Lucinda</p>
              </div>
          </div>
          <div class="section-middle">
            <h2 style="padding-top:8px;padding-bottom: -10px;" class="title">Referências Bancárias</h2>
            <p style="color: rgb(220,226,240); text-align:center;font-family: Arial, Helvetica, sans-serif; font-size: 17px;padding: 9px;">{{$msg['name']}} para finalizares á sua inscrição deves, depositar ou fazer uma <span>transferência Bancária</span> no <span>Valor da Inscrição ({{number_format($prices->inscricao,2,',','.')}} Kzs)</span>, para a <span>referência bancária citada</span> & posteriormente responderes essa mensagem com o <span>comprovactivo de pagamento e o número da inscrição (00{{$inscrito->id}})</span></p>
              <div class="informations">
                  <div class="info-item">
                      <div class="info">
                        <h2>Informações Pessoaís</h2>
                          <p><span>Nome:</span> {{$msg['name']}}</p>
                          <p><span>Nascimento:</span> {{date('d M, Y',strtotime($msg['nascimento']))}}</p>
                          @if($msg['sexo'] == 'M')
                           <p><span>Sexo:</span> Masculino ( X ) Femenino ( )</p>
                          @else
                           <p><span>Sexo:</span> Masculino (  ) Femenino ( X )</p>
                          @endif
                          @if($msg['nacionalidade'] == 'Nacional')
                           <p><span>Nacionalidade:</span> Nacional ( X ) Estrangeiro ( )</p>
                           <p><span>Nᵒ BI / Cédula:</span> {{$msg['id_number']}}</p>
                          @else
                           <p><span>Nacionalidade:</span> Nacional ( X ) Estrangeiro ( )</p>
                          <p><span>Nᵒ Passaporte:</span> {{$msg['id_number']}}</p>
                          @endif
                      </div>
                      <div class="image">
                          <img src="http://colegiotialucinda.com{{$inscrito->image_passe}}" alt="Foto Passe">
                      </div>
                  </div>
                  <div class="info-item">
                    <div class="info">
                      <h2>Informações da Inscrição</h2>
                        <p><span>{{$msg['mycollege']->name}}</span></p>
                        @if($msg['classe'] <= 6)
                        <p><span>Nível De Ensino:</span> Primário ( X ) Secundário ( )  Médio ( )</p>
                        @elseif($msg['classe'] > 6 && $msg['classe'] <= 9)
                        <p><span>Nível De Ensino:</span> Primário ( ) Secundário ( X )  Médio ( )</p>
                        @else
                        <p><span>Nível De Ensino:</span> Primário ( ) Secundário ( )  Médio ( X )</p>
                        @endif
                        <p><span>Classe:</span> {{$msg['classe']}}ᵃ</p>
                        @if(!is_null($msg['curso']))
                          <p><span>Curso:</span> {{$msg['curso']}}</p>
                        @endif
                        <p><span>Data da Inscrição:</span> {{date('d M, Y',strtotime($inscrito->created_at))}}</p>
                        <p><span>Nᵒ da Inscrição:</span> 00{{$inscrito->id}}</p>
                    </div>
                    <div class="precos">
                        <ul>
                            <li><span>Valor Inscrição:</span> {{number_format($prices->inscricao,2,',','.')}} Kzs</li>
                            <li><span>Valor Confirmação:</span> {{number_format($prices->confirmacao,2,',','.')}} Kzs</li>
                            <li><span>Valor Uniforme:</span> {{number_format($prices->uniforme,2,',','.')}} Kzs</li>
                            <li><span>Valor Própina:</span> {{number_format($prices->propina,2,',','.')}} Kzs</li>
                        </ul>
                    </div>
                  </div>
                  <div class="info-item">
                    <div class="info">
                      <h2>Informações do Encarregado</h2>
                        <p><span>Nome</span>: {{$inscrito->name_encarregado}}</p>
                        <p><span>Nᵒ de Telefone:</span> {{$inscrito->telefone_encarregado}}</p>
                        <p><span>E-mail:</span> {{$inscrito->email_encarregado}}</p>
                        <p><span>Morada:</span> {{$inscrito->morada_encarregado}}</p>
                    </div>
                    <div class="info ter">
                        <p><span>BANCO: </span>BFA</p>
                        <p><span>NOME: </span>COLEGIO TIA LUNCIA,LDA</p>
                        <p><span>NÚMERO DA CONTA: </span>78901234567890</p>
                        <p><span>NÚMERO DE IBAN: </span>AO06 1234 5678 9012 3456 7890</p>   
                    </div>
                  </div>
              </div>
          </div>
          <div class="section-footer">
              <div class="section-footer-e">
                <div class="item" style="text-align:justify">
                    <p style="color: red;"><span>OBS:</span> {{$msg['name']}} tens até <span>72 horas</span> para finalizar este processo, caso contrário a sua inscrição será anulada, agradecemos a compreensão!</p>
                </div>
              </div>
          </div>
      </div>
    </div>
</body>
</html>