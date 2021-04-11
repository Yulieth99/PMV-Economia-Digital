<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Advert;
use App\Models\User;
use App\View\Components\advert as ComponentsAdvert;
use Illuminate\Support\Facades\DB;

class advertUserController extends Controller
{
    

public function filterUser(Request $request){   

    $fill = [];

    $idUser = auth()->user()->id;
    $adverts = DB::table('adverts')->join('products_adverts','products_adverts.advert_id','=', 'adverts.id')
    ->join('currencies','products_adverts.currency_id', '=', 'currencies.id')
    ->join('townshipes','townshipes.id','=','adverts.township_id')
    ->join('departaments','departaments.id','=','townshipes.departament_id')
    ->join('users','adverts.user_id', 'users.id')
    ->join('adverts_photos', function ($join){
        $join->on('adverts.id','=','adverts_photos.advert_id')
            ->limit(1);
    })
    ->select('adverts.id as adverts_id', 'adverts.*','users.profile_photo_path as imgUser','adverts_photos.photo_path as imgAdvert','products_adverts.id as product_id', 'products_adverts.*','townshipes.name as township','departaments.name as departament')
    ->when(isset($_GET['category']),function ($query, $role){
            return $query->where('category_id', $_GET['category']);
        })
    ->when(isset($_GET['depto']),function ($query, $role){
            return $query->where('departaments.id', $_GET['depto']);
        })
        ->when(isset($_GET['muni']),function($query, $role){
            return $query->where('township_id', $_GET['muni']);
         })
        ->when(isset($_GET['noactivo']),function ($query, $role){
            return $query->where('advert_status_id','<>', $_GET['noactivo']);
        })
    ->when(isset($_GET['noinactivo']),function($query, $role){
            return $query->where('advert_status_id','<>', $_GET['noinactivo']);
         })
    ->when(isset($_GET['desde']),function($query, $role){
            return $query->where('creation_Date','>=', $_GET['desde']);
         })
    ->when(isset($_GET['hasta']),function($query, $role){
            return $query->where('creation_Date','<=', $_GET['hasta']);
         })
    ->when(isset($_GET['order']),function($query, $role){
            switch ($_GET['order']) {
                case '0':
                    return $query->orderBy('creation_Date', 'desc');
                    break;
                case '1':
                    return $query->orderBy('creation_Date', 'asc');
                    break;
                case '2':
                    return $query->orderBy('price', 'desc');
                    break;
                case '3':
                    return $query->orderBy('price', 'asc');
                    break;
                default:
                    return $query->orderBy('creation_Date', 'desc');
                    break;
            }
         })
         ->when(!isset($_GET['order']),function($query, $role){
            return $query->orderBy('creation_Date', 'desc');
         })
    ->where('adverts.user_id', '=', $idUser)
    ->paginate(9);



    if(isset($_GET['depto'])){
        $depto = $_GET['depto'];
    }else{
        $depto = "0";
    }

    if(isset($_GET['muni'])){
        $muni = $_GET['muni'];
    }else{
        $muni = "0";
    }

    if(isset($_GET['category'])){
        $cat = $_GET['category'];
    }else{
        $cat = "0";
    }
    if(isset($_GET['order'])){
        $order = $_GET['order'];
    }else{
        $order = "0";
    }
    if(isset($_GET['desde'])){
        $desde = $_GET['desde'];
    }else{
        $desde = "";
    }
    if(isset($_GET['hasta'])){
        $hasta = $_GET['hasta'];
    }else{
        $hasta = "";
    }




    return view("components.adverts", compact('adverts', 'idUser', 'depto', 'cat', 'muni', 'order', 'desde', 'hasta'));
    }

    public function filter(Request $request){   

        $fill = [];
    
        $adverts = DB::table('adverts')->join('products_adverts','products_adverts.advert_id','=', 'adverts.id')
        ->join('currencies','products_adverts.currency_id', '=', 'currencies.id')
        ->join('townshipes','townshipes.id','=','adverts.township_id')
        ->join('departaments','departaments.id','=','townshipes.departament_id')
        ->join('users','adverts.user_id', 'users.id')
        ->join('adverts_photos', function ($join){
            $join->on('adverts.id','=','adverts_photos.advert_id')
                ->limit(1);
        })
        ->select('adverts.id as adverts_id', 'adverts.*','users.name as user_name','users.profile_photo_path as imgUser','adverts_photos.photo_path as imgAdvert','products_adverts.id as product_id', 'products_adverts.*','townshipes.name as township','departaments.name as departament')
        ->when(isset($_GET['category']),function ($query, $role){
                return $query->where('category_id', $_GET['category']);
            })
        ->when(isset($_GET['depto']),function ($query, $role){
                return $query->where('departaments.id', $_GET['depto']);
            })
            ->when(isset($_GET['muni']),function($query, $role){
                return $query->where('township_id', $_GET['muni']);
             })
            ->when(isset($_GET['noactivo']),function ($query, $role){
                return $query->where('advert_status_id','<>', $_GET['noactivo']);
            })
        ->when(isset($_GET['noinactivo']),function($query, $role){
                return $query->where('advert_status_id','<>', $_GET['noinactivo']);
             })
        ->when(isset($_GET['desde']),function($query, $role){
                return $query->where('creation_Date','>=', $_GET['desde']);
             })
        ->when(isset($_GET['hasta']),function($query, $role){
                return $query->where('creation_Date','<=', $_GET['hasta']);
             })
        ->when(isset($_GET['order']),function($query, $role){
                switch ($_GET['order']) {
                    case '0':
                        return $query->orderBy('creation_Date', 'desc');
                        break;
                    case '1':
                        return $query->orderBy('creation_Date', 'asc');
                        break;
                    case '2':
                        return $query->orderBy('price', 'desc');
                        break;
                    case '3':
                        return $query->orderBy('price', 'asc');
                        break;
                    default:
                        return $query->orderBy('creation_Date', 'desc');
                        break;
                }
             })
             ->when(!isset($_GET['order']),function($query, $role){
                return $query->orderBy('creation_Date', 'desc');
             })
        ->paginate(9);
    
    
    
        if(isset($_GET['depto'])){
            $depto = $_GET['depto'];
        }else{
            $depto = "0";
        }
    
        if(isset($_GET['muni'])){
            $muni = $_GET['muni'];
        }else{
            $muni = "0";
        }
    
        if(isset($_GET['category'])){
            $cat = $_GET['category'];
        }else{
            $cat = "0";
        }
        if(isset($_GET['order'])){
            $order = $_GET['order'];
        }else{
            $order = "0";
        }
        if(isset($_GET['desde'])){
            $desde = $_GET['desde'];
        }else{
            $desde = "";
        }
        if(isset($_GET['hasta'])){
            $hasta = $_GET['hasta'];
        }else{
            $hasta = "";
        }
    
    
    
    
        return view("components.adverts", compact('adverts', 'depto', 'cat', 'muni', 'order', 'desde', 'hasta'));
        }
    
    

        public function edit($anuncio)
        {
            $anuncioAct = Advert::find($anuncio);
            $anuncioAct->advert_status_id=2;
            $anuncioAct->update();
            
            return redirect()->to('advertsUser/show/f?');
        }


}
