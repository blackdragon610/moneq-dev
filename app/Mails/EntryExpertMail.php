<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EntryExpertMail extends Mailable{

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datas=null){
        $this->datas = $datas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){

        return $this->text('messages.emails.entry_expert')
        	->subject("仮登録の完了")
	        ->from(config('mail.from.address'), config('mail.from.name'))
	        ->with($this->datas);
        ;
    }
}
