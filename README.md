# laravel-album-database

*The aim of this project is to create a JSON API that allows you to store and retrieve information about your favourite albums. 
The API was created using the Laravel framework for PHP, and utilizes JWT (Json Web Tokens) for authentication.*


### Setting up

Clone the repo and run `composer install` to install the dependencies.  
You can run this project locally using `php artisan serve` to setup a local server accessible by default on localhost:8000. 
This API uses a PostgreSQL database that you can run using Docker via the *docker-compose.yml* file. For that use the command `docker-compose up`. 

You can also use your own PgSQL db, but you'll have to change the credentials in the **DB** section of the .env file.

### Album object

The album object contains the following keys:

 `id: the identifier as an integer.`  
 `album_cover: a URL pointing to an image.`  
 `artist: the name of the artist.`  
 `album: the name of the album.`  
 `genre: the musical genre of the album.` 
 `production_year: the year of production.`  
 `record_label: the album's label.`  
 `tracklist: a list of tracks.` 
 `rating: the rating of the album, as a floating point number with a single decimal digit, between 0.0 and 10`  

## Documentation

*You'll have to register to interact with the API*

### POST/`register`
takes a JSON object as input, here are the keys to fill:
`name`  
`email`  
`password`  

*You can then login using POST/login providing the same info, and logout using POST/logout*

### GET/`albums` 
returns all the albums in the db

### GET/`albums:id` 
return the album whose id corresponds to the given parameter.

### POST/`albums` 
Create an album, you'll have to provide values for the keys described above (excluding the id) in JSON format. This query returns the created album.

### PUT/`albums:id` 
Updates the specified album. Returns the updated album

### DELETE/`albums:id` 
Deletes the specified album. 

### GET/`albums/search:search_item`  
Allows you to perform a search on the artist/album/genre fields. 

[here's the postman link to access the collection:](https://www.getpostman.com/collections/b3f5a7ab388786762e4c)

