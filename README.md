# 🕒 FreelanceHours

**Gerencie projetos e propostas de freelancers com agilidade e organização.**  
Uma aplicação web construída com Laravel, Livewire e TailwindCSS.

---

## 📋 Sobre o Projeto

O **FreelanceHours** é uma plataforma completa para mediação de propostas entre freelancers e contratantes.  
Permite o cadastro de projetos, envio de propostas com estimativas de horas e notifica automaticamente o autor do projeto com as melhores opções.

Tecnologias modernas como **Livewire** (componentes dinâmicos), **TailwindCSS** (estilo elegante) e **Mailpit** (captura de e-mails) garantem uma experiência fluida e eficiente em ambiente de desenvolvimento.

---

## ✨ Funcionalidades

- ✅ Cadastro e listagem de projetos
- ✅ Envio de propostas com validação e estimativas
- ✅ Ordenação automática das propostas por menor número de horas
- ✅ Destaque visual para as melhores propostas (ranking)
- ✅ Notificações por e-mail para o autor do projeto
- ✅ Interface moderna e responsiva
- ✅ Suporte a internacionalização (pt_BR)
- ✅ Ambiente de desenvolvimento com Docker, MySQL e Mailpit

---

## 🛠️ Stack Tecnológica

| Camada     | Tecnologias                               |
|------------|--------------------------------------------|
| **Backend**| PHP 8.4, Laravel 11, Livewire 3            |
| **Frontend**| Blade, TailwindCSS 3, Vite                |
| **Banco**  | MySQL 8                                    |
| **DevOps** | Docker, Docker Compose                     |
| **Outros** | Mailpit, Composer, NPM                     |

---

## 🧭 Estrutura de Pastas
📁 app/                # Código principal (Models, Livewire, Actions, etc.)  
📁 resources/views/    # Views Blade e componentes  
📁 database/           # Migrations, seeders e factories  
📁 public/             # Pasta pública (Apache)  
📁 src/                # Raiz do projeto Laravel (conforme Dockerfile)  
📄 docker-compose.yml  # Orquestração (app, db, mailpit)  
📄 Dockerfile          # Imagem PHP/Apache personalizada  



---

## ⚙️ Pré-requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Node.js](https://nodejs.org/) e [npm](https://www.npmjs.com/) (opcional localmente)

---

## 🚀 Como Rodar o Projeto

```bash
# 1. Clone o repositório
git clone https://github.com/seuusuario/freelance-hours.git
cd freelance-hours

# 2. Suba os containers
docker compose up -d

# 3. Instale as dependências do Laravel
docker compose exec app composer install

# 4. Instale as dependências do frontend
docker compose exec app npm install

# 5. Gere a chave da aplicação
docker compose exec app php artisan key:generate

# 6. Execute as migrations e seeders
docker compose exec app php artisan migrate --seed

# 7. Rode o build do frontend (Tailwind/Vite)
docker compose exec app npm run dev
```

## 🌐 Acesse a Aplicação
Frontend: http://localhost:8080

Visualização de E-mails (Mailpit): http://localhost:8025

## 🤝 Contribuições
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests com sugestões de melhorias.
