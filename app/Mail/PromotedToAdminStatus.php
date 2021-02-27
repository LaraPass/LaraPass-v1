<?php

namespace App\Mail;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PromotedToAdminStatus extends Mailable
{
    use Queueable;
    use SerializesModels;

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
        return $this->markdown('ui.mails.promoted-to-admin')->with([
            'name'  => $this->request->name,
            'admin' => Auth::user()->name,
        ]);
    }
}
