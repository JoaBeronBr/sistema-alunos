<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Painel de Alunos - Listagem</title>
<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1055/1055646.png" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
<script src="https://unpkg.com/lucide@latest"></script>

<style>
  /* Reset */
  * {
    margin: 0; padding: 0; box-sizing: border-box;
    font-family: 'Inter', sans-serif;
  }

  /* Cores Dark Mode */
  :root {
    --bg-dark: #0e1117;
    --bg-sidebar: #1f2937;
    --bg-card: #27303f;
    --bg-hover: #3b82f6;
    --text-light: #e0e6f1;
    --text-muted: #94a3b8;
    --danger: #ef4444;
    --shadow: rgba(0,0,0,0.7);
  }

  body {
    background-color: var(--bg-dark);
    color: var(--text-light);
    display: flex;
    min-height: 100vh;
  }

  /* Sidebar */
  aside {
    width: 260px;
    background: var(--bg-sidebar);
    height: 100vh;
    position: fixed;
    top: 0; left: 0;
    padding: 2rem 1.5rem;
    display: flex;
    flex-direction: column;
    box-shadow: 2px 0 10px var(--shadow);
    transition: transform 0.3s ease;
    z-index: 100;
  }

  aside h2 {
    font-weight: 700;
    font-size: 1.7rem;
    color: var(--bg-hover);
    margin-bottom: 3rem;
    display: flex;
    align-items: center;
    gap: 0.6rem;
  }

  aside nav a {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--text-light);
    font-weight: 600;
    padding: 12px 14px;
    border-radius: 12px;
    text-decoration: none;
    margin-bottom: 1rem;
    user-select: none;
    transition: background-color 0.25s ease, color 0.25s ease;
  }
  aside nav a:hover, aside nav a.active {
    background: var(--bg-hover);
    color: #fff;
    box-shadow: 0 4px 12px var(--bg-hover);
  }

  /* Main content */
  main {
    margin-left: 260px;
    padding: 2.5rem 3rem;
    flex-grow: 1;
    overflow-x: auto;
  }

  /* Header */
  h1 {
    font-size: 2.8rem;
    margin-bottom: 2rem;
    color: var(--bg-hover);
    user-select: none;
  }

  /* Top bar */
  .top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 1.8rem;
  }
  .top-bar input {
    flex-grow: 1;
    min-width: 220px;
    padding: 14px 18px;
    border-radius: 12px;
    border: none;
    background: var(--bg-card);
    color: var(--text-light);
    font-size: 1rem;
    box-shadow: inset 0 0 6px #0008;
    transition: box-shadow 0.3s ease;
  }
  .top-bar input:focus {
    outline: none;
    box-shadow: 0 0 8px var(--bg-hover);
  }

  .btn {
    background-color: var(--bg-hover);
    padding: 14px 22px;
    color: white;
    font-weight: 700;
    border-radius: 14px;
    cursor: pointer;
    text-decoration: none;
    user-select: none;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.6);
  }
  .btn:hover {
    background-color: #2563eb;
    transform: scale(1.05);
    box-shadow: 0 6px 18px rgba(37, 99, 235, 0.8);
  }

  /* Table styles */
  table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 0 20px #0008;
    background-color: var(--bg-card);
  }

  thead tr {
    background-color: #344156;
  }
  thead th {
    padding: 16px 20px;
    color: var(--text-muted);
    font-weight: 600;
    cursor: pointer;
    user-select: none;
    position: relative;
  }
  thead th:hover {
    color: var(--bg-hover);
  }

  /* Sort arrows */
  thead th.sort-asc::after,
  thead th.sort-desc::after {
    content: '';
    position: absolute;
    right: 14px;
    top: 50%;
    width: 0;
    height: 0;
    border-style: solid;
    transform: translateY(-50%);
  }
  thead th.sort-asc::after {
    border-width: 0 6px 8px 6px;
    border-color: transparent transparent var(--bg-hover) transparent;
  }
  thead th.sort-desc::after {
    border-width: 8px 6px 0 6px;
    border-color: var(--bg-hover) transparent transparent transparent;
  }

  tbody tr {
    transition: background-color 0.25s ease;
  }
  tbody tr:hover {
    background-color: #475569;
  }
  tbody tr:nth-child(even) {
    background-color: #394452;
  }
  tbody td {
    padding: 14px 20px;
    color: var(--text-light);
    vertical-align: middle;
  }

  /* Action buttons with icons */
  td a {
    color: var(--bg-hover);
    margin-right: 12px;
    font-weight: 600;
    user-select: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    transition: color 0.3s ease, transform 0.2s ease;
    text-decoration: none;
  }
  td a:hover {
    color: #2563eb;
    transform: scale(1.1);
  }
  td a svg {
    stroke-width: 2.5;
    width: 20px;
    height: 20px;
  }

  /* Pagination */
  .pagination {
    margin-top: 24px;
    display: flex;
    justify-content: center;
    gap: 12px;
    user-select: none;
  }
  .pagination a {
    background-color: #344156;
    color: var(--text-light);
    padding: 10px 18px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }
  .pagination a:hover {
    background-color: var(--bg-hover);
    transform: scale(1.1);
  }
  .pagination a.active {
    background-color: #2563eb;
    cursor: default;
    transform: scale(1.05);
  }

  /* Scroll dentro da tabela para desktop */
  main {
    overflow-x: auto;
  }

  /* Tooltip básico */
  [data-tooltip] {
    position: relative;
    cursor: pointer;
  }
  [data-tooltip]::after {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 120%;
    left: 50%;
    transform: translateX(-50%);
    background-color: var(--bg-hover);
    padding: 6px 10px;
    border-radius: 6px;
    color: #fff;
    font-size: 0.85rem;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.25s ease;
    z-index: 10;
  }
  [data-tooltip]:hover::after {
    opacity: 1;
  }

  /* Modal para confirmação exclusão */
  #modalConfirm {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.7);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 200;
  }
  #modalConfirm.active {
    display: flex;
  }
  #modalContent {
    background: var(--bg-card);
    padding: 2rem 3rem;
    border-radius: 16px;
    max-width: 400px;
    text-align: center;
    box-shadow: 0 0 30px var(--shadow);
  }
  #modalContent h3 {
    margin-bottom: 1.6rem;
    font-size: 1.6rem;
    color: var(--danger);
  }
  #modalContent button {
    padding: 10px 20px;
    margin: 0 10px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    font-weight: 700;
    color: #fff;
    transition: background-color 0.3s ease;
  }
  #modalConfirm .btn-cancel {
    background: var(--bg-hover);
  }
  #modalConfirm .btn-cancel:hover {
    background: #2563eb;
  }
  #modalConfirm .btn-confirm {
    background: var(--danger);
  }
  #modalConfirm .btn-confirm:hover {
    background: #b91c1c;
  }

  /* Responsividade */
  @media (max-width: 880px) {
    aside {
      transform: translateX(-100%);
      position: fixed;
      z-index: 300;
    }
    aside.active {
      transform: translateX(0);
    }
    main {
      margin-left: 0;
      padding: 2rem 1rem;
    }
    .menu-toggle {
      display: block;
      position: fixed;
      top: 1rem;
      left: 1rem;
      background: var(--bg-hover);
      border-radius: 10px;
      padding: 10px;
      cursor: pointer;
      z-index: 400;
      box-shadow: 0 0 10px var(--bg-hover);
      transition: background-color 0.3s ease;
    }
    .menu-toggle:hover {
      background: #2563eb;
    }
  }
  @media (min-width: 881px) {
    .menu-toggle {
      display: none;
    }
  }
