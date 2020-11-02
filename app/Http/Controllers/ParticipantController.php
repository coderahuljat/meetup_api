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

        $data = [
                  'status'          => 400,
                  'payload'         => [''],
                  'message'         => 'Empty data, data not saved'
                ];
        return $response = Response::json($data, 400);
    }

    public function update(Request $request, Participant $participant)
    {
      $postData = $request->all();
      if(!empty($postData))
      {

        $participant->name          = $postData['name'];
        $participant->age           = $postData['age'];
        $participant->dob           = $postData['dob'];
        $participant->profession    = $postData['profession'];
        $participant->no_of_guests  = $postData['no_of_guests'];
        $participant->address       = $postData['address'];
        $participant->save();

        $data = [
                  'status'          => 200,
                  'payload'         => $participant,
                  'message'         => 'Data updated successfully'
                ];
        return $response = Response::json($data, 200);
      }

      $data = [
                'status'          => 400,
                'payload'         => [''],
                'message'         => 'Empty data, data not updated'
              ];
      return $response = Response::json($data, 400);
    }
}
