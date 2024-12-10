<div>
	<a href="/event">
		<button>Voltar</button>
	</a>
</div>
<h1>Detalhes do Evento</h1>
<p>Nome: <?php echo htmlspecialchars($event->getNome()); ?></p>
<p>Local: <?php echo htmlspecialchars($event->getLocal()); ?></p>
<p>Data: <?php echo htmlspecialchars($event->getData()); ?></p>
<p>Criado por: <?php echo htmlspecialchars($event->getIdUserCriador()); ?></p>
<a href="/event/edit/<?php echo $event->getId(); ?>">Editar</a>
<a href="/event/delete/<?php echo $event->getId(); ?>">Excluir</a>

<h2>Bebidas</h2>

<a href="/event/<?php echo $event->getId(); ?>/bebida/create">Adicionar Bebida</a>

<ul>
	<?php foreach ($bebidas as $bebida): ?>
		<li>
			<?php echo htmlspecialchars($bebida->getNome()); ?> - Quantidade: <?php echo $bebida->getQuantidadePorPessoa(); ?> - Temperatura: <?php echo htmlspecialchars($bebida->getTemperaturaConsumo()); ?>
			<a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/edit/<?php echo $bebida->getId(); ?>">Editar</a>
			<a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/delete/<?php echo $bebida->getId(); ?>">Excluir</a>
		</li>
	<?php endforeach; ?>
</ul>

<!-- Botão para abrir o modal -->
<a href="#" id="openModal">
    <button>Adicionar Convidado</button>
</a>

<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Selecionar Convidado</h2>
    
    <!-- Lista de usuários cadastrados -->
    <div id="userList">
      <?php foreach ($usuarios as $usuario): ?>
        <div>
          <label>
            <input type="radio" name="user_id" value="<?php echo $usuario->getId(); ?>"> 
            <?php echo htmlspecialchars($usuario->getNome()); ?>
          </label>
        </div>
      <?php endforeach; ?>
    </div>
    
    <button id="addConvidado">Adicionar Convidado</button>
  </div>
</div>

<script>
  // Abrir o modal
  document.getElementById("openModal").onclick = function() {
    document.getElementById("myModal").style.display = "block";
  };

  // Fechar o modal
  document.getElementsByClassName("close")[0].onclick = function() {
    document.getElementById("myModal").style.display = "none";
  };

  // Fechar o modal se clicar fora dele
  window.onclick = function(event) {
    if (event.target == document.getElementById("myModal")) {
      document.getElementById("myModal").style.display = "none";
    }
  };

  // Enviar o usuário selecionado ao adicionar
  document.getElementById("addConvidado").onclick = function() {
    let userId = document.querySelector('input[name="user_id"]:checked');
    if (userId) {
      let eventoId = <?php echo $event->getId(); ?>; // Evento ID
      let selectedUserId = userId.value;
      window.location.href = `/event/${eventoId}/convidado/add/${selectedUserId}`;
    } else {
      alert("Selecione um usuário para adicionar como convidado!");
    }
  };
</script>


<!-- <h2>Convidados</h2>

<a href="/event/<?php echo $event->getId(); ?>/convidado/create">Adicionar Convidados</a>

<ul>
	<?php foreach ($convidados as $convidado): ?>
		<li>
			<?php echo htmlspecialchars($convidado->getNome()); ?> - CPF: <?php echo htmlspecialchars($convidado->getCPF()); ?>
			<a href="/event/<?php echo $convidado->getEventoId(); ?>/convidado/edit/<?php echo $convidado->getId(); ?>">Editar</a>
			<a href="/event/<?php echo $convidado->getEventoId(); ?>/convidado/delete/<?php echo $convidado->getId(); ?>">Excluir</a>
		</li>
	<?php endforeach; ?>
</ul> -->