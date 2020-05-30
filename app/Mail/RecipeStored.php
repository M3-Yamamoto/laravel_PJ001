<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecipeStored extends Mailable
{
    use Queueable, SerializesModels;

    public $recipe;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('recipe');
    }
}
