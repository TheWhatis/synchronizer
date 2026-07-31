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
 * @template Source of object
 * @template Target of object
 */
interface MatchedInterface
{
    /**
     * @return Source[]
     */
    public function getSources(): array;

    /**
     * @return Target[]
     */
    public function getTargets(): array;

    public function getValue(): mixed;

    public function getSourceBy(): mixed;

    public function getTargetBy(): mixed;

    /**
     * @param Source $source
     */
    public function addSource(object $source): void;

    /**
     * @param Target $target
     */
    public function addTarget(object $target): void;
}
