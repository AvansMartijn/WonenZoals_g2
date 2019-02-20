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

<br>
Toevoegen in C:\Windows\System32\drivers\etc\hosts: <br>

```
127.0.0.1 wonenzoals.local
```
