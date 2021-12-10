<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\User;
use App\Dish;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        // città di default Milano
        $city = $request['city'] ?? 'milan';
        // query per filtrare la città
        $users = User::where('city', $city);

        //  filtra by categories && name
        if (isset($request['categories']) && isset($request['name'])) {
            $categories = explode(",", $request['categories']);
            foreach ($categories as $category) {
                $users = $users->whereHas('categories', function (Builder $query) use ($category) {
                    $query->where('name', $category);
                });
            }
            $users = $users->where('name', 'LIKE', '%' . $request['name'] . '%')->get();
        }
        // filtra by categories
        else if (isset($request['categories'])) {
            $categories = explode(",", $request['categories']);            
            foreach ($categories as $category) {
                $users = $users->whereHas('categories', function (Builder $query) use ($category) {
                    $query->where('name', $category);
                });
            }
            $users = $users->get();
        }
        // filtra by name
        else if (isset($request['name'])) {
            $users->where('name', 'LIKE', '%' . $request['name'] . '%')->get();
        }
        // filtra by city
        else {
            $users = $users->get();
        }
        
        // controllo se la query ha trovato almeno un user(ristorante) e restituisce file json
        if ($users->isNotEmpty())  {
            return response()->json([
                'success' => true,
                'data' => $users
            ]);
        }
        return response()->json([
            'success' => false,
            'data' => null
        ]);
    }

    public function show($id)
    {
        // query per restituire il ristorante desiderato
        $user = User::where('id', $id)->first();
        
        // controllo se la query ha trovato almeno un user(ristorante) e restituisce file json
        if ($user){
            $dishes = Dish::where('user_id', $id)->get();
            return response()->json([
                'success' => true,
                'data' => ['user'=>$user, 'dishes'=> $dishes]
            ]);
        }
        return response()->json([
            'success' => false,
            'data' => null
        ]);
    }
}
