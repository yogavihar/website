<?php
/**
 * Copyright 2006 - 2015 TubePress LLC (http://tubepress.com)
 *
 * This file is part of TubePress (http://tubepress.com)
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */

/**
 * @api
 * @since 4.1.0
 */
class tubepress_lib_impl_array_ArrayReader implements tubepress_lib_api_array_ArrayReaderInterface
{
    /**
     * @api
     * @since 4.1.0
     *
     * @param array $array
     * @param $path
     * @param int $default
     *
     * @return int
     */
    public function getAsInteger(array $array, $path, $default = 0)
    {
        $value = $this->_getValueFromPath($array, $path);

        if (is_null($value)) {

            return intval($default);
        }

        return intval($value);
    }

    /**
     * @api
     * @since 4.1.0
     *
     * @param array $array
     * @param $path
     * @param float $default
     *
     * @return float
     */
    public function getAsFloat(array $array, $path, $default = 0.0)
    {
        $value = $this->_getValueFromPath($array, $path);

        if (is_null($value)) {

            return floatval($default);
        }

        return floatval($value);
    }

    /**
     * @api
     * @since 4.1.0
     *
     * @param array $array
     * @param $path
     * @param bool $default
     *
     * @return bool
     */
    public function getAsBoolean(array $array, $path, $default = false)
    {
        $value = $this->_getValueFromPath($array, $path);

        if (is_null($value)) {

            return (bool) $default;
        }

        return (bool) $value;
    }

    /**
     * @api
     * @since 4.1.0
     *
     * @param array $array
     * @param $path
     * @param string $default
     *
     * @return string
     */
    public function getAsString(array $array, $path, $default = '')
    {
        $value = $this->_getValueFromPath($array, $path);

        if (is_null($value)) {

            return "$default";
        }

        return "$value";
    }

    /**
     * @api
     * @since 4.1.0
     *
     * @param array $array
     * @param $path
     * @param array $default
     *
     * @return array
     */
    public function getAsArray(array $array, $path, $default = array())
    {
        $value = $this->_getValueFromPath($array, $path);

        if (is_null($value)) {

            return $default;
        }

        if (is_scalar($value)) {

            return array($value);
        }

        if (is_object($value)) {

            $value = json_decode(json_encode($value), true);
        }

        return $value;
    }


    /**
     * @param string $aPath
     * @return array
     */
    private function toPathKeys($aPath)
    {
        $aPath = str_replace('\.', '___DOTYO___', $aPath);
        $parts = explode('.', $aPath);

        return array_map(array($this, '__callback'), $parts);
    }

    public function __callback($part)
    {
        return str_replace('___DOTYO___', '.', $part);
    }

    /**
     * @param string $aPath
     * @return mixed
     */
    private function _getValueFromPath(array $array, $aPath)
    {
        $pathKeys     = $this->toPathKeys($aPath);
        $intermediate = $array;

        foreach ($pathKeys as $pathKey) {

            if (!is_array($intermediate) || !array_key_exists($pathKey, $intermediate)) {

                return null;
            }

            $intermediate = $intermediate[$pathKey];
        }

        return $intermediate;
    }
}