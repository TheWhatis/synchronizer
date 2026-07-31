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
 * Интерфейс синхронизатора
 *
 * @template Settings of object
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  Unlicense <https://unlicense.org>
 * @link     https://github.com/cashcarryshop/synchronizer
 */
interface SynchronizerInterface
{
    /**
     * Создать синхронизатор
     *
     * @param SynchronizerSourceInterface $source Источник
     * @param SynchronizerTargetInterface $target Цель
     *
     * @return SynchronizerInterface
     */
    public static function create(SynchronizerSourceInterface $source, SynchronizerTargetInterface $target): SynchronizerInterface;

    /**
     * Синхронизировать
     *
     * @param Settings $settings Настройки для синхронизации
     *
     * @return bool
     */
    public function synchronize(object $settings): bool;
}
