<?php declare(strict_types=1);
/**
 * PHP version 8
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @version  1.0.0
 * @link     https://github.com/cashcarryshop/synchronizer
 */

namespace Edges\Synchronizer;

/**
 * Интерфейс источника синхронизации
 *
 * @template Settings of object
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @link     https://github.com/cashcarryshop/synchronizer
 */
interface SynchronizerSourceInterface
{
    /**
     * Создать источник
     *
     * @param Settings $settings Настройки для источника
     *
     * @return SynchronizerSourceInterface
     */
    public static function create(object $settings): SynchronizerSourceInterface;
}
