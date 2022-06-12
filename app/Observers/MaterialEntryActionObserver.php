<?php

namespace App\Observers;

use App\Models\MaterialEntry;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class MaterialEntryActionObserver
{
    public function created(MaterialEntry $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'MaterialEntry'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(MaterialEntry $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'MaterialEntry'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(MaterialEntry $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'MaterialEntry'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
