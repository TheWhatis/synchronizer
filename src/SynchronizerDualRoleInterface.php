<?php declare(strict_types=1);
/**
 * Конечная точка синхронизации (и цель, и источник)
 *
 * PHP version 8
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <anton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @version  1.0.0
 * @link     https://github.com/cashcarryshop/synchronizer
 */

namespace Edges\Synchronizer;

/**
 * Конечная точка синхронизации (и цель, и источник)
 *
 * @template Settings of object
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <anton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @link     https://github.com/cashcarryshop/synchronizer
 *
 * @extends SynchronizerSourceInterface<Settings>
 * @extends SynchronizerTargetInterface<Settings>
 */
interface SynchronizerDualRoleInterface extends SynchronizerSourceInterface, SynchronizerTargetInterface
{
    /**
     * Создать объект с двойной ролью (source/target)
     *
     * @param Settings $settings Настройки
     *
     * @return SynchronizerDualRoleInterface
     */
    public static function create(object $settings): SynchronizerDualRoleInterface;
}
