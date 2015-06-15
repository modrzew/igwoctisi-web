# IGWOCTISI Web

Web interface for [IGWOCTISI](https://github.com/porke/igwoctisi) game. It was developed as a team project on the last term of my Bachelor's Degree studies. It was based on the then-popular web browser [Warlight](http://warlight.net/), and shares most of the rules, with single exception: it takes place in the space.

## Purpose

Web interface existed for the sake of visualizing data gathered during the gameplay. It includes detailed information about each player and each game played.

It's much simpler than a game, though - main reason for its creation was to show that the database which game plugs into actually contains some data.

## Setup

This is a pretty much standard [Kohana 3.3.0](http://kohanaframework.org/) application, with nothing really special. The only thing left out of this repo is database schema (which is also pretty simple - just look at `application/classes/Model` directory).

Please also see `application/config/database.php` and configure it to use your database.

## Screenshots

### Ranking

![Ranking](https://cloud.githubusercontent.com/assets/2963462/8154235/39ee128e-1338-11e5-82c6-cd5c92d026be.jpeg)

### Player profile

![Player profile](https://cloud.githubusercontent.com/assets/2963462/8154236/3a1acb76-1338-11e5-80a5-214ddd1072ec.jpeg)

## License

See [LICENSE.md](LICENSE.md).
