## ChopBox

[![Build Status](https://travis-ci.org/andela/chopbox.png?branch=staging)](http://travis-ci.org/andela/chopbox)

ChopBox is an awesome stopover for foodies all over the world to socialize. Registered members of ChopBox get to share their
favorite foods, recent ones they've tried, and those ones which they'd love to try. Users may upload enticing images alongside their posts to capture the attention of other users. ChopBox also allows its members to comment on,
and show interest in what has been shared on the platform through likes and comments. 


## Installation

[PHP](https://php.net) 5.5+ and [Composer](https://getcomposer.org) are required.

1. Clone this repository: `git clone git@github.com:andela/chopbox.git chopbox/`
2. `cd` into the chopbox folder and run `composer install`
3. Run php -S localhost:8000 -t public
4. Visit localhost:8000 in your browser to see the app running.

## Database set-up

1. Create a mysql database with the name `chopbox`
2. `cd` into the chopbox folder and run `php artisan:migrate` to set up the required tables for the app.

## homestead

If you are using homestead which is *highly* recomended here
are instructions to make the app available under `http://chopbox.app`.

1. edit your `~/.homestead/Homestead.yaml`:
- in the section for `sites`, add
```
    - map: chopbox.app
      to: /home/homestead/chopbox

```

- in the section for `databases`, add
```
    - chopbox
```

2. run `vagrant provision` in your Homestead directory.

3. edit your `/etc/hosts` and add the following:
```
192.168.10.10    chopbox.app
```

## Contributing

Thank you for considering contributing to ChopBox! The contribution guide is as follows:

#### Submit a pull request in this format:

##### A new feature
[ChopBox][#Feat] *Short Description of the Feature*

##### A Fix for a bug
[ChopBox][#Fix] *Short Description of the Fix to a bug on the app*


## Inspiration

 * [PRAYERBOX - PRAY, TESTIFY AND WORSHIP SOCIALLY](http://www.prayerbox.co)

## Contributors

1. [Chidozie Ijeomah](https://github.com/andela-cijeomah)
2. [Dara Oladosu](https://github.com/andela-doladosu)
3. [Kola Erinoso](https://github.com/andela-kerinoso)
4. [Prosper Otemuyiwa](https://github.com/busayo)
5. [Verem Dugeri](https://github.com/andela-vdugeri)
6. [Yemisi Oduye](https://github.com/andela-ooduye)

## License

The MIT License (MIT). Please see [License File](license.md) for more information.
