<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class recompraAnuncio extends Mailable
{
    use Queueable, SerializesModels;

    public $tipo_publicidad;
    public $telefono;
    public $mail;
    public $referencia;


    public function __construct($tipo_publicidad, $telefono, $mail, $referencia)
    {
       $this->tipo_publicidad = $tipo_publicidad;
       $this->telefono = $telefono;
       $this->mail = $mail;
       $this->referencia = $referencia;
    }

    public function build()
    {
        return $this->view('emails.rebuy-mail')
            ->from('bembosex.com@bembosex.com', "Recompra de anuncio")
            ->subject("Quieren volver activar un anuncio!!!! Referencia: ".$this->referencia. ", Tlf: " .$this->telefono."");
    }
}