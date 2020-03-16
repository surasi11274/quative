<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class JobsNoti extends Notification
{
    use Queueable;

    protected $updateJob;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($updateJob)
    {
        //
        $this->jobs=$updateJob;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        // dd($notifiable);
        return [
            'jobs'=>$this->jobs,
            'user'=>$notifiable,
        ];
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
