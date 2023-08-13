<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\messagefillia;
use App\Mail\messageInscrito;

use App\Models\Slider;
use App\Models\Balance;
use App\Models\Noticia;
use App\Models\Timeline;
use App\Models\Testemunho;
use App\Models\Sobrecontent;
use App\Models\Fillia;
use App\Models\Ensino;
use App\Models\Galeria;
use App\Models\Curso; 
use App\Models\Fillia_ensino;
use App\Models\Fillia_curso;
use App\Models\Ensino_conteudo;
use App\Models\Fillial_price;
use App\Models\Inscrito;
use App\Models\Principio;
use App\Models\About_curso;
use App\Models\Noticia_coment;
use App\Models\Sugest;

class PaginasController extends Controller
{
    private $objectoInscricao = [];

    public function home(){
        $slides = Slider::all();
        $balance = Balance::first();
        $timelines = Timeline::all();
        $destaques = Noticia::Where('category','Destaque')->limit(2)->get();
        $testemunhos = Testemunho::all();
        $dados = [
         'pagina'=>'home',
         'slides'=>$slides,
         'balance'=>$balance,
         'destaques'=>$destaques,
         'timelines'=>$timelines,
         'testemunhos'=>$testemunhos,
        ];
        return view('paginas.home',$dados);
    }

    public function sobre(){
        $sobrecontents = SobreContent::limit(2)->get();
        $principio = Principio::first();
        $colegios = Fillia::all();
        $ensinos = [];
        $cursoFillia = [];
        foreach ($colegios as $colegio) {
            $ensinos[$colegio->id] = Fillia_ensino::Where('id_fillia',$colegio->id)->get();
            $cursoFillia[$colegio->id] = Fillia_curso::Where('id_fillia',$colegio->id)->get();
        }
        $dados = [
          'pagina'=>'sobre',
          'principio'=>$principio,
          'sobrecontents'=>$sobrecontents,
          'cursosFillia'=>$cursoFillia,
          'ensinos'=>$ensinos,
          'colegios'=>$colegios,
        ];
        return view('paginas.sobre',$dados);
    }

    public function aboutCurso($curso){
        $curso = str_replace('_',' ',$curso);
        $course = Curso::Where('name',$curso)->first();
        if ($course) {
            $cursoFillia = Fillia_curso::Where('id_curso',$course->id)->get();
            $colegios = [];
            foreach ($cursoFillia as $cfillia) {

                $colegios[$cfillia->id_fillia] = Fillia::findOrFail($cfillia->id_fillia);
            }
            $about = About_curso::Where('id_curso',$course->id)->first();
            $dados = [
            'pagina'=>'cursos',  
            'colegios'=>$colegios,
            'about'=>$about,
            'curso'=>$curso,
            ];
            return view('paginas.cursos',$dados);
        }
        return redirect()->back();
    }

    public function noticias(){
        $search = Request('pesquisar');
        $coments = [];
        if (!empty($search)) {
            $noticias = Noticia::Where('title','like','%'.$search.'%')->get();
        } else {
            $noticias = Noticia::Where('access',1)->get();
        }
        // =====================
        if (count($noticias)) {
            foreach ($noticias as $noticia) {
                $coments[$noticia->id] = Noticia_coment::Where('id_noticia',$noticia->id)->get();
            }
        }
        $dados = [
         'pagina'=>'noticia',
         'noticias'=>$noticias,
         'coments'=>$coments,
         'search'=>$search,
        ];
        return view('paginas.noticias',$dados);
    }

    public function Vernoticias($id){
       $noticia = Noticia::findOrFail($id);
       $ensinos = Ensino::all();
       $mycoments = [];
       if ($noticia->access) {
        $noticias = Noticia::Where('access',1)->Where('id','!=',$id)->orderBy('id','desc')->limit(6)->get();
        if (session('estudante')) {
            $coments = Noticia_coment::Where('id_noticia',$id)->get();
        } else {
            $coments = Noticia_coment::Where('id_noticia',$id)->Where('id_estudante',null)->get();
        }
         // =====================
            $mycoments[$noticia->id] = Noticia_coment::Where('id_noticia',$noticia->id)->get();
        $dados = [
            'pagina'=>'',
            'noticia'=>$noticia,
            'noticias'=>$noticias,
            'ensinos'=>$ensinos,
            'coments'=>$coments,
            'mycoments'=>$mycoments,
        ];
        return view('paginas.readnews',$dados);
       }
       return redirect()->back();
    }

