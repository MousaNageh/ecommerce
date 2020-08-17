<?php

namespace App\Notifications;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostAprrovedNotification extends Notification implements ShouldQueue 
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
                    ->line('your post of '."  ' ".$this->post->title." ' ".' approved successfully by admin.')
                    ->line("now your post is available for all users to see it and pay it ")
                    ->action('see you post', url(route("posts.show",$this->post->id)))
                    ->line('Thank you for using our application ! ');
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
            "approvedpost"=>$this->post 
        ];
    }
}
