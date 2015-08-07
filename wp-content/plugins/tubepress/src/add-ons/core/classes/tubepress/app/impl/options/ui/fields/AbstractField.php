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
 * Base class for HTML fields.
 */
abstract class tubepress_app_impl_options_ui_fields_AbstractField extends tubepress_app_impl_options_ui_BaseElement implements tubepress_app_api_options_ui_FieldInterface
{
    protected static $PROPERTY_UNTRANS_DESCRIPTION  = 'untranslatedDescription';

    /**
     * @var tubepress_app_api_options_PersistenceInterface
     */
    private $_persistence;

    /**
     * @var tubepress_lib_api_http_RequestParametersInterface
     */
    private $_httpRequestParameters;

    public function __construct($id,
                                tubepress_app_api_options_PersistenceInterface    $persistence,
                                tubepress_lib_api_http_RequestParametersInterface $requestParameters,
                                $untranslatedDisplayName = null,
                                $untranslatedDescription = null)
    {
        parent::__construct($id, $untranslatedDisplayName);

        $this->_persistence           = $persistence;
        $this->_httpRequestParameters = $requestParameters;

        $this->setProperty(self::$PROPERTY_UNTRANS_DESCRIPTION, $untranslatedDescription);
    }

    /**
     * @param string $name  The option name.
     * @param string $value The option value.
     *
     * @return string|null Null if stored successfully, otherwise a string error message.
     */
    protected function sendToStorage($name, $value)
    {
        return $this->_persistence->queueForSave($name, $value);
    }

    /**
     * @return tubepress_app_api_options_PersistenceInterface
     */
    protected function getOptionPersistence()
    {
        return $this->_persistence;
    }

    /**
     * @return tubepress_lib_api_http_RequestParametersInterface
     */
    protected function getHttpRequestParameters()
    {
        return $this->_httpRequestParameters;
    }

    /**
     * @return string The optional description of this element that is displayed to the user. May be empty or null.
     *
     * @api
     * @since 4.0.0
     */
    public function getUntranslatedDescription()
    {
        return $this->getOptionalProperty(self::$PROPERTY_UNTRANS_DESCRIPTION, null);
    }
}