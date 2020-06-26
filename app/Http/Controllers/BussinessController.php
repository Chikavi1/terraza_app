<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ImageUpload;
use App\ImagesBussiness;
use App\reservation;
use App\bussiness;
use Carbon\Carbon;
class BussinessController extends Controller
{
    use ImageUpload;
    public function __construct()
    {
        $this->middleware('auth')->only(['create','checking']);
    }
  
    public function index()
    {
       return view('bussiness.index');
    }

 
    public function create()
    {
       return view('bussiness.create');
    }

    public function store(Request $request)
    {
      if ($request->hasFile('image')) {
      $filePath = $this->UserImageUpload($request->file('image'));
      }

      $services = implode(", ",$request->get('services'));
      $schedule = $request->get('inicia').' - '.$request->get('finaliza');
      bussiness::create([
        'name' => $request->get('name'),
        'image' => $filePath,
        'price' => $request->get('price'),
        'description' => $request->get('description'),
        'services' => $services,
        'direction' => $request->get('direction'),
        'category' => $request->get('category'),
        'latitude' => $request->get('latitude'),
        'longitude' => $request->get('longitude'),
        'phone' => $request->get('phone'),
        'peopleLimit' => $request->get('peopleLimit'),
        'city' => $request->get('city'),
        'schedule' => $schedule,
        'user_id' => \Auth::user()->id
      ]);
      return redirect()->back();
    }

  public function storeImages(Request $request){
     $request->validate([
          'image' => 'required'
        ]);
        $caca = $request->file('image');

        if ($request->hasFile('image')) {

            foreach($caca as $file){
              $filePath = $this->UserImageUpload($file); 
                ImagesBussiness::create([
                  'image' => $filePath,
                  'bussiness_id' => $request->get('negocioId')
                ]);
              }
        }
  }
  public function checking(Request $request){
    dd($request->all());
  }

    public function show($id)
    {
        $now = Carbon::today();
        $terrace = bussiness::findOrFail($id);
        $services = explode(',', $terrace->services);
        $reviews = $terrace->reviews->take(1);
        $reservations = reservation::where('bussiness_id',$id)->whereDate('day', '>=', $now)->select('day')->get();
        $imagenes = $terrace->ImagesBussinesses;
       return view('bussiness.show')->with(
        compact('terrace','reservations','services','reviews','imagenes'));
    }
    public function edit($id){

    }
    public function addImages(Request $request){
      $negocioId = $request->get('negocio');
      $images = ImagesBussiness::where('bussiness_id',1)->get();
      return view('bussiness.addImages')->with(compact('negocioId','images'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
