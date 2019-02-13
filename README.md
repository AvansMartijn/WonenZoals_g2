# WonenZoals_g2
Website voor WonenZoals
<br>
<br>
<h1>Setup</h1>
1) Clone de repository naar je c:/xampp/htdocs map. <br>
2) Maak een VHost <a href=http://webdictaat.aii.avans.nl/dictaten/Webs2/#/Hello,worldwideweb!>uitleg</a>. <br>
3) Start je XAMPP server. <br>
TL;DR <br>

```
<VirtualHost *:80>
    # Define directory to serve
    DocumentRoot "D:/Webs2/WonenZoals_g2"
    # Attach to hostname web.local
    ServerName wonenzoals.local

    <Directory "D:/Webs2/WonenZoals_g2">
        # Allow everyone to fetch stuff from this directory
        Require all granted
    </Directory>
</VirtualHost>
```

<br>
Toevoegen in host file: <br>

```
127.0.0.1 wonenzoals.local
```
