<?php

namespace Tests\Feature;

use App\Album;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AlbumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_will_show_all_albums()
    {
        $albums = factory(Album::class, 10)->create();

        $response = $this->get(route('albums.index'));

        $response->assertStatus(200);

        $response->assertJson($albums->toArray());

    }

    /** @test */
    public function it_will_create_albums()
    {
        $response = $this->post(route('albums.store'), [
            'album_cover' => 'This is an album cover',
            'artist' => 'This is an artist',
            'album' => 'This is an album',
            'genre' => 'This is a music genre',
            'production_year' => 1999,
            'record_label' => 'This is a record label',
            'tracklist' => 'This is a tracklist',
            'rating' => 8.2
        ]);
        $response->assertStatus(200);

        $this->assertDatabaseHas('albums', [
            'album_cover' => 'This is an album cover'
        ]);

        $response->assertJsonStructure([
            'message',
            'album' => [
                'album_cover',
                'artist',
                'album',
                'genre',
                'production_year',
                'record_label',
                'tracklist',
                'rating',
                'updated_at',
                'created_at',
                'id'
            ]
        ]);
    }

    /** @test */
    public function it_will_show_an_album()
    {
        $this->post(route('albums.store'), [
            'album_cover' => 'This is an album cover',
            'artist' => 'This is an artist',
            'album' => 'This is an album',
            'genre' => 'This is a music genre',
            'production_year' => 1999,
            'record_label' => 'This is a record_label',
            'tracklist' => 'This is a tracklist',
            'rating' => 8.2
        ]);

        $album = Album::all()->first();

        $response = $this->get(route('albums.show', $album->id));

        $response->assertStatus(200);

        $response->assertJson($album->toArray());
    }

    /** @test */
    public function it_will_update_an_album()
    {
        $this->post(route('albums.store'), [
            'album_cover' => 'This is an album cover',
            'artist' => 'This is an artist',
            'album' => 'This is an album',
            'genre' => 'This is a music genre',
            'production_year' => 1999,
            'record_label' => 'This is a record_label',
            'tracklist' => 'This is a tracklist',
            'rating' => 8.2
        ]);

        $album = Album::all()->first();

        $response = $this->put(route('albums.update', $album->id), [
            'album_cover' => 'This is an updated album cover',
        ]);

        $response->assertStatus(200);

        $album = $album->fresh();

        $this->assertEquals($album->album_cover, 'This is an updated album cover');

        $response->assertJsonStructure([
           'message',
           'album' => [
               'album_cover',
               'artist',
               'album',
               'genre',
               'production_year',
               'record_label',
               'tracklist',
               'rating',
               'updated_at',
               'created_at',
               'id'
           ]
       ]);
    }

    /** @test */
    public function it_will_delete_a_task()
    {
        $this->post(route('albums.store'), [
            'album_cover' => 'This is an album cover',
            'artist' => 'This is an artist',
            'album' => 'This is an album',
            'genre' => 'This is a music genre',
            'production_year' => 1999,
            'record_label' => 'This is a record_label',
            'tracklist' => 'This is a tracklist',
            'rating' => 8.2
        ]);

        $album = Album::all()->first();

        $response = $this->delete(route('albums.destroy', $album->id));

        $album = $album->fresh();

        $this->assertNull($album);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
