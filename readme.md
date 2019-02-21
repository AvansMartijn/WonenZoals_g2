# WonenZoals_g2
Website voor WonenZoals
<br>
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

First you need to install all the laravel packages 

<h2>Install composer</h2>

Run:
```

composer install

```

<h2>Install npm</h2>

npm is used for compiling css and js 

Run:
```
npm install
```
<h3>Compile css</h3>

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