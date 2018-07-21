<?php
	class Post extends AppModel{

        public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'dependent' => true
        ));
		public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        ),
        'categoryid' => array(
            'rule' => 'notBlank'
        )
        );
	}
?>

