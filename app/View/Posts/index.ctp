<br>
<h1>Formulário básico com upload de imagem</h1>
<br>

<?php echo $this->Html->link('Adicionar', array('controller' => 'posts', 'action' => 'add'));?> 

<table>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Data de Criação</th>
        <th>Data de Modificação</th>
        <th>Ações</th>
    </tr>

  <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
                array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td><?php echo $post['Post']['modified']; ?></td>

        <td> <?php echo $this->Html->link('Editar', array('action' => 'edit', $post['Post']['id']));?>
               <?php echo $this->Form->postLink(
                'Deletar',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?'));
             ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Paginator->prev('« Próximas ', null, null, array('class' => 'desabilitado'));
echo $this->Paginator->numbers();
echo $this->Paginator->next(' Anteriores »', null, null, array('class' => 'desabilitado')); ?>




