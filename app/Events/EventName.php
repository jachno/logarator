<?php namespace App\Events;

use App\Events\Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class EventName extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $data;

    public function __construct($input)
    {
        $this->data = array(
            'logFile'=> $input['logFile'],
            'timeStamp'=> $input['timeStamp'],
            'message'=> $input['message']
        );
    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}