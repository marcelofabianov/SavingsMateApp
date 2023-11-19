# SavingsMateApp / Entities

## Core

### User

- **id** `string` `required` `unique` `primary key` `uuid` Identificador único do usuário.
- **name** `string` `required` Nome do usuário.
- **email** `string` `required` `unique` Email do usuário.
- **password** `string` `required` Senha do usuário com mínimo de 8 caracteres sendo eles compostos de a-z, A-Z, 0-9 e simbolos.
- **inactivatedAt** `datetime` `nullable` Data de inativação do usuário, quando nulo o usuário está ativo. Inativado/Ativo é mostrado ao usuário.
- **deletedAt** `datetime` `nullable` Data de exclusão do usuário, quando nulo o usuário não foi excluído. Excluído não é mostrado ao usuário.
- **createdAt** `datetime` `required` Data de criação do usuário.
- **updatedAt** `datetime` `required` Data de atualização do usuário.

## Transaction

### BankAccount

- **id** `string` `required` `unique` `primary key` `uuid` Identificador único da conta bancária.
- **userId** `string` `required` `foreign key` `uuid` Identificador único do usuário.
- **name** `string` `required` Nome da conta bancária.
- **main** `boolean` `required` Indica se a conta bancária é a principal do usuário.
- **agencyIdentifier** `string` `required` Identificador da agência bancária. Existe possibilidade iniciar com 0.
- **accountIdentifier** `string` `required` Identificador da conta bancária. Existe possibilidade iniciar com 0.
- **balance** `number` `required` Saldo da conta bancária.
- **inactiveAt** `datetime` `nullable` Data de inativação da conta bancária, quando nulo a conta bancária está ativa. Inativado/Ativo é mostrado ao usuário.
- **deletedAt** `datetime` `nullable` Data de exclusão da conta bancária, quando nulo a conta bancária não foi excluída. Excluído não é mostrado ao usuário.
- **createdAt** `datetime` `required` Data de criação da conta bancária.
- **updatedAt** `datetime` `required` Data de atualização da conta bancária.

### Card

- **id** `string` `required` `unique` `primary key` `uuid` Identificador único do cartão.
- **userId** `string` `required` `foreign key` `uuid` Identificador único do usuário.
- **name** `string` `required` Nome do cartão.
- **main** `boolean` `required` Indica se o cartão é o principal do usuário.
- **lastFourDigits** `string` `required` Últimos 4 dígitos do cartão. Existe possibilidade iniciar com 0.
- **limit** `number` `required` Limite do cartão.
- **billingCycleDay** `number` `required` Dia do ciclo de faturamento do cartão.
- **expirationDate** `datetime` `required` Data de expiração do cartão.
- **type** `number` `required` Tipo do cartão representado por enum numerico DÉBITO = 1, CRÉDITO = 2 ou AMBOS = 3.
- **scope** `number` `required` Abrangência do cartão representado por enum numerico NACIONAL = 1, INTERNACIONAL = 2 ou AMBOS = 3.
- **inactiveAt** `datetime` `nullable` Data de inativação do cartão, quando nulo o cartão está ativo. Inativado/Ativo é mostrado ao usuário.
- **deletedAt** `datetime` `nullable` Data de exclusão do cartão, quando nulo o cartão não foi excluído. Excluído não é mostrado ao usuário.
- **createdAt** `datetime` `required` Data de criação do cartão.
- **updatedAt** `datetime` `required` Data de atualização do cartão.
