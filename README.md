## What is it about?

This repo contains a TYPO3 Flow installation with a little Demo-App. The application should be used as a demo and show-off, to see how TYPO3 Flow can be used to deliver a REST API - and how to consume/work with that API from Angular.js. Just have a look at the source-code to see how it's wired together.

## How to get going?

*untested, let me know if it works*

- clone this repository
- cd into the cloned directory
- run a `composer install` to install the dependencies
- add a database + set the credentials in the config
- run a `./flow doctrine:migrate` to prepare the DB schema
- point your webserver to the Web-Directory
- access the application via your browser

## How to contribute?

Feel free to [file new issues](https://github.com/mrimann/flow-angular-rest-demo/issues) if you find a problem or to propose a new feature. If you want to contribute your time and submit an improvement, I'm very eager to look at your pull requests!

In case you want to discuss a new feature with me, just send me an [e-mail](mailto:mario@rimann.org).


## Thanks

Thanks to the folks involved with [Roketi](http://roketi.github.io/) I even started thinking about this way to approach the GUI application development. Also thanks to David Höckele for supporting this ideas in an internal project at [internezzo](http://www.internezzo.ch/) and Bastian Waidelich for answering a bunch of questions regarding the RestController in Flow and for reviewing the code I published.

## License

Licensed under the permissive [MIT license](http://opensource.org/licenses/MIT) - have fun with it!

## Like it?

If you save some of your precious time with it, I'd be very happy if you give something back - be it a warm "Thank you" by mail, spending me a drink at a conference, [send me a post card or some other surprise](http://www.rimann.org/support/) :-)