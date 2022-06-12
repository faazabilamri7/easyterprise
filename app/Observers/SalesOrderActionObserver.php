<?php

namespace App\Observers;

use App\Models\SalesOrder;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class SalesOrderActionObserver
{
    public function created(SalesOrder $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'SalesOrder'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(SalesOrder $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'SalesOrder'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(SalesOrder $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'SalesOrder'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
