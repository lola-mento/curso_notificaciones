<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{
    public $notifications;
    public $count;
    protected $listener = ['notification'];

    public function mount()
    {
        $this->notification();
    }
    public function resetNotificationCount()
    {
        auth()->user()->notification = 0;
        auth()->user()->save();
    }
    public function read($notification_id)
    {
        $notification = auth()->user()->notifications()->findOrFail($notification_id);
        $notification->markAsRead();
    }
    public function notification()
    {
        $this->notifications = auth()->user()->notifications;
        $this->count = auth()->user()->unreadNotifications->count();
    }
    public function render()
    {
        return view('livewire.notification-component');
    }
}
