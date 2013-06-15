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
        $version = '1.12.0';  // API version supported by your application
        $appid = Core::$config['modules']['merchant']['ebay']['appid'];  // Replace with your own AppID
        $globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
        $query = $keyword;  // You may want to supply your own query
        $safequery = urlencode($query);  // Make the query URL-friendly

        // Construct the findItemsByKeywords HTTP GET call
        $apicall = "$endpoint?";
        $apicall .= "OPERATION-NAME=findItemsAdvanced";
        $apicall .= "&SERVICE-VERSION=$version";
        $apicall .= "&SECURITY-APPNAME=$appid";
        $apicall .= "&GLOBAL-ID=$globalid";
        $apicall .= "&keywords=$safequery";
        $apicall .= "&paginationInput.entriesPerPage=10";

        //return $apicall;

        $resp = simplexml_load_file($apicall);

        // Check to see if the request was successful, else print an error
        if ($resp->ack == "Success") {
            $result = array();
            // If the response was loaded, parse it and build links
            foreach($resp->searchResult->item as $item) {
                $p = new Model_Product();
                $p->setName((string)($item->title))
                    ->setASIN((string)($item->itemId))
                    ->setMerchant('ebay');
                ;


                if (isset($item->galleryURL)){
                    $p->setImages((string)($item->galleryURL));
                }

                if (isset($item->viewItemURL)){
                    $p->setDetailURL((string)($item->viewItemURL));
                }

                if (isset($item->sellingStatus->currentPrice)) {
                    $p->addPrice('ebay',
                        new Model_Price((string)($item->sellingStatus->currentPrice),
                            (string)($item->sellingStatus->currentPrice) ." " .(string)($item->sellingStatus->currentPrice->attributes()['currencyId'])));
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
        error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

        // API request variables
        $endpoint = 'http://open.api.ebay.com/shopping';  // URL to call
        $version = '661';  // API version supported by your application
        $appid = Core::$config['modules']['merchant']['ebay']['appid'];  // Replace with your own AppID
        $globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
        $query = $productID;  // You may want to supply your own query
        $safequery = urlencode($query);  // Make the query URL-friendly

        // Construct the findItemsByKeywords HTTP GET call
        $apicall = "$endpoint?";
        $apicall .= "callname=GetSingleItem";
        $apicall .= "&responseencoding=XML";
        $apicall .= "&version=$version";
        $apicall .= "&appid=$appid";
        $apicall .= "&siteid=0";
        $apicall .= "&ItemID=$safequery";
        $apicall .= "&IncludeSelector=Details";

        $resp = simplexml_load_file($apicall);


        // Check to see if the request was successful, else print an error
        if ($resp->Ack == "Success") {
            // If the response was loaded, parse it and build links
            $item = $resp->Item;
                    $p = new Model_Product();
                    $p->setName($item->Title)
                        ->setASIN($item->ItemID)
                        ->setMerchant('ebay');
                    ;


                    if (isset($item->GalleryURL)){
                        $p->setImages($item->GalleryURL);
                    }

                    if (isset($item->ViewItemURLForNaturalSearch)){
                        $p->setDetailURL($item->ViewItemURLForNaturalSearch);
                    }

                    if (isset($item->CurrentPrice)) {
                        $p->addPrice('ebay',
                            new Model_Price($item->CurrentPrice,
                                $item->CurrentPrice . " USD"));
                    }

            /*
                    if (isset($item->BuyItNowPrice)) {
                        $p->addPrice('ebay-buyitnow',
                            new Model_Price($item->BuyItNowPrice,
                                $item->BuyItNowPrice . " USD"));
                    }
            */



            return $p;
        }
        // If the response does not indicate 'Success,' print an error
        return null;
    }

    /**
     * Add a product for tracking
     * @param $product
     * @return mixed
     */
    public function track($product)
    {
        try{
            $model = new Core_Model();
            $model->getDB()->connect();

            // add product into table Product
            //$model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('B000KKI1F6', 'Clearblue Digital Pregnancy Test Kit with Conception Indicator - Twin-Pack', 'amazon')");
            $model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('$product->ASIN', '$product->name', 'ebay')");
            $model->getDB()->query();

            $price_categories = array('ebay'=>'ebay');
            // add current price into table Tracking
            foreach (array_keys($price_categories) as $price_key)
            {
                if (isset($product->price[$price_key])){
                    $query = sprintf("INSERT INTO Tracking(ProductID, PriceType, Price, FormattedPrice)".
                        " VALUE ('%s', '%s' , %f, '%s')",
                        $product->ASIN,
                        $price_categories[$price_key],
                        $product->price[$price_key]->price,
                        $product->price[$price_key]->formattedPrice
                    );

                    $model->getDB()->prepare($query);
                    $model->getDB()->query();
                }
            }

            $model->getDB()->disconnect();
            return TRUE;
        }
        catch (Exception $e)
        {
            return FALSE;
        }

    }

    /**
     * Update new price of products which users have already added into database
     * @return mixed
     */
    static function updateDB()
    {
        try{
            $model = new Core_Model();
            $model->getDB()->connect();

            // Get all product and the latest prices (amazon, 3rd Amazon New, 3rd Used)
            $sql = "SELECT ProductID, Name, Price, PriceType FROM Tracking as t1, Product"
                ." WHERE ProductCode=ProductID and Website='ebay' "
                ." and Time >= (SELECT Max(Time) FROM Tracking as t2 WHERE t1.ProductID=t2.ProductID and t1.PriceType=t2.PriceType)"
                ." ORDER BY ProductID";
            $model->getDB()->prepare($sql);
            $model->getDB()->query();

            $results = $model->getDB()->fetch('array');



            $product_model = new Model_Amazon_Product();
            $price_categories = array('ebay'=>'ebay');
            $lastID="#$@!#####";
            $p = null;
            if (isset($results)){
                // Update products
                foreach ($results as $row){
                    if ($lastID != $row['ProductID']){
                        $p = $product_model->lookup($row['ProductID']);
                        $lastID = $row['ProductID'];
                    }
                    if (isset($p)){
                        // If there is any update

                        // add current price into table Tracking
                        foreach (array_keys($price_categories) as $price_key)
                        {
                            if (isset($p->price[$price_key])
                                && ( $p->price[$price_key]->price != $row['Price'])
                                && ($price_categories[$price_key] == $row['PriceType'])
                            ){
                                $query = sprintf("INSERT INTO Tracking(ProductID, PriceType, Price, FormattedPrice)".
                                    " VALUE ('%s', '%s' , %f, '%s')",
                                    $p->ASIN,
                                    $price_categories[$price_key],
                                    $p->price[$price_key]->price,
                                    $p->price[$price_key]->formattedPrice
                                );

                                $model->getDB()->prepare($query);
                                $model->getDB()->query();
                                if (DEBUG){
                                    echo "Update product " . $p->name . " with price type: " . $price_categories[$price_key] . " OK  "
                                        ." ||| Old price:". (string)($row['Price']) . "  New Price:" . (string)($p->price[$price_key]->price) . " \n";
                                }
                            }
                        }
                    }
                }
            }

            $model->getDB()->disconnect();

            return TRUE;
        }
        catch (Exception $e)
        {
            return FALSE;
        }
    }
}