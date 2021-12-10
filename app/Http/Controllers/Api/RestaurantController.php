<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\Builder;

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
        dd($users);
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function show(Request $request)
    {
        dd($request->all());
    }
}
