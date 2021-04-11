<?php

namespace App\Http\Livewire;

use App\Models\Advert;
use App\Models\Category;
use App\View\Components\advert as ComponentsAdvert;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class LandingCarrousels extends Component
{

    public $categoria;
    public $iduser;

    
    public function render($iduser = 0)
    {
        $categories = '[{"id":"0","name":"Ultimas publicaciones"}]';
        $categories = json_decode($categories);
        $adverts = DB::table('adverts')
        ->join('products_adverts','products_adverts.advert_id','=', 'adverts.id')
        ->join('currencies','products_adverts.currency_id', '=', 'currencies.id')
        ->join('townshipes','townshipes.id','=','adverts.township_id')
        ->join('departaments','departaments.id','=','townshipes.departament_id')
        ->join('users','adverts.user_id','users.id')
        ->join('adverts_photos', function ($join){
            $join->on('adverts.id','=','adverts_photos.advert_id')
                ->limit(1);
        })
        ->select('adverts.id as adverts_id', 'adverts.*','users.profile_photo_path as imgUser','adverts_photos.photo_path as imgAdvert', 'users.name as user_name','products_adverts.id as product_id', 'products_adverts.*','townshipes.name as township','departaments.name as departament')
        ->when( $this->iduser != 0 ,function ($query, $role){
            return $query->where('adverts.user_id', '=', $this->iduser);
        })
        ->where('advert_status_id',1)
        ->orderBy('creation_date','desc')
        ->limit(20)->get();

        return view('livewire.landing-carrousels',compact('categories','adverts'));
    }

    public static function categoria($categoria){
        $categories = DB::table('categories')->select()->where('id', $categoria)->get();
        $adverts = DB::table('adverts')
        ->join('products_adverts','products_adverts.advert_id','=', 'adverts.id')
        ->join('currencies','products_adverts.currency_id', '=', 'currencies.id')
        ->join('townshipes','townshipes.id','=','adverts.township_id')
        ->join('departaments','departaments.id','=','townshipes.departament_id')
        ->join('users','adverts.user_id','users.id')
        ->join('adverts_photos', function ($join){
            $join->on('adverts.id','=','adverts_photos.advert_id')
                ->limit(1);
        })
        ->select('adverts.id as adverts_id', 'adverts.*', 'users.profile_photo_path as imgUser','adverts_photos.photo_path as imgAdvert', 'users.name as user_name','products_adverts.id as product_id', 'products_adverts.*','townshipes.name as township','departaments.name as departament')
        ->where('category_id',$categoria)
        ->where('advert_status_id',1)
        ->orderBy('creation_date','desc')
        ->limit(10)->get();

        return view('livewire.landing-carrousels',compact('categories','adverts'));
    }
    
}
