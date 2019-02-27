# WonenZoals_g2 
Website voor WonenZoals

<h1>Status</h1>

Master 
[![Build Status](https://travis-ci.com/AvansMartijn/WonenZoals_g2.svg?token=cMYcmim3J5pom6ekzBWX&branch=master)](https://travis-ci.com/AvansMartijn/WonenZoals_g2)
[![codecov](https://codecov.io/gh/AvansMartijn/WonenZoals_g2/branch/master/graph/badge.svg?token=UaYpwLMjU7)](https://codecov.io/gh/AvansMartijn/WonenZoals_g2)

Development
[![Build Status](https://travis-ci.com/AvansMartijn/WonenZoals_g2.svg?token=cMYcmim3J5pom6ekzBWX&branch=development)](https://travis-ci.com/AvansMartijn/WonenZoals_g2)
[![codecov](https://codecov.io/gh/AvansMartijn/WonenZoals_g2/branch/development/graph/badge.svg?token=UaYpwLMjU7)](https://codecov.io/gh/AvansMartijn/WonenZoals_g2)
<br>
<h1>Setup</h1>
1) Clone de repository naar je een map naar keuze. Het liefst zo dicht mogelijk op een root. Dit pad noemen we nu PATH.<br> <br>
VB: D:/Webs2 <br> <br>
<H2>Virtual Host & Host File</H2>
Toevoegen in c:/xampp/apache/conf/extra/httpd-vhosts.conf

```
<VirtualHost *:80>
    # Define directory to serve
    DocumentRoot "PATH/WonenZoals_g2/public"
    # Attach to hostname web.local
    ServerName wonenzoals.local

    <Directory "PATH/WonenZoals_g2/public">
        # Allow everyone to fetch stuff from this directory
        Require all granted
    </Directory>
</VirtualHost>
```

Toevoegen in c:/xampp/apache/conf/extra/httpd-vhosts.conf

```
<Directory />
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
</Directory>
```

<br>
Toevoegen in C:\Windows\System32\drivers\etc\hosts: <br>

```
127.0.0.1 wonenzoals.local
```
<br>


<h1>Installation</h1>

After Cloning, you need to install the composer packages and npm to compile CSS

<h2>Initial Setup</h2>

First off, cd to your WonenZoals_g2 folder.

Install packages using composer:

```
composer install
```
Install npm: (is used for compiling css and js) 
```
npm install
```
<h2>Compile css</h2>

How to use npm for compiling css and js

If you change css or js run:
```
npm run dev
```

Auto compile (css/js)

```
npm run watch
```

Quit the watch 

```
crtl + C
```

<h2>Useful Info</h2>

<h4>Visual Studio Code Extentions</h4>

- Laravel Blade Snippets -> Blade support

- phpfmt -> Automatisch formatteren

<h4>Accounts</h4>

```
Beheerder: beheerder@wza.nl 123456
Bewoner: bewoner@wza.nl 123456
Vrijwilliger: vrijwilliger@wza.nl 123456
```
