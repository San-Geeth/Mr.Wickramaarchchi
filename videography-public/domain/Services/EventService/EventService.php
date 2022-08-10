<?php

namespace domain\Services\EventService;

use App\Models\Event;
use App\Models\EventImage;
use infrastructure\Facades\ImagesFacade;

class EventService
{
    public function __construct()
    {
        $this->event = new Event();
        $this->event_image = new EventImage();
    }

    public function all()
    {
        return $this->event->all();
    }

    public function getActive()
    {
        return $this->event->getActive();
    }

    public function find($event_id)
    {
        return $this->event->find($event_id);
    }
}
