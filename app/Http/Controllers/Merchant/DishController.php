<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        dd($dishes);
        return view('merchant.dishes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newDish = new Dish();
        $newDish->user_id = 1;
        $newDish->name = 'pasta';
        $newDish->ingredients = 'farina, pomodoro';
        $newDish->description = 'buonissima';
        $newDish->price = 4;
        $newDish->visible = 1;
        $newDish->url_picture = '/foto';
        $newDish->save();

        return redirect()->route('merchant.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('merchant.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        // dd($dish);
        return view('merchant.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Dish $dish)
    {
        $dish->user_id = 1;
        $dish->name = 'spaghetti';
        $dish->ingredients = 'farina, pomodoro';
        $dish->description = 'cosi cosi';
        $dish->price = 5;
        $dish->visible = 1;
        $dish->url_picture = '/foto';
        $dish->save();

        return redirect()->route('merchant.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('merchant.dishes.index');
    }
}