    public function SendComent(Request $request,$id){
       if(!in_array("",$request->all())){
           $noticia = Noticia::findOrFail($id);
           $coment = new Noticia_coment();
           $coment->id_noticia = $noticia->id;
           session('estudante') ? $coment->id_estudante = session('estudante')->id : $coment->id_estudante = null;
           session('estudante') ? $coment->name = session('estudante')->name : $coment->name = $request->name;
           $coment->texto = $request->message;
           if (!$coment->save()) {
               return redirect()->back('msg-error','Aconteceu um erro, tente novamente!');
           }
       }
       return redirect()->back();
    }

    public function galeria(){
        $galerias = Galeria::Where('category','!=','panfleto')->orderBy('id','desc')->get();
        $panfletos = Galeria::Where('category','panfleto')->orderBy('id','desc')->get();
        $dados = [
            'pagina'=>'galeria',
            'galerias'=>$galerias,
            'panfletos'=>$panfletos,
        ];
        return view('paginas.galeria',$dados);
    }

    public function precarios(){
        $search = Request('colegio');
        $college = 0;
        if (!empty($search)) {
            $precos = Fillial_price::Where('id_fillia',$search)->get();
            $college = Fillia::findOrFail($search);
        } else {
            $precos = Fillial_price::all();
        }
        $colegios = Fillia::all();
        $fillia = [];
        if (count($precos)) {
            foreach ($precos as $preco) {
                $fillia[$preco->id] = Fillia::findOrFail($preco->id_fillia);
            }
        }
        $dados = [
            'pagina'=>'precos',
            'search'=>$search,
            'precos'=>$precos,
            'colegios'=>$colegios,
            'fillia'=>$fillia,
            'college'=>$college,
        ];
        return view('paginas.precarios',$dados);
    }

    public function contactos(){
        $dados = [
          'pagina'=>'contactos',
        ];
        return view('paginas.contactos',$dados);
    }
     
    public function SendSugest(Request $request){
        if (!in_array("",$request->all())) {
            if ($this->VerifySugest($request->email)) {
                return redirect()->back()->with('msg-error','O seu limite de mensagem foi atingido!');
            } else {
                $sugest = new Sugest();
                $sugest->name = $request->name;
                $sugest->email = $request->email;
                $sugest->phone = $request->phone;
                $sugest->message = $request->message;
                if ($sugest->save()) {
                    return redirect()->back()->with('msg-success','Sua mensagem foi enviada, e daremos a nossa máxima atenção...!');
                } else {
                    return redirect()->back()->with('msg-error','Sua mensagem foi não enviada, tente novamente!');
                }
            }
        }
        return redirect()->back();
    }
    // MÉTODOS ADICIONÁIS
    public function likedSobre($id)
    {
        if((session('liked') && session('liked') == $id) OR !intval($id)){
           return redirect()->back();
        }
        $sobre = Sobrecontent::findOrFail($id);
        $sobre->likes = $sobre->likes + 1;
        $sobre->update();
        session(['liked'=>$id]);
        return redirect('/sobre');
    }

