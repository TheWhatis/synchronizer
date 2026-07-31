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

use Ds\Map;

/**
 * @template Source of object
 * @template Target of object
 *
 * @template Matched of MatchedInterface<Target>
 */
interface MatcherInterface
{
    /**
     * @param Source[] $sources
     */
    public function match(array $sources): void;

    /**
     * @return Map<string, Target>
     */
    public function targetIdentifierTargetMap(): Map;

    /**
     * @return Map<string, Source[]>
     */
    public function targetIdentifierSourcesMap(): Map;
}
