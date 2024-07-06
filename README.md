# Premise

I don't know if this works on Windows or MacOS, I don't use neither of those platforms, I've tested this only on Ubuntu (Zorin OS).

```sh
❯ lsb_release -a
No LSB modules are available.
Distributor ID:	Zorin
Description:	Zorin OS 17.1
Release:	17
Codename:	jammy
```

I don't plan to support Windows or MacOS any time soon.\
This is a showcase of how easy it is to interop between Php and Go using [catpaw](https://github.com/razshare/catpaw) on Linux.

# Run without building

```php
composer update && \
composer prod:start -- -o file.png
```

# Build portable file and run it

```php
composer update && \
composer prod:build && \
php app.phar -o file.png
```

![Peek 2024-07-06 15-55](https://github.com/razshare/catpaw-screenshot-showcase/assets/6891346/fe8272d8-5606-4125-978b-b9494324bbe7)

# Requirements

You will need Php 8.3 (or greater), Go and Cpp installed on your machine.

- Refer to https://go.dev/doc/install in order to install Go.
- You can install Cpp requirements by running the following in your terminal
  ```sh
  sudo apt install build-essential
  ```

# Or use Prebuilts

If you don't wanna bother installing Go and Cpp, simply download the prebuilt binaries from [here](https://github.com/razshare/catpaw-screenshot-showcase/releases).

Extract the app.zip file and execute

```sh
php app.phar -o file.png
```

to take a screenshot.

> [!NOTE]
> You will still need Php 8.3 installed on your machine.


# Where's the source code?

The source code for the Go library can be found in your [vendor/catpaw/catpaw/src/lib/Go/Resources/CaptureScreen/main.go](https://github.com/razshare/catpaw/blob/master/src/lib/Go/Resources/CaptureScreen/main.go).\
It comes baked in with [catpaw](https://github.com/razshare/catpaw) and you can compile it with

```sh
php catpaw.phar -g vendor/catpaw/catpaw/src/lib/Go/Resources/CaptureScreen/main.go
```

> [!NOTE]
> The catpaw.phar program is automatically downloaded in your project when you run `composer update`.

> [!NOTE]
> For more information and features refer to [catpaw](https://github.com/razshare/catpaw).