    public function inscrever(string $ensino,int $colegio = null,string $classe = null, string $curso = null ){
        $newEnsino = str_replace('_',' ',$ensino);
        $cursos = Curso::all();
        $fillias = Fillia_ensino::Where('name_ensino',$newEnsino)->get();
        if (!count($fillias)) {
            return redirect()->back();
        }
        $colegios = [];
        $ensinos = [];
        $cursoFillia = [];
        $conteudoEnsino = 0;
        $reqInscricao = [];
        $filliaPrices = 0;
        foreach ($fillias as $fillia) {
            $colegios[$fillia->id_fillia] = Fillia::findOrFail($fillia->id_fillia);
            $ensinos[$fillia->id_fillia] = Fillia_ensino::Where('id_fillia',$fillia->id_fillia)->get();
            $cursoFillia[$fillia->id_fillia] = Fillia_curso::Where('id_fillia',$fillia->id_fillia)->get();
            $conteudoEnsino = Ensino_conteudo::Where('id_ensino',$fillia->id_ensino)->first();
        }
        if ($newEnsino == 'ensino médio') {
            if ($colegio != null && $classe != null && $curso != null) {
                $reqInscricao['colegio'] = Fillia::findOrFail(intval($colegio))->name;
                $reqInscricao['id_colegio'] = Fillia::findOrFail(intval($colegio))->id;
                $reqInscricao['classe'] = strval($classe);
                $reqInscricao['curso'] = strval($curso);
                $filliaPrices = Fillial_price::Where('id_fillia',$colegio)->Where('classe',$classe)->Where('curso',str_replace('_',' ',$curso))->first();
             }
        } else {
            if ($colegio != null && $classe != null) {
                $reqInscricao['colegio'] = Fillia::findOrFail(intval($colegio))->name;
                $reqInscricao['id_colegio'] = Fillia::findOrFail(intval($colegio))->id;
                $reqInscricao['classe'] = strval($classe);
                $filliaPrices = Fillial_price::Where('id_fillia',$colegio)->Where('classe',$classe)->first();
             }
        }
        $dados = [
          'pagina'=>'',
          'ensino'=>$newEnsino,
          'cursos'=>$cursos,
          'ensinos'=>$ensinos,
          'colegios'=>$colegios,
          'cursosFillia'=>$cursoFillia,
          'contentEnsino'=>$conteudoEnsino,
          'reqInscricao'=>$reqInscricao,
          'filliaPrices'=>$filliaPrices,
        ];
        return view('paginas.inscrever',$dados);
    }

