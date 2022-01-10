<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class MessageSent extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public $message)
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database','broadcast','nexmo'];
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
                    ->subject('Nuevo mensaje')
                    ->markdown('mail.message', ['message' => $this->message]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $notifiable->notification += 1;
        $notifiable->save();
        return [
            'url' => route('messages.show',$this->message->id),
            'message' => 'Has recibido un mensaje de: '. User::find($this->message->from_user_id)->name,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([]);
    }
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
        ->content("Has recibido un mensaje de " . User::find($this->message->from_user_id)->name);
    }
}
