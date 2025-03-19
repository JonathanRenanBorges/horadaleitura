# Tutorial de Instalação e Uso do Site Hora da Leitura
Feito por:
João Gabriel Vasques Ribeiro,
Jonathan Renan Borges,
Guilherme Melo de Lima Jação.

## Passo a Passo de Instalação

### Clonar o Repositório
Abra o terminal e execute o seguinte comando para clonar o repositório do site:

```
git clone https://Joao_RibeiroII@bitbucket.org/joao_ribeiroii/horadaleitura.git
```

### Importar o Banco de Dados
Caso o banco de dados hospedado online não estiver disponível por quaisquer motivos, importe o banco de dados manualmente.
Navegue até a pasta app/BD e importe o banco de dados no seu SGBD preferido. O arquivo do banco de dados será fornecido com o repositório.
Certifique-se de que o usuário e a senha local de seu SGBD sejam ambos nomeados 'root' 
Navegue até o arquivo app/DAO/connectDb.php e altere seus respectivos valores

### Instalar o Composer (se necessário)
Se o Composer ainda não estiver instalado em sua máquina, você pode instalá-lo baixando o instalador do site oficial: Composer - Download

Siga as instruções de instalação fornecidas no site do Composer.

Ou utilize o composer localmente localizado na pasta bin

```
php bin/composer install
```

### Rodar o Comando 'composer install'
Abra o terminal na pasta raiz do site e execute o seguinte comando para instalar as dependências necessárias:

```
composer install
```
Isso irá gerar um arquivo autoload.php que será necessário para o funcionamento correto do site.

### Informações de Login
Para acessar o site como um usuário já cadastrado, utilize as seguintes credenciais:

Usuário 1:
**Email**: admin@gmail.com
**Senha**: 123
Possui permissão de administrador

Usuário 2:
**Email**: user@gmail.com
**Senha**: 123
Possui permissão de usuário comum

Agora você está pronto para usar o site! Caso encontre algum problema ou tenha alguma dúvida, por favor, entre em contato conosco.