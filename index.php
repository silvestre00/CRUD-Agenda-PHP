<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro de Pessoas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-section {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-section h2 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .form-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
            font-size: 14px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .telefones-section {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }

        .telefones-section h3 {
            font-size: 16px;
            margin-bottom: 15px;
            color: #333;
        }

        .telefone-item {
            display: grid;
            grid-template-columns: 1fr 2fr 50px;
            gap: 10px;
            margin-bottom: 10px;
            align-items: flex-end;
        }

        .telefone-item input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .telefone-item input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .btn-remove-tel {
            padding: 8px 12px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-remove-tel:hover {
            background-color: #c82333;
        }

        .btn-add-tel {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }

        .btn-add-tel:hover {
            background-color: #218838;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-save {
            background-color: #007bff;
            color: white;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        .btn-clear {
            background-color: #6c757d;
            color: white;
        }

        .btn-clear:hover {
            background-color: #5a6268;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .btn-edit {
            background-color: #ffc107;
            color: black;
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .data-section {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .data-section h2 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #333;
            border-bottom: 2px solid #28a745;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table thead {
            background-color: #f8f9fa;
        }

        table th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
            color: #333;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .message {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 4px;
            display: none;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            display: block;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            display: block;
        }

        .hidden {
            display: none;
        }

        .edit-mode .btn-delete {
            display: inline-block;
        }

        .edit-mode .btn-save {
            background-color: #28a745;
        }

        .edit-mode .btn-save:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Cadastro de Pessoas</h1>

        <div id="message" class="message"></div>

        <!-- Seção de Formulário -->
        <div class="form-section">
            <h2>Cadastro de Pessoa</h2>

            <div class="form-group">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" placeholder="Digite o nome completo">
                </div>
                <div>
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" placeholder="000.000.000-00">
                </div>
                <div>
                    <label for="rg">RG:</label>
                    <input type="text" id="rg" placeholder="0.000.000">
                </div>
                <div>
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" placeholder="00000-000">
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="logradouro">Logradouro:</label>
                    <input type="text" id="logradouro" placeholder="Rua, Avenida, etc">
                </div>
                <div>
                    <label for="complemento">Complemento:</label>
                    <input type="text" id="complemento" placeholder="Apto, sala, etc">
                </div>
                <div>
                    <label for="setor">Setor:</label>
                    <input type="text" id="setor" placeholder="Setor/Bairro">
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" placeholder="Nome da cidade">
                </div>
                <div>
                    <label for="uf">UF:</label>
                    <select id="uf">
                        <option value="">Selecione um estado</option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                </div>
            </div>

            <!-- Seção de Telefones -->
            <div class="telefones-section">
                <h3>Contatos de Telefone</h3>
                <div id="telefonesContainer"></div>
                <button class="btn-add-tel" onclick="adicionarTelefone()">+ Adicionar Telefone</button>
            </div>

            <!-- Botões de Ação -->
            <div class="button-group">
                <button class="btn btn-save" onclick="salvarPessoa()">Gravar</button>
                <button class="btn btn-clear" onclick="limparFormulario()">Limpar</button>
                <button class="btn btn-delete hidden" id="btnDelete" onclick="deletarPessoa()">Excluir</button>
            </div>
        </div>

        <!-- Seção de Dados Gravados -->
        <div class="data-section">
            <h2>Dados Gravados</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>CEP</th>
                        <th>Telefone - Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="tabelaDados">
                    <tr>
                        <td colspan="6" style="text-align: center; color: #999;">Nenhum registro encontrado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        let pessoaEmEdicao = null;
        let contadorTelefones = 0;

        // Inicializar a página
        document.addEventListener('DOMContentLoaded', function() {
            carregarDados();
            adicionarTelefone();
            adicionarTelefone();
            adicionarTelefone();
            adicionarTelefone();
            adicionarTelefone();
        });

        // Adicionar campo de telefone
        function adicionarTelefone() {
            const container = document.getElementById('telefonesContainer');
            const id = 'telefone_' + contadorTelefones;
            contadorTelefones++;

            const div = document.createElement('div');
            div.className = 'telefone-item';
            div.id = id;
            div.innerHTML = `
                <input type="text" class="telefone-numero" placeholder="(00) 00000-0000" maxlength="15">
                <input type="text" class="telefone-descricao" placeholder="Descrição (ex: Celular, Comercial)">
                <button type="button" class="btn-remove-tel" onclick="removerTelefone('${id}')">Remover</button>
            `;
            container.appendChild(div);
        }

        // Remover campo de telefone
        function removerTelefone(id) {
            const elemento = document.getElementById(id);
            if (elemento) {
                elemento.remove();
            }
        }

        // Salvar pessoa
        function salvarPessoa() {
            const nome = document.getElementById('nome').value.trim();
            const cpf = document.getElementById('cpf').value.trim();

            if (!nome || !cpf) {
                mostrarMensagem('Por favor, preencha pelo menos Nome e CPF!', 'error');
                return;
            }

            const telefones = [];
            document.querySelectorAll('.telefone-item').forEach(item => {
                const numero = item.querySelector('.telefone-numero').value.trim();
                const descricao = item.querySelector('.telefone-descricao').value.trim();
                if (numero || descricao) {
                    telefones.push({
                        telefone: numero,
                        descricao: descricao
                    });
                }
            });

            const dados = {
                id: pessoaEmEdicao ? pessoaEmEdicao.id : undefined,
                nome: nome,
                cpf: cpf,
                rg: document.getElementById('rg').value.trim(),
                cep: document.getElementById('cep').value.trim(),
                logradouro: document.getElementById('logradouro').value.trim(),
                complemento: document.getElementById('complemento').value.trim(),
                setor: document.getElementById('setor').value.trim(),
                cidade: document.getElementById('cidade').value.trim(),
                uf: document.getElementById('uf').value.trim(),
                telefones: telefones
            };

            fetch('api.php?action=save', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dados)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    mostrarMensagem(data.message, 'success');
                    limparFormulario();
                    carregarDados();
                } else {
                    mostrarMensagem(data.message, 'error');
                }
            })
            .catch(error => {
                mostrarMensagem('Erro ao salvar dados!', 'error');
                console.error('Erro:', error);
            });
        }

        // Carregar dados da tabela
        function carregarDados() {
            fetch('api.php?action=list')
            .then(response => response.json())
            .then(dados => {
                const tbody = document.getElementById('tabelaDados');
                tbody.innerHTML = '';

                if (dados.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="6" style="text-align: center; color: #999;">Nenhum registro encontrado</td></tr>';
                    return;
                }

                dados.forEach(pessoa => {
                    const telefonesTexto = pessoa.telefones.map(t => 
                        `${t.telefone} - ${t.descricao}`
                    ).join('<br>') || '-';

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${pessoa.nome}</td>
                        <td>${pessoa.cpf}</td>
                        <td>${pessoa.rg}</td>
                        <td>${pessoa.cep}</td>
                        <td>${telefonesTexto}</td>
                        <td>
                            <div class="actions">
                                <button class="btn btn-edit" onclick="editarPessoa('${pessoa.id}')">Editar</button>
                                <button class="btn btn-delete" onclick="confirmarDelecao('${pessoa.id}')">Deletar</button>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            })
            .catch(error => {
                console.error('Erro ao carregar dados:', error);
            });
        }

        // Editar pessoa
        function editarPessoa(id) {
            fetch(`api.php?action=get&id=${id}`)
            .then(response => response.json())
            .then(pessoa => {
                pessoaEmEdicao = pessoa;

                document.getElementById('nome').value = pessoa.nome;
                document.getElementById('cpf').value = pessoa.cpf;
                document.getElementById('rg').value = pessoa.rg;
                document.getElementById('cep').value = pessoa.cep;
                document.getElementById('logradouro').value = pessoa.logradouro;
                document.getElementById('complemento').value = pessoa.complemento;
                document.getElementById('setor').value = pessoa.setor;
                document.getElementById('cidade').value = pessoa.cidade;
                document.getElementById('uf').value = pessoa.uf;

                // Limpar e preencher telefones
                const container = document.getElementById('telefonesContainer');
                container.innerHTML = '';
                contadorTelefones = 0;

                if (pessoa.telefones && pessoa.telefones.length > 0) {
                    pessoa.telefones.forEach(tel => {
                        adicionarTelefone();
                        const items = container.querySelectorAll('.telefone-item');
                        const ultimoItem = items[items.length - 1];
                        ultimoItem.querySelector('.telefone-numero').value = tel.telefone;
                        ultimoItem.querySelector('.telefone-descricao').value = tel.descricao;
                    });
                } else {
                    for (let i = 0; i < 5; i++) {
                        adicionarTelefone();
                    }
                }

                // Mostrar botão de deletar
                document.getElementById('btnDelete').classList.remove('hidden');
                document.querySelector('.btn-save').textContent = 'Atualizar';

                // Scroll para o formulário
                document.querySelector('.form-section').scrollIntoView({ behavior: 'smooth' });
            })
            .catch(error => {
                mostrarMensagem('Erro ao carregar dados da pessoa!', 'error');
                console.error('Erro:', error);
            });
        }

        // Deletar pessoa
        function deletarPessoa() {
            if (!pessoaEmEdicao) return;

            if (confirm('Tem certeza que deseja excluir este registro?')) {
                fetch(`api.php?action=delete&id=${pessoaEmEdicao.id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        mostrarMensagem(data.message, 'success');
                        limparFormulario();
                        carregarDados();
                    } else {
                        mostrarMensagem(data.message, 'error');
                    }
                })
                .catch(error => {
                    mostrarMensagem('Erro ao deletar registro!', 'error');
                    console.error('Erro:', error);
                });
            }
        }

        // Confirmar deleção
        function confirmarDelecao(id) {
            if (confirm('Tem certeza que deseja excluir este registro?')) {
                fetch(`api.php?action=delete&id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        mostrarMensagem(data.message, 'success');
                        carregarDados();
                    } else {
                        mostrarMensagem(data.message, 'error');
                    }
                })
                .catch(error => {
                    mostrarMensagem('Erro ao deletar registro!', 'error');
                    console.error('Erro:', error);
                });
            }
        }

        // Limpar formulário
        function limparFormulario() {
            document.getElementById('nome').value = '';
            document.getElementById('cpf').value = '';
            document.getElementById('rg').value = '';
            document.getElementById('cep').value = '';
            document.getElementById('logradouro').value = '';
            document.getElementById('complemento').value = '';
            document.getElementById('setor').value = '';
            document.getElementById('cidade').value = '';
            document.getElementById('uf').value = '';

            const container = document.getElementById('telefonesContainer');
            container.innerHTML = '';
            contadorTelefones = 0;

            for (let i = 0; i < 5; i++) {
                adicionarTelefone();
            }

            pessoaEmEdicao = null;
            document.getElementById('btnDelete').classList.add('hidden');
            document.querySelector('.btn-save').textContent = 'Gravar';
        }

        // Mostrar mensagem
        function mostrarMensagem(texto, tipo) {
            const msgDiv = document.getElementById('message');
            msgDiv.textContent = texto;
            msgDiv.className = 'message ' + tipo;

            setTimeout(() => {
                msgDiv.className = 'message';
            }, 3000);
        }
    </script>
</body>
</html>
