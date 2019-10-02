<?php


class Response
{
    public $endpoint;
    public $requestUrl;
    public $requestMethod;
    public $requestHeaders;
    public $requestQuery;
    public $requestData;
    public $success;
    public $responseHeaders;
    public $responseBody;
    public $responseCode;
    public $responseIp;
    public $responseContentType;
    //public $responseErrorMsg;

    function __construct($endpoint, $method){
        $this->success = false;
        $this->endpoint = $endpoint;
        $this->requestMethod = $method;
    }

    function setSuccess($body){
        $this->success = true;

        $this->responseBody = $body;
    }

    function setFail($body){
        $this->success = false;

        $this->responseBody = $body;
    }

    function toString(){
        return json_encode($this);
    }
}