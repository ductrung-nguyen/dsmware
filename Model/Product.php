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
        return this;
    }

    static public function checkExistProductByID($product_code, $merchant){

        return TRUE;
    }
}