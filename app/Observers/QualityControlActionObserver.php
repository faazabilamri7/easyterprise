<?php

namespace App\Observers;

use App\Models\QualityControl;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class QualityControlActionObserver
{
    public function created(QualityControl $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'QualityControl'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(QualityControl $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'QualityControl'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(QualityControl $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'QualityControl'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
