<?php
namespace App\Controllers;
use App\Models\AlunoModel;
use CodeIgniter\Controller;

class Aluno extends Controller {
    public function __construct()
{
    helper('form');
}

    
    // Listar todos os alunos
    public function index() {
    $model = new AlunoModel();
    $data['alunos'] = $model->orderBy('id', 'ASC')->findAll();
    return view('alunos/index', $data);
}


    // Exibir formulário de cadastro
    public function create() {
        helper('form');
        return view('alunos/create');
    }

    // Receber POST do cadastro e inserir no BD
    public function store() {
        $model = new AlunoModel();
        // Regras de validação
        $rules = [
            'nome'     => 'required',
            'endereco' => 'required',
            'email'    => 'required|valid_email'
        ];
        if (! $this->validate($rules)) {
            // Erro na validação: reexibe formulário com mensagens
            return view('alunos/create', [
                'validation' => $this->validator
            ]);
        }
        // Dados válidos: salva no BD
        $model->insert([
            'nome'     => $this->request->getPost('nome'),
            'endereco' => $this->request->getPost('endereco'),
            'email'    => $this->request->getPost('email')
        ]);
        return redirect()->to('/alunos');
    }

    // Exibir formulário de edição para o aluno $id
    public function edit($id) {
        $model = new AlunoModel();
        $data['aluno'] = $model->find($id);
        return view('alunos/edit', $data);
    }

    // Receber POST da edição e atualizar no BD
    public function update($id) {
        $model = new AlunoModel();
        $rules = [
            'nome'     => 'required',
            'endereco' => 'required',
            'email'    => 'required|valid_email'
        ];
        if (! $this->validate($rules)) {
            // Validação falhou: recarrega formulário com erros
            return view('alunos/edit', [
                'aluno'      => $model->find($id),
                'validation' => $this->validator
            ]);
        }
        $model->update($id, [
            'nome'     => $this->request->getPost('nome'),
            'endereco' => $this->request->getPost('endereco'),
            'email'    => $this->request->getPost('email')
        ]);
        return redirect()->to('/alunos');
    }

    // Excluir o aluno $id
    public function delete($id) {
        $model = new AlunoModel();
        $model->delete($id);
        return redirect()->to('/alunos');
    }
}