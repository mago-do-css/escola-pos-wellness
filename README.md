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

## Meta Pixel e Conversions API

O projeto usa a CAPI direta: o navegador envia eventos pelo Meta Pixel e o servidor envia os mesmos eventos para a Graph API. Ambos usam o mesmo `event_id`, evitando contagem duplicada.

Eventos implementados:

- `PageView` em todas as páginas renderizadas;
- `Lead` somente depois que o formulário é validado e gravado no SQLite.

### Variáveis no Portainer

Na Stack do Portainer, adicione estas variáveis de ambiente:

| Variável | Uso | Produção normal |
| --- | --- | --- |
| `META_PIXEL_ID` | ID do conjunto de dados / Pixel | obrigatório |
| `META_CAPI_ACCESS_TOKEN` | Token da Conversions API | obrigatório |
| `META_CAPI_ENABLED` | Ativa os eventos enviados pelo servidor | `true` |
| `META_GRAPH_API_VERSION` | Versão da Graph API | `v24.0` |
| `META_TEST_EVENT_CODE` | Envia eventos para **Eventos de teste** da Meta | deixe vazio |
| `META_CAPI_DEBUG` | Registra no log o status sanitizado da resposta da Meta | `false` |

Nunca inclua o token no código, no arquivo `compose.yaml` ou no Git. Ele deve existir somente como variável de ambiente da Stack.

### Testar a CAPI no Gerenciador de Eventos

1. Abra o Gerenciador de Eventos da Meta e copie o código em **Eventos de teste**.
2. No Portainer, defina `META_TEST_EVENT_CODE` com esse código e `META_CAPI_DEBUG=true`.
3. Faça o redeploy da Stack.
4. Abra uma página do site. O `PageView` deve aparecer em **Eventos de teste** com origem **Servidor**.
5. Envie o formulário da página inicial com dados de teste. O evento `Lead` deve aparecer com origem **Servidor**.
6. Confira os logs do container. Com o modo de depuração ativo, eles mostram apenas nome do evento, `event_id`, status HTTP, `events_received` e `fbtrace_id`, sem token ou dados pessoais.
7. Ao terminar, limpe `META_TEST_EVENT_CODE`, defina `META_CAPI_DEBUG=false` e faça outro redeploy. O código de teste não deve permanecer ativo em produção.

O Pixel Helper valida apenas os eventos do navegador. Para validar a CAPI, use **Eventos de teste** e os logs do container.
