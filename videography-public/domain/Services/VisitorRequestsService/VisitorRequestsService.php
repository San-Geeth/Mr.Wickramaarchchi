<?php

namespace domain\Services\VisitorRequestsService;

use App\Models\VisitorRequest;

class VisitorRequestsService
{
    protected $visitor;

    public function __construct()
    {
        $this->visitor = new VisitorRequest();

    }

    public function store($request)
    {
        $this->visitor->create($request);
    }
}
