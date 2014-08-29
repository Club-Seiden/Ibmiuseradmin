Ibmiuseradmin
=============

This is a simple yet functional way to edit users in ZFCUser on the IBM i. It is meant to be used with ZFCAdmin. 

Created by the fine people over at theiforums.com

Introduction
------------

ZfcUser is a user registration and authentication module for Zend Framework 2.
Out of the box, ZfcUser works with Zend\Db, however alternative storage adapter
modules are available (see below). ZfcUser provides the foundations for adding
user authentication and registration to your ZF2 site. It is designed to be very
simple and easily to extend.

More information and examples are available on the [ZfcUser Wiki](https://github.com/ZF-Commons/ZfcUser/wiki)


Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)
* [ZfcBase](https://github.com/ZF-Commons/ZfcBase) (latest master).
* [ZfcUser](https://github.com/ZF-Commons/ZfcUser) (latest master).
* [ZfcAdmin](https://github.com/ZF-Commons/ZfcAdmin) (latest master).



Features / Goals
----------------

* Authenticate via username, email, or both (can opt out of the concept of
  username and use strictly email) [COMPLETE]
* User registration [COMPLETE]
* Forms protected against CSRF [COMPLETE]
* Out-of-the-box support for Doctrine2 _and_ Zend\Db [COMPLETE]
* Registration form protected with CAPTCHA [IN PROGRESS] \(Needs more options\)
* Robust event system to allow for extending [IN PROGRESS]

Installation
------------

### Main Setup

#### By cloning project

1. Install the [ZfcBase](https://github.com/ZF-Commons/ZfcBase) ZF2 module
   by cloning it into `./vendor/`.
2. Clone this project into your `./vendor/` directory.