</style>
</head>

<body>

<!-- Botão menu mobile -->
<div class="menu-toggle" title="Menu" aria-label="Abrir menu">
  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide-menu" aria-hidden="true"><line x1="3" y1="7" x2="21" y2="7"/><line x1="3" y1="14" x2="21" y2="14"/><line x1="3" y1="21" x2="21" y2="21"/></svg>
</div>

<aside aria-label="Menu lateral">
  <h2><i data-lucide="graduation-cap"></i> Alunos</h2>
  <nav>
    <a href="<?= base_url('alunos') ?>" class="active"><i data-lucide="list"></i> Listar</a>
    <a href="<?= base_url('alunos/novo') ?>"><i data-lucide="plus-circle"></i> Novo Aluno</a>
  </nav>
</aside>

<main>
  <h1>📚 Lista de Alunos</h1>
  <div class="top-bar">
    <input type="search" id="searchInput" placeholder="Buscar por nome ou email..." aria-label="Buscar alunos" />
    <a href="<?= base_url('alunos/novo') ?>" class="btn" role="button">+ Novo Aluno</a>
  </div>

  <table id="alunoTable" role="table" aria-label="Tabela de alunos">
    <thead>
      <tr>
        <th role="columnheader" scope="col" data-column="id" tabindex="0" aria-sort="none">ID</th>
        <th role="columnheader" scope="col" data-column="nome" tabindex="0" aria-sort="none">Nome</th>
        <th role="columnheader" scope="col" data-column="email" tabindex="0" aria-sort="none">Email</th>
        <th role="columnheader" scope="col" data-column="endereco" tabindex="0" aria-sort="none">Endereço</th>
        <th role="columnheader" scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($alunos as $a): ?>
      <tr>
        <td><?= $a['id'] ?></td>
        <td><?= esc($a['nome']) ?></td>
        <td><?= esc($a['email']) ?></td>
        <td><?= esc($a['endereco']) ?></td>
        <td>
          <a href="<?= base_url("alunos/editar/{$a['id']}") ?>" data-tooltip="Editar"><i data-lucide="edit-3"></i></a>
          <a href="#" data-id="<?= $a['id'] ?>" class="btn-delete" data-tooltip="Excluir"><i data-lucide="trash-2"></i></a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <nav class="pagination" aria-label="Paginação">
    <a href="#" class="prev" aria-label="Página anterior">«</a>
    <a href="#" class="active" aria-current="page">1</a>
    <a href="#" aria-label="Página 2">2</a>
    <a href="#" class="next" aria-label="Próxima página">»</a>
  </nav>
