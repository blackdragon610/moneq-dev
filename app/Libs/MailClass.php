<?php

namespace App\Libs;

use Mail;
use App\Jobs\MailJob;

class MailClass
{
    public $to = "";
    public $class;

    public function __construct(){
    }

    public function send($class, $to=""){
        if ($to){
            $this->to = $to;
        }

        $this->class = $class;

        $this->class->datas["domain"] = getMyURL();

        if (env("IS_JOB")){
            MailJob::dispatch($this);
        }else {
            $this->mail();
        }
    }

    public function mail(){
        Mail::to($this->to)->send($this->class);
    }
}
