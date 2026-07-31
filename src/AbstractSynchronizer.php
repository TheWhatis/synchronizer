<?php declare(strict_types=1);
/**
 * PHP version 8
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @version  2.0.0
 * @link     https://github.com/cashcarryshop/synchronizer
 */

namespace Edges\Synchronizer;

/**
 * Абстрактный класс синхронизатора
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @link     https://github.com/cashcarryshop/synchronizer
 */
abstract class AbstractSynchronizer implements SynchronizerInterface
{
    public function __construct(
        protected SynchronizerSourceInterface $source,
        protected SynchronizerTargetInterface $target,
    ) {
        // ...
    }

    /**
     * Создать экземпляр синхронизации
     *
     * @param SynchronizerSourceInterface $source Источник
     * @param SynchronizerTargetInterface $target Цель
     *
     * @return AbstractSynchronizer
     */
    public static function create(
        SynchronizerSourceInterface $source,
        SynchronizerTargetInterface $target
    ): AbstractSynchronizer {
        if (! static::supportsSource($source)) {
            throw new \InvalidArgumentException(sprintf('%s does not support %s.', static::class, get_class($source)));
        }

        if (! static::supportsTarget($target)) {
            throw new \InvalidArgumentException(sprintf('%s does not support %s.', static::class, get_class($target)));
        }

        return new static($source, $target);
    }

    /**
     * Проверить что источник поддерживается
     *
     * @param SynchronizerSourceInterface $source Источник
     *
     * @return bool
     */
    abstract public function supportsSource(SynchronizerSourceInterface $source): bool;

    /**
     * Првоерить что цель поддерживается
     *
     * @param SynchronizerTargetInterface $target Цель
     *
     * @return bool
     */
    abstract public function supportsTarget(SynchronizerTargetInterface $target): bool;
}
