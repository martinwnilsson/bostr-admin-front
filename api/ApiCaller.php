<?php

req("api", "Response");


class ApiCaller {

    const CURL_CONNECTION_TIMEOUT = 100;
    const CURL_TIMEOUT = 100;

    public $response;

    protected $curl;
	protected $endpoint;
	protected $url;
	protected $method;

	function __construct($name, $endpoint, $method = "GET", $file = null){ // postdata används inte, hämtar från $_POST
		$this->curl = curl_init();
        $this->name = $name;
		$this->method = $method;

        $this->endpoint = $endpoint;
        $this->url = $this->endpoint;
        curl_setopt($this->curl, CURLOPT_URL, $this->url);

		$this->response = new Response($endpoint, $this->method);

		// header params array
        $headers = [];

        // om file med
        if(isset($file)){
            $this->response->requestFile = $file;
            $this->response->requestFilename = basename($file);
            $file= curl_file_create($file);
            $_POST["extra_info"] = "no extra file info";
            $_POST["file_contents"] = $file;
        }

        if($this->method == "POST" || $this->method == "PUT") {
            $postStr = json_encode($_POST);
            $GLOBALS["DEBUG"]["POST as JSON"] = $postStr;
            $this->response->requestData = $_POST;
            if($this->method == "POST") {
                curl_setopt($this->curl, CURLOPT_POST, TRUE);
            } else {
                curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
            }
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $postStr);

            array_push($headers, 'Content-Type: application/json');
            array_push($headers, 'Content-Length: ' . strlen($postStr));
         } elseif($this->method == "DELETE"){
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        }

		curl_setopt($this->curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36");
		curl_setopt($this->curl, CURLOPT_HEADER, false); // include http header
	    //curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false); // vid SSl-problem se http://flwebsites.biz/posts/how-fix-curl-error-60-ssl-issue
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true); // Should cURL return or print out the data? (true = return, false = print)
		curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, CONFIG::CURL_CONNECTTIMEOUT);
		curl_setopt($this->curl, CURLOPT_TIMEOUT, CONFIG::CURL_TIMEOUT); // Timeout in seconds

        // authorization
        if(isset($_SESSION["user"]) && isset($_SESSION["authToken"])){
            array_push($headers, 'Authorization: Bearer ' . $_SESSION["authToken"]);
        }

        // add header
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
	}

	/*
	function setEndpoint($endpoint){
		$this->endpoint = $endpoint;
		$this->url = $this->endpoint;
		curl_setopt($this->curl, CURLOPT_URL, $this->url);
	}
	*/

	function setUrlParams($paramsAsAssocArr){
		// tar bort gamla
		$this->url = $this->endpoint;

        $this->response->requestQuery = $paramsAsAssocArr;

		if(count($paramsAsAssocArr) > 0){
			$this->url .= "?" . http_build_query($paramsAsAssocArr);
		}
	}

    // DO NOT USE - när skapad med method=POST läser klassen automatiskt av postade params
	/*function setBodyParams($paramsAsAssocArr){
        //curl_setopt($this->curl, CURLOPT_POSTFIELDS, $paramsAsAssocArr);
    }*/

	function setHeaderParams($paramsAsAssocArr){
		// tar bort gamla
		curl_setopt($this->curl, CURLOPT_HTTPHEADER, []);
		curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->_getHeaderOptArr($paramsAsAssocArr));

        $this->response->requestHeaders = $paramsAsAssocArr;
	}

	function fetch(){
        if(CONFIG::LOG_CURL) {
            curl_setopt($this->curl, CURLOPT_VERBOSE, true); // curl debug
            curl_setopt($this->curl, CURLOPT_STDERR, fopen($GLOBALS["LOCAL_PATH"] . CONFIG::LOG_CURL_FILEPREFIX . str_replace(' ', '', $this->name) . $_SESSION["iterator"] . '.log', 'w+')); // curl debug
        }
        $_SESSION["iterator"]++;

	    $output = curl_exec($this->curl);

	    if($output === false)
	    {
	        $this->response->setFail(curl_error($this->curl));
	    } else {
            $this->response->setSuccess($output);
        }

		// Close the cURL resource, and free system resources
		curl_close($this->curl);

        $GLOBALS["DEBUG_RESPONSES"][$this->name] = $this->response;

	    if($this->response->success){
            return json_decode($output);
            //return $output;
        } else {
	        return "";
        }

	}

	function _debug(){
		curl_setopt($this->curl, CURLINFO_HEADER_OUT, true);
		echo curl_getinfo($this->curl, CURLINFO_HEADER_OUT);
	}

	function _getHeaderOptArr($headerParamsAssocArr){
		$params = [];
		foreach($headerParamsAssocArr as $name=>$value){
			array_push($params, $name.": ".$value);
		}
		return $params;
	}

}
