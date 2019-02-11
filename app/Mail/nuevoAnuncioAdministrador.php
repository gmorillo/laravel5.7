<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class nuevoAnuncioAdministrador extends Mailable
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
        return $this->view('emails.nuevo-anuncio-administrador')
            ->from($this->mail, "Han comprado un anuncio")
            ->subject("Nueva compra, Referencia: ".$this->referencia. ", Tlf: " .$this->telefono."". ", Precio: ".$this->finalPrice);
    }
}