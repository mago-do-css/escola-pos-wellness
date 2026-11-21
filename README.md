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

## Funil de assinatura

A página de aula fica em `/aula-completa-entenda-por-tras-do-dinheiro` e a oferta em `/garantir-acesso-completo`.

A aula usa por padrão o vídeo `aula-1-antes-de-procurar-a-raiz.mp4`. Para substituí-lo ou adicionar uma capa, configure `ASSINATURA_AULA_VIDEO_URL` ou `ASSINATURA_AULA_POSTER_URL` com os caminhos públicos dos arquivos.

O checkout da assinatura usa o link da Kiwify configurado no projeto; para substituí-lo, defina uma URL HTTPS em `ASSINATURA_CHECKOUT_URL`.

`ASSINATURA_GARANTIA_TEXTO` pode receber as condições confirmadas de garantia.

Os títulos, descrições e miniaturas das aulas seguintes, assim como os depoimentos autorizados, são configurados em `app/Config/Assinatura.php`.

Confirme os materiais e as condições da oferta antes de publicar.

Nos funis principal e ManyChat, `PageView` é enviado pelo Pixel e pela API com o mesmo identificador. Nas páginas de oferta, `ViewContent` também usa um identificador compartilhado; `Lead` usa o mesmo ID no navegador e no servidor para cadastros novos.

A URL de origem distingue as páginas. A Kiwify continua responsável pelos eventos do checkout e da compra.

Para ativar a API, configure `META_CAPI_ENABLED=true`, `META_PIXEL_ID` e `META_CAPI_ACCESS_TOKEN` no ambiente.

Para validar sem misturar com a produção, informe `META_TEST_EVENT_CODE` na prévia de testes e consulte o Gerenciador de Eventos; `META_CAPI_DEBUG=true` é opcional para registrar o resultado no log.

O teste `php tests/meta-subscription-capi.php` simula os envios localmente e não acessa a Meta.

## Escopo desta etapa

- Estrutura MVC e front controller;
- Container PHP 8.3 + Apache;
- Tailwind com tokens da identidade visual;
- Navbar desktop/mobile;
- Hero responsivo em 1440px e 390px;
- Fontes e assets oficiais versionados localmente.

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

## Painel de leads

O painel de leitura dos contatos fica em `/admin/leads`.

Ele mostra total de leads, novos registros de hoje e dos últimos sete dias, busca e paginação. Dados técnicos, como IP e user-agent, não são exibidos.

O acesso só é ativado quando estas duas variáveis estiverem configuradas no Portainer:

| Variável | Uso |
| --- | --- |
| `ADMIN_USERNAME` | Usuário do painel |
| `ADMIN_PASSWORD` | Senha forte e exclusiva do painel |

Defina as duas variáveis na Stack ou no container e recrie o container.

Em seguida, abra `https://seu-dominio/admin/leads`; o navegador solicitará as credenciais.

Sem as duas variáveis, a rota responde como página não encontrada. Nunca versione esses valores no Git.