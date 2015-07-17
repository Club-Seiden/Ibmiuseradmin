Ibmiuseradmin
=============

This is a simple yet functional way to manage users in your ZF2 projects running on IBM i. It is meant to be used with ZFCAdmin. In theory this work on any OS, not just IBM i, but details regarding DB2 connections are provided in the /data directory.  

Created by the fine people over at clubseiden.com


Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)
* [ZfcBase](https://github.com/ZF-Commons/ZfcBase) (latest master).
* [ZfcUser](https://github.com/ZF-Commons/ZfcUser) (latest master).
* [ZfcAdmin](https://github.com/ZF-Commons/ZfcAdmin) (latest master).



Features / Goals
----------------

* Allow an admin to add, edit user details, change password, and delete users [IN PROGRESS]
* Commented all code so this can be used as a learning tool [IN PROGRESS]
* Be a sub-route of ZFCAdmin [COMPLETE]


Installation
------------


1. Add this package with Composer  
```
..."require-dev":{
    "club-seiden/ibmiuseradmin":"dev-master"
    },...
```  
2. Tell Composer to download Ibmiuseradmin  
```
$ php composer.phar update
```