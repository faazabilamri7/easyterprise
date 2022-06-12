<?php

namespace App\Observers;

use App\Models\CrmDocument;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class CrmDocumentActionObserver
{
    public function created(CrmDocument $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'CrmDocument'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(CrmDocument $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'CrmDocument'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(CrmDocument $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'CrmDocument'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
