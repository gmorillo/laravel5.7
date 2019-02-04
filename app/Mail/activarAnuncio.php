<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class activarAnuncio extends Mailable
{
    use Queueable, SerializesModels;

    public $fechaActivacion;
    public $referencia;
    public $price;


    public function __construct($fechaActivacion, $referencia, $price)
    {
       $this->fecha_activacion = $fechaActivacion;
       $this->referencia = $referencia;
       $this->price = $price;
    }

    public function build()
    {
        return $this->view('emails.activacion-anuncio')
            ->from('info@nombreempresa.com', "Activación de anuncio")
            ->subject("Tú anuncio con referencia ".$this->referencia." ha sido publicado en www.nombreempresa.com el día " .$this->fecha_activacion. "");
    }
}