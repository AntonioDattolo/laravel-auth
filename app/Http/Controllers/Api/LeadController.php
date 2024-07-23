<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// importare il validator
use Illuminate\Support\Facades\Validator;
//importare la superclasse Mail
use Illuminate\Support\Facades\Mail;
// importare il modello da usare (Lead)
use App\Models\Lead;
//importare la classe per la mail 
use App\Mail\NewLeadMessage;
class LeadController extends Controller
{
    //creare meotodo di store per salvare i dati da inserire nella mail dal formo del FrontEnd
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,['name' => 'required', 'email' => 'required', 'message' => 'required']);
        // in caso di errori nel form ( validation error)
        if($validator->fails()){
            return response()->json([
                'success' => false,
                //creo chiave con array per gli errori
                'errors' => $validator->errors()
            ]);
        }

        // passata la validazione salvare i dati nel db 
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        // inviare la mail con i dati salvati nel db
        Mail::to('nome@fasullo.com')->send(new NewLeadMessage($newLead));

        // ritorno alla chiamata axios il success->true 
        return response()->json([
            'success' => true,
        ]);


    }
}
