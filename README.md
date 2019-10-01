# PHP - Model View Controller based App.

# Projeto Academico para Cadeira de Projeto de Desenvolvimento de Sistemas III ministrada pelo Professor Paulo Weverton da Faculdade Paraíso do Ceará

**Linguagens Utilizadas:**
- JavaScript
- PHP
- HTML5
- CSS

**BANCO DE DADOS:**
- MYSQL


# Documentação:
## Principais Funcionalidades, Rotas, Parametros e Retornos:

1 **Criar Venda**
 - **rota** : /vendas/new
 - **parametros**: cliente, data
 - **retorno**: Redireciona para Pagina de Vendas
  
2 **Continuar Venda Pendente**
 - **rota**: /vendas/details
 - **parametros**: id_venda
 - **retorno**: Pagina com Detalhe da Venda
  
3 **Remover Itens da Venda**
 - **rota**: /vendas/remover_item
 - **parametros**: id_venda, id_item
 - **retorno**: Pagina com Detalhe da Venda
  
4 **Adicionar Itens à Venda**
 - **rota**: /vendas/add_item
 - **parametros**: id_venda, id_item
 - **retorno**: Pagina com Detalhe da Venda
 
5 **Cadastrar Clientes**
 - **rota**: /cadastrar
 - **parametros**: nome, login, senha
 - **retorno**: pagina com dados do cliente
 
6 ~~Editar Clientes~~ - _em implementação._

7 **Cadastrar Produtos na Loja**
 - **rota**: /add_produto
 - **parametros**: nome, valor_compra, valor_venda
 - **retorno**: detalhes do produto/mensagem de sucesso
 
8 ~~Editar Produtos da Loja~~ _em implementação._

9 **Concluir Venda**
 - **rota**: /vendas/pagar
 - **parametros**: id_venda
 - **retorno**: Pagina com Detalhe da Venda






OBS: Caso queira usar e nos enviar feedback, entre em contato com: geeksaw@live.com.
