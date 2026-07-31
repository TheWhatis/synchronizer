<?php declare(strict_types=1);
/**
 * PHP version 8
 *
 * @category Synchronizer
 * @package  Edges\Synchronizer
 * @author   TheWhatis <snton-gogo@mail.ru>
 * @license  http://opensource.org/licenses/Unlicense The Unlicense License
 * @version  3.0.0
 * @link     https://gitflic.ru/projects/edges/synchronizer
 */

namespace Edges\Synchronizer;

/**
 * @template T of object
 * @template Settings of object
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
     * @param object Settings $settings
     */
    public static function create(object $settings): MatcherInterface;

    /**
     * Произвести сопоставление
     */
    public function match(): void;

    /**
     * @return Matched[]
     */
    public function getMatches(): array;
}
