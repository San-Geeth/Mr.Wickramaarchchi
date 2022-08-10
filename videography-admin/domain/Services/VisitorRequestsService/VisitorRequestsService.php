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

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->visitor->all();

    }

    /**
     * get
     *
     * @param  mixed $request_id
     * @return void
     */
    public function get($request_id)
    {
        return $this->visitor->find($request_id);
    }

    /**
     * read
     *
     * @param  mixed $request_id
     * @return void
     */
    public function read($request_id)
    {
        $request = $this->visitor->find($request_id);

        if($request->read == 0){
            $request->read = 1;
            $request->update();
        }
    }

    /**
     * delete
     *
     * @param  mixed $request_id
     * @return void
     */
    public function delete($request_id)
    {
        return $this->get($request_id)->delete();
    }

    public function totalCountOfUnreadVisitorRequests()
    {
        return $this->visitor->totalCountOfUnreadVisitorRequests();
    }
}
