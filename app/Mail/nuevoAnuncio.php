<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class nuevoAnuncio extends Mailable
{
    use Queueable, SerializesModels;

    public $tipo_publicidad;
    public $titulo;
    public $ciudad;
    public $categoria;
    public $telefono;
    public $mail;
    public $idiomas;
    public $desc;
    public $img;
    public $referencia;
    public $finalPrice;

    public function __construct($tipo_publicidad, $titulo, $ciudad, $categoria, $telefono, $mail, $idiomas, $desc, $img, $referencia, $finalPrice)
    {
       $this->tipo_publicidad = $tipo_publicidad;
       $this->titulo = $titulo;
       $this->ciudad = $ciudad;
       $this->categoria = $categoria;
       $this->telefono = $telefono;
       $this->mail = $mail;
       $this->idiomas = $idiomas;
       $this->desc = $desc;
       $this->img = $img;
       $this->referencia = $referencia;
       $this->finalPrice = $finalPrice;
    }

    public function build()
    {
        return $this->view('emails.nuevo-anuncio')
            ->from('creation@bembosex.com', "Detalle de compra en bembosex.com")
            ->subject("Gracias por tu compra, nuestro equipo se pondrá en contacto contigo");
    }
}