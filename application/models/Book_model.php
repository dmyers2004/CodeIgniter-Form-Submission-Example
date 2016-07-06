<?php
/*
CREATE TABLE `book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `favfood` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
*/

class Book_model extends MY_Model {
	public $_table = 'book';	
	public $validate = [
		[ 'field' => 'firstname', 'label' => 'First Name', 'rules' => 'required|alpha_numeric_spaces|max_length[64]' ],
		[ 'field' => 'lastname', 'label' => 'Last Name', 'rules' => 'alpha_numeric_spaces|max_length[64]' ],
		[ 'field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email|max_length[128]' ],
		[ 'field' => 'favfood', 'label' => 'Favorite Food', 'rules' => 'required|in_list[pizza,ice cream,cookies,steak,vegetables]|max_length[32]'],
	];

} /* end class */