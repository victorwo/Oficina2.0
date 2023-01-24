# OrcamentoOficina
Esse projeto tem como objetivo exibir, editar, cadastrar, excluir e buscar os orçamentos feitos pelos vendedores da oficina. São exibidos o id, o nome do cliente, o nome do vendedor, o valor do orçamento, a descrição, a data e o horário do orçamento.

Foi criado com PHP e JavaScript.

Eu criei o index.php, que mostra ao usuário todos os orçamentos. Tendo as opções de editar e excluir um determinado orçamento, além de cadastrar um novo orçamento no banco de dados.

Coloquei as funções em outros arquivos.php e usei o Javascript para poder mostrar na página inicial.

Criei a funcionalidade de pesquisa na na página pesquisar_dados.php. Onde você pode buscar por intervalo de datas, nome do cliente ou nome do vendedor.

Para que o sistema funcione é necessário criar um banco de dados e popular a tabela desse banco. O arquivo 'orcamentos.sql' tem o código sql do banco de dados orcamentos e da tabela 'orcamento', além de algumas entraddas do banco de dados.

Não consegui utilizar o Laravel: na hora de criar uma aplicação aparecia um erro e não consegui solucioná-lo, por isso só utilizei o PHP.
