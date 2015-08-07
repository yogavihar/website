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
 * Simple media item collector.
 */
class tubepress_app_impl_media_Collector implements tubepress_app_api_media_CollectorInterface
{
    /**
     * @var tubepress_platform_api_log_LoggerInterface Logger.
     */
    private $_logger;

    /**
     * @var boolean Is debug enabled?
     */
    private $_shouldLog;

    /**
     * @var tubepress_app_api_options_ContextInterface
     */
    private $_context;

    /**
     * @var tubepress_lib_api_event_EventDispatcherInterface
     */
    private $_eventDispatcher;

    /*
     * tubepress_app_api_environment_EnvironmentInterface
     */
    private $_environment;

    public function __construct(tubepress_platform_api_log_LoggerInterface         $logger,
                                tubepress_app_api_options_ContextInterface         $context,
                                tubepress_lib_api_event_EventDispatcherInterface   $eventDispatcher,
                                tubepress_app_api_environment_EnvironmentInterface $environment)
    {
        $this->_context         = $context;
        $this->_eventDispatcher = $eventDispatcher;
        $this->_logger          = $logger;
        $this->_shouldLog       = $logger->isEnabled();
        $this->_environment     = $environment;
    }

    /**
     * Collects a media gallery page.
     *
     * @return tubepress_app_api_media_MediaPage The media gallery page, never null.
     *
     * @api
     * @since 4.0.0
     */
    public function collectPage($currentPage)
    {
        $modeValueFromContext     = $this->_context->get(tubepress_app_api_options_Names::GALLERY_SOURCE);
        $originalEphemeralOptions = $this->_context->getEphemeralOptions();
        $isPro                    = $this->_environment->isPro();

        if ($isPro) {

            if ($this->_shouldLog) {

                $this->_logger->debug('Pro user, leaving collection up to collection listeners.');
            }

            return $this->_collectPage($modeValueFromContext, $currentPage);
        }

        /**
         * Did the user include mode in their ephemeral options?
         */
        if (isset($originalEphemeralOptions[tubepress_app_api_options_Names::GALLERY_SOURCE])) {

            if ($this->_shouldLog) {

                $this->_logger->debug(sprintf('Explicit mode requested in ephemeral options: <code>%s</code>.',
                    $modeValueFromContext));
            }

            return $this->_collectPage($modeValueFromContext, $currentPage);
        }

        $jsonEncodedSources = $this->_context->get(tubepress_app_api_options_Names::SOURCES);

        if (!$jsonEncodedSources) {

            if ($this->_shouldLog) {

                $this->_logger->debug(sprintf('Encoded sources are falsy. Falling back to stored "mode" value of <code>%s</code>.',
                    $modeValueFromContext));
            }

            return $this->_collectPage($modeValueFromContext, $currentPage);
        }

        $decodedSources = json_decode($jsonEncodedSources, true);

        if (!$decodedSources || !is_array($decodedSources) || count($decodedSources) < 1 || !is_array($decodedSources[0])) {

            if ($this->_shouldLog) {

                $this->_logger->debug(sprintf('Encoded sources are empty. Falling back to stored "mode" value of <code>%s</code>.',
                    $modeValueFromContext));
            }

            return $this->_collectPage($modeValueFromContext, $currentPage);
        }

        if ($this->_shouldLog) {

            $this->_logger->debug('Popping first stored source and applying it as ephemeral options for collection.');
        }

        $newEphemeralOptions = array_merge($originalEphemeralOptions, $decodedSources[0]);

        if (!isset($newEphemeralOptions[tubepress_app_api_options_Names::GALLERY_SOURCE])) {

            $newEphemeralOptions[tubepress_app_api_options_Names::GALLERY_SOURCE] = $modeValueFromContext;
        }

        $this->_context->setEphemeralOptions($newEphemeralOptions);

        $page = $this->_collectPage($newEphemeralOptions[tubepress_app_api_options_Names::GALLERY_SOURCE], $currentPage);

        if ($this->_shouldLog) {

            $this->_logger->debug('Restoring saved ephemeral options after page collection.');
        }

        $this->_context->setEphemeralOptions($originalEphemeralOptions);

        return $page;
    }

    private function _collectPage($modeValue, $currentPage)
    {
        $eventArgs = array(
            'pageNumber' => $currentPage
        );

        $collectionEvent = $this->_eventDispatcher->newEventInstance($modeValue, $eventArgs);

        $this->_eventDispatcher->dispatch(tubepress_app_api_event_Events::MEDIA_PAGE_REQUEST, $collectionEvent);

        if (!$collectionEvent->hasArgument('mediaPage')) {

            throw new RuntimeException(sprintf('No media providers were able to fulfill the page request for <code>%s</code>', $modeValue));
        }

        return $collectionEvent->getArgument('mediaPage');
    }

    /**
     * Fetch a single media item.
     *
     * @param string $id The media item ID to fetch.
     *
     * @return tubepress_app_api_media_MediaItem The media item, or null not found.
     *
     * @api
     * @since 4.0.0
     */
    public function collectSingle($id)
    {
        if ($this->_shouldLog) {

            $this->_logger->debug(sprintf('Fetching item with ID <code>%s</code>', $id));
        }

        $collectionEvent = $this->_eventDispatcher->newEventInstance($id);
        $this->_eventDispatcher->dispatch(tubepress_app_api_event_Events::MEDIA_ITEM_REQUEST, $collectionEvent);

        if (!$collectionEvent->hasArgument('mediaItem')) {

            throw new RuntimeException('No acceptable providers for item');
        }

        return $collectionEvent->getArgument('mediaItem');
    }
}
