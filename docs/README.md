# — PRD: Projeto do zero (Cadastro + Listagem) com SRP
PRD diz respeito a um sistema que simula o cadastroe todo o geneciamento de produtos no sistema.  
Desenvolvido por:
- *Larissa Vitória Custódio de Carvalho RA: 1995354*
- *Marcela Buzzo de Oliveira RA: 2014340*
## Funcionalidades do Sistema
  - O sistema permite cadastrar novos produtos e listar os produtos cadastrados, simulando o funcionamento básico de um sistema de estoque. Cada produto é composto pelos atributos id, nome e preço.
No cadastro, o sistema valida se o nome do produto não está vazio e possui entre 2 e 100 caracteres, além de verificar se o preço é número e maior que zero. Caso todas as validações sejam aprovadas, o produto é gravado.
  - Na listagem, o sistema lê o arquivo de armazenamento, converte cada linha em um objeto de produto e exibe todos os registros em uma tabela formada por colunas de identificação, nome e preço. Caso o arquivo esteja vazio, o sistema exibe a mensagem “Nenhum produto cadastrado.”


## Casos de Teste 
Para validar o funcionamento correto do sistema, foram definidos os seguintes testes manuais:
- Cadastro válido: inserir o nome “Teclado” e o preço 120.50. O sistema deve retornar mensagem de sucesso e o produto deve aparecer na listagem.
- Nome curto: inserir o nome “T” e o preço 50. O sistema deve rejeitar o cadastro com a mensagem de erro informando que o nome deve ter entre 2 e 100 caracteres.
- Preço negativo: inserir o nome “Mouse” e o preço -10. O sistema deve rejeitar o cadastro com mensagem informando que o preço deve ser numérico e não negativo.
- Lista vazia: caso o arquivo products.txt esteja vazio, ao acessar a página de listagem, o sistema deve exibir “Nenhum produto cadastrado”.
- Múltiplos cadastros: cadastrar três produtos diferentes em sequência e verificar se aparecem na listagem com IDs incrementais (1, 2, 3).
  
## Expectativa de Resultado
Se um produto for cadastrado de forma válida, o sistema deve responder com o código HTTP 201 e mostra-lo na listagem de produtos. Para cadastros inválidos, deve retornar o código HTTP 422 com a mensagem de erro correspondente. A página de listagem deve exibir corretamente todos os produtos registrados ou a mensagem de lista vazia.

## Limitações
O sistema não possui funcionalidades de edição, exclusão, paginação ou ordenação de produtos e não utiliza banco de dados, se tornando dependente do uso de um arquivo de texto para inserção/armazenamento de dados.

## Como rodar o projeto
```
1.Certifique-se de ter o XAMPP e o Apache instalados na máquina.
2-Baixe e extraia a pasta do projeto chamada “products-srp-demo”.
3.Coloque a pasta extraída dentro do diretório “C:\xampp\htdocs\”.
4.Abra o terminal dentro da pasta do projeto e execute os comandos “composer install” e “composer dump-autoload”.
5.Verifique se o arquivo “storage/products.txt” existe. Caso não exista, crie-o manualmente como um arquivo de texto vazio.
6.Inicie o Apache no painel do XAMPP.
7.No navegador, acesse “http://localhost/products-srp-demo/public/index.php” para cadastrar produtos.
8.Após o cadastro, acesse “http://localhost/products-srp-demo/public/products.php” para visualizar a listagem completa.
```