    public function sendInscrito(Request $request, string $ensino,int $colegio,string $classe, string $curso = null ){
        $ensino = str_replace('_',' ',$ensino);
        $course = Curso::Where('name',$curso)->first();
        $colle = Fillia::findOrFail($colegio);
        $course ? $curso = $course->id : $curso = 'inexistente';
        $request->nacionalidade == 'Nacional' ? $id_number = $request->bi : $id_number = $request->passaporte;
        $request->nacionalidade == 'Nacional' ? $image_bi = $request->image_bi : $image_bi = $request->image_passaporte;
            $dados = [
                'id_fillia'=>$colegio,
                'id_curso'=>$curso,
                'name' => $request->name,
                'nascimento' => $request->nascimento,
                'sexo' => $request->sexo,
                'nacionalidade' => $request->nacionalidade,
                'id_number' => $id_number,
                'image_bi' => $image_bi,
                'image_passe' => $request->image_passe,
                'certificado' => $request->certificado,
                'classe' => $classe,
                'name_encarregado' => $request->nome_encarregado,
                'telefone_encarregado' => $request->numero_encarregado,
                'email_encarregado' => $request->email_encarregado,
                'morada_encarregado' => $request->morada_encarregado,
                'description' => $request->message,
                'status'=>0
            ];
            if (!in_array("",$dados)) {
                if($this->verifyDate($dados['nascimento'],$ensino)){
                    return redirect()->back()->with('msg-error','Verifica melhor a idade informada!');
                }
                if ($this->verifyInscricao($dados['id_number'])) {
                    return redirect()->back()->with('msg-error','Já existe cadastro com essa inscrição!');
                }
                $college = strtoupper(str_replace(' ','_',$colle->name));
                $files = $this->UploadImagesInscrito($request,$college,$request->bi);
                if(!in_array("/chris.pdf",$files)){
                    $dados['image_bi'] = $files['image_bi'];
                    $dados['image_passe'] = $files['image_passe'];
                    $dados['certificado'] = $files['certificado'];
                }else {
                    return redirect()->back()->with('msg-error','Verifica os formatos dos arquivos, por favor!');
                }
                $inscrito = new Inscrito();
                $dados['id_curso'] = null;
                $inscrito->fill($dados);
                if ($inscrito->save()) {
                    // ENVIAR EMAIL FILLIA
                    $mycollege = Fillia::findOrFail($colegio);
                    $inscrito = Inscrito::Where('id_number',$dados['id_number'])->first();
                    if (!is_null($inscrito->curso)) {
                        $prices = Fillial_price::Where('id_fillia',$inscrito->id_fillia)->Where('classe',$inscrito->classe)->Where('curso',$course->name)->first();
                    } else {
                        $prices = Fillial_price::Where('id_fillia',$inscrito->id_fillia)->Where('classe',$inscrito->classe)->first();
                    }
                    $files = [];
                    $files['image_bi'] = public_path($inscrito->image_bi);
                    $files['image_passe'] = public_path($inscrito->image_passe);
                    $files['certificado'] = public_path($inscrito->certificado);
                    $dados ['mycollege'] = $mycollege;
                    $this->SendtoFillia($dados,$inscrito,$prices,$files, $mycollege->email);
                    // =====================
                    // ENVIAR EMAIL INSCRITO
                    $this->SendtoInscrito($dados,$inscrito,$prices,$inscrito->email_encarregado); 
                    // =======================
                    return redirect()->back()->with('msg-success','A sua inscrição foi realizada com sucesso, enviamos uma mensagem no seu email com os passos para concluir a sua inscrição, é obrigatório respoderes a mensagem, por favor entre no e-mail informado e responde, 72h para expiração!');
                } else {
                    return redirect()->back()->with('msg-error','Aconteceu um erro ao enviar a sua solicitação, estamos a resolver o probléma, por favor tente novamente!');
                }
                
            }
            return redirect()->back()->with('msg-error','Preencha Todos Os Campos do Formulário!');
    }


