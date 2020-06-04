<?php

namespace App\repositoryhome;
use Mail;
use App\Http\Requests\PhpMail;
use App\EmailUsers;
class NewIndividualFormMail{
    public function sendMail( $request)
    {

//dd($request);
        $data =

            [
                'name' => $request->name,
                'city'=>$request->city,
                'phone_number' => $request->phone_number,
                'nationality'=>$request->nationality,
                 'text' => $request->text,
                'carbrand'=>$request->carbrand,
                'cartype'=>$request->cartype,
                 'carclass'=>$request->carclass,
                'carmodel'=>$request->carmodel,
                'carnum'=>$request->carnum,
                //'car_name' => $request->car_name,
            ];
        Mail::send('newindividualFormMail', $data, function ($message) {
            $data=EmailUsers::all();
            $cc=str_replace('"',"",json_encode($data[0]->nind_cc));
            $cc=str_replace('[',"",$cc);
            $cc=str_replace(']',"",$cc);
            $cc=explode(",", $cc);
            $message->to($data[0]->nind_to, 'New individual')->subject('Attractive Car Contact For new individual Forms  ');
            $message->from($cc, 'server');
        });

    }

}
?>
