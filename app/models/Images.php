<?php
class Images extends Model{
    public function __construct($user=''){
        $table = 'images';
        parent::__construct($table);
    }
}