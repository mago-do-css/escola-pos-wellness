# Escola Pós-Wellness

Landing page do Mapa do Dinheiro, implementada em PHP sem framework, com MVC simples, Tailwind CSS e JavaScript puro.

## Rodar com Docker

```bash
docker compose up --build
```

Acesse `http://localhost:8080`.

## Desenvolvimento do CSS

Com Node.js instalado:

```bash
npm install
npm run dev
```

O Apache usa `public/` como raiz pública. As rotas entram por `public/index.php`; controllers e views ficam em `app/`.

## Escopo desta etapa

- estrutura MVC e front controller;
- container PHP 8.3 + Apache;
- Tailwind com tokens da identidade visual;
- navbar desktop/mobile;
- hero responsivo em 1440px e 390px;
- fontes e assets oficiais versionados localmente.
