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
        $usersAll = User::all();
        // $category = ['italiano', 'pizza'];
        // $categories = explode(",", $request['categories']);
        // dd($categories);

        // $users = User::whereHas('categories', function (Builder $query) {
        //     // $categories = ['italiano', 'pizza'];
        //     $query->where('name', 'like', 'italiano') 
        //     ->where('name','like', 'pizza');
        //     // $query->get();
        //     // $query->whereIn('name', $category);
        // })->get();

        // // $users = User::whereHas('categories', function(){
        // //    return Category::where('name', 'italiano');
        // // })->get();
        // // only users that have categories ...
        // dd($users);

        // foreach ($usersAll as $user) {
        //     // dd($user->categories);
        //     foreach ($user->categories as $category) {
        //         $users = User::where($category['name'], 'pizza')->get();
        //     }
        //     // $users = User::where($user->categories['name'], 'pizza')->get();
        // }
        // dd($users);
        // // User::whereIn(User->categories(), ['italiano', 'pizza'])->get();


        // dd($users->categories);
        // // dd($users['categories']);
        // $category = $request['categories'];
        // // dd($request->all());
        // // dd($request['categories']);
        // $restaurantsFiltered = User::where([
        //     ['city','=', $request['city']],
        //     ['categories', '=', ]
        // ]$users['categories'], $category)->get();
        // // dd($restaurantsFiltered);

        // città di default Milano
        $city = $request['city'] ?? 'milan';
        $categories = $request['categories'] ?? null;

        if(isset($request['category']) && isset($request['name'])) {
            //  filtra by category && name && city;
            $users = ['categorie e nome'];
        }
        else if (isset($request['categories'])) {
            //     filtra by category && city;
            $users = User::whereHas('categories', function (Builder $query, $categories) {
                $categories = explode(",", $categories);
                $query->whereIn('name', $categories);
            })->where('city', $city)->get();
        }
        else if (isset($request['name'])) {
            //     filtra by name && city;
            $users = User::where([['city', $city], ['name', $request['name']] ])->get();
        }
        else {
            // filtra by city
            $users = User::where('city', $city)->get();

        }
        // $users = User::where([['city', $request['city']], ['name', $request['name']]])->get();

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
