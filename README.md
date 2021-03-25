### Installation

Execute this command to install the project:

```bash
$ composer update
```

#### Usage
1. Clone the project repo and checkout to development branch
```
    $ git clone https://github.com/caritoz/projects.git
    
    $ cd projects       
```    

2. To start a development environment for the first time, run
```
    $ sudo docker-compose up -d --build

3. Open a terminal and composer install
```
    ## connect to docker app bash
    $ docker-compose exec api bash
    
    # inside the container
    $ cd suite
    
    ## composer may ask for GitHub credentials the first time
    $ composer install --no-plugins --no-scripts

    ## Install other dependencies and compilation
    $ npm install & npm run dev

    ## Install migrations and seeds
    $ php artisan migrate --seed
    
```

### PHPUnit tests in Laravel
````
## Run tests
$ ./vendor/bin/phpunit --testdox
````
