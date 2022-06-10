<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
{
    //define properti
    public $code;
    public $message;
    
    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */
    public function __construct($code, $message, $resource)
    {
        parent::__construct($resource);
        $this->code  = $code;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'code'   => $this->code,
            'message'   => $this->message,
            'data'      => $this->resource
        ];
    }
}