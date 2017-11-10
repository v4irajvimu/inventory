<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    public $monthsArray = array('1' => 'ජනවාරි', '2' => 'පෙබරවාරි', '3' => 'මාර්තු', '4' => 'අප්‍රේල්', '5' => 'මැයි', '6' => 'ජූනි', '7' => 'ජූලි', '8' => 'අගෝස්තු', '9' => 'සැප්තැම්බර්', '10' => 'ඔක්තෝම්බර්', '11' => 'නොවැම්බර්', '12' => 'දෙසැම්බර්');

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function unlinkFile($file_with_path) {
        $status = Parameters::model()->findByAttributes(array('name' => 'status'));
        if ($status->value == 'local') {
            $new_path =str_replace(' ', '', str_replace("/",'\ ',$file_with_path));
        } else {
            $new_path = str_replace(' ', '', str_replace("/", '/ ', $file_with_path));
        }
        if(file_exists($new_path)){
        unlink($new_path);
        }
    }
    
     
    
    

}
