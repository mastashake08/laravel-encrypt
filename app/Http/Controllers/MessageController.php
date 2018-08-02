<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Notifications\MessageCreated;
use Illuminate\Contracts\Encryption\DecryptException;
class MessageController extends Controller
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
        $message = Message::Create([
          'content' => encrypt($request->content),
          'passphrase' => encrypt($request->password),
          'email' => $request->email
        ]);
        $message->notify(new MessageCreated($message));
        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $message = Message::findOrFail($id);
        return view('message')->with([
          'message' => $message
        ]);
    }

    public function decrypt(Request $request, $id){
      try{
      $message = Message::findOrFail($id);
      if($request->password == decrypt($message->passphrase)){
        $message = decrypt($message->content);
        $with = [
          'message' => $message
        ];
        return response()->json($with);
        }
      }
      catch (DecryptException $e){
        return response()->json($e);
      }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
}
