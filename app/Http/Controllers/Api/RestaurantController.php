<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Builder;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        // città di default Milano
        $city = $request['city'] ?? 'milan';

        //  filtra by categories && name && city;
        if (isset($request['categories']) && isset($request['name'])) {
            $categories = explode(",", $request['categories']);
            $users = User::where('city', $city);
            foreach ($categories as $category) {
                $users = $users->whereHas('categories', function (Builder $query) use ($category) {
                    $query->where('name', $category);
                });
            }
            $users = $users->where('name', 'LIKE', '%' . $request['name'] . '%')->get();
        }
        // filtra by categories && city;
        else if (isset($request['categories'])) {
            $categories = explode(",", $request['categories']);
            $users = User::where('city', $city);
            foreach ($categories as $category) {
                $users = $users->whereHas('categories', function (Builder $query) use ($category) {
                    $query->where('name', $category);
                });
            }
            $users = $users->get();
        }
        // filtra by name && city;
        else if (isset($request['name'])) {
            $users = User::where([['city', $city], ['name', 'LIKE', '%' . $request['name'] . '%']])->get();
        }
        // filtra by city
        else {
            $users = User::where('city', $city)->get();
        }
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
