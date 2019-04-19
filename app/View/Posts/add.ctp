<h1>Adicionar Cadastro</h1>
<?php // cria formulario add
	echo $this->Form->create('Post',array('type'=>'file'));
	echo $this->Form->input('title');
	echo $this->Form->input('email');
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('image', array('type'=>'file'));
	echo $this->Form->end('Salvar');