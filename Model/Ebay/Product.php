<?php
/**
 * File : Product.php
 * User : loveallufev
 * Date:  5/27/13
 * Group: Hieu-Trung
*/


class Model_Ebay_Product extends Model_MerchantAbstract {

    public function search($keyword)
    {
        error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

        // API request variables
        $endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
        $version = '1.0.0';  // API version supported by your application
        $appid = Core::$config['modules']['merchant']['ebay']['appid'];  // Replace with your own AppID
        $globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
        $query = $keyword;  // You may want to supply your own query
        $safequery = urlencode($query);  // Make the query URL-friendly

        // Construct the findItemsByKeywords HTTP GET call
        $apicall = "$endpoint?";
        $apicall .= "OPERATION-NAME=findItemsByKeywords";
        $apicall .= "&SERVICE-VERSION=$version";
        $apicall .= "&SECURITY-APPNAME=$appid";
        $apicall .= "&GLOBAL-ID=$globalid";
        $apicall .= "&keywords=$safequery";
        $apicall .= "&paginationInput.entriesPerPage=3";

        //return $apicall;

        $resp = simplexml_load_file($apicall);

        // Check to see if the request was successful, else print an error
        if ($resp->ack == "Success") {
            $result = array();
            // If the response was loaded, parse it and build links
            foreach($resp->searchResult->item as $item) {
                $p = new Model_Product();
                $p->setName($item->title)
                    ->setASIN($item->itemID)
                    ->setMerchant('ebay');
                ;


                if (isset($item->galleryURL)){
                    $p->setImages($item->galleryURL);
                }

                if (isset($item->viewItemURL)){
                    $p->setDetailURL($item->viewItemURL);
                }

                if (isset($item->sellingStatus->currentPrice)) {
                    $p->setPrice($item->sellingStatus->currentPrice);
                }

                if (isset($item->sellingStatus->currentPrice->attributes()['currencyId'])) {
                    $p->setCurrency($item->sellingStatus->currentPrice->attributes()['currencyId']);
                }

                array_push($result, $p);
            }
            return $result;
        }
        // If the response does not indicate 'Success,' print an error
        return null;
    }

    public function lookup($productID)
    {
        return "result";
    }

    /**
     * Add a product for tracking
     * @param $product
     * @return mixed
     */
    public function track($product)
    {
        // TODO: Implement track() method.
    }

    /**
     * Update new price of products which users have already added into database
     * @return mixed
     */
    static function updateDB()
    {
        // TODO: Implement updateDB() method.
    }
}