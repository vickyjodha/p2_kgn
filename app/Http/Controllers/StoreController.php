<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;
class StoreController extends Controller
{
    public function index(Request $request){
        // $ip = $request->ip();
        $ip = '162.159.24.227'; /* Static IP address */
        $currentUserInfo = Location::get($ip);
        // $longitude =$currentUserInfo->longitude;
        // $latitude =$currentUserInfo->latitude;
        // dd($longitude,$latitude);
        $longitude =73.0243;
        $latitude =26.2389;
        $store = Store::select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                            * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                            + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"));
        $store          =  $store->having('distance', '<=', 10);
        $store          =  $store->orderBy('distance', 'asc');
        $store =$store->get();
        // $store =$store->get()->toArray();
        return view('front.store.index',compact('store'));
    }
}
