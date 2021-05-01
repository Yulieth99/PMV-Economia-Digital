<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertComment;
use App\Models\AdvertPhoto;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Departament;
use App\Models\Product;
use App\Models\Qualification;
use App\Models\Township;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class AdvertController extends Controller
{
    public function show($id){
        $advert = Advert::find($id);
        
        $adProduct = Product::where('advert_id',$id)->first(); 
        $currency = Currency::find($adProduct->currency_id);

        $currency = $currency->currency_type;
        $township = Township::find($advert->township_id);
        $department = Departament::find($township->departament_id);
        $township = $township->name;
        $department = $department->name;
        $user = User::find($advert->user_id);
        $townshipUserk = Township::find($user->township);
        $departmentUser = Departament::find($townshipUserk->departament_id);
        $townshipUser = $townshipUserk->name;
        $departmentUser = $departmentUser->name;
        $AlladdsUser = Advert::where('user_id',$user->id )->get()->count();
        $adsActive = Advert::where('user_id',$user->id )->where('advert_status_id', 1)->get()->count();

        $photos = AdvertPhoto::where('advert_id',$id)->get(); 
        $userAuth=Auth::id(); 
        $category = Category::find(($advert->category_id));
        $category = $category->name;
        $di = 11;
        // valoracion
        
        
        $calificacion = DB::table('qualifications')->select(DB::raw('SUM(qualification) / ((COUNT(qualification) * 5) / 100) as rating')) ->where('qualified',$user->id)->get() ;
        $val= json_decode($calificacion,true);
        $val =number_format($val[0]["rating"],0);
       
        
           
        Carbon::setLocale('es');
        
         $dat = new Carbon($user->created_at);
         
         $userDt= [$dat->getTranslatedMonthName(), $dat->year];
         $dat2 = new Carbon($advert->creation_date);     

         $advertDt=[$dat2->day, $dat->getTranslatedMonthName(), $dat2->year];
        
         
        
       
        

        return view('advert.show', compact('userAuth','val','townshipUser','departmentUser','userDt','advertDt', 'advert', 'category','adProduct','currency','township','department','user','adsActive','AlladdsUser','photos'));


    }
     public function search(Request $request){
        
if($request->word == null && $request->contenido !='Todos' ) {
    $adverts = DB::table('adverts')
         ->select(DB::raw('adverts.id as advert_id,adverts.title,adverts.creation_date,townshipes.name as township,departaments.name as departament ,users.id as user_id,users.name as user_name ,users.profile_photo_path as imgUser , adverts_photos.photo_path as imgAdvert ,products_adverts.price'))
  
        ->join('products_adverts','adverts.id','=','products_adverts.advert_id')
          ->join('adverts_photos','adverts.id','=','adverts_photos.advert_id')
           ->join('users','adverts.user_id','=','users.id')
           ->join('townshipes','adverts.township_id','=','townshipes.id')
           ->join('departaments','townshipes.departament_id','=','departaments.id')
           ->where('adverts.cadAdvert','LIKE',"%{$request->contenido}%")->paginate(9);

           return view("components.adverts2", compact('adverts'));



}   
if($request->word == null && $request->contenido == 'Todos' ) {
    $adverts = DB::table('adverts')
         ->select(DB::raw('adverts.id as advert_id,adverts.title,adverts.creation_date,townshipes.name as township,departaments.name as departament ,users.id as user_id,users.name as user_name ,users.profile_photo_path as imgUser , adverts_photos.photo_path as imgAdvert ,products_adverts.price'))
  
        ->join('products_adverts','adverts.id','=','products_adverts.advert_id')
          ->join('adverts_photos','adverts.id','=','adverts_photos.advert_id')
           ->join('users','adverts.user_id','=','users.id')
           ->join('townshipes','adverts.township_id','=','townshipes.id')
           ->join('departaments','townshipes.departament_id','=','departaments.id')
           ->paginate(9);
           return view("components.adverts2", compact('adverts'));



} 
 
      
         if($request->contenido =='Todos'){
            $adverts = DB::table('adverts')
            ->select(DB::raw('adverts.id as advert_id,adverts.title,adverts.creation_date,townshipes.name as township,departaments.name as departament ,users.id as user_id,users.name as user_name ,users.profile_photo_path as imgUser , adverts_photos.photo_path as imgAdvert ,products_adverts.price'))
     
           ->join('products_adverts','adverts.id','=','products_adverts.advert_id')
             ->join('adverts_photos','adverts.id','=','adverts_photos.advert_id')
              ->join('users','adverts.user_id','=','users.id')
              ->join('townshipes','adverts.township_id','=','townshipes.id')
              ->join('departaments','townshipes.departament_id','=','departaments.id')
              ->where('adverts.title','LIKE',"%{$request->word}%")->paginate(9);

         }else{
            $adverts = DB::table('adverts')
         ->select(DB::raw('adverts.id as advert_id,adverts.title,adverts.creation_date,townshipes.name as township,departaments.name as departament ,users.id as user_id,users.name as user_name ,users.profile_photo_path as imgUser , adverts_photos.photo_path as imgAdvert ,products_adverts.price'))
  
        ->join('products_adverts','adverts.id','=','products_adverts.advert_id')
          ->join('adverts_photos','adverts.id','=','adverts_photos.advert_id')
           ->join('users','adverts.user_id','=','users.id')
           ->join('townshipes','adverts.township_id','=','townshipes.id')
           ->join('departaments','townshipes.departament_id','=','departaments.id')
           ->where('adverts.title','LIKE',"%{$request->word}%")
           ->where('adverts.cadAdvert','LIKE',"%{$request->contenido}%")->paginate(9);

         }
         return view("components.adverts2", compact('adverts'));

         
        //$anuncios = DB::select('SELECT * FROM adverts WHERE title LIKE "%:word%" ', ['word' => $request->word]);

     }

   /* public function storeComment(Request $request){  #No esta completa - No es funcional
        
        $date = new Carbon();
        $comment = new AdvertComment();
        $comment->commentary = $request->commentary;
        $comment->user_id = $request->user_id;
        $comment->advert_id = $request->advert_id;
        $comment->creation_date= $date->format('Y-m-d'); 
        $comment->parent_id= $request->parent_id;
        $comment->save();
        
        return redirect()->route('advert.show', $request->advert_id);
    
    }*/
}
