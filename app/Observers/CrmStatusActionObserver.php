<?php

namespace App\Observers;

use App\Models\CrmStatus;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class CrmStatusActionObserver
{
    public function created(CrmStatus $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'CrmStatus'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(CrmStatus $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'CrmStatus'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(CrmStatus $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'CrmStatus'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
