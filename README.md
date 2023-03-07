# Desafio Técnico Desenvolvedor Pleno SEBRAE

# Configuração de Ambiente 

1) Crie um banco de dados.
2) Clone o respositório.
3) Copie `.env.example` to `.env`.
4) Sete credenciais válidas no arquivo .env para conexão do banco de dados: `DB_DATABASE`, `DB_USERNAME`, e `DB_PASSWORD`
5) Rode o `composer install`
6) Rode os seguintes comandos:
```
php artisan migrate
```
```php
php artisan db:seed
```
```php
php artisan key:generate
```
```php
php artisan serve
```