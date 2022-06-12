<?php

namespace App\Observers;

use App\Models\MachineReport;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class MachineReportActionObserver
{
    public function created(MachineReport $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'MachineReport'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(MachineReport $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'MachineReport'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(MachineReport $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'MachineReport'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
