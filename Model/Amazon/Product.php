<?php
/**
 * File : Product.php
 * User : loveallufev
 * Date:  5/27/13
 * Group: Hieu-Trung
*/


class Model_Amazon_Product extends Model_MerchantAbstract {

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
                    ->setASIN($item['ASIN']);


                if (isset($item['Offers']['Offer']['OfferListing']['Price'])){
                    $p->addPrice('amazon', $item['Offers']['Offer']['OfferListing']['Price']);
                }

                if (isset($item['OfferSummary']['LowestNewPrice'])){
                    $p->addPrice('new',$item['OfferSummary']['LowestNewPrice'] );
                }

                if (isset($item['OfferSummary']['LowestUsedPrice'])){
                    $p->addPrice('used',$item['OfferSummary']['LowestNewPrice'] );
                }

                if (isset($item['MediumImage'])){
                    $p->setImages($item['MediumImage']['URL']);
                }

                if (isset($item['SmallImage'])){
                    $p->setImages($item['SmallImage']['URL']);
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

            $item = $response['Items']['Item'];
                $p = new Model_Product();
                $p->setName($item['ItemAttributes']['Title'])
                    ->setASIN($item['ASIN']);


                if (isset($item['Offers']['Offer']['OfferListing']['Price'])){
                    $p->addPrice('amazon', $item['Offers']['Offer']['OfferListing']['Price']);
                }

                if (isset($item['OfferSummary']['LowestNewPrice'])){
                    $p->addPrice('new',$item['OfferSummary']['LowestNewPrice'] );
                }

                if (isset($item['OfferSummary']['LowestUsedPrice'])){
                    $p->addPrice('used',$item['OfferSummary']['LowestNewPrice'] );
                }

                if (isset($item['MediumImage'])){
                    $p->setImages($item['MediumImage']['URL']);
                }

                if (isset($item['SmallImage'])){
                    $p->setImages($item['SmallImage']['URL']);
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
     * Add a product for tracking
     * @param $product
     * @return mixed
     */
    public function track($product)
    {
        $model = new Core_Model();
        $model->getDB()->connect();

        $model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ($product->ASIN, $product->name, 'amazon')");
        $model->getDB()->query();

        $model->getDB()->disconnect();

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