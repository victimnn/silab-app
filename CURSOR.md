# 🤖 Guia de Execução de Tarefas para Inteligência Artificial

Este documento fornece instruções detalhadas para que uma IA execute tarefas de desenvolvimento de forma sistemática e completa.

## 📋 Protocolo de Execução de Tarefas

### 1. ANÁLISE INICIAL OBRIGATÓRIA

Antes de executar qualquer tarefa, a IA DEVE seguir este protocolo:

#### 1.1 Exploração da Estrutura do Projeto
\`\`\`
COMANDO: Analisar estrutura completa do projeto
OBJETIVO: Compreender arquitetura, tecnologias e padrões utilizados
\`\`\`

**Passos obrigatórios:**
- [ ] Listar todos os diretórios e arquivos principais
- [ ] Identificar framework/tecnologia principal (React, Next.js, Vue, etc.)
- [ ] Localizar arquivos de configuração (package.json, tsconfig.json, etc.)
- [ ] Mapear estrutura de componentes e páginas
- [ ] Identificar bibliotecas e dependências utilizadas
- [ ] Verificar padrões de estilo (SCSS, Bootstrap, styled-components)

#### 1.2 Análise de Contexto
\`\`\`
COMANDO: Examinar contexto da aplicação
OBJETIVO: Entender propósito e funcionalidades existentes
\`\`\`

**Verificações necessárias:**
- [ ] Tipo de aplicação (web app, web, mobile, web view.)
- [ ] Funcionalidades já implementadas
- [ ] Integrações existentes (banco de dados, APIs, autenticação)
- [ ] Variáveis de ambiente configuradas
- [ ] Estado atual do projeto (desenvolvimento, produção)

### 2. PLANEJAMENTO DA TAREFA

#### 2.1 Decomposição da Tarefa
\`\`\`
COMANDO: Quebrar tarefa em subtarefas específicas
OBJETIVO: Criar plano de execução detalhado
\`\`\`

**Critérios para decomposição:**
- Tarefas simples (1 arquivo): Executar diretamente
- Tarefas médias (2-5 arquivos): Listar etapas sequenciais
- Tarefas complexas (6+ arquivos): Criar lista de tarefas com marcos

#### 2.2 Identificação de Dependências
- [ ] Verificar se integrações necessárias estão configuradas
- [ ] Identificar componentes/arquivos que precisam ser criados/modificados
- [ ] Mapear dependências entre diferentes partes da tarefa

### 3. EXECUÇÃO SISTEMÁTICA

#### 3.1 Preparação do Ambiente
\`\`\`
COMANDO: Verificar e configurar ambiente
OBJETIVO: Garantir que todos os recursos necessários estão disponíveis
\`\`\`

**Verificações obrigatórias:**
- [ ] Integrações de banco de dados (se necessário)
- [ ] Variáveis de ambiente
- [ ] Dependências de terceiros
- [ ] Permissões e configurações de segurança

#### 3.2 Implementação Incremental
\`\`\`
COMANDO: Implementar funcionalidade passo a passo
OBJETIVO: Construir solução de forma incremental e testável
\`\`\`

**Ordem de implementação:**
1. **Estrutura base** - Criar arquivos e componentes principais
2. **Funcionalidade core** - Implementar lógica principal
3. **Interface de usuário** - Criar/ajustar componentes visuais
4. **Integrações** - Conectar com APIs, banco de dados, etc.
5. **Refinamentos** - Ajustes de estilo, validações, tratamento de erros

### 4. PADRÕES DE QUALIDADE

#### 4.1 Código
- [ ] Seguir padrões de nomenclatura do projeto
- [ ] Manter consistência com arquitetura existente
- [ ] Implementar tratamento de erros adequado
- [ ] Adicionar validações necessárias
- [ ] Otimizar performance quando aplicável

#### 4.2 Interface de Usuário
- [ ] Manter consistência visual com design existente
- [ ] Garantir responsividade (mobile-first)
- [ ] Implementar estados de loading e erro
- [ ] Seguir princípios de acessibilidade
- [ ] Usar sistema de cores e tipografia consistente

#### 4.3 Segurança
- [ ] Validar dados de entrada
- [ ] Implementar autenticação/autorização quando necessário
- [ ] Proteger rotas sensíveis
- [ ] Sanitizar dados antes de armazenar/exibir

### 5. VERIFICAÇÃO E TESTES

#### 5.1 Testes Funcionais
\`\`\`
COMANDO: Verificar funcionamento da implementação
OBJETIVO: Garantir que a tarefa foi executada corretamente
\`\`\`

**Verificações obrigatórias:**
- [ ] Funcionalidade principal está operacional
- [ ] Todos os casos de uso foram cobertos
- [ ] Tratamento de erros está funcionando
- [ ] Interface está responsiva e acessível

#### 5.2 Integração
- [ ] Verificar se não quebrou funcionalidades existentes
- [ ] Testar fluxos de dados entre componentes
- [ ] Validar integrações com serviços externos
- [ ] Confirmar que estilos estão consistentes

### 6. DOCUMENTAÇÃO DA EXECUÇÃO

#### 6.1 Resumo da Implementação
\`\`\`
COMANDO: Documentar o que foi implementado
OBJETIVO: Fornecer visão clara das mudanças realizadas
\`\`\`

**Informações obrigatórias:**
- [ ] Lista de arquivos criados/modificados
- [ ] Funcionalidades implementadas
- [ ] Integrações configuradas
- [ ] Dependências adicionadas
- [ ] Instruções especiais (se houver)

#### 6.2 Próximos Passos (se aplicável)
- [ ] Melhorias futuras sugeridas
- [ ] Otimizações possíveis
- [ ] Funcionalidades relacionadas que podem ser implementadas

## 🚨 REGRAS CRÍTICAS

### ❌ NUNCA FAÇA:
- Modificar arquivos sem antes analisá-los
- Implementar funcionalidades sem entender o contexto
- Quebrar funcionalidades existentes
- Ignorar padrões estabelecidos no projeto
- Pular etapas de verificação

### ✅ SEMPRE FAÇA:
- Analise TODA a estrutura antes de começar
- Leia arquivos existentes antes de modificá-los
- Mantenha consistência com o código existente
- Teste a funcionalidade após implementação
- Documente as mudanças realizadas

## 📝 TEMPLATE DE EXECUÇÃO

\`\`\`
## ANÁLISE INICIAL
- [x] Estrutura do projeto mapeada
- [x] Tecnologias identificadas: [LISTAR]
- [x] Padrões de código compreendidos
- [x] Integrações existentes verificadas

## PLANEJAMENTO
- [x] Tarefa decomposta em: [LISTAR SUBTAREFAS]
- [x] Dependências identificadas: [LISTAR]
- [x] Ordem de execução definida

## EXECUÇÃO
- [x] Arquivo 1: [DESCRIÇÃO]
- [x] Arquivo 2: [DESCRIÇÃO]
- [x] Integração: [DESCRIÇÃO]

## VERIFICAÇÃO
- [x] Funcionalidade testada
- [x] Responsividade verificada
- [x] Integração confirmada

## RESULTADO
Implementação concluída com sucesso. 
Arquivos modificados: [LISTAR]
Funcionalidades adicionadas: [LISTAR]
\`\`\`

---

**Lembre-se: Uma IA eficiente é aquela que compreende antes de agir, planeja antes de implementar, e verifica antes de concluir.**
