<?php

namespace App\Observers;

use App\Models\ProductionMonitoring;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ProductionMonitoringActionObserver
{
    public function created(ProductionMonitoring $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ProductionMonitoring'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ProductionMonitoring $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ProductionMonitoring'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ProductionMonitoring $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ProductionMonitoring'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
