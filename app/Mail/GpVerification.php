<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
class GpVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $template;
    public $subject;
    public function __construct($user,$template,$subject)
    {
        $this->user=$user;
        $this->template=$template;
        $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $template=$this->template;
        $admin=$this->user;
       // print_r($admin); exit;
        return $this->subject($this->subject)->view('email-template.email-gp-verification',compact('admin','template'));
    }
}
