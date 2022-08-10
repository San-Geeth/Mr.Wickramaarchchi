<?php

namespace domain\Services\Settings;

use App\Models\ContactSetting;
use App\Models\OpenTime;
use App\Models\OpenTimeNote;
use App\Models\ShippingPrice;
use App\Models\SocialSetting;
use domain\Facades\SettingFacade;

class SettingService
{
    public function __construct()
    {
        $this->social = new SocialSetting();
        $this->contact = new ContactSetting();
        $this->open_time = new OpenTime();
        $this->open_time_note = new OpenTimeNote();
    }

    public function social()
    {
        return $this->social->first();
    }

    public function contact()
    {
        return $this->contact->first();
    }

    public function openTime()
    {
        return  $this->open_time->all();
    }

    public function openTimeNote()
    {
        return $this->open_time_note->first();
    }

}
