<h1>PG LISTAR</h1>
<a href="http://localhost/kioficina/public/servico/adicionar">ADICIONAR</a>
<a href="http://localhost/kioficina/public/servico/editar">EDITAR</a>
<a href="http://localhost/kioficina/public/servico/desativar">DESATIVAR</a>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">descrição</th>
      <th scope="col">Preço</th>
      <th scope="col">Tempo</th>
      <th scope="col">Especialidade</th>
      <th scope="col">Editar</th>
      <th scope="col">Desativar</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach($listaServico as $linha): ?>
    <tr>
      <th scope="row"><?php echo $linha['id_servico'] ?></th>
      <td><?php echo $linha['id_servico'] ?></td>
      <td><?php echo $linha['nome_servico'] ?></td>
      <td><?php echo $linha['descricao_servico'] ?></td>
      <td><?php echo $linha['preco_base_servico'] ?></td>
      <td><?php echo $linha['tempo_estimado_servico'] ?></td>
      <td><?php echo $linha['id_especialidade'] ?></td>
      <td>editar</td>
      <td>desativar</td>
    </tr>
    
    <?php endforeach; ?>
    
  </tbody>
</table>