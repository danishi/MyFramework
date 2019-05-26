# MyFramework

PHP Web MVC Framework

所謂オレオレフレームワーク

## 使っているもの（using）

* bootstrap4
* jQuery
* PHP7
* * PDO
* * composer
* * smarty
* * monolog

## フォルダ階層（directory hierarchy）

```
MyFramework
├─app
│  │  app.ini
│  │  
│  ├─controller
│  │      controller.php
│  │      sample.php
│  │      
│  ├─model
│  │  │  model.php
│  │  │  mytable.php
│  │  │  
│  │  ├─ddl
│  │  │      mytable.sql
│  │  │      
│  │  └─sqlite
│  │          sample.db
│  │          
│  ├─utility
│  │      utility.php
│  │      
│  └─view
│      │  sample.tpl
│      │  
│      ├─template
│      │      footer.tpl
│      │      foot_tag.tpl
│      │      header.tpl
│      │      head_tag.tpl
│      │      
│      └─view_c
│              
├─logs
│      
├─vendor
└─webroot
    │  .htaccess
    │  index.php
    │  
    ├─css
    │      bootstrap-grid.css
    │      bootstrap-grid.css.map
    │      bootstrap-grid.min.css
    │      bootstrap-grid.min.css.map
    │      bootstrap-reboot.css
    │      bootstrap-reboot.css.map
    │      bootstrap-reboot.min.css
    │      bootstrap-reboot.min.css.map
    │      bootstrap.css
    │      bootstrap.css.map
    │      bootstrap.min.css
    │      bootstrap.min.css.map
    │      style.css
    │      
    └─js
            bootstrap.bundle.js
            bootstrap.bundle.js.map
            bootstrap.bundle.min.js
            bootstrap.bundle.min.js.map
            bootstrap.js
            bootstrap.js.map
            bootstrap.min.js
            bootstrap.min.js.map
            jquery-3.4.1.min.js
```
