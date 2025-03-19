# 📚 Hora da Leitura - Biblioteca Online  

Plataforma digital para leitura e organização de livros, proporcionando uma experiência fluida e intuitiva. Desenvolvido com **HTML, CSS, Bootstrap 5** e integração com banco de dados. Este projeto é **open-source**, mas exige **atribuição de crédito** para uso ou modificação.  

## 🚀 Tecnologias Utilizadas  

- **HTML5** - Estrutura semântica e otimizada  
- **CSS3** - Estilização responsiva e intuitiva  
- **Bootstrap 5** - Layout dinâmico e adaptável  
- **Banco de Dados** - Para armazenar e gerenciar livros  

## 🎯 Funcionalidades  

✅ Interface moderna e responsiva  
✅ Biblioteca digital para organizar leituras  
✅ Armazenamento de livros via banco de dados  
✅ Open-source com restrição de uso e atribuição de crédito  

## ⚠️ Configuração do Banco de Dados  

Este projeto utiliza um banco de dados para armazenar informações dos livros. **Caso encontre erros ao rodar a aplicação**, verifique os seguintes pontos:  

1. **Conexão correta** com o banco de dados (host, usuário e senha).  
2. Certifique-se de que **as tabelas necessárias estão criadas**.  
3. Verifique se **as permissões do usuário do banco estão corretas**.  
4. Consulte os logs para mais detalhes sobre possíveis falhas de conexão.  

### **Configuração Padrão**  

No arquivo de configuração do banco (`config.php` ou similar), edite as credenciais conforme seu ambiente:  

```php
$host = "localhost";
$dbname = "hora_da_leitura";
$username = "seu_usuario";
$password = "sua_senha";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
```

Se necessário, ajuste os valores conforme suas credenciais locais.  

## 📂 Como Usar  

1. Clone o repositório:  
   ```bash
   git clone https://github.com/seuusuario/hora-da-leitura.git
   ```
2. Acesse a pasta do projeto:  
   ```bash
   cd hora-da-leitura
   ```
3. Configure o banco de dados corretamente antes de rodar o projeto.  
4. Abra `index.html` no navegador ou utilize um servidor local.  

## ⚠️ Licença e Direitos Autorais  

Este projeto é **open-source**, mas exige **crédito ao autor** para qualquer uso, modificação ou distribuição.  

🔹 **Permitido**:  
- Uso pessoal e comercial **com atribuição de autoria**.  
- Melhorias e contribuições para o projeto.  

🔸 **Proibido**:  
- Remover créditos do autor.  
- Revender ou redistribuir sem permissão.  

## 🤝 Contribuindo  

1. Faça um **fork** do repositório  
2. Crie um **branch**:  
   ```bash
   git checkout -b minha-nova-feature
   ```
3. Faça o **commit** das mudanças:  
   ```bash
   git commit -m "Nova funcionalidade"
   ```
4. Envie um **pull request**  

## 📩 Contato  

📧 Email: jonathanrenanborges@gmail.com

Se gostou do projeto, deixe uma ⭐ no repositório! 🚀✨  
