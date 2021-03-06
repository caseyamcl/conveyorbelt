<?php
/**
 * Shuttle Library
 *
 * @license https://opensource.org/licenses/MIT
 * @link https://github.com/caseyamcl/phpoaipmh
 * @package caseyamcl/shuttle
 * @author Casey McLaughlin <caseyamcl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * ------------------------------------------------------------------
 */

namespace Shuttle\Exception;

use Throwable;

class MissingItemException extends MigratorException
{
    /**
     * @param string $id
     * @param Throwable|null $previous
     * @return \Exception
     */
    public static function forId(string $id, Throwable $previous = null)
    {
        return new static('Missing Item: ' . $id, $previous ? $previous->getCode() : 0, $previous);
    }
}
