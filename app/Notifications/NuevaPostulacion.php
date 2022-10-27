<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevaPostulacion extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante_id,$nombre_vacante,$usuario_id)
    {
        $this->nombre_vacante = $nombre_vacante;
        $this->vacante_id = $vacante_id;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //ENVIAR POR EMAIL Y GUARDAN EN DB
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Has recibido una nueva postulacion a tu vacante: '. $this->nombre_vacante)
                    ->action('Ver Postulaciones', url('/notificaciones'));
    }

    //almacena la nitficacion en la v=base de datos
    public function toDatabase($notifiable)
    {
        return [
            "nombre" => $this->nombre_vacante,
            "vacante_id" => $this->vacante_id,
            "usuario_id" => $this->usuario_id
        ];
    }
}
