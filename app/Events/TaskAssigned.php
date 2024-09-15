<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskAssigned implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;
    public $userId;

    public function __construct($task, $userId)
    {
        $this->task = $task;
        $this->userId = $userId;
    }

    // Phát sự kiện qua kênh Private Channel, chỉ thành viên được giao task mới nhận thông báo
    public function broadcastOn()
    {
        return new PrivateChannel('tasks.' . $this->userId);
    }

    public function broadcastWith()
    {
        return [
            'title' => $this->task->title,
            'description' => $this->task->description,
            'assigned_by' => $this->task->assigned_by,
        ];
    }
}
