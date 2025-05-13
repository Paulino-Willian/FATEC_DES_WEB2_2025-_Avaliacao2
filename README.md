# FATEC_DES_WEB2_2025-_Avaliacao2
Projeto de avaliação de Desenvolvimento Web do 2º Semestre de DSM (Fatec Araras)

# 🛍️ Sistema de Loja - Projeto para Fatec Araras

Este é um sistema simples de gerenciamento de produtos para lojistas, desenvolvido como projeto acadêmico. Ele permite **cadastrar**, **listar** e **remover** produtos de uma loja, com controle de acesso por login. O sistema foi feito com **PHP** e **MySQL**, focando na prática de CRUD e segurança básica de sessão.

---

## ✅ Funcionalidades

- 🔐 **Login obrigatório** para acessar qualquer função do sistema.
- 🆕 **Cadastro de Produto** com os campos:
  - Nome do produto
  - Descrição
  - Preço
  - Categoria
- 📋 **Listagem de Produtos** em formato de tabela.
- ❌ **Remoção de Produtos** via ID informado manualmente.
- 🔒 Proteção de páginas usando verificação de sessão.

---

## 💻 Tecnologias Utilizadas

- PHP (sem frameworks)
- MySQL (banco de dados relacional)
- HTML5 + CSS3 (páginas simples e responsivas)
- PDO (para acesso seguro ao banco)


## 🔐 Como funciona a autenticação?

- Ao acessar qualquer funcionalidade, o sistema verifica se o usuário está logado.
- Se não estiver, é redirecionado automaticamente para a tela de login.
- Após login, a sessão é mantida para garantir segurança nas operações.