<?php

class PostsController extends AppController {
   
    public $helpers = array ('Html','Form','Flash','Paginator');
    public $components = array('Flash','Paginator');
    public $name = 'Posts';


	function index() {

        //$this->set('posts', $this->Post->find('all'));

         $options = array(
            'order' => array('Post.id' => 'ASC'),
            'limit' => 3
        );
 
        $this->paginate = $options;
 
        // Roda a consulta, já trazendo os resultados paginados
        $posts = $this->paginate('Post');
 
        // Envia os dados pra view
        $this->set('posts', $posts);
    }
     
    
    public function view($id = null) {
        $this->set('post', $this->Post->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
        	if (!empty($this->request->data['Post']['image']['name'])) {
	            $file = $this->request->data['Post']['image'];

	            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
	            $arr_ext = array('jpg', 'jpeg', 'gif','png');

	            if (in_array($ext, $arr_ext)) {
	                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/webimages/posts/' . $file['name']);
	                //prepare the filename for database entry
	                $this->request->data['Post']['image'] = $file['name'];
            	}
        	}
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Cadastro salvo com sucesso.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
        $this->Post->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Post->findById($id);
        } else {
        	            
            if (empty($this->request->data['Post']['image']['name'])) {
	            $file = $this->request->data['Post']['image'];

	            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
	            $arr_ext = array('jpg', 'jpeg', 'gif','png');

	            if (in_array($ext, $arr_ext)) {
	                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/webimages/posts/' . $file['name']);
	                //prepare the filename for database entry
	                $this->request->data['Post']['image'] = $file['name'];
            	}
        	}

            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Cadastro editado com sucesso.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $data = $this->Post->findById($id);
        if ($this->Post->delete($id)) {
        	unlink(WWW_ROOT . 'img/webimages/posts/' . $data['Post']['image']);
            $this->Flash->success('O castrado com id: ' . $id . ' foi deletado.');
            $this->redirect(array('action' => 'index'));
        }
    }


}

?>