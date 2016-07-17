<?php
/*
 * UberAPILib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ) on 07/17/2016
 */

namespace UberAPILib\Controllers;

use UberAPILib\APIException;
use UberAPILib\APIHelper;
use UberAPILib\Configuration;
use UberAPILib\Models;
use UberAPILib\Http\HttpRequest;
use UberAPILib\Http\HttpResponse;
use UberAPILib\Http\HttpMethod;
use UberAPILib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class EstimatesController extends BaseController {

    /**
     * @var EstimatesController The reference to *Singleton* instance of this class
     */
    private static $instance;
    
    /**
     * Returns the *Singleton* instance of this class.
     * @return EstimatesController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Price Estimates
     * @param  double     $startLatitude       Required parameter: Latitude component of start location.
     * @param  double     $startLongitude      Required parameter: Longitude component of start location.
     * @param  double     $endLatitude         Required parameter: Latitude component of end location.
     * @param  double     $endLongitude        Required parameter: Longitude component of end location.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getEstimatesPrice (
                $startLatitude,
                $startLongitude,
                $endLatitude,
                $endLongitude) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/estimates/price';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'start_latitude'  => $startLatitude,
            'start_longitude' => $startLongitude,
            'end_latitude'    => $endLatitude,
            'end_longitude'   => $endLongitude,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthAccessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if ($response->code == 500) {
            throw new APIException('Unexpected error', 500, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->mapArray($response->body, array(), new Models\PriceEstimate());
    }
        
    /**
     * Time Estimates
     * @param  double     $startLatitude       Required parameter: Latitude component of start location.
     * @param  double     $startLongitude      Required parameter: Longitude component of start location.
     * @param  string     $customerUuid        Required parameter: Unique customer identifier to be used for experience customization.
     * @param  string     $productId           Required parameter: Unique identifier representing a specific product for a given latitude & longitude.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getEstimatesTime (
                $startLatitude,
                $startLongitude,
                $customerUuid,
                $productId) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/estimates/time';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'start_latitude'  => $startLatitude,
            'start_longitude' => $startLongitude,
            'customer_uuid'   => $customerUuid,
            'product_id'      => $productId,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthAccessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if ($response->code == 500) {
            throw new APIException('Unexpected error', 500, $response->body);
        }

        else if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->mapArray($response->body, array(), new Models\Product());
    }
        

}