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

namespace Shuttle\Migrator;

use ArrayIterator;
use Countable;

/**
 * Class MigratorCollection
 *
 * @author Casey McLaughlin <caseyamcl@gmail.com>
 */
class MigratorCollection implements \IteratorAggregate, Countable
{
    /**
     * @var array|MigratorInterface[]
     */
    private $migrators;

    /**
     * Constructor
     *
     * @param iterable|MigratorInterface[] $migrators
     */
    public function __construct(iterable $migrators = [])
    {
        $this->migrators = [];

        foreach ($migrators as $migrator) {
            $this->add($migrator);
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has($name): bool
    {
        return array_key_exists($name, $this->migrators);
    }

    /**
     * @param MigratorInterface $migrator
     */
    public function add(MigratorInterface $migrator): void
    {
        $this->migrators[$migrator->getSlug()] = $migrator;
    }

    /**
     * @param string $name
     * @return MigratorInterface
     */
    public function get($name): MigratorInterface
    {
        if (! $this->has($name)) {
            throw new \InvalidArgumentException("No migrator exists with slug/name: " . $name);
        }

        return $this->migrators[$name];
    }

    /**
     * @return ArrayIterator|MigratorInterface[]
     */
    public function getIterator(): \Iterator
    {
        return new ArrayIterator($this->migrators);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->migrators);
    }
}