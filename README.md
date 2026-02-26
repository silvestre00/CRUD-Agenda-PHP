# CRUD-Agenda-PHP
Projeto em PHP orientado a objetos.
Objetivo do programa:     
Duas classes orientadas a objetos:
         1 - Classe para pessoas:
            Responsavel pelo controle de pessoas no sistema(CRUD)             
            Contendo os atributos:                 
                nome;                 
                CPF;                 
                RG;                 
                CEP;                 
                Lougradouro;                 
                complemento;                 
                setor;                 
                cidade;                 
                uf;         
        2 - Classe para telefone             
            Classe para controle dos telefones das pessoas cadastradas, contendo:                 
                telefone;                 
                Descrição;             
        3 -Relação entre as classes:
            Cada pessoa pode ter n contatos de telefone     
        4 - Persistencia:
            Para gravação dos dados podemos utilizar um banco de dados postgreSql ou arquivo de texto, em um JSON(metódo escolhido, fiz a tentativa pelo postgreSQL mas tive dificuldade para integração entre eles);
        Outros requisitos:
            Deve ter interface grafica;         
            Cadastro de contatos deve ter por padrao 5 linhas porem com possibilidade para aumentar         
            Deve ter um botao gravar e um excluir que so fica disponivel em modo de edicao         
            O processo de insercao/atualizacao deve ser feito em requisicoes Ajax para gravar informacoes, deve ser dinamico sem necessidade de atualizar a pagina quando feito alteracoes,         
            Quando a pagina for recarregada a tabela de "Dados Gravados" deve ser carregada  com os dados inseridos anteriomente         
            Campos para exibicao após cadastro:             
                -nome; 
                -cpf;
                -rg;
                -cep; 
                -telefone;
                -descricao; 
            Incluir opção para editar e remover o cadastro de ccada pessoa;
            
            
