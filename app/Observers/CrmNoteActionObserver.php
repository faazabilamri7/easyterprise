<?php

namespace App\Observers;

use App\Models\CrmNote;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class CrmNoteActionObserver
{
    public function created(CrmNote $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'CrmNote'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(CrmNote $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'CrmNote'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(CrmNote $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'CrmNote'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
