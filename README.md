# Install instructions

**Execute this:**
> composer require davidmeth/remote-shell

**Put this in providers array:**
> Me42th\RemoteShell\RemoteShellServiceProvider::class,

**Execute this:**
> php artisan vendor:publish

**Edit this file with your information, data need be equals in both environments:**
> config/remote-shell.php

### **APP_DEBUG needs be true**

**Be happy:**
> php artisan remote:shell
