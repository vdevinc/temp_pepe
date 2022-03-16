<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ApiController extends Controller {



    protected $statusCode = 200;


    /**
     * Get api response code; eg: 200,404,etc
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set api response code; eg: 200,404,etc
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Give response with the data
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    { 
        return response()->json($data, $this->getStatusCode(), $headers);
    }

     /**
     * Response for success
     * @param $message
     * @return mixed
     */
    public function respondWithSuccess($message, $data= null)
    {
        return $this->respond([
            "success" => [
                "message" => $message,
                "data" => $data,
                "status_code" => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * Response for errors
     * @param $message
     * @return mixed
     */
    public function respondWithError($message, $data= null)
    {
        return $this->setStatusCode(400)->respond([
            "error" => [
                "message" => $message,
                "data" => $data,
                "status_code" => 400
            ]
        ],[
            'failure-message' => $message
        ]);
    }

    /**
     * Response with 404 error
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = "Not Found")
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }


    /**
     * Response for 500 error
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = "Interal Error")
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

}
