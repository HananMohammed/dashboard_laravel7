<?php


namespace App\repositoryhome;
use Mail;

use App\Http\Requests\PhpMail;
use App\EmailUsers;
class CompanyFormMail
{
    public function sendMail( $request)
    {

//dd($request);
        $data = ['company_name' => $request->company_name,
            'company_activity'=>$request->company_activity,
            'dealing_banks' => $request->dealing_banks,
            'phone_number' => $request->phone_number,
            'type' => $request->type,
           // 'car_name'=>$request->car_name,
            'city' => $request->city,
            'age_of_company' => $request->age_of_company,
            'responsible_person_name' => $request->responsible_person_name,
            'email' => $request->email,
            'car_id' => $request->car_id,
            'text' => $request->text,
            'commercial_registration_no' => $request->commercial_registration_no,
            'brand'=>$request->brand,
            'classname'=>$request->classname,
            'newclass'=>$request->newclass,
            'carmodel'=>$request->carmodel,
            //'car_name'=>$request->car_name,
            'carnum'=>$request->carnum,

        ];


        Mail::send('formCompanyMail', $data, function ($message) {
            $data=EmailUsers::all();
            $cc=str_replace('"',"",json_encode($data[0]->com_cc));
            $cc=str_replace('[',"",$cc);
            $cc=str_replace(']',"",$cc);
            $cc=explode(",", $cc);
            $message->to($data[0]->com_to, 'attcar')->subject('Attractive Car Contact For Company Forms  ');
            $message->from($cc, 'server');
        });

    }

}
