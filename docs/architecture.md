# life cycle
 - web requests go to public/index
 - loads composer's autoloader and boots laravel using bootstrap/app
 - creates a laravel instance (service container) that manages all depdendices and services
 - requests are "routed" to HTTP or console Kernels for web or cli requests
 - HTTP kernel boots error handler, logging, environment and runs middleware stack (auth, session, cross-site-request-forgary)
 - service provider process boots core features (DB, queues, routing, ) by calling registor() for bindings and boot() for full init
 - router: requests are dispatched to a route or controller, middleware is ran and responses is generated.
    - response then is sent back through middleware and sent to the browser 

# service container
 - larvel's depdency injection engine: resolves class dependencies automatically (controllers, routes, jobs). you registor services (classes) into it -> then laravel inkects them wherever they are needed
 ```php
    $apple = new AppleMusic(); //not this
    public function __construct(AppleMusic $apple) { ... } //depdency, automatically injected
 ```
  - binding types
   bind: new instance every time

   singleton: one instance reused

   scoped: once instance per request

   instance: bind an already created object

   bindif: bind but only if not already bound

   ```php
      // Bind a class normally
      $this->app->bind(Foo::class, fn() => new Foo());

      // Bind a singleton
      $this->app->singleton(Foo::class, fn() => new Foo());

      // Contextual binding
      $this->app->when(BarController::class)
         ->needs(FooInterface::class)
         ->give(FooImpl::class);

      // Manual resolve
      $foo = app(Foo::class);

      // Tagging
      $this->app->tag([A::class, B::class], 'my-tag');
      $all = $this->app->tagged('my-tag');
   ```
 - if classes depend on concrete classes, laravel resolves things automatically through reflections 
    ```php
    Route::get('/', function (AppleMusic $apple) { //figurs out what concrete class to pass in
        return $apple->topCharts();
    }); 
    ```
 - you need to manually bind or do depdency injection when:
    1. depending on an interface
    ```php
      interface EventPusher {}
      class RedisEventPusher implements EventPusher {}

      $this->app->bind(EventPusher::class, RedisEventPusher::class);
    ```
    2. customizing how an object is created
    ```php
      $this->app->bind(Transistor::class, function ($app) {
         return new Transistor($app->make(PodcastParser::class));
      });
    ```
    3. need to reuse the same instance
    ```php
      $this->app->singleton(Transistor::class, fn ($app) => new Transistor(...));
    ```
    4. different implementations depending on the class (contextual binding)
    ```php
      $this->app->when(PhotoController::class)
         ->needs(Filesystem::class)
         ->give(fn () => Storage::disk('local'));
    ```
   need and when functions: Contextual & Primitive Binding -> Inject different values based on the class or need:
   ```php
      $this->app->when(UserController::class)
         ->needs('$timezone')
         ->giveConfig('app.timezone');

      $this->app->when(Firewall::class)
         ->needs(Filter::class)
         ->give([ProfanityFilter::class, NullFilter::class]);
    ```
   - Tagging
      adding serices (classes) to the tag pool of the app and then calling make will tag multiple serices into a group
      ```php
      $analyzer = $this->app
         ->tag([CpuReport::class, MemoryReport::class], 'reports')
         ->make(ReportAnalyzer::class)

      ```
      doing this manually would be like
      ```php
         App::make(Transistor::class);
         app(Transistor::class);
      ```

   - Method Injection
    - call array are arrays that invoke a method and inject depedencies
      ```php
         App::call([new PodcastStats, 'generate']);
         ==
         App::call(function (AppleMusic $apple) {
            //postcast stats will be inject
         });
      ```

# service providers
 entry point for bootstrapping everything in a laravel app (registor services, bindings, event listners, middleware, routes ect)

 there are 2 methods in a service provider
 registor() binds things onto the service controller (no side effects)
   - only used for binding (no routes or events) since they might depend on other services that are not yet inited
 boot() run logic after ALL other providers are loaded
   - used for things that require other services
   - can also inject serivces here

 services can be made using:
 ```bash
   php artisan make:provider MyServiceProvider
 ```
 - auto-registers it in bootstrap/providers.php

# facade
 static "looking" interface to Laravel Classes/Services hidden behind the service container
 lets you use services such as Cache::get() or Route::get() without importing or injecting

 facades are proxies that delegate method calls to container-resolved objects
 proxies to an object instance using __callStatic
 ```php
      use Illuminate\Support\Facades\Cache;

      Cache::put('key', 'value'); // This is NOT truly static

      class Cache extends Facade {
         protected static function getFacadeAccessor() {
            return 'cache'; // Resolved from container
         }
      }
 ```

 1. you call Cache::get()
   Cache is a class extending Illuminate\Support\Facades\Facade.
 2. laravel calls getFacadeAccessor()
   static method getFacadeAccessor() → returns 'cache'
 3. service container resolves 'cache' binding (CacheManager)
   base Facade class uses __callStatic() to intercept that static method call
   It asks the service container ($app) to resolve the 'cache' binding
 4. laravel calls get() on the real object 
   - That service is usually a singleton bound via $this->app->singleton() in a service provider.
   - real object (e.g., a CacheManager) gets the method call
   - (Usually singleton)
   - instance created lazily
   - multiple instances only if service is bounded using app.bind() instead of app.singleton()
   - only really changed when you rebind the service container key