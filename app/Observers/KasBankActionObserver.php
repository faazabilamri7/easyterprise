<?php

namespace App\Observers;

use App\Models\KasBank;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class KasBankActionObserver
{
    public function created(KasBank $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'KasBank'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(KasBank $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'KasBank'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(KasBank $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'KasBank'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
