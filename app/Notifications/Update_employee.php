<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\employees;
use Illuminate\Support\Facades\Auth;
class Update_employee extends Notification
{
    use Queueable;
    private $employees;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(employees $employees)
    {
        $this->employees = $employees;
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
        return [
            'id'=> $this->employees->id,
            'title'=>'تم تعديل بيانات الموظف بواسطة :',
            'user'=> Auth::user()->name,
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    
}
