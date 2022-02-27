<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyMailDigest extends Mailable
{
    use Queueable, SerializesModels;

    private $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.apply_email')
            ->subject('Application '.$this->application->name)
            ->with('application', $this->application);
    }
}
