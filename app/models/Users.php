<?php
namespace App\Models;
use App\Models\UserSessions;
use Core\Cookie;
use Core\Helper;
use Core\Session;
use Core\Model;
use Core\SendMail;

class Users extends Model{

    private $_isLoggedIn;
    private $_sessionName;
    private $_cookieName;
    public static $currentLoggedInUser = null;

    public function __construct($user=''){
        $table = 'users';
        parent::__construct($table);
        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_softDelete = true;
        if ($user != ''){
            if(is_int($user)){
                $u = $this->_db->findFirst("users", ["conditions"=>"id = ?", "bind"=>[$user]]);
            } else{
                $u = $this->_db->findFirst("users", ["conditions"=>"username = ?", "bind"=>[$user]]);
            } 
        }
        if(!empty($u)){
            foreach ($u as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function findByUsername($username){
        return $this->findFirst(["conditions"=>"username = ?", "bind"=>[$username]]);
    }

    public function findByID($id){
        return $this->findFirst(["conditions"=>"id = ?", "bind"=>[$id]]);
    }

    public function findByEmail($email){
        return $this->findFirst(["conditions"=>"email = ?", "bind"=>[$email]]);
    }

    public static function currentLoggedInUser(){
        if (!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)) {
            if(Session::exists(CURRENT_USER_SESSION_NAME)){
                $u = new Users((int)Session::get(CURRENT_USER_SESSION_NAME));
                self::$currentLoggedInUser = $u;
            }
        }
        return self::$currentLoggedInUser;
    }

    public  function login($rememberMe=false){
        Session::set($this->_sessionName, $this->id);
        if($rememberMe){
            $hash = md5(uniqid() + rand(0, 100));
            $user_agent = Session::uagent_no_version();
            Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
            $fields = ['session'=>$hash, 'user_agent'=>$user_agent, 'user_id'=>$this->id];
            $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
            $this->_db->insert('user_sessions', $fields);
        }
    }

    public static function loginUserFromCookie(){
        $userSession = UserSessions::getFromCookie();
        if($userSession->user_id != ''){
            $user = new self((int)$userSession->user_id);
        }
        if($user){
            $user->login();
        }
        return $user;
    }

    public  function logout(){
        $userSession = UserSessions::getFromCookie();
        if($userSession)
            $userSession->delete();
        Session::delete(CURRENT_USER_SESSION_NAME);
        if(Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
            Cookie::delete(REMEMBER_ME_COOKIE_NAME);    
        }
        self::$currentLoggedInUser= null;
        return true;
    }

    public function getSP_NO(){
        $str = "1234567890";
        $random = substr(str_shuffle($str), 0, 6);
        $sp = "SP".$random;
        $result = $this->_db->query("SELECT * FROM users WHERE username = ?",[$sp]);
        if($result->count()){
            return getSP_NO();
        }
        return $sp;
    }

    public function registerNewUser($params){
        $this->assign($params);
        $token = Helper::gettoken();
        $this->username = self::getSP_NO();
        $this->confirm_code = $token;
        $this->verify = 0;
        $this->notify = 1;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->save();
        SendMail::verify($this->email, $this->_db->lastID(), $token);        
    }

    public function updateUser($id,$params, $default){
        $this->update($id, $params);
        $this->update($id, $default);
        $this->logout();
    }

    public function reset($id, $default){
        $this->update($id, $default);
    }
    public function confirm($id, $token){
        if($token){
            $info = [
                'verify' => 1,
                'confirm_code' => ''
            ];
            $this->update($id, $info);
        }
    }

    public function acls(){
        if(empty($this->acl))
            return [];
        return json_decode($this->acl, true);
    }
}