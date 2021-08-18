<?php 
include 'ebay_selling_api.php';

$offerData = [
    "sku"=>"TESTB07H5T7QGS",
    "marketplaceId"=>"EBAY_CA",
    "format"=>"FIXED_PRICE",
    "availableQuantity"=>0,
    "categoryId"=>"148",
    "listingDescription"=>"Old World Christmas RED Rose Ornament, Multi",
    "listingPolicies"=>[
        "fulfillmentPolicyId"=>"145810317014",
        "paymentPolicyId"=>"145505459014",
        "returnPolicyId"=>"145505662014"
    ],
    "merchantLocationKey"=>"Default-EBAY_CA",
    "pricingSummary"=>[
        "price"=>[
            "currency"=>"CAD",
            "value"=>"5.00"
        ]
    ],
    "quantityLimitPerBuyer"=>0,
    "includeCatalogProductDetails"=>true
];
$productData = [
    "requests"=>[
        [
            "sku"=>"TESTB07H5T7QGS",
            "locale"=>"en_CA",
            "product"=> [
                "title"=>"Old World Christmas RED Rose Ornament, Multi",
                // "aspects"=>[
                    
                // ],
                "description"=>"Old World Christmas RED Rose Ornament, Multi",
                "imageUrls"=>[
                    "https://m.media-amazon.com/images/I/41kYYKjo7CL.jpg"
                ]
            ],
            "condition"=>"NEW",
            "conditionDescription"=>"Mint condition. Kept in styrofoam case. Never displayed.",
            "availability"=>[
                "shipToLocationAvailability"=>[
                    "quantity"=>0
                ]
            ]
        ]
    ]
];
$ebay = new ebaySellingApi();
$ebay->handleDebug(false);
$getLocations=$ebay->getLocations();
echo json_encode($getLocations);
// var_dump($getLocations->locations);
return;
$result = $ebay->addProduct($productData);
if(!$ebay->hasErrorCheck()){
    /*product added*/
    foreach($result->responses as $response){
        if($response['statusCode']==200){
            $res=$ebay->createOffer($offerData);//$response['sku'];
            if(!$ebay->hasErrorCheck()){
                $offerId=$res->offerId;
                echo $offerId;
                // $ebay->publishOffer($offerId);
                if(!$ebay->hasErrorCheck()){
                    /*publish offer without error here*/
                }else{
                    echo $ebay->getErrorMsg();
                }
            }else{
                echo $ebay->getErrorMsg();
            }
        }
    }
}else{
    /*product insert failed*/
    echo $ebay->getErrorMsg();
}