</main>

<!-- Modal Confirmar Exclusão -->
<div id="modalConfirm" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-describedby="modalDesc">
  <div id="modalContent">
    <h3 id="modalTitle">Confirma exclusão?</h3>
    <p id="modalDesc">Tem certeza que deseja excluir este aluno? Esta ação não pode ser desfeita.</p>
    <button class="btn-cancel" aria-label="Cancelar exclusão">Cancelar</button>
    <button class="btn-confirm" aria-label="Confirmar exclusão">Excluir</button>
  </div>
</div>

<script>
  lucide.createIcons();

  // Toggle sidebar mobile
  const menuToggle = document.querySelector('.menu-toggle');
  const aside = document.querySelector('aside');
  menuToggle.addEventListener('click', () => {
    aside.classList.toggle('active');
  });

  // Search filter
  const input = document.getElementById('searchInput');
  const rows = document.querySelectorAll('#alunoTable tbody tr');

  input.addEventListener('input', () => {
    const val = input.value.toLowerCase();
    rows.forEach(row => {
      const text = row.innerText.toLowerCase();
      row.style.display = text.includes(val) ? '' : 'none';
    });
  });

  // Sorting columns
  const headers = document.querySelectorAll('thead th[data-column]');
  let sortOrder = {};
  headers.forEach(header => {
    header.addEventListener('click', () => {
      const column = header.getAttribute('data-column');
      let order = sortOrder[column] === 'asc' ? 'desc' : 'asc';
      sortOrder = {}; // reset all others
      sortOrder[column] = order;

      // Update aria-sort and classes
      headers.forEach(h => {
        h.setAttribute('aria-sort', 'none');
        h.classList.remove('sort-asc', 'sort-desc');
      });
      header.setAttribute('aria-sort', order === 'asc' ? 'ascending' : 'descending');
      header.classList.add(order === 'asc' ? 'sort-asc' : 'sort-desc');

      // Sort rows
      const tbody = document.querySelector('#alunoTable tbody');
      const rowsArray = Array.from(tbody.querySelectorAll('tr'));
      rowsArray.sort((a, b) => {
        let aText = a.querySelector(`td:nth-child(${header.cellIndex + 1})`).innerText.toLowerCase();
        let bText = b.querySelector(`td:nth-child(${header.cellIndex + 1})`).innerText.toLowerCase();

        if (!isNaN(aText) && !isNaN(bText)) {
          // Numérico
          return order === 'asc' ? aText - bText : bText - aText;
        } else {
          // Texto
          if (aText < bText) return order === 'asc' ? -1 : 1;
          if (aText > bText) return order === 'asc' ? 1 : -1;
          return 0;
        }
      });
      // Re-append sorted rows
      rowsArray.forEach(row => tbody.appendChild(row));
    });

    // Allow sort by keyboard (Enter/Space)
    header.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        header.click();
      }
    });
  });

  // Modal exclusão
  const modal = document.getElementById('modalConfirm');
  const btnCancel = modal.querySelector('.btn-cancel');
  const btnConfirm = modal.querySelector('.btn-confirm');
  let currentDeleteId = null;

  document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      currentDeleteId = btn.getAttribute('data-id');
      modal.classList.add('active');
    });
  });

  btnCancel.addEventListener('click', () => {
    modal.classList.remove('active');
    currentDeleteId = null;
  });

  btnConfirm.addEventListener('click', () => {
    if (currentDeleteId) {
      // Redireciona para excluir
      window.location.href = "<?= base_url('alunos/excluir') ?>/" + currentDeleteId;
    }
  });

  // Fechar modal ao clicar fora do conteúdo
  modal.addEventListener('click', e => {
    if (e.target === modal) {
      modal.classList.remove('active');
      currentDeleteId = null;
    }
  });
</script>

</body>
</html>
