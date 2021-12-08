<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Category;

class UserController extends Controller
{

    protected $validator = [
        'city' => ['required', 'string', 'max:50'],
        'address' => ['required', 'string', 'max:150'],
        'adv' => ['nullable', 'string', 'max:65535'],
        'url_picture' => ['nullable', 'image', 'max:1000'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('merchant.profile.show', compact('user', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $categories = Category::all();
        // dd($categories);
        return view('merchant.profile.edit', compact('user', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate($this->validator);
        $data = $request->all();
        $data["adv"] = $data["adv"] ?? NULL;
        // $data["url_picture"] = $data["url_picture"] ?? NULL;
        if (isset($data["url_picture"])) {
            if ($user['url_picture']) Storage::delete($user['url_picture']);
            $ulr_path = Storage::put('uploads/users', $data["url_picture"]);
            $data["url_picture"] = $ulr_path;
        }
        $data['categories'] = $data['categories'] ?? [];
        $user->update($data);
        $user->categories()->sync($request['categories']);
        return redirect()->route('merchant.profile.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* 
        Elimina immagine associata al ristorante
        Utilizzare nel caso in cui si implementa la possibilità di eliminare un utente 
        */
        // if ($user['url_picture']) Storage::delete($user['url_picture']);


        /* 
        ...
        Eliminazione Utente ...
        ...
        */
    }
}
