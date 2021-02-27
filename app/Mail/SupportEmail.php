<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $support;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('ui.mails.support-email')->with([
            'type'    => $this->request->support_type,
            'subject' => $this->request->support_subject,
            'message' => $this->request->support_message,
        ]);
    }
}
