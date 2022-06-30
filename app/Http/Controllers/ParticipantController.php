<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use Response;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participant = Participant::paginate(10);
        if($participant)
        {
          $data = [
                    'status'          => 200,
                    'payload'         => $participant,
                    'message'         => 'Data retrieved successfully.'
                  ];
          return $response = Response::json($data, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->all();
        if(!empty($postData['data']))
        {
          foreach ($postData['data'] as $data)
          {
            $savedData[] = Participant::create($data);
          }

          $data = [
                    'status'          => 200,
                    'payload'         => $savedData,
                    'message'         => 'Data saved successfully'
                  ];
          return $response = Response::json($data, 200);
        }
    }

    public function update(Request $request, Participant $participant)
    {
        $requestData = $request->all();
        $participant->update( $requestData );
        $data = ['status'=> 200,'payload' => $participant, 'message' => 'Data updated successfully'];
        return $response = Response::json($data, 200);
      
    }
}
