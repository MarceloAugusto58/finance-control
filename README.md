# finance-control
Prova Felipe
# Painel de Controle Financeiro

Este projeto é um sistema de controle financeiro que permite aos usuários registrar e visualizar suas transações financeiras, categorizando-as como receitas ou despesas. A aplicação possui um backend em PHP e frontend utilizando Bootstrap e Chart.js para uma interface interativa e visualização de dados em gráficos.

## Funcionalidades

- Cadastro de Transações: O usuário pode adicionar transações financeiras, especificando o tipo (receita ou despesa), valor, categoria, data e uma descrição opcional.
- Listagem de Transações: Exibe uma tabela com todas as transações registradas.
- Exclusão de Transações: O usuário pode excluir transações específicas da lista.
- Gráfico Resumo: Um gráfico de pizza mostra o resumo de receitas e despesas cadastradas.

## Tecnologias Utilizadas

### Backend
- PHP: Utilizado para criar a API que gerencia as transações (cadastro, listagem e exclusão) e se conecta ao banco de dados.
- MySQL (ou outro banco de dados relacional): Para armazenar as transações.

### Frontend
- Bootstrap: Biblioteca CSS para estilizar e organizar o layout da aplicação.
- Chart.js: Biblioteca JavaScript para gerar o gráfico de pizza que exibe o resumo de receitas e despesas.
- JavaScript: Manipulação do DOM, requisições ao backend e atualização dinâmica dos dados na tabela e gráfico.

