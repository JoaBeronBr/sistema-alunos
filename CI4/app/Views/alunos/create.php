<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Novo Aluno — Cadastro</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    /* Reset e base */
    * {
      box-sizing: border-box;
      margin: 0; padding: 0;
      font-family: 'Poppins', sans-serif;
    }
    body {
      background: #121212;
      color: #e0e0e0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      animation: fadeIn 1s ease forwards;
    }
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }

    /* Container do formulário */
    .container {
      background: #1f1f1f;
      padding: 35px 45px;
      border-radius: 14px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.8);
      width: 100%;
      max-width: 480px;
      animation: slideUp 0.6s ease forwards;
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

    h2 {
      text-align: center;
      font-weight: 700;
      font-size: 2.2rem;
      margin-bottom: 30px;
      color: #4db6ac;
      letter-spacing: 1.2px;
      text-shadow: 0 0 10px #4db6acaa;
      user-select: none;
    }

    /* Form e campos */
    form {
      display: flex;
      flex-direction: column;
      gap: 22px;
    }
    label {
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 6px;
      color: #80cbc4;
      user-select: none;
      cursor: pointer;
      transition: color 0.3s ease;
    }
    label:hover {
      color: #4db6ac;
    }

    input[type="text"],
    input[type="email"] {
      padding: 14px 18px;
      font-size: 1.1rem;
      border-radius: 10px;
      border: 2px solid transparent;
      background: #292929;
      color: #e0e0e0;
      box-shadow: inset 3px 3px 8px #212121, inset -3px -3px 8px #313131;
      transition: border-color 0.35s ease, box-shadow 0.35s ease;
      outline-offset: 3px;
      outline-color: transparent;
      user-select: text;
    }
    input[type="text"]:focus,
    input[type="email"]:focus {
      border-color: #4db6ac;
      box-shadow:
        0 0 10px #4db6ac,
        inset 3px 3px 8px #212121,
        inset -3px -3px 8px #313131;
      outline-color: #4db6ac;
    }

    /* Botão */
    button {
      padding: 16px 0;
      font-size: 1.25rem;
      font-weight: 700;
      border-radius: 14px;
      border: none;
      cursor: pointer;
      background: linear-gradient(135deg, #26a69a, #00796b);
      color: white;
      box-shadow: 0 8px 24px #26a69aaa;
      transition: background 0.4s ease, box-shadow 0.4s ease, transform 0.2s ease;
      user-select: none;
    }
    button:hover,
    button:focus {
      background: linear-gradient(135deg, #4db6ac, #26a69a);
      box-shadow: 0 10px 30px #4db6acdd;
      outline: none;
    }
    button:active {
      transform: scale(0.96);
      box-shadow: 0 6px 18px #26a69a99;
    }

    /* Validação de erros */
    .validation-errors {
      background: #b71c1c;
      padding: 14px 22px;
      border-radius: 12px;
      color: #ffebee;
      font-weight: 700;
      box-shadow: 0 0 15px #b71c1ccc;
      margin-bottom: 25px;
      animation: shake 0.3s ease;
      user-select: none;
      line-height: 1.5;
    }
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20%, 60% { transform: translateX(-7px); }
      40%, 80% { transform: translateX(7px); }
    }

    /* Placeholder estilizado */
    ::placeholder {
      color: #666;
      font-style: italic;
    }

    /* Mobile tweaks */
    @media (max-width: 500px) {
      .container {
        padding: 30px 25px;
        max-width: 100%;
      }
      h2 {
        font-size: 1.8rem;
      }
      input[type="text"],
      input[type="email"] {
        font-size: 1rem;
        padding: 12px 14px;
      }
      button {
        font-size: 1.1rem;
        padding: 14px 0;
      }
    }
  </style>
</head>
<body>
  <div class="container" role="main" aria-labelledby="titulo-form">
    <h2 id="titulo-form">Novo Aluno</h2>

    <?php if(isset($validation)): ?>
      <div class="validation-errors" role="alert" aria-live="assertive" aria-atomic="true">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif ?>

    <form action="<?= base_url('alunos/store') ?>" method="post" novalidate>
      <label for="nome">Nome completo</label>
      <input
        type="text"
        id="nome"
        name="nome"
        value="<?= esc(set_value('nome')) ?>"
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
        value="<?= esc(set_value('endereco')) ?>"
        required
        aria-required="true"
        aria-describedby="enderecoError"
        placeholder="Digite o endereço completo"
        spellcheck="false"
      />

      <label for="email">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        value="<?= esc(set_value('email')) ?>"
        required
        aria-required="true"
        aria-describedby="emailError"
        placeholder="exemplo@dominio.com"
        autocomplete="email"
      />

      <button type="submit" aria-label="Salvar novo aluno">Salvar</button>
    </form>
  </div>
</body>
</html>
