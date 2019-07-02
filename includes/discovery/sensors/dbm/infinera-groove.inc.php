<?php
/**
 * infinera-groove.inc.php
 *
 * LibreNMS dbm discovery module for Infinera Groove
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    LibreNMS
 * @link       http://librenms.org
 * @copyright  2019 Nick Hilliard
 * @author     Nick Hilliard <nick@foobar.org>
 */

foreach ($pre_cache['infineragroove_portTable'] as $index => $data) {
    if (is_numeric($data['portRxOpticalPower']) && $data['portRxOpticalPower'] != -99) {
        $descr   = $data['portAlias'].' Receive Power';
        $oid     = '.1.3.6.1.4.1.42229.1.2.3.6.1.1.4.' . $index;
        $value   = $data['portRxOpticalPower'];
        discover_sensor($valid['sensor'], 'dbm', $device, $oid, 'portRxOpticalPower.'.$index, 'infinera-groove', $descr, null, '1', null, null, null, null, $value);
    }
}
