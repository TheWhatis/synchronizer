<?php declare(strict_types=1);
/**
 * PHP version 8
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @version  2.0.0
 * @link     https://gitflic.ru/projects/edges/synchronizer
 */

namespace Edges\Synchronizer;

/**
 * Абстрактный класс синхронизатора
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @link     https://gitflic.ru/projects/edges/synchronizer
 */
abstract class AbstractSynchronizer implements SynchronizerInterface
{
    public function __construct(
        protected SynchronizerSourceInterface $source,
        protected SynchronizerTargetInterface $target,
        protected MatcherInterface $matcher,
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
        SynchronizerTargetInterface $target,
        MatcherInterface $matcher,
    ): AbstractSynchronizer {
        if (! static::supportsSource($source)) {
            throw new \InvalidArgumentException(
                sprintf('[%s] does not support [%s].', static::class, get_class($source))
            );
        }

        if (! static::supportsTarget($target)) {
            throw new \InvalidArgumentException(
                sprintf('[%s] does not support [%s].', static::class, get_class($target))
            );
        }

        if (! static::supportsMatcher($matcher)) {
            throw new \InvalidArgumentException(
                sprintf('[%s] does not support [%s].', static::class, get_class($matcher))
            );
        }

        return new static($source, $target, $matcher);
    }

    /**
     * Проверить что источник поддерживается
     *
     * @param SynchronizerSourceInterface $source Источник
     *
     * @return bool
     */
    abstract public static function supportsSource(SynchronizerSourceInterface $source): bool;

    /**
     * Првоерить что цель поддерживается
     *
     * @param SynchronizerTargetInterface $target Цель
     *
     * @return bool
     */
    abstract public static function supportsTarget(SynchronizerTargetInterface $target): bool;

    /**
     * Проверить что Matcher поддерживается
     *
     * @param Matcher $matcher Матчер
     *
     * @return bool
     */
    abstract public static function supportsMatcher(MatcherInterface $matcher): bool;
}
