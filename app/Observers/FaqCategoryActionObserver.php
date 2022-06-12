<?php

namespace App\Observers;

use App\Models\FaqCategory;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class FaqCategoryActionObserver
{
    public function created(FaqCategory $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'FaqCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(FaqCategory $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'FaqCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(FaqCategory $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'FaqCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
