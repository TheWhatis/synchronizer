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
 * Интерфейс синхронизатора
 *
 * @template T of object
 * @template Source of SynchronizerSourceInterface
 * @template Target of SynchronizerTargetInterface
 * @template Matcher of MatcherInterface<T>
 * @template Settings of object
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  Unlicense <https://unlicense.org>
 * @link     https://gitflic.ru/projects/edges/synchronizer
 */
interface SynchronizerInterface
{
    /**
     * Создать синхронизатор
     *
     * @param Source $source Источник
     * @param Target $target Цель
     * @param Matcher $matcher Матчер (сопоставитель)
     *
     * @return SynchronizerInterface
     */
    public static function create(
        SynchronizerSourceInterface $source,
        SynchronizerTargetInterface $target,
        MatcherInterface $matcher,
    ): SynchronizerInterface;

    /**
     * Синхронизировать
     *
     * @param Settings $settings Настройки для синхронизации
     *
     * @return bool
     */
    public function synchronize(object $settings): bool;
}
