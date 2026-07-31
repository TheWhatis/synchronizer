<?php declare(strict_types=1);
/**
 * PHP version 8
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @version  1.0.0
 * @link     https://gitflic.ru/projects/edges/synchronizer
 */

namespace Edges\Synchronizer;

use Ds\Map;

/**
 * @template T of object
 * @template Matched of MatchedInterface<T>
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @link     https://gitflic.ru/projects/edges/synchronizer
 */
interface MatcherInterface
{
    /**
     * @param T[] $sources
     */
    public function match(array $sources): void;

    /**
     * @return Matched[]
     */
    public function getMatches(): array;

    /**
     * @return Map<string, T>
     */
    public function targetIdentifierTargetMap(): Map;

    /**
     * @return Map<string, T[]>
     */
    public function targetIdentifierSourcesMap(): Map;
}
