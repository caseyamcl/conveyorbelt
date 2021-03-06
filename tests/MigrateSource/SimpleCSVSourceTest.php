<?php
/**
 * Shuttle
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

namespace ShuttleTest\MigrateSource;

use Shuttle\MigrateSource\CsvSource;
use Shuttle\SourceInterface;
use ShuttleTest\AbstractSourceInterfaceTest;

class SimpleCSVSourceTest extends AbstractSourceInterfaceTest
{

    public function testWithoutHeaderRowReturnsRecordsWithNumericalKeys()
    {
        $obj = $this->getSourceObj(false);
        $item = $obj->getSourceItem(350);

        $this->assertContainsOnly('int', array_keys($item->getData()));
    }

    public function testWithHeaderRowReturnsRecordsWithExpectedKeys()
    {
        $obj = $this->getSourceObj(true);
        $item = $obj->getSourceItem(350);

        $this->assertEquals(['FName', 'LName', 'Age', 'Color', 'IdNum', 'State'], array_keys($item->getData()));
    }

    public function testGetRecordIsTolerantOfMismatchedColumnNumbers()
    {
        $obj = $this->getSourceObj(true);
        $item = $obj->getSourceItem(450); // 450 in source_header_row.csv is missing the last column

        $this->assertEquals(['FName', 'LName', 'Age', 'Color', 'IdNum', 'State'], array_keys($item->getData()));
        $this->assertEmpty($item['State']);
    }

    /**
     * @param bool $hasHeaderRow
     * @return SourceInterface
     */
    protected function getSourceObj($hasHeaderRow = false): SourceInterface
    {
        $source = $hasHeaderRow
            ? __DIR__ . '/../Fixture/files/source_header_row.csv'
            : __DIR__ . '/../Fixture/files/source.csv';

        return new CsvSource($source, 4, $hasHeaderRow);
    }

    /**
     * @return string
     */
    protected function getExistingRecordId(): string
    {
        return '350';
    }

    /**
     * @return string
     */
    protected function getNonExistentRecordId(): string
    {
        return '5000';
    }

    /**
     * @return int|null
     */
    protected function getExpectedCount(): ?int
    {
        return 3;
    }
}
