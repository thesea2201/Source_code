<?php
	class Category extends AppModel{
		public $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'category_id',
            'order' => 'category_id asc',
            'dependent' => true
        )
    );       
	}
?>

