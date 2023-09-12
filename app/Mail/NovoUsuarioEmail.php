<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoUsuarioEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $senhaTemporaria;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $senhaTemporaria)
    {
        $this->user = $user;
        $this->senhaTemporaria = $senhaTemporaria;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
            return $this->view('emails.novo-usuario') // Substitua pelo nome da sua view de e-mail
                        ->subject('Bem-vindo ao nosso sistema'); // Assunto do e-mail
        
    }
}
