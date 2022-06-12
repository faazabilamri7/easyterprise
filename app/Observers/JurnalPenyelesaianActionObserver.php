<?php

namespace App\Observers;

use App\Models\JurnalPenyelesaian;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class JurnalPenyelesaianActionObserver
{
    public function created(JurnalPenyelesaian $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'JurnalPenyelesaian'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(JurnalPenyelesaian $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'JurnalPenyelesaian'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(JurnalPenyelesaian $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'JurnalPenyelesaian'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
