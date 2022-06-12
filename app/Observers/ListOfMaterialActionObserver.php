<?php

namespace App\Observers;

use App\Models\ListOfMaterial;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ListOfMaterialActionObserver
{
    public function created(ListOfMaterial $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ListOfMaterial'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ListOfMaterial $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ListOfMaterial'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ListOfMaterial $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ListOfMaterial'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
