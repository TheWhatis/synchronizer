Synchronizer
================

[![Latest Stable](http://img.shields.io/packagist/v/edges/synchronizer.svg)](https://packagist.org/packages/edges/synchronizer)
[![Scrutinizer](http://img.shields.io/scrutinizer/g/edges/synchronizer.svg)](https://scrutinizer-ci.com/g/edges/synchronizer)
[![License](http://img.shields.io/packagist/l/edges/synchronizer.svg)](https://packagist.org/packages/edges/synchronizer)

Эта библиотека позволяет легко синхронизировать самые разные вещи. Он имеет красивый и простой в использовании API.

Использование
----------------

Подключите к своему коду `autoload.php` и используйте классы:

```php
namespace Acme\MyApplication;

// To create a Synchronizer:
use Edges\Synchronizer\AbstractSynchronizer;
use Edges\Synchronizer\SynchronizerSourceInterface;
use Edges\Synchronizer\SynchronizerTargetInterface;

// To make your project compatible with Synchronizer:
use Edges\Synchronizer\SynchronizerInterface;

require 'vendor/autoload.php';
```

Создайте свой синхронизатор:

```php
/**
 * @extends AbstractSynchronizer<ExampleSource, ExampleTarget, ExampleSettings>
 */
class ExampleSynchronizer implements AbstractSynchronizer
{
    /**
     * Синхронизировать
     *
     * @param object|ExampleSettings $settings Настройки для синхронизации
     *
     * @return bool
     */
    public function synchronize(object|ExampleSettings $settings): bool
    {
        if (! $settings instanceof ExampleSettings) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Settings of [%s] does not supports for [%s]',
                    $settings::class,
                    ExampleSynchronizer::class,
                )
            );
        }

        // Какая-то логика

        return true;
    }

    public static function supportsSource(SynchronizerSourceInterface $source): bool
    {
        return $source instanceof ExampleSource;
    }

    public static function supportsTarget(SynchronizerTargetInterface $target): bool
    {
        return $target instanceof ExampleTarget;
    }
}
```

Создайте источники и цели синхронизатора:

```php
/**
 * @implements SynchronizerSourceInterface<ExampleSourceSettings>
 */
class ExampleSource implements SynchronizerSourceInterface
{
    /**
     * Создать источник
     *
     * @param Settings $settings Настройки для источника
     *
     * @return SynchronizerSourceInterface
     */
    public static function create(object|ExampleSourceSettings $settings): SynchronizerSourceInterface
    {
        if (! $settings instanceof ExampleSourceSettings) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Settings [%s] does not supports for [%s]',
                    $settings::class,
                    ExampleSource::class,
                )
            );
        }
    }
}

/**
 * @implements SynchronizerTargetInterface<ExampleTargetSettings>
 */
class ExampleTarget implements SynchronizerTargetInterface
{
    /**
     * Создать источник
     *
     * @param Settings $settings Настройки для источника
     *
     * @return SynchronizerTargetInterface
     */
    public static function create(object|ExampleTargetSettings $settings): SynchronizerTargetInterface
    {
        if (! $settings instanceof ExampleTargetSettings) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Settings [%s] does not supports for [%s]',
                    $settings::class,
                    ExampleTarget::class,
                )
            );
        }
    }
}

```

Создайте свой проект, совместимый с синхронизатором:

```php
class Application
{
    /**
     * Синхронизатор
     *
     * @var SynchronizerInterface
     */
    protected SynchronizerInterface $synchronizer;

    /**
     * Установить синхронизатор
     *
     * @param SynchronizerInterface $synchronizer Синхронизатор
     */
    public function setSynchronizer(SynchronizerInterface $synchronizer): static
    {
        $this->synchronizer = $synchronizer;
    }

    // ...
}
```


Установка
-----------

### Через Composer

[Install Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) если composer не установлен:

    $ curl -sS https://getcomposer.org/installer | php

Установите библиотеку, эта команда установит самую последнюю версию пакета

    $ composer require whatis/synchronizer


Требования
------------

* Ваша версия php должна быть не меньше 8.0
* Есть расширение ds (ext-ds) не меньше 1.3.0


Участие
---------

Если хотите поучавствовать в разработке, пожалуйста, сначала прочитайте [CONTRIBUTING](CONTRIBUTING.md).
