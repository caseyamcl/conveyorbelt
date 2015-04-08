<?php
/**
 * Shuttle
 *
 * @license ${LICENSE_LINK}
 * @link ${PROJECT_URL_LINK}
 * @version ${VERSION}
 * @package ${PACKAGE_NAME}
 * @author Casey McLaughlin <caseyamcl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * ------------------------------------------------------------------
 */

namespace Shuttle\Service\Migrator;


final class Events
{
    /**
     * Migrate event dispatched when migrator has completed
     */
    const MIGRATE = 'Shuttle.migrate';

    /**
     * Revert event
     */
    const REVERT = 'Shuttle.revert';
}
