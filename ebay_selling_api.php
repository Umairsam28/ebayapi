<?php

class ebaySellingApi
{
    public $clientId = 'bhushans-EbayErgo-PRD-2bffbb2e5-777fa2f3';
    public $certID = 'PRD-bffbb2e5cce0-62fd-4a81-afd9-512a';
    public $apiUrl = 'https://api.ebay.com/';
    public $accessToken = '';
    public $authToken = 'v^1.1#i^1#f^0#r^1#I^3#p^3#t^Ul4xMF8xOjA1NTM1NkVFNkQzQjk2QkY5NjEzQTM1MkNFNDRCODdCXzFfMSNFXjI2MA==';
    public $hasError = false;
    public $errorMsg = '';
    public $enableDebug = true;
    public $marketPlaceId='EBAY_US';
    public function __construct($defaultStart=true)
    {
        if($defaultStart==true){
            $this->generateToken();
        }
    }
    public function setClientId ($clientId){
        $this->clientId=$clientId;
    }
    public function setcertID ($certID){
        $this->certID=$certID;
    }
    public function setapiUrl($apiUrl){
        $this->apiUrl=$apiUrl;
    }
    public function setAuthToken($authToken){
        $this->authToken=$authToken;
    }
    public function handleDebug($bool){
        $this->enableDebug=$bool;
    }
    public function getCategorySuggestions($q,$getOne=true){
        $url = $this->set_url('commerce/taxonomy/v1/get_default_category_tree_id?marketplace_id='.$this->marketPlaceId.'&');
        $headers = $this->getBasicHeaders();
        $result = $this->hitCurl($url, $headers, 'GET');
        $response = $this->handleResponse($result);
        $defaultCat = 0;
        if(!empty($response)){
            $defaultCat=$response->categoryTreeId;
        }
        $data = $this->getSuggestedCategory($defaultCat, $q);
        if($data->categorySuggestions){
            if($getOne===true){
                return $data->categorySuggestions[0];
            }
        }
    }
    public function getSuggestedCategory($defaultCat, $q){
        $url = $this->set_url('commerce/taxonomy/v1/category_tree/'.$defaultCat.'/get_category_suggestions?q='.$q);
        $headers = $this->getBasicHeaders();
        // $headers[]='Accept-Encoding: application/gzip';
        $result = $this->hitCurl($url, $headers, 'GET');
        return $this->handleResponse($result);
    }
    public function getLocations($getDefaultOrFirst=true){
        $url = $this->set_url('sell/inventory/v1/location');
        $headers = $this->getBasicHeaders();
        $result = $this->hitCurl($url, $headers, 'GET');
        $data=$this->handleResponse($result);
        if($getDefaultOrFirst===true){
            $defaultFound=false;
            if(isset($data->locations)){
                foreach($data->locations as $location){
                    if($defaultFound===true){
                        continue;
                    }
                    if(strpos($location['merchantLocationKey'], 'default') !== false){
                        return $location;
                    }
                }
                if($defaultFound===false){
                    return $data->locations[0];
                }
            }
        }else{
            return $data->locations;
        }
    }
    public function getFulfillmentPolicy(){
        $url = $this->set_url('sell/account/v1/fulfillment_policy?marketplace_id='.$this->marketPlaceId);
        $headers = $this->getBasicHeaders();
        $result = $this->hitCurl($url, $headers, 'GET');
        return $this->handleResponse($result);
    }
    public function getPaymentPolicy(){
        $url = $this->set_url('sell/account/v1/payment_policy?marketplace_id='.$this->marketPlaceId);
        $headers = $this->getBasicHeaders();
        $result = $this->hitCurl($url, $headers, 'GET');
        return $this->handleResponse($result);
    }
    public function getReturnPolicy(){
        $url = $this->set_url('sell/account/v1/return_policy?marketplace_id='.$this->marketPlaceId);
        $headers = $this->getBasicHeaders();
        $result = $this->hitCurl($url, $headers, 'GET');
        return $this->handleResponse($result);
    }
    public function getBasicHeaders()
    {
        return [
            "accept-language: en-US",
            "authorization: Bearer " . $this->accessToken,
            "cache-control: no-cache",
            "content-type: application/json"
        ];
    }
    public function generateToken()
    {
        $url = $this->set_url('identity/v1/oauth2/token');
        $codeAuth = base64_encode($this->clientId . ':' . $this->certID);
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic ' . $codeAuth
        );
        $fields = "grant_type=refresh_token&refresh_token=".$this->authToken."&rscope=https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly";
        $result = $this->hitCurl($url, $headers, 'POST', $fields);
        if ($result != null) {
            $this->accessToken = $result["access_token"];
        }
    }
    public function publishOffer($offerId){
        $url = $this->set_url('sell/inventory/v1/offer/'.$offerId.'/publish');
        $headers = $this->getBasicHeaders();
        $result = $this->hitCurl($url, $headers, 'POST', '');
        return $this->handleResponse($result);
    }
    public function createOffer($data)
    {
        $url = $this->set_url('sell/inventory/v1/offer');
        $headers = $this->getBasicHeaders();
        $headers[] = 'content-language: en-US';
        $fields=json_encode($data);
        $result = $this->hitCurl($url, $headers, 'POST', $fields);
        return $this->handleResponse($result);
    }
    public function addProduct($data)
    {
        $url = $this->set_url('sell/inventory/v1/bulk_create_or_replace_inventory_item');
        $headers = $this->getBasicHeaders();
        $fields=json_encode($data);
        $result = $this->hitCurl($url, $headers, 'POST', $fields);
        return $this->handleResponse($result);
    }
    public function handleResponse($result)
    {
        if (isset($result['errors'])) {
            if (count($result['errors'])) {
                $this->hasError = true;
                foreach ($result['errors'] as $error) {
                    $this->errorMsg .= $error['message'] . '\n';
                }
            }
        }
        if ($this->enableDebug) {
            var_dump($result);
        }
        if ($this->hasError === false) {
            return (object) $result;
        }
    }
    public function hasErrorCheck()
    {
        return $this->hasError;
    }
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }
    public function set_url($uri)
    {
        return $this->apiUrl . $uri;
    }
    public function hitCurl($url, $headers, $method = 'POST', $fields = "")
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            if($fields!=""){
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            }
        }
        $response = curl_exec($ch);
        $json = json_decode($response, true);
        $info = curl_getinfo($ch);
        curl_close($ch);
        return $json;
    }
}
