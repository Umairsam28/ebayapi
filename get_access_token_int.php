<?php

$link = "https://api.ebay.com/identity/v1/oauth2/token";
  $codeAuth = base64_encode('ErgodeTr-FastMedi-PRD-6ed59bfca-98f3f70b:PRD-ed59bfcac2da-90e5-43ed-8f14-6c31');
      //  $codeAuth = base64_encode($this->clientID.':'.$this->certID);
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic '.$codeAuth
        ));
    //    echo $this->refreshToken;
       // curl_setopt($ch, CURLHEADER_SEPARATE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&refresh_token=v^1.1#i^1#f^0#p^3#I^3#r^1#t^Ul4xMF8zOjEyRTE0NDk0MTRGRTRDQjMyMjBBMUEzNjI3MzhFQzNGXzFfMSNFXjI2MA==&scope=https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly");
        $response = curl_exec($ch);
        $json = json_decode($response, true);
        $info = curl_getinfo($ch);
        curl_close($ch);
        if($json != null)
        {
            $authToken = $json["access_token"];
            echo $authToken;
            echo "<pre>";
            print_r($json);
        }


     //   https://signin.ebay.com/ws/eBayISAPI.dll?ThirdPartyAuthSucessFailure&isAuthSuccessful=true&code=v%5E1.1%23i%5E1%23I%5E3%23f%5E0%23p%5E3%23r%5E1%23t%5EUl41XzY6NzhERUM2RDEyQzIxMUMwN0E3RTY0RTYyMzdENjU3RkJfMl8xI0VeMTI4NA%3D%3D&expires_in=299

     //   https://signin.ebay.com/ws/eBayISAPI.dll?ThirdPartyAuthSucessFailure&isAuthSuccessful=true&code=v%5E1.1%23i%5E1%23I%5E3%23f%5E0%23r%5E1%23p%5E3%23t%5EUl41Xzk6MTk0MjU1RjM1RTg3RTkxRUEzOEUxNjc4RUQ0QjRBRENfMl8xI0VeMTI4NA%3D%3D&expires_in=299





