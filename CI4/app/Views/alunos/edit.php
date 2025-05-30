<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Aluno</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    /* Reset e base */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }
    body {
      background: #121212;
      color: #e0e0e0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
      animation: fadeIn 1s ease forwards;
    }
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }

    /* Container */
    .container {
      background: #1e1e1e;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.7);
      width: 100%;
      max-width: 450px;
      animation: slideUp 0.7s ease forwards;
    }
    @keyframes slideUp {
      from {
        transform: translateY(30px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    /* Título */
    h2 {
      font-weight: 600;
      margin-bottom: 25px;
      text-align: center;
      color: #90caf9;
      letter-spacing: 1.1px;
      text-shadow: 0 0 6px #90caf9aa;
    }

    /* Form */
    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    /* Label */
    label {
      font-weight: 500;
      font-size: 1rem;
      margin-bottom: 6px;
      color: #bbdefb;
      user-select: none;
    }

    /* Inputs */
    input[type="text"], input[type="email"] {
      padding: 12px 15px;
      font-size: 1rem;
      border-radius: 8px;
      border: 2px solid transparent;
      background: #333;
      color: #e0e0e0;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      outline-offset: 2px;
      outline-color: transparent;
      box-shadow: inset 2px 2px 8px #222, inset -2px -2px 8px #444;
    }
    input[type="text"]:focus, input[type="email"]:focus {
      border-color: #64b5f6;
      box-shadow:
        0 0 8px #64b5f6,
        inset 2px 2px 8px #222,
        inset -2px -2px 8px #444;
      outline-color: #64b5f6;
    }

    /* Botão */
    button {
      padding: 14px 0;
      font-size: 1.1rem;
      font-weight: 600;
      background: linear-gradient(135deg, #42a5f5, #478ed1);
      color: white;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 6px 15px #42a5f5aa;
      transition: background 0.4s ease, box-shadow 0.4s ease;
      user-select: none;
    }
    button:hover, button:focus {
      background: linear-gradient(135deg, #64b5f6, #90caf9);
      box-shadow: 0 8px 25px #64b5f6dd;
      outline: none;
    }
    button:active {
      transform: scale(0.97);
      box-shadow: 0 4px 10px #42a5f5aa;
    }

    /* Validação - erros */
    .validation-errors {
      background: #b71c1c;
      padding: 12px 20px;
      border-radius: 10px;
      color: #ffebee;
      font-weight: 600;
      box-shadow: 0 0 10px #b71c1ccc;
      margin-bottom: 20px;
      animation: shake 0.3s ease;
      user-select: none;
    }
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20%, 60% { transform: translateX(-5px); }
      40%, 80% { transform: translateX(5px); }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Editar Aluno</h2>

    <?php if(isset($validation)): ?>
      <div class="validation-errors">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif ?>

    <form action="<?= base_url('alunos/update/'.$aluno['id']) ?>" method="post" novalidate>
      <label for="nome">Nome</label>
      <input
        type="text"
        id="nome"
        name="nome"
        value="<?= esc(set_value('nome', $aluno['nome'])) ?>"
        required
        aria-required="true"
        aria-describedby="nomeError"
        autocomplete="name"
        spellcheck="false"
        placeholder="Digite o nome completo"
      />

      <label for="endereco">Endereço</label>
      <input
        type="text"
        id="endereco"
        name="endereco"
        value="<?= esc(set_value('endereco', $aluno['endereco'])) ?>"
        required
        aria-required="true"
        aria-describedby="enderecoError"
        placeholder="Digite o endereço"
        spellcheck="false"
      />

      <label for="email">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        value="<?= esc(set_value('email', $aluno['email'])) ?>"
        required
        aria-required="true"
        aria-describedby="emailError"
        placeholder="exemplo@dominio.com"
        autocomplete="email"
      />

      <button type="submit">Atualizar</button>
    </form>
  </div>
</body>
</html>