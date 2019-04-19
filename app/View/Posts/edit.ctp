<h1>Editar cadastro</h1>
<?php
    echo $this->Form->create('Post', array('action' => 'edit','type'=>'file'));
    echo $this->Form->input('title');
    echo $this->Form->input('email');
    echo $this->Form->input('body', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    
    $image = $this->request->data['Post']['image'];
    //echo $image;
    if (empty($image)){
    	echo $this->Form->input('image', ['type' => 'file']);
    }else{
 		echo $this->Html->image('../img/webimages/posts/'.$image);
 	 
    }  
    echo $this->Form->end('Salvar');