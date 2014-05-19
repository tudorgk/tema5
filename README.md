# Tema 5 PW - AJAX Comment System

## Instalare

1. Creati o baza de date in MySQL cu orice nume doriti.
2. Importati in baza de date scriptul tema5.sql.
3. Faceti configurarile necesare in `config.php`.
4. Creati un server VirtualHost in Apache:

    `
    <VirtualHost *:80>
         ServerName localhost
         DocumentRoot "c:\wamp\www\tema5"
         <Directory "c:/wamp/www/tema5">
         </Directory>
    </VirtualHost>
    `

5. Copiati tot continutul in folderul setat pentru VirtualHost.
6. Apelati index.php cu parametrul `page` setat.

    Ex: `http://localhost/index.php?page=1`

## Documentatie

* [Live Comment System with jQuery Ajax PHP and MySQL Tutorial](http://www.w3bees.com/2013/09/comment-system-with-jquery-ajax-php-mysql.html "Live Comment System with jQuery Ajax PHP and MySQL")
* [jQuery API](http://api.jquery.com/ "jQuery API")
* [PHP Docs](http://www.php.net/docs.php "PHP Docs")
* [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate "HTML5 Boilerplate")
