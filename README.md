Crunch\UserAdminBundle
======================
[![Total Downloads](https://poser.pugx.org/crunch/user-admin-bundle/d/total.png)](https://packagist.org/packages/crunch/user-admin-bundle)
[![Latest Stable Version](https://poser.pugx.org/crunch/user-admin-bundle/version.png)](https://packagist.org/packages/crunch/user-admin-bundle)

* [List of available packages at packagist.org](http://packagist.org/packages/crunch/user-admin-bundle)
  (See also [Composer: Declaring dependencies](http://getcomposer.org/doc/00-intro.md#declaring-dependencies))

This bundle integrates vanilla-`FOSUserBundle: 2.x` models into `SonataAdmin`.

If you already use `SonataUserBundle`
you probably don't want to use this. If you think about to use `SonataUserBundle`, you can also read my motivation
to create this bundle.

 * `SonataUserBundle` is currently not compatible to `FOSUserBundle` version 2. This is of course fixable :)
 * `SonataUserBundle` comes with additional features, which is not bad by itself, but maybe also not wanted (--> unused)
 * `SonataUserBundle` extends the `FOSUserBundle` in a non-revertible way with quite specific properties, for which
   at least I don't have _any_ use.

Installation
============
* Add the corresponding package to your `composer.json`. See the list linked above for available packages
    or simply `"crunch\user-admin-bundle":"dev-master"`
* Register `Crunch\Bundle\UserAdminBundle\CrunchUserAdminBundle` in your `AppKernel`-class

        new Crunch\Bundle\UserAdminBundle\CrunchUserAdminBundle

See "[How to install 3rd party Bundles](http://symfony.com/doc/current/cookbook/bundles/installation.html)" for further
information.

Usage
=====
Just visit your `SonataAdmin`-dashboard. You should notice a new menu entry in the top menu-bar.

Configuration
=============
Usually you don't have to touch _anything_: The bundle automatically fetch the required values from `FOSUserBundle`.
Remind, that setting values manually is either useless (because they already set), will end up in an error (when
they are wrong).

    crunch_user_admin:
        db_driver:  orm   # or mongodb. couchdb will follow, propel and custom probably not
        group:      false # whether, or not to use groups

Contributors
============
See CONTRIBUTING.md for details on how to contribute.

* Sebastian "KingCrunch" Krebs <krebs.seb@gmail.com> -- http://www.kingcrunch.de/ (german)

License
=======
This library is licensed under the MIT License. See the LICENSE file for details.
