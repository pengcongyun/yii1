<?php
class AdminForm extends CFormModel
{
    public $name;
    public $email;
    public $subject;
    public $body;

    public $adminname;
    public $password;
    public $verifyCode;

    private $_id;
    private $_identity;
	public function rules()
	{
		return array(
			array('adminname', 'length', 'max'=>20),
			array('password', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, adminname, password', 'safe', 'on'=>'search'),
			array('adminname, password,verifyCode','required','message'=>'必填'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}
    public function attributeLabels()
    {
        return array(
            'verifyCode'=>'Verification Code',
        );
    }
    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     * @param string $attribute the name of the attribute to be validated.
     * @param array $params additional parameters passed with rule when being executed.
     */
    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->_identity=new UserIdentity($this->adminname,$this->password);
            if(!$this->_identity->authenticate())
                $this->addError('password','Incorrect username or password.');
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        if($this->_identity===null)
        {
            $this->_identity=new UserIdentity($this->adminname,$this->password);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
        {
//			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            $duration=3600*24*30;
            Yii::app()->user->login($this->_identity,$duration);
            return true;
        }
        else
            return false;
    }
    public function getId()
    {
        return $this->_id;
    }
}
