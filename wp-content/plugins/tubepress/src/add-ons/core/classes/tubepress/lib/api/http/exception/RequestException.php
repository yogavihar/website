<?php
/**
 * Copyright 2006 - 2015 TubePress LLC (http://tubepress.com)
 *
 * This file is part of TubePress (http://tubepress.com)
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 *
 *
 *
 * This is based on Guzzle, whose copyright follows:
 *
 * Copyright (c) 2014 Michael Dowling, https://github.com/mtdowling <mtdowling@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * HTTP request exception.
 *
 * @api
 * @since 4.0.0
 */
abstract class tubepress_lib_api_http_exception_RequestException extends RuntimeException
{
    /**
     * Get the request that caused the exception
     *
     * @return tubepress_lib_api_http_message_RequestInterface
     *
     * @api
     * @since 4.0.0
     */
    public abstract function getRequest();

    /**
     * Get the associated response
     *
     * @return tubepress_lib_api_http_message_ResponseInterface|null
     *
     * @api
     * @since 4.0.0
     */
    public abstract function getResponse();

    /**
     * Check if a response was received
     *
     * @return bool
     *
     * @api
     * @since 4.0.0
     */
    public function hasResponse()
    {
        return $this->getResponse() !== null;
    }
}