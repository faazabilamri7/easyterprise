<?php

namespace App\Observers;

use App\Models\FaqQuestion;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class FaqQuestionActionObserver
{
    public function created(FaqQuestion $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'FaqQuestion'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(FaqQuestion $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'FaqQuestion'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(FaqQuestion $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'FaqQuestion'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
