<?php
/**
 * File : Home.php
 * User : loveallufev
 * Date:  5/20/13
 * Group: Hieu-Trung
*/


class Controller_Amazon_Home extends Core_Controller {

    public function IndexAction($param){
        $this->view->title = 'Amazons Product Tracking';
        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);
        $this->view->body = 'Some stuff';
        $this->view->setTemplate('Amazon/Home');
        $this->view->render();
    }

    public function SearchAction($param){

        Core::includeConfigFile('Configs_Modules_Amazon_Settings');

        require SERVER_ROOT . DS . 'Libs/Amazon/AmazonECS.php';

        try{
            // get a new object with API Key and secret key. Lang is optional.
            // if you leave lang blank it will be US.
            $amazonEcs = new Lib_Amazon_AmazonECS(
                Core::$config['Modules']['amazon']['AWS_API_KEY'],
                Core::$config['Modules']['amazon']['AWS_API_SECRET_KEY'],
                'fr',
                Core::$config['Modules']['amazon']['AWS_ASSOCIATE_TAG']);

            // If you are at min version 1.3.3 you can enable the requestdelay.
            // This is usefull to get rid of the api requestlimit.
            // It depends on your current associate status and it is disabled by default.
            // $amazonEcs->requestDelay(true);

            // for the new version of the wsdl its required to provide a associate Tag
            // @see https://affiliate-program.Amazon.com/gp/advertising/api/detail/api-changes.html?ie=UTF8&pf_rd_t=501&ref_=amb_link_83957571_2&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=&pf_rd_s=assoc-center-1&pf_rd_r=&pf_rd_i=assoc-api-detail-2-v2
            // you can set it with the setter function or as the fourth paramameter of ther constructor above
            $amazonEcs->associateTag(Core::$config['Modules']['amazon']['AWS_ASSOCIATE_TAG']);

            // changing the category to DVD and the response to only images and looking for some matrix stuff.
            //$response = $amazonEcs->category('DVD')->responseGroup('Large')->search("Matrix Revolutions");
            //var_dump($response);

            // from now on you want to have pure arrays as response
            $amazonEcs->returnType(Lib_Amazon_AmazonECS::RETURN_TYPE_ARRAY);

            // searching
            $response = $amazonEcs->category('All')->responseGroup('Small,Images')->search($param['sq']);
            //var_dump($response);

            /*
            // and again... Changing the responsegroup and category before
            $response = $amazonEcs->responseGroup('Small')->category('Books')->search('PHP 5');
            //var_dump($response);

            // category has been set so lets have a look for another book
            $response = $amazonEcs->search('MySql');
            //var_dump($response);

            // want to look in the US Database? No Problem
            $response = $amazonEcs->country('com')->search('MySql');
            //var_dump($response);

            // or Japan?
            $response = $amazonEcs->country('co.jp')->search('MySql');
            //var_dump($response);

            // Back to DE and looking for some Music !! Warning "Large" produces a lot of Response
            $response = $amazonEcs->country('de')->category('Music')->responseGroup('Small')->search('The Beatles');
            //var_dump($response);

            // Or doing searchs in a loop?
            for ($i = 1; $i < 4; $i++)
            {
                $response = $amazonEcs->search('Matrix ' . $i);
                //var_dump($response);
            }

            // Want to have more Repsonsegroups?                         And Maybe you want to start with resultpage 2?
            $response = $amazonEcs->responseGroup('Small,Images')->optionalParameters(array('ItemPage' => 2))->search('Bruce Willis');
            //var_dump($response);

            // With version 1.2 you can use the page function to set up the page of the resultset
            $response = $amazonEcs->responseGroup('Small,Images')->page(3)->search('Bruce Willis');
            //var_dump($response);
            */
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

        $this->view->title = 'Amazons Product Tracking';
        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);
        $this->view->search_result = $response['Items'];
        $this->view->setTemplate('Amazon/search_result');
        $this->view->render();
    }
}