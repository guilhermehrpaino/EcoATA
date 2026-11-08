# EcoATA — Mobilidade Urbana Inteligente

<p align="center">
  Uma plataforma para explorar as linhas de transporte público de Araçatuba e incentivar a mobilidade sustentável por meio da tecnologia.
</p>

<p align="center">
  <a href="https://ecoata.freedev.app/">Acessar aplicação</a> •
  <a href="https://github.com/guilhermehrpaino/EcoATA">Repositório</a>
</p>

## Sobre o EcoATA

O **EcoATA** é uma aplicação web desenvolvida para facilitar o acesso às informações do transporte público de Araçatuba – SP.

A plataforma permite consultar linhas de ônibus, visualizar itinerários em mapas interativos, conferir pontos de parada e consultar horários de funcionamento. Além disso, conta com um sistema de gamificação que incentiva a utilização do transporte coletivo por meio de pontuação e resgate de recompensas.

A proposta é reunir informações importantes para os passageiros em um único ambiente, tornando a experiência de utilização do transporte público mais acessível, prática e interativa.

## Funcionalidades

### 1. Mapa geral das linhas

A página inicial apresenta um mapa interativo com a visualização das rotas e dos pontos de ônibus cadastrados.

- Visualização geográfica das informações de transporte.
- Representação das rotas por meio de arquivos GeoJSON.
- Identificação de pontos de parada no mapa.
- Navegação pelo mapa para explorar diferentes regiões de Araçatuba.

### 2. Consulta de linhas e itinerários

A aplicação disponibiliza páginas individuais para consulta das linhas de transporte público.

Atualmente, estão disponíveis 13 linhas:

| Linha | Trajeto |
|---|---|
| 103 | Terminal → Claudionor Cinti |
| 104 | Terminal → São José |
| 107 | Terminal → Porto Real via Palmeiras |
| 108 | Terminal → Água Branca |
| 111 | Terminal → Aparecida / Terra Nova / Poupatempo |
| 112 | Jardim Atlântico → ETEMP via Rua do Fico |
| 115 | Terminal → Taveira |
| 116 | Jussara → Lago Azul → Nova York |
| 117 | Terminal → Umuarama |
| 120 | Hilda via Odorindo Perenha |
| 121 | Rosele / Verde Parque / Águas Claras |
| 123 | Alvorada → UniSALESIANO |
| 126 | Terminal / Vilella → São Rafael |

Cada página de linha apresenta informações como:

- Identificação da linha e seu destino.
- Relação dos pontos de parada do itinerário.
- Horários de funcionamento.
- Separação dos horários por dias da semana, sábados, domingos e feriados, conforme a disponibilidade de cada linha.
- Mapa individual com a representação do trajeto.
- Avisos sobre alterações de atendimento em determinados períodos.

### 3. Cadastro e autenticação

O EcoATA possui um sistema de usuários que permite acessar a área de recompensas.

Funcionalidades disponíveis:

- Cadastro de novos usuários.
- Autenticação por e-mail e senha.
- Verificação de credenciais.
- Armazenamento seguro das senhas utilizando hash.
- Gerenciamento de sessão para manter o usuário autenticado.
- Encerramento de sessão (logout).

### 4. Sistema de pontuação

Uma das funcionalidades diferenciais do EcoATA é o sistema de gamificação, desenvolvido para incentivar a utilização do transporte público.

O usuário pode acumular pontos por meio da validação de QR Codes associados às viagens.

O sistema contempla:

- Saldo individual de pontos.
- Validação de códigos QR.
- Registro do histórico de validações.
- Adição automática de pontos ao saldo do usuário.
- Restrição de pontuação repetida pelo mesmo código no mesmo dia.

**Observação:** nesta versão, a validação do QR Code funciona por meio de uma simulação de leitura, utilizando um código previamente definido. A integração com a câmera do dispositivo ainda não está implementada.

### 5. Catálogo de recompensas

Os pontos acumulados podem ser utilizados para resgatar recompensas disponibilizadas na plataforma.

A área de recompensas apresenta:

- Saldo atual de pontos do usuário.
- Catálogo de recompensas disponíveis.
- Identificação dos parceiros e benefícios.
- Custo de cada recompensa em pontos.
- Verificação automática de saldo suficiente.
- Processo de resgate de recompensas.
- Geração de um código de cupom para cada resgate realizado.

Quando o usuário não possui pontos suficientes, a opção de resgate permanece indisponível.

### 6. Página institucional

A aplicação também possui uma página dedicada à apresentação do projeto, contendo:

- Informações sobre o EcoATA.
- Contextualização do transporte público de Araçatuba.
- Apresentação da TUA (Transportes Urbanos Araçatuba).
- Identificação dos desenvolvedores responsáveis pelo projeto.

---

## Tecnologias utilizadas

O projeto foi desenvolvido utilizando tecnologias voltadas ao desenvolvimento web e à visualização de informações geográficas.

| Tecnologia | Aplicação no projeto |
|---|---|
| HTML5 | Estruturação das páginas |
| CSS3 | Estilização e responsividade da interface |
| JavaScript | Interatividade e manipulação dos mapas |
| PHP | Processamento no servidor e funcionalidades da aplicação |
| MySQL | Armazenamento de usuários, pontuações e recompensas |
| PDO | Comunicação entre PHP e banco de dados |
| Leaflet.js | Construção dos mapas interativos |
| GeoJSON | Representação geográfica das rotas e pontos |
| OpenStreetMap | Camada cartográfica dos mapas |
| Git e GitHub | Versionamento e colaboração no desenvolvimento |

## Estrutura do projeto

```text
EcoATA/
│
├── css/
│   ├── estilo.css
│   ├── estiloCards.css
│   └── linhas.css
│
├── img/
│   └── imagens e recursos visuais
│
├── js/
│   └── mapa.js
│
├── linhas/
│   ├── 103.php
│   ├── 104.php
│   ├── 107.php
│   ├── 108.php
│   ├── 111.php
│   ├── 112.php
│   ├── 115.php
│   ├── 116.php
│   ├── 117.php
│   ├── 120.php
│   ├── 121.php
│   ├── 123.php
│   └── 126.php
│
├── rotas/
│   ├── rotas.geojson
│   ├── rota104.geojson
│   └── demais arquivos de rotas
│
├── index.php
├── sobre.php
├── login.php
├── cadastro.php
├── recompensa.php
├── simular_scan.php
├── processar_resgate.php
├── conexao.php
├── nav.php
├── footer.php
└── logout.php
```

## Como executar o projeto

Para executar o EcoATA localmente, é necessário possuir um ambiente de desenvolvimento com suporte a PHP e MySQL.

### Pré-requisitos

- PHP.
- MySQL.
- Servidor web Apache ou equivalente (XAMPP, por exemplo).
- Navegador atualizado.

### Instalação

**1. Clone o repositório:**

```bash
git clone https://github.com/guilhermehrpaino/EcoATA.git
```

**2. Configure o ambiente local:**

Coloque a pasta `EcoATA` no diretório público do seu servidor local, como `htdocs` no XAMPP.

**3. Configure o banco de dados:**

Crie o banco de dados MySQL e importe a estrutura necessária para as tabelas utilizadas pela aplicação.

O sistema utiliza tabelas relacionadas a:

- Usuários.
- QR Codes.
- Histórico de validações.
- Recompensas.
- Resgates.

**4. Configure a conexão:**

Edite o arquivo `conexao.php` com as credenciais do seu ambiente MySQL.

**5. Execute a aplicação:**

Inicie o Apache e o MySQL e acesse:

```text
http://localhost/EcoATA/
```

## Observações

- O EcoATA é um projeto independente e não possui vínculo oficial com a TUA.
- As informações de linhas, itinerários e horários possuem finalidade informativa.
- A aplicação não disponibiliza rastreamento de ônibus em tempo real.
- A validação de QR Code está implementada em modo de simulação.
- A disponibilidade e atualização das informações dependem dos dados cadastrados no projeto.

## Melhorias futuras

Algumas possibilidades de evolução da plataforma incluem:

- [ ] Implementação de leitura real de QR Codes pela câmera do dispositivo.
- [ ] Ampliação e atualização das informações sobre as linhas.
- [ ] Aprimoramento da visualização dos itinerários.
- [ ] Expansão do sistema de recompensas e parcerias.
- [ ] Implementação de novas funcionalidades para facilitar o planejamento de viagens.
- [ ] Integração com fontes de dados de transporte em tempo real, caso disponíveis.

---

## 👨‍💻 Desenvolvedores

Projeto desenvolvido por estudantes da Faculdade de Tecnologia de Araçatuba (Fatec Araçatuba), no contexto do Ideathon Fatec 2026.

| Integrante | Atuação |
|---|---|
| Caiã Caetano | Desenvolvedor |
| Guilherme Henrique | Desenvolvedor |
| Gustavo Floriano | Desenvolvedor |
| João Francisco | Desenvolvedor |
| Vinicius Soles | Desenvolvedor |
| Eric Sonego    | Menção Honrosa ao membro que trancou o curso |

---

<p align="center">
  <strong>EcoATA </strong>
  <br>
  Conectando pessoas, transporte e sustentabilidade.
  <br><br>
  Desenvolvido em Araçatuba – SP.
</p>
