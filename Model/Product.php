<?php
/**
 * File : Product.php
 * User : loveallufev
 * Date:  5/27/13
 * Group: Hieu-Trung
*/


class Model_Product {
    public $name;
    public $tags;
    public $detailURL;
    public $images;
    public $thumbnail;
    public $ASIN;
    public $manufacture;
    public $price;
    public $currency;
    public $merchant;

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function setTags($tags){
        $this->tags = $tags;
        return $this;
    }

    public function setDetailURL($url){
        $this->detailURL = $url;
        return $this;
    }

    public function setImages($imagesURL){
        $this->images = $imagesURL;
        return $this;
    }

    public function setThumbnail($thumbnailURL){
        $this->thumbnail = $thumbnailURL;
        return $this;
    }

    public function setASIN($ASIN){
        $this->ASIN = $ASIN;
        return $this;
    }

    public function setManufacture($manufacture){
        $this->manufacture = $manufacture;
        return $this;
    }

    public function setPrice($price){
        $this->price = $price;
        return $this;
    }

    public function addPrice($key, $price){
        $this->price[$key] = $price;
        return $this;
    }

    public function setCurrency($cur){
        $this->currency=$cur;
        return $this;
    }

    public function setMerchant($merchant){
        $this->merchant = $merchant;
    }

    static public function checkExistProductByID($product_code, $merchant){
        try{
            $model = new Core_Model();
            $model->getDB()->connect();

            //$model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('B000KKI1F6', 'Clearblue Digital Pregnancy Test Kit with Conception Indicator - Twin-Pack', 'amazon')");
            $model->getDB()->prepare("SELECT * FROM Product WHERE ProductCode='$product_code' and Website='$merchant'");

            $model->getDB()->query();

            $result = $model->getDB()->fetch();

            $model->getDB()->disconnect();
            if (isset($result))
                return TRUE;
            else
                return FALSE;
        }
        catch (Exception $e)
        {
            return FALSE;
        }
    }
}