<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\bussiness;
use Carbon\Carbon;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['index','user']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function store(Request $request)
    {
       $datetime = Carbon::createFromFormat('d-m-Y', '23-01-2016');
        dd($datetime);
        dd($request->all());
    }

    public function search(Request $request){
        $place = $request->get('place');
        $minimum = $request->get('minimo');
        $maximum = $request->get('maximo');
        $services = $request->get('servicios');

        $terraices = bussiness::orderBy('price','asc')
        ->place($place)
        ->minimum($minimum)
        ->maximum($maximum)
        ->services($services)
        ->paginate(15);

        return view('search')->with(compact('terraices','place','minimum','maximum'));
    }
    public function user(){
        $user = \Auth::user();
        $negocios = $user->bussinesses;
        return view('profile')->with(compact('user','negocios'));
    }
}
