<?php

namespace App\Notifications;

use App\Http\Resources\Pokemon as PokemonResource;
use App\Pokemon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Captured extends Notification
{
    use Queueable;
    private $pokemon;

    /**
     * Create a new notification instance.
     *
     * @param Pokemon $pokemon
     */
    public function __construct(Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $pokemon = new PokemonResource($this->pokemon);
        return (new MailMessage)
                    ->subject($this->pokemon.' Captured!')
                    ->greeting('Congratulations!')
                    ->line('You captured '.$pokemon->name.'!')
                    ->action('Check in', url('/api/pokemon/'.$pokemon->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
