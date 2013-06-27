<?php
/**
 * File : Product.php
 * User : loveallufev
 * Date:  5/27/13
 * Group: Hieu-Trung
*/

class Model_Amazon_Product extends Model_MerchantAbstract {

    /**
     * Search product by keywork on Amazon site
     * @param $keyword
     * @return array|Model_Product|null
     */
    public function search($keyword)
    {
        Core::includeConfigFile('Configs_Modules_Amazon_Settings');
        require_once SERVER_ROOT . DS . 'Lib/Amazon/AmazonECS.php';
        //echo SERVER_ROOT . DS . 'Lib/Amazon/AmazonECS.php'; die;
        try{
            // get a new object with API Key and secret key. Lang is optional.
            // if you leave lang blank it will be US.
            $amazonEcs = new Lib_Amazon_AmazonECS(
                Core::$config['modules']['merchant']['amazon']['AWS_API_KEY'],
                Core::$config['modules']['merchant']['amazon']['AWS_API_SECRET_KEY'],
                'fr',
                Core::$config['modules']['merchant']['amazon']['AWS_ASSOCIATE_TAG']);

            // If you are at min version 1.3.3 you can enable the requestdelay.
            // This is usefull to get rid of the api requestlimit.
            // It depends on your current associate status and it is disabled by default.
            // $amazonEcs->requestDelay(true);

            $amazonEcs->associateTag(Core::$config['modules']['merchant']['amazon']['AWS_ASSOCIATE_TAG']);

            // from now on you want to have pure arrays as response
            $amazonEcs->returnType(Lib_Amazon_AmazonECS::RETURN_TYPE_ARRAY);

            // searching
            //$keyword = (isset($param['sq']) ? $param['sq'] : '' ) .(isset($param['sq2']) ? $param['sq2'] : '' );
            $response = $amazonEcs->country('fr')->category('All')->responseGroup('OfferListings,Large,Images')->search($keyword);


            $result = array();
            foreach ($response['Items']['Item'] as $item){
                $p = new Model_Product();
                $p->setName($item['ItemAttributes']['Title'])
                    ->setASIN($item['ASIN'])
                    ->setMerchant('amazon');
                ;


                if (isset($item['Offers']['Offer']['OfferListing']['Price'])){
                    $p->addPrice('amazon', new Model_Price($item['Offers']['Offer']['OfferListing']['Price']['Amount'],$item['Offers']['Offer']['OfferListing']['Price']['FormattedPrice']));
                }

                if (isset($item['OfferSummary']['LowestNewPrice'])){
                    $p->addPrice('new',new Model_Price($item['OfferSummary']['LowestNewPrice']['Amount'], $item['OfferSummary']['LowestNewPrice']['FormattedPrice']) );
                }

                if (isset($item['OfferSummary']['LowestUsedPrice'])){
                    $p->addPrice('used',new Model_Price($item['OfferSummary']['LowestNewPrice']['Amount'], $item['OfferSummary']['LowestNewPrice']['FormattedPrice']) );
                }

                if (isset($item['SmallImage'])){
                    $p->setImages($item['SmallImage']['URL']);
                }

                if (isset($item['MediumImage'])){
                    $p->setImages($item['MediumImage']['URL']);
                }

                if (isset($item['DetailPageURL'])){
                    $p->setDetailURL($item['DetailPageURL']);
                }

                array_push($result, $p);
            }

            return $result;

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

        return null;
    }

    /**
     * Look up information of individual product on Amazon's site
     * @param $productID
     * @return mixed|Model_Product|null
     */
    public function lookup($productID)
    {
        Core::includeConfigFile('Configs_Modules_Amazon_Settings');
        require_once SERVER_ROOT . DS . 'Lib/Amazon/AmazonECS.php';
        try{
            // get a new object with API Key and secret key. Lang is optional.
            // if you leave lang blank it will be US.
            $amazonEcs = new Lib_Amazon_AmazonECS(
                Core::$config['modules']['merchant']['amazon']['AWS_API_KEY'],
                Core::$config['modules']['merchant']['amazon']['AWS_API_SECRET_KEY'],
                'fr',
                Core::$config['modules']['merchant']['amazon']['AWS_ASSOCIATE_TAG']);

            // If you are at min version 1.3.3 you can enable the requestdelay.
            // This is usefull to get rid of the api requestlimit.
            // It depends on your current associate status and it is disabled by default.
            // $amazonEcs->requestDelay(true);

            $amazonEcs->associateTag(Core::$config['modules']['merchant']['amazon']['AWS_ASSOCIATE_TAG']);

            // from now on you want to have pure arrays as response
            $amazonEcs->returnType(Lib_Amazon_AmazonECS::RETURN_TYPE_ARRAY);

            // searching
            //$keyword = (isset($param['sq']) ? $param['sq'] : '' ) .(isset($param['sq2']) ? $param['sq2'] : '' );

            $response = $amazonEcs->country('fr')->category('All')->responseGroup('OfferListings,Large,Images')->lookup($productID);

            if (!isset($response['Items']['Item']))
                return NULL;
            $item = $response['Items']['Item'];
                $p = new Model_Product();
                $p->setName($item['ItemAttributes']['Title'])
                    ->setASIN($item['ASIN'])
                    ->setMerchant('amazon');
                ;


                if (isset($item['Offers']['Offer']['OfferListing']['Price'])){
                    $p->addPrice('amazon', new Model_Price($item['Offers']['Offer']['OfferListing']['Price']['Amount'],$item['Offers']['Offer']['OfferListing']['Price']['FormattedPrice']));
                }

                if (isset($item['OfferSummary']['LowestNewPrice'])){
                    $p->addPrice('new',new Model_Price($item['OfferSummary']['LowestNewPrice']['Amount'], $item['OfferSummary']['LowestNewPrice']['FormattedPrice']) );
                }

                if (isset($item['OfferSummary']['LowestUsedPrice'])){
                    $p->addPrice('used',new Model_Price($item['OfferSummary']['LowestNewPrice']['Amount'], $item['OfferSummary']['LowestNewPrice']['FormattedPrice']) );
                }

                if (isset($item['SmallImage'])){
                    $p->setImages($item['SmallImage']['URL']);
                }

                if (isset($item['MediumImage'])){
                    $p->setImages($item['MediumImage']['URL']);
                }

                if (isset($item['DetailPageURL'])){
                    $p->setDetailURL($item['DetailPageURL']);
                }
            return $p;

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Add a product for tracking (it doesn't update the new prices of product) to local database
     * @param $product
     * @return TRUE or FALSE
     */
    public function track($product)
    {
        try{
            $model = new Core_Model();
            $model->getDB()->connect();

            // add product into table Product
            //$model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('B000KKI1F6', 'Clearblue Digital Pregnancy Test Kit with Conception Indicator - Twin-Pack', 'amazon')");
            $model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('$product->ASIN', '$product->name', 'amazon')");
            $model->getDB()->query();

            $price_categories = array('amazon'=>'amazon', 'new' => 'amazon-new', 'used'=>'amazon-used');
            // add current price into table Tracking
            foreach (array_keys($price_categories) as $price_key)
            {
                if (isset($product->price[$price_key])){
                    $query = sprintf("INSERT INTO Tracking(ProductID, PriceType, Price, FormattedPrice)".
                        " VALUE ('%s', '%s' , %f, '%s')",
                        $product->ASIN,
                        $price_categories[$price_key],
                        $product->price[$price_key]->price/100.0,
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
     * @return TRUE or FALSE
     */
    public function updateDB()
    {
        $log='';
        try{
            $model = new Core_Model();
            $model->getDB()->connect();

            // Get all product and the latest prices (amazon, 3rd Amazon New, 3rd Used)
            $sql = "SELECT ProductID, Name, Price, PriceType FROM Tracking as t1, Product"
            ." WHERE ProductCode=ProductID and Website='amazon' "
                ." and Time >= (SELECT Max(Time) FROM Tracking as t2 WHERE t1.ProductID=t2.ProductID and t1.PriceType=t2.PriceType)"
            ." ORDER BY ProductID";
            $model->getDB()->prepare($sql);
            $model->getDB()->query();

            $results = $model->getDB()->fetch('array');



            $product_model = new Model_Amazon_Product();
            $price_categories = array('amazon'=>'amazon', 'new' => 'amazon-new', 'used'=>'amazon-used');
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
                                && ( $p->price[$price_key]->price/100.0 != $row['Price'])
                                && ($price_categories[$price_key] == $row['PriceType'])
                            ){
                                $query = sprintf("INSERT INTO Tracking(ProductID, PriceType, Price, FormattedPrice)".
                                    " VALUE ('%s', '%s' , %f, '%s')",
                                    $p->ASIN,
                                    $price_categories[$price_key],
                                    $p->price[$price_key]->price/100.0,
                                    $p->price[$price_key]->formattedPrice
                                );

                                $model->getDB()->prepare($query);
                                $model->getDB()->query();
                                if (DEBUG){
                                    echo "Update product " . $p->name . " with price type: " . $price_categories[$price_key] . " OK  "
                                    ." ||| Old price:". (string)($row['Price']) . "  New Price:" . (string)($p->price[$price_key]->price/100.0) . " \n";
                                }
                                $log .= "Update product " . $p->name . " with price type: " . $price_categories[$price_key] . " OK  "
                                    ." ||| Old price:". (string)($row['Price']) . "  New Price:" . (string)($p->price[$price_key]->price/100.0) . " \n";
                            }
                        }
                    }
                }
            }

            $model->getDB()->disconnect();

            return $log;
        }
        catch (Exception $e)
        {
            return FALSE;
        }
    }
}