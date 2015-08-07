<?php

/*
 * This file is part of the Stash package.
 *
 * (c) Robert Hafner <tedivm@tedivm.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * StashUtilities contains static functions used throughout the Stash project, both by core classes and drivers.
 *
 * @package Stash
 * @author  Robert Hafner <tedivm@tedivm.com>
 */
class ehough_stash_Utilities
{
    /**
     * Various drivers use this to define what kind of encoding to use on objects being cached. It needs to be revamped
     * a bit.
     */
    public static function encoding($data)
    {
        if (is_scalar($data)) {
            if (is_bool($data)) {
                return 'bool';
            }

            if (is_numeric($data) && ($data >= 2147483648 || $data < -2147483648)) {
                return 'serialize';
            }

            if (is_string($data)) {
                return 'string';
            }

            return 'none';
        }

        return 'serialize';
    }

    /**
     * Uses the encoding function to define an encoding and uses it on the data. This system is going to be revamped.
     */
    public static function encode($data)
    {
        switch (self::encoding($data)) {
            case 'bool':
                return $data ? 'true' : 'false';

            case 'serialize':
                return serialize($data);

            case 'string':
            case 'none':
            default:
        }

        return $data;
    }

    /**
     * Takes a piece of data encoded with the 'encode' function and returns it's actual value.
     *
     */
    public static function decode($data, $method)
    {
        switch ($method) {
            case 'bool':
                // note that true is a string, so this
                return $data == 'true' ? true : false;

            case 'serialize':
                return unserialize($data);

            case 'string':
            case 'none':
            default:
        }

        return $data;
    }

    /**
     * Returns the default base directory for the system when one isn't provided by the developer. This is a directory
     * of last resort and can cause problems if one library is shared by multiple projects. The directory returned
     * resides in the system's temp folder and is specific to each Stash installation and driver.
     *
     * @param ehough_stash_interfaces_DriverInterface $driver
     * @return string Path for Stash files
     */
    public static function getBaseDirectory(ehough_stash_interfaces_DriverInterface $driver = null)
    {
        $tmp = rtrim(sys_get_temp_dir(), '/\\') . '/';

        $baseDir = $tmp . 'stash/' . md5(dirname(__FILE__)) . '/';
        if (isset($driver)) {
            $baseDir .= str_replace(array('/', '\\'), '_', get_class($driver)) . '/';
        }

        if (!is_dir($baseDir)) {
            mkdir($baseDir, 0770, true);
        }

        return $baseDir;
    }

    /**
     * Deletes a directory and all of its contents.
     *
     * @param  string                     $file Path to file or directory.
     * @return bool                       Returns true on success, false otherwise.
     * @throws ehough_stash_exception_RuntimeException
     */
    public static function deleteRecursive($file)
    {
        if (!preg_match('/^(?:\/|\\\\|\w:\\\\|\w:\/).*$/', $file)) {
            throw new ehough_stash_exception_RuntimeException('deleteRecursive function requires an absolute path.');
        }

        $badCalls = array('/', '/*', '/.', '/..');
        if (in_array($file, $badCalls)) {
            throw new ehough_stash_exception_RuntimeException('deleteRecursive function does not like that call.');
        }

        $filePath = rtrim($file, ' /');

        if (is_dir($filePath)) {
            $directoryIt = new RecursiveDirectoryIterator($filePath);

            foreach (new RecursiveIteratorIterator($directoryIt, RecursiveIteratorIterator::CHILD_FIRST) as $file) {
                $filename = $file->getPathname();
                if ($file->isDir()) {
                    $dirFiles = scandir($file->getPathname());
                    if ($dirFiles && count($dirFiles) == 2) {
                        $filename = rtrim($filename, '/.');
                        rmdir($filename);
                    }
                    unset($dirFiles);
                    continue;
                }


                if (file_exists($filename)) {
                    unlink($filename);
                }

            }
            unset($directoryIt);

            if (is_dir($filePath)) {
                rmdir($filePath);
            }

            return true;
        } elseif (is_file($filePath)) {
            return unlink($file);
        }

        return false;
    }

    public static function normalizeKeys($keys, $hash = 'md5')
    {
        $pKey = array();
        foreach ($keys as $keyPiece) {
            $prefix = substr($keyPiece, 0, 1) == '@' ? '@' : '';

            if (is_string($hash) && function_exists($hash)) {

                $pKeyPiece = $prefix . $hash($keyPiece);
            } else {
                $pKeyPiece = $prefix . call_user_func($hash, $keyPiece);
            }
            $pKey[] = $pKeyPiece;
        }

        return $pKey;
    }


    /**
     * Checks to see whether the requisite permissions are available on the specified path.
     *
     * @throws ehough_stash_exception_RuntimeException
     * @throws ehough_stash_exception_InvalidArgumentException
     */
    public static function checkFileSystemPermissions($path = null, $permissions)
    {
        if (!isset($path)) {
            throw new ehough_stash_exception_RuntimeException('Cache path was not set correctly.');
        }

        if (file_exists($path) && !is_dir($path)) {
            throw new ehough_stash_exception_InvalidArgumentException('Cache path is not a directory.');
        }

        if (!is_dir($path) && !@mkdir($path, $permissions, true )) {
            throw new ehough_stash_exception_InvalidArgumentException('Failed to create cache path.');
        }

        if (!is_writable($path)) {
            throw new ehough_stash_exception_InvalidArgumentException('Cache path is not writable.');
        }
    }
}
