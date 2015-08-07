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
 * @since 4.0.0
 */
class tubepress_app_impl_media_AttributeFormatter implements tubepress_app_api_media_AttributeFormatterInterface
{
    /**
     * @var tubepress_app_api_options_ContextInterface
     */
    private $_context;

    /**
     * @var tubepress_lib_api_util_TimeUtilsInterface
     */
    private $_timeUtils;

    /**
     * @var tubepress_lib_api_translation_TranslatorInterface
     */
    private $_translator;

    public function __construct(tubepress_app_api_options_ContextInterface        $context,
                                tubepress_lib_api_util_TimeUtilsInterface         $timeUtils,
                                tubepress_lib_api_translation_TranslatorInterface $translator)
    {
        $this->_context    = $context;
        $this->_timeUtils  = $timeUtils;
        $this->_translator = $translator;
    }

    /**
     * @param tubepress_app_api_media_MediaItem $item
     * @param string                            $sourceAttributeName
     * @param string                            $destinationAttributeName
     * @param string                            $optionName
     */
    public function truncateStringAttribute(tubepress_app_api_media_MediaItem $item, $sourceAttributeName,
                                               $destinationAttributeName, $optionName)
    {
        if (!$item->hasAttribute($sourceAttributeName)) {

            return;
        }

        $limit = intval($this->_context->get($optionName));

        if ($limit === 0) {

            return;
        }

        $currentValue = $item->getAttribute($sourceAttributeName);

        if (strlen($currentValue) <= $limit) {

            return;
        }

        $truncated = substr("$currentValue", 0, $limit) . '...';
        $item->setAttribute($destinationAttributeName, $truncated);
    }

    /**
     * @param tubepress_app_api_media_MediaItem $item
     * @param string                            $sourceAttributeName
     * @param string                            $destinationAttributeName
     * @param int                               $precision
     */
    public function formatNumberAttribute(tubepress_app_api_media_MediaItem $item, $sourceAttributeName,
                                             $destinationAttributeName, $precision)
    {
        if (!$item->hasAttribute($sourceAttributeName)) {

            return;
        }

        $formatted = number_format((float) $item->getAttribute($sourceAttributeName), $precision);

        $item->setAttribute($destinationAttributeName, $formatted);
    }

    /**
     * @param tubepress_app_api_media_MediaItem $item
     * @param string                            $sourceAttributeName
     * @param string                            $destinationAttributeName
     */
    public function formatDateAttribute(tubepress_app_api_media_MediaItem $item, $sourceAttributeName,
                                           $destinationAttributeName)
    {
        if (!$item->hasAttribute($sourceAttributeName)) {

            return;
        }

        /**
         * Hacky way of warming up the translation service and thus setting locale etc.
         */
        $this->_translator->trans('');

        $dateFormat = $this->_context->get(tubepress_app_api_options_Names::META_DATEFORMAT);
        $relative   = $this->_context->get(tubepress_app_api_options_Names::META_RELATIVE_DATES);

        $unixTime  = $item->getAttribute($sourceAttributeName);
        $formatted = $this->_timeUtils->unixTimeToHumanReadable($unixTime, $dateFormat, $relative);

        $item->setAttribute($destinationAttributeName, $formatted);
    }

    /**
     * @param tubepress_app_api_media_MediaItem $item
     * @param string                            $sourceAttributeName
     * @param string                            $destinationAttributeName
     */
    public function formatDurationAttribute(tubepress_app_api_media_MediaItem $item, $sourceAttributeName,
                                               $destinationAttributeName)
    {
        if (!$item->hasAttribute($sourceAttributeName)) {

            return;
        }

        $seconds   = $item->getAttribute($sourceAttributeName);
        $formatted = $this->_timeUtils->secondsToHumanTime($seconds);

        $item->setAttribute($destinationAttributeName, $formatted);
    }

    /**
     * @param tubepress_app_api_media_MediaItem $item
     * @param string                            $sourceAttributeName
     * @param string                            $destinationAttributeName
     * @param string                            $glue
     */
    public function implodeArrayAttribute(tubepress_app_api_media_MediaItem $item, $sourceAttributeName,
                                             $destinationAttributeName, $glue)
    {
        if (!$item->hasAttribute($sourceAttributeName)) {

            return;
        }

        $array     = $item->getAttribute($sourceAttributeName);
        $formatted = implode($glue, $array);

        $item->setAttribute($destinationAttributeName, $formatted);
    }
}