<?php


namespace App\repositoryhome;
use Mail;

use App\Http\Requests\PhpMail;
use App\EmailUsers;

class IndividualFormMail
{
    public function sendMail( $request)
    {

//dd($request);
        $data =

            [
            'name' => $request->name,
            'city'=>$request->city,
            'dealing_banks' => $request->dealing_banks,
            'phone_number' => $request->phone_number,
            'type' => $request->type,
            'nationality'=>$request->nationality,
            'city' => $request->city,
            'text' => $request->text,
                'car_name' => $request->car_name,
            'car_id' => $request->car_id,
            'select_work_selector' => $request->select_work_selector,
            'email' => $request->email,
                'salary_transferring_bank'=>$request->salary_transferring_bank,
                'select_monthly_obligations'=>$request->select_monthly_obligations,
                'years_of_experience'=>$request->years_of_experience,
                'monthly_salary'=>$request->monthly_salary,
                'total_monthly_obligations'=>$request->total_monthly_obligations,
                'brand'=>$request->brand,
                'classname'=>$request->classname,
                'newclass'=>$request->newclass,
                'carmodel'=>$request->carmodel,
               // 'car_name'=>$request->car_name,
                'carnum'=>$request->carnum,


        ];
        Mail::send('individualFormMail', $data, function ($message) {
            $data=EmailUsers::all();
            $cc=str_replace('"',"",json_encode($data[0]->ind_cc));
            $cc=str_replace('[',"",$cc);
            $cc=str_replace(']',"",$cc);
            $cc=explode(",", $cc);
            $message->to($data[0]->ind_to, 'indvivdual')->subject('Attractive Car Contact For individual Forms  ');
            $message->from($cc, 'server');
        });

    }

}
