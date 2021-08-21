<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use DB;


class RegisterController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        
    
        $registration_no = mt_rand(1000000000, 9999999999);
        $name = $request->name;
        $age = $request->age;
        $dob = $request->dob;
        $profession = $request->profession;
        $locality = $request->locality;
        $no_of_guests = $request->no_of_guests;
        $address = $request->address;
        $created_at = now();

        try {

                $data=array('registration_no'=>$registration_no,"name"=>$name,"age"=>$age,"dob"=>$dob,"profession"=>$profession,"locality"=>$locality,"no_of_guests"=>$no_of_guests,"address"=>$address,"created_at"=>$created_at);
                   $insert=DB::table('registration')->insert($data);

                if($insert > 0){
                         return response()->json(['status' => true,'status_code' =>200,'message' => 'Record inserted successfully','Registration No' => $registration_no], 200);
                      }else{

                         return response()->json(['status' => true,'status_code' =>404,'message' => 'Somthing Went Wrong..!'], 404);

                      }

            } catch (Throwable $e) {

                return response()->json(['status' => true,'status_code' =>404,'message' => 'Somthing Went Wrong..!'], 404);

            }

                
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $list = DB::table('registration')->select('registration_no', 'name', 'age', 'dob','profession','locality','no_of_guests','address','created_at')->where('deleted_at',null)->get();

          if(count($list) > 0){
                 return response()->json(['status' => true,'status_code' =>200,'message' => 'Registration List','registration_data' => $list], 200);
              }else{

                 return response()->json(['status' => true,'status_code' =>404,'message' => 'Record not found..!!','registration_data' =>[]], 404);

              }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdatePostRequest $request)
    {

        $registration_no = $request->registration_no;
        $name = $request->name;
        $age = $request->age;
        $dob = $request->dob;
        $profession = $request->profession;
        $locality = $request->locality;
        $no_of_guests = $request->no_of_guests;
        $address = $request->address;
        $updated_at = now();


        try {

             $data=array('registration_no'=>$registration_no,"name"=>$name,"age"=>$age,"dob"=>$dob,"profession"=>$profession,"locality"=>$locality,"no_of_guests"=>$no_of_guests,"address"=>$address,"updated_at"=>$updated_at);

            $update = DB::table('registration')
                  ->where('registration_no', $registration_no)
                  ->update($data);

                  if($update > 0){
                     return response()->json(['status' => true,'status_code' =>200,'message' => 'Record updated successfully'], 200);
                  }else{

                     return response()->json(['status' => true,'status_code' =>404,'message' => 'Somthing Went Wrong..!'], 404);

                  }
                  
            } catch (Throwable $e) {
                return response()->json(['status' => true,'status_code' =>404,'message' => 'Somthing Went Wrong..!'], 404);
            }
       

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
}
