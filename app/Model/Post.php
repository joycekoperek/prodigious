<?php  // MODEL

class Post extends AppModel {
    public $name = 'Post';

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank',
            'message' => 'Preencha o campo'
        ),
        'email' => array(
            'rule' => 'isUnique',
            'message' => 'Endereço de email já cadastrado'
        ),
        'body' => array(
            'rule' => 'notBlank',
            'message' => 'Preencha o campo'
        )
    );
}

?>