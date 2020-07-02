<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bussiness;

use App\reservation;
use DB;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bussiness = bussiness::all();
      return response()->json([
                    'data' => $bussiness
                ]);
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
     public function show($id)
    {   
       $bussiness = bussiness::find($id);
       $reviews = $bussiness->reviews->map(function ($user) {
            return collect($user->toArray())
                ->only(['created_at', 'description'])
                ->all();
        });
       $images = $bussiness->ImagesBussinesses->map(function ($user) {
            return collect($user->toArray())
                ->only('image')
                ->all();
        });
       $bussiness = Bussiness::findOrFail($id);
        return response()->json([
                    'data' => $bussiness,
                    'reviews' => $reviews,
                    'images' => $images
                ]);
    }

    public function checkDay(Request $request)
    {
        $reservation = reservation::where('day','=',$request->get('day'))
        ->where('bussiness_id','=', $request->get('bussiness_id'))->first();
        if($reservation == null){
            return response()->json([
            'message' => 'La Fecha esta Disponible.',
            'status' => 'success'
            ]);
        }else{
            return response()->json([
            'message' => 'La Fecha ya esta apartada.',
            'status' => 'danger'
            ]);
        }
      
    }

    public function getReserves($id){
      return reservation::where('user_id','=',$id)->get();

    }
    public  function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }
    public function createReservation(Request $request){
        $reservation = new reservation([
            "bussiness_id"=> $request->get('bussiness_id'),
            "user_id"=> $request->get('user_id'),
            "price"=>$request->get('price'),
            "day"=> $request->get('day'),
            "status" => "approved",
            "description" => "Appcompra",
            "invoice" => $this->generateRandomString()
        ]);

        $reservation->save();
        return response()->json([
            'message' =>$reservation->invoice,
            ]);
    }
   
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request){

        $place = $request->get('q');
        $terraices = bussiness::orderBy('price','asc')
        ->place($place)->paginate(15);

      return response()->json([
                    'data' => $terraices
                ]);

    }

     public function searchByLatLng(Request $request){
        $lat = $request->get("latitud");
        $lng = $request->get("longitud");
        $distance = 5;
        $bussiness = DB::select(DB::raw('SELECT *,
        TRUNCATE(6371 * 
        acos( cos( radians(' . $lat . ') ) * 
        cos( radians( latitude ) ) * 
        cos( radians( longitude ) - 
        radians(' . $lng . ') ) + 
        sin( radians(' . $lat .') ) *
        sin( radians(latitude) ) ),2)
        AS distance FROM bussinesses HAVING distance < ' . $distance . ' ORDER BY distance') );
        return response()->json([
                    'data' => $bussiness
                ]);
    }
}