    private function UploadImagesInscrito($request,$colegio,$id){
        $images = ['image_bi'=>'/chris.pdf','image_passe'=>'/chris.pdf','certificado'=>'/chris.pdf'];
        //  UPLOAD DO BI
        if ($request->hasFile('image_bi') && $request->file('image_bi')->isValid()) {
            $requestImage = $request->image_bi;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getclientOriginalName().strtotime('now')).".".$extension;
            if ($requestImage->getclientmimeType() === "image/jpeg" OR $requestImage->getclientmimeType() === "image/png" OR $requestImage->getclientmimeType() === "image/jpg") {
                $requestImage->move(\public_path('images/colegios/'.$colegio.'/inscricao'.'/'.$id.'/'.'image_bi/'),$imageName);
                $request->image_bi = '/images/colegios/'.$colegio.'/inscricao'.'/'.$id.'/'.'image_bi/'.$imageName;
                $images['image_bi'] = $request->image_bi;
            }else{
            }
        }
        // ===============================================
                //  UPLOAD DO FOTO PASSE
                if ($request->hasFile('image_passe') && $request->file('image_passe')->isValid()) {
                    $requestImage = $request->image_passe;
                    $extension = $requestImage->extension();
                    $imageName = md5($requestImage->getclientOriginalName().strtotime('now')).".".$extension;
                    if ($requestImage->getclientmimeType() === "image/jpeg" OR $requestImage->getclientmimeType() === "image/png" OR $requestImage->getclientmimeType() === "image/jpg") {
                        $requestImage->move(\public_path('images/colegios/'.$colegio.'/inscricao'.'/'.$id.'/'.'image_passe/'),$imageName);
                        $request->image_passe = '/images/colegios/'.$colegio.'/inscricao'.'/'.$id.'/'.'image_passe/'.$imageName;
                        $images['image_passe'] = $request->image_passe;
                    }else{
                        if (file_exists(public_path($images['image_bi']))) {
                            unlink(public_path($images['image_bi']));
                        }
                    }
                }
                // ===============================================
              //  UPLOAD DO FOTO PASSE
              if ($request->hasFile('certificado') && $request->file('certificado')->isValid()) {
                $requestImage = $request->certificado;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getclientOriginalName().strtotime('now')).".".$extension;
                if ($requestImage->getclientmimeType() === "application/pdf") {
                    $requestImage->move(\public_path('images/colegios/'.$colegio.'/inscricao'.'/'.$id.'/'.'certificado/'),$imageName);
                    $request->certificado = '/images/colegios/'.$colegio.'/inscricao'.'/'.$id.'/'.'certificado/'.$imageName;
                    $images['certificado'] = $request->certificado;
                }else{
                    if (file_exists(public_path($images['image_passe']))) {
                        unlink(public_path($images['image_passe']));
                    }
                    if (file_exists(public_path($images['image_bi']))) {
                        unlink(public_path($images['image_bi']));
                    }
                }
            }
            // ===============================================    
           return $images;
    }

    // HELPERS SOLUCIONS
    private function verifyDate($date, $ensino){
        $idade = date('Y', strtotime('NOW')) - date('Y',strtotime($date));
        if ($idade < 4) {
            return true;
        } else {
            return false;
        }
    }

    private function verifyInscricao($bi){
       $inscrito = Inscrito::Where('id_number',$bi)->Where('status',0)->first();
       if ($inscrito) {
           return true;
       } else {
           return false;
       }
       
    }

    private function VerifySugest($email){
        $sugest = Sugest::Where('email',$email)->get();
        if (count($sugest) == 10) {
            return true;
        } else {
            return  false;
        }
        
    }

    private function myhelpbase($id){
        $classe = 1;
        $inscricao = 1900;   
        $confirmacao = 2500;   
        $uniforme = 4000;   
        $propina = 2100;   
        for ($i=1; $i <= 9 ; $i++) { 
             $filliaPrices = new Fillial_price();
             $filliaPrices->id_fillia = $id;
             $filliaPrices->classe = $classe;
             $filliaPrices->curso = 'inexistente';
             $filliaPrices->inscricao = $inscricao;
             $filliaPrices->confirmacao = $confirmacao;
             $filliaPrices->uniforme = $uniforme;
             $filliaPrices->propina = $propina;
             $filliaPrices->save();
             $inscricao += 200;   
             $confirmacao += 150;   
             $propina += 500;   
          $classe++;
        }   
    }
    private function myhelpmedio($filliaCursos){
           $classe = 10;
           for ($i=1; $i <= 3 ; $i++) { 
            $inscricao = 11200;   
            $confirmacao = 10100;   
            $uniforme = 12050;   
            $propina = 10500;   
            foreach ($filliaCursos as $curso) {
                $filliaPrices = new Fillial_price();
                $filliaPrices->id_fillia = 4;
                $filliaPrices->classe = $classe;
                $filliaPrices->curso = $curso->name_curso;
                $filliaPrices->inscricao = $inscricao;
                $filliaPrices->confirmacao = $confirmacao;
                $filliaPrices->uniforme = $uniforme;
                $filliaPrices->propina = $propina;
                $filliaPrices->save();
                $inscricao += 500;   
                $confirmacao += 770;   
                $propina += 1500;   
            }
            $classe++;
           }   
    }

    //Provides Emails 
    private function SendtoFillia($request,$inscrito,$prices,$files,$email){
        $message = $request;
        if (!is_null($request['id_curso'])) {
            $message['curso'] = Curso::findOrFail($request['id_curso'])->name;
        }else{$message['curso'] = null;}
        Mail::to($email)->send(new messagefillia($message,$inscrito,$prices,$files));
    }

    private function SendtoInscrito($request,$inscrito,$prices,$email){
        $message = $request;
        if (!is_null($request['id_curso'])) {
            $message['curso'] = Curso::findOrFail($request['id_curso'])->name;
        }else{$message['curso'] = null;}
        Mail::to($email)->send(new messageInscrito($message,$inscrito,$prices));
    }
}
