# DV1440 project: Blog site in Laravel

This project is created to complete my grade for the course DV1440 at BTH.

## Run locally
### Quickstart

Requirements: Docker engine version `19.03.0+` and the corresponding `docker-compose`, you also need to have port 8080 available for use on your host, or configure a different port to use in `start.sh`

1) `$ cd to/the/project/root`

2) `$ ./start.sh` - **Please do read the shellscript to make sure that I am not doing anything bad to your host with this script, don't just trust me.**

  This script will:
  * Build the php/nginx image.
  * Set up a local `.env` from the template `.env.local`
  * Build the frontend assets (mounted to the host filesystem)
  * Run composer install (mounted to the host filesystem)
  * Start redis, postgres and the built image (The project image does not contain the code, instead I mount that into the container. The image was only really built to be used in local dev env)
  * Run the migrations and seed a few posts and a super-user (`user@example.com` - `password`)
  * Print the local host url you can browse to.

3) You can now register a user and try the system out. You can use the super-user to grant yourself more permissions.

### Individual steps
Build docker container `$ docker build -t blog-project .`

Run the project `$ docker-compose up -d`

Run composer `docker run --rm -it --volume $PWD:/app --user $(id -u):$(id -g) composer:latest <command>`

Run artisan is done using the site container:
```
docker exec -t blog-project-site-1 php artisan
docker exec -t blog-project-site-1 php vendor/bin/phpcs
```

Run node/yarn `docker run --rm -it --volume $PWD:/app -w /app --user $(id -u):$(id -g) node:current-alpine3.16 <command>`

## Report

### Functionality
#### Front page with latest posts
On the front page, the latest 20 posts created in the site are listed in an abbreviated view. The list also contains a placeholder, where an image that was supposed to go along with the post was to be shown. However, i cut that feature.

#### Show a post
When a user clicks on a post in the list, they are taken to a page where the post is rendered. In a sidebar, some informaiton about the author is shown, and you can be linked on to the users profile.

#### Show all posts form author
Here all the posts written by an author are listed and you can click through to them.

#### Create account
Here you can create an account for the blog site, and start posting.

#### Login
The auth stuff was pretty much rolled into laravel. So i basically just needed to create a form

#### User posts
Once logged in, a user can add new posts. These are then listed in the users home. 

* Create posts - You get a form where you can create a post with a title and a "wysiwyg" editor for the content.
* Delete posts - Clicking on the trashcan will delete the post.
* Edit posts - Clicking the pen-and-paper will take you to the edit version of the post form.

#### Admin delete posts
There is also a hidden feature that allows users with the admin capability-tag, to delete any post, not just their own.

### Tech notes
#### User capabilities and authorization
I added an enum entity which represents capabilities that users can have, if they are tagged with them. I thought that this was a pretty nice and simple way to add permissions. It was also simple to hook into the policy concept that laravel comes with, since the user performing the action can always be injected.

#### Facades
I really do not like using the facades system that laravel has implemented. The fact that they have to be building their own extensions to the testing framework to enable mocking is enough to raise some red flags for me. It also makes me a little crazy that I would either need to have quite intimate knowledge of the framework, or some additional tools in my IDE in order to come in cold and start to explore a project that uses laravel. It just doesn't feel right anymore.

The first time I used laravel, I kind of accepted the premise because php was not really mature enough as an OO language to facilitate a smooth option to using a system like facades. It just made working with laravel that much easier in the beginning. But I would have hoped that the framework was going to go in a different direction as php got more support for typing and stuff like that. But BOY that does not seem to have been the case. Rather they seem to have doubled down on the concept.

~~Therefore I am going to be avoiding facades like covid-19.~~ Realizing just how messy it is going to be to make my laravel install as facade-free as I would like. I will instead ot to be lazy and go with the flow. This will probably be the last project that I elect to build with laravel as the base.

Here is an article series that I liked, on the subject of [Laravel without facades](https://medium.com/@frano.sasvari/laravel-without-facades-part-0-intro-190bae09aebe). This is also what prompted me to realize that it was not worth my time for this project, to try and go facade-cold-turkey.

#### Frontend framework
I decided to go for the good old bootstrap framework for my frontend. Mostly because it is just wildly convenient and simple to use, and since that is not an important part of this project I even went so far as to only use the CDN version. Which is even simpler, however that is not a super great plan for a production setup, for reliability and perhaps load times.

~~I should note that most of the deps I have chosen to add will be loaded through CDNs. I just want to note that, and say that if I was doing this for production, I would go another way.~~ I went back on this and got both bootstrap5 and feather-icons in through yarn, and bundle them into my css and js using vite. Which was pretty nice and simple. However i did use a CDN for the CKEditor, because the super-build was hard to find a package for.

#### Resource controllers
I thought it would be a really nice feature. But it turned out to be less than for view-based projects. Because it relies on HTTP methods that forms and stuff don't like (`PUT`, `PATCH`, `DELETE`). Even if I were to be building an SPA or a pure API, I struggle to see what it gives me, other than shorter syntax in the route and forcing naming conventions for the controller methods. 

## Additional notes
This project is based on the Laravel framework and as such is subject to the MIT license.
