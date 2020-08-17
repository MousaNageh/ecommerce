<?php

namespace App\Notifications;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePostNotfication extends Notification implements ShouldQueue 
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $post ; 
    public function __construct(Post $post)
    {
        $this->post = $post ; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
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
                    ->line('your post of '."  ' ".$this->post->title." ' ".' created successfully .') 
                    ->line("now you have to wait until your post approved my the Admin ")
                    ->action('view you post', url(route("posts.show",$this->post->id)))
                    ->line('Thank you for using our application!');
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
            "unapprovedpost"=>$this->post 
        ];
    }
}
