<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Quote extends Mailable
{
    use Queueable, SerializesModels;

    protected $quote;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Quote $quote)
    {
        $this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.co')
            ->view('mail.quote-mail')
            ->with([
                'name' => $this->quote->name,
                'mail' => $this->quote->mail,
                'phone' => $this->quote->number_phone,
                'car_type' => $this->quote->carType->name
            ]);
    }
}
