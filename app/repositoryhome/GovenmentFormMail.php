<?php


namespace App\repositoryhome;
use Mail;

use App\Http\Requests\PhpMail;
use App\EmailUsers;

class GovenmentFormMail
{
    public function sendMail( $request)
    {

//dd($request);
        $data =

            [
                'sector_name' => $request->sector_name,
                'email' => $request->email,
                'person_name' => $request->person_name,
                'phone' => $request->phone,
                 'city' => $request->city,
                'text' => $request->text,
                'car_name' => $request->car_name,
                'brand'=>$request->brand,
                'classname'=>$request->classname,
                'newclass'=>$request->newclass,
                'carmodel'=>$request->carmodel,
                //'car_name'=>$request->car_name,
                'carnum'=>$request->carnum,
            ];
        Mail::send('GovernmentFormMail', $data, function ($message) {
            $data=EmailUsers::all();
            $cc=str_replace('"',"",json_encode($data[0]->gov_cc));
            $cc=str_replace('[',"",$cc);
            $cc=str_replace(']',"",$cc);
            $cc=explode(",", $cc);
            $message->to($data[0]->gov_to, 'attcar')->subject('Attractive Car Contact For Government Forms  ');
            $message->from($cc, 'server');
        });

    }

}
