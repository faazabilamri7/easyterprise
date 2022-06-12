<?php

namespace App\Observers;

use App\Models\TaskTag;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class TaskTagActionObserver
{
    public function created(TaskTag $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'TaskTag'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(TaskTag $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'TaskTag'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(TaskTag $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'TaskTag'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
