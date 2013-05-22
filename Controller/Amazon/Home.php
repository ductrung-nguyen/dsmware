<?php
/**
 * File : Home.php
 * User : loveallufev
 * Date:  5/20/13
 * Group: Hieu-Trung
*/


class Controller_Amazon_Home extends Controller_SearchingAbstract {

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

        require SERVER_ROOT . DS . 'Lib/Amazon/AmazonECS.php';

        $this->view->title = 'Amazons Product Tracking';
        $this->view->header = (new Core_View('header'))->render(FALSE);
        $this->view->footer = (new Core_View('footer'))->render(FALSE);

        try{
            // get a new object with API Key and secret key. Lang is optional.
            // if you leave lang blank it will be US.
            $amazonEcs = new Lib_Amazon_AmazonECS(
                Core::$config['modules']['searching']['amazon']['AWS_API_KEY'],
                Core::$config['modules']['searching']['amazon']['AWS_API_SECRET_KEY'],
                'fr',
                Core::$config['modules']['searching']['amazon']['AWS_ASSOCIATE_TAG']);

            // If you are at min version 1.3.3 you can enable the requestdelay.
            // This is usefull to get rid of the api requestlimit.
            // It depends on your current associate status and it is disabled by default.
            // $amazonEcs->requestDelay(true);

            $amazonEcs->associateTag(Core::$config['modules']['searching']['amazon']['AWS_ASSOCIATE_TAG']);

            // from now on you want to have pure arrays as response
            $amazonEcs->returnType(Lib_Amazon_AmazonECS::RETURN_TYPE_ARRAY);

            // searching
            $keyword = (isset($param['sq']) ? $param['sq'] : '' ) .(isset($param['sq2']) ? $param['sq2'] : '' );
            $response = $amazonEcs->category('All')->responseGroup('Large,Images')->search($keyword);

            // make sure the keyword is included
            $response['Items']['Request']['ItemSearchRequest']['Keywords'] = $keyword;
            $this->view->search_result = $response['Items'];

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

        // set default template for result page
        $this->view->setTemplate('Amazon/search_result');
        $this->view->render();
    }
}