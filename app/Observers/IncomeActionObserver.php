<?php

namespace App\Observers;

use App\Models\Income;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class IncomeActionObserver
{
    public function created(Income $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Income'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Income $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Income'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Income $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Income'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
