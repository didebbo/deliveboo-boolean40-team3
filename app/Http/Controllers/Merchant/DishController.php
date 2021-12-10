<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    protected $validator = [
        'name' => ['required', 'string', 'max:50'],
        'ingredients' => ['nullable', 'string'],
        'description' => ['nullable', 'string'],
        'beverage' => ['nullable'],
        'price' => ['required', 'numeric', 'min:0', 'max:999.99'],
        'visible' => ['required', 'numeric', 'min:0', 'max:1'],
        'url_picture' => ['nullable', 'image', 'max:1000'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::where('user_id', Auth::user()->id)->get();
        return view('merchant.dishes.index', compact('dishes'));
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
        $request->validate($this->validator);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['ingredients'] = $data['ingredients'] ?? NULL;
        $data['description'] = $data['description'] ?? NULL;
        $data["beverage"] = isset($data["beverage"]) ? 1 : 0;
        if (isset($data["url_picture"])) {
            $ulr_path = Storage::put('uploads/dishes', $data["url_picture"]);
            $data["url_picture"] = $ulr_path;
        }
        $dish = Dish::create($data);
        return redirect()->route('merchant.dishes.show', compact('dish'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        if ($dish['user_id'] != Auth::user()->id) abort('401');
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
        if ($dish['user_id'] != Auth::user()->id) abort('401');
        return view('merchant.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate($this->validator);
        $data = $request->all();
        $data['ingredients'] = $data['ingredients'] ?? NULL;
        $data['description'] = $data['description'] ?? NULL;
        $data["beverage"] = isset($data["beverage"]) ? 1 : 0;
        if (isset($data["url_picture"])) {
            if ($dish['url_picture']) Storage::delete($dish['url_picture']);
            $ulr_path = Storage::put('uploads/dishes', $data["url_picture"]);
            $data["url_picture"] = $ulr_path;
        }
        $dish->update($data);
        return redirect()->route('merchant.dishes.show', compact('dish'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if ($dish['url_picture']) Storage::delete($dish['url_picture']);
        $dish->delete();
        return redirect()->route('merchant.dishes.index');
    }
}
