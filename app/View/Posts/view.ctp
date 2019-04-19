
<!-- ABRE A PAG DO POST -->	

<h1> </h1>

<p><b>Nome: </b> <?php echo $post['Post']['title']?></p>
<p><b>Email:</b> <?php echo $post['Post']['email']?></p>

<p><b>Descrição:</b> <?php echo $post['Post']['body']?></p>


<p><b>Data de criação:</b> <?php echo $post['Post']['created']?></p>
<p><b>Data de modificação :</b> <?php echo $post['Post']['modified']?></p>

<p><b>Imagem:</b></p>

<p><?php  echo $this->Html->image('../img/webimages/posts/'.$post['Post']['image']); ?> </p>