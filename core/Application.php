<?php
namespace Core;

class   Application
{
    public function __construct(){
        $this->_set_reporting();
        $this->unregister_globals();
    }

    private function _set_reporting(){
        if(DEBUG){
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }else{
            error_reporting(0);
            ini_set('display_errors', 0);
            ini_set('log_errors', 1);
            ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'errors.log');
        }       
    }

    private function unregister_globals(){
        if(ini_get('register_globals')){
            $globalsAry = ['_SESSION', '_COOKIE', '_POST', '_GET','REQUEST', '_SERVER', '_ENV', '_FILES'];
            foreach($globalsAry as $global) {
                foreach ($GLOBALS[$global] as $key => $value) {
                    if ($GLOBALS[$key] === $value)
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}