<?php

class UserIdentity extends CUserIdentity {

    public $user_id;

    public function authenticate() {

        $login = Users::model()->findByAttributes(array('username' => $this->username));

        if ($login === NULL) {
            $this->user_id = "Null User";
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            Yii::app()->user->setFlash('success', "Invaliid Username");
        } else if ($login->password != md5($this->password)) {
//             }else if($login->password != $this->password){
            $this->user_id = $login->id;
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
           Yii::app()->user->setFlash('success', "Invaliid Password");
        } else {

            $this->user_id = $login->id;

            $this->setState("username", $login->username);
            $this->setState("userid", $login->id);

            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }
//    public function getId()
//    {
//        return $this->user_id;
//    }

}
