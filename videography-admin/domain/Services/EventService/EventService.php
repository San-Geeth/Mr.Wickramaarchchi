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

    public function totalCountOfEvents()
    {
        return $this->event->getActive()->count();
    }

    public function checkSlug($request)
    {
        return $this->event->checkSlug($request['slug']);
    }

    public function create(array $data)
    {
        return $this->event->create($data);
    }

    public function find($event_id)
    {
        return $this->event->find($event_id);
    }

    public function update(array $data, $event_id)
    {
        $event = $this->event->find($event_id);
        return $event->update($this->edit($this->event, $data));
    }

    protected function edit(event $event, $data)
    {
        return array_merge($event->toArray(), $data);
    }

    public function changeStatus($id)
    {
        $events = $this->find($id);

        if ($events->status == 0) {
            $events->status = 1;
            $events->update();
            return 1;
        } else {
            $events->status = 0;
            $events->update();
            return 0;
        }
    }

    public function delete($event_id)
    {
        return $this->find($event_id)->delete();
    }


    public function makeImage(array $data)
    {
        $event = $this->find($data['id']);

        $response = ImagesFacade::store($data['image'], [1, 2, 3, 4, 5]);
        $image = $response['created_images'];

        $imageData = $this->event_image->getImages($data['id']);

        if ($imageData->count() == 0) {
            $status = EventImage::TYPES['PRIMARY'];
        } else {
            $status = EventImage::TYPES['ACTIVE'];
        }

        $this->event_image->create([
            'image' => $image->id,
            'event_id' => $event->id,
            'status' => $status,
        ]);
    }


    public function createImage(array $event_image)
    {
        return $this->event_image->create($event_image);
    }


    public function setPrimary($image_id)
    {
        $images = $this->event_image->find($image_id);

        $p_image = $this->event_image->getEventPrimaryImage($images->event_id);
        $p_image->status = EventImage::TYPES['ACTIVE'];
        $p_image->update();

        $image = $this->event_image->find($image_id);
        $image->status = EventImage::TYPES['PRIMARY'];
        $image->update();
    }

    public function setDisable($image_id)
    {
        $image = $this->event_image->find($image_id);
        $image->status = EventImage::TYPES['DISABLE'];
        $image->update();
    }

    public function setActive($image_id)
    {
        $image = $this->event_image->find($image_id);
        $image->status = EventImage::TYPES['ACTIVE'];
        $image->update();
    }

    public function deleteImage($image_id)
    {
        return $this->event_image->find($image_id)->delete();
    }
}
