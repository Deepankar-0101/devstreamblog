<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Blog;

class BlogPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $blog; // accessible in the view

    /**
     * Create a new message instance.
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject('Your Blog Was Successfully Posted!')
            ->markdown('emails.blog-posted');
    }
}