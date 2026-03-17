# E-Lixo Zero Lisboa 🌍♻️

Projeto web completo para a gestão e sensibilização de resíduos eletrónicos (REEE) na cidade de Lisboa.

## 🚀 Como Instalar (XAMPP)

1. **Pastas do Projeto:**
   - Copie a pasta `elixo-zero` para dentro do diretório `htdocs` do seu XAMPP (geralmente `C:\xampp\htdocs\`).

2. **Base de Dados:**
   - Abra o **phpMyAdmin** (`http://localhost/phpmyadmin`).
   - Crie uma nova base de dados chamada `elixo_zero_lisboa`.
   - Clique em **Importar** e selecione o ficheiro `database.sql` localizado na raiz do projeto.

3. **PHPMailer (Opcional para envio real):**
   - No terminal, dentro de `htdocs/elixo-zero/`, execute:
     ```bash
     composer require phpmailer/phpmailer
     ```
   - Se não tiver o Composer, as funcionalidades de email usarão um fallback simulado.

4. **Aceder à Aplicação:**
   - Abra o navegador e vá para: `http://localhost/elixo-zero/`

## 🛠️ Tecnologias Utilizadas
- **PHP 8.x** (Backend)
- **MySQL** (Base de Dados)
- **Bootstrap 5** (Interface Premium & Responsiva)
- **Leaflet.js** (Mapa Interativo)
- **FontAwesome 6** (Ícones)
- **Google Fonts (Outfit)** (Tipografia)

## 📌 Funcionalidades
- [x] Mapa dinâmico com Leaflet e marcadores via JSON/PHP.
- [x] Filtros dinâmicos por freguesia, tipo e nome.
- [x] Guia completo sobre categorias de REEE.
- [x] Sistema de utilizadores (Registo e Login com Password Hashing).
- [x] Painel Admin (Dashboard) para gestão de pontos.
- [x] Formulário de contacto integrado com PHPMailer.

## 🎓 Contexto Escolar
- **Tema:** Liberdade, Saúde e Segurança na Era Digital.
- **Ano Letivo:** 2025/2026.
- **Objetivo:** Educar para a reciclagem e economia circular.

---
Desenvolvido com foco em segurança (PDO Prepared Statements) e usabilidade.
