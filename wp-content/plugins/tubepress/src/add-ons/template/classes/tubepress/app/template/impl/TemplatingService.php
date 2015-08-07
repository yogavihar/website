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
 *
 */
class tubepress_app_template_impl_TemplatingService implements tubepress_lib_api_template_TemplatingInterface
{
    /**
     * @var ehough_templating_EngineInterface
     */
    private $_delegate;

    /**
     * @var tubepress_lib_api_event_EventDispatcherInterface
     */
    private $_eventDispatcher;

    public function __construct(ehough_templating_EngineInterface                $delegate,
                                tubepress_lib_api_event_EventDispatcherInterface $eventDispatcher)
    {
        $this->_delegate        = $delegate;
        $this->_eventDispatcher = $eventDispatcher;
    }

    /**
     * Renders the template with the given context and returns it as string.
     *
     * @param string $originalTemplateName The name of the template to render.
     * @param array  $templateVars         An array of parameters to pass to the template
     *
     * @return string The rendered template
     */
    public function renderTemplate($originalTemplateName, array $templateVars = array())
    {
        /**
         * First dispatch the template name.
         */
        $nameSelectionEvent = $this->_eventDispatcher->newEventInstance($originalTemplateName, $templateVars);
        $this->_eventDispatcher->dispatch(tubepress_app_api_event_Events::TEMPLATE_SELECT . ".$originalTemplateName", $nameSelectionEvent);
        $newTemplateName = $nameSelectionEvent->getSubject();

        /**
         * Fire the pre-render event for the original name.
         */
        $preRenderEvent = $this->_eventDispatcher->newEventInstance($nameSelectionEvent->getArguments());
        $this->_eventDispatcher->dispatch(tubepress_app_api_event_Events::TEMPLATE_PRE_RENDER . ".$originalTemplateName", $preRenderEvent);

        if ($originalTemplateName !== $newTemplateName) {

            /**
             * Fire the pre-render event for the new name.
             */
            $preRenderEvent = $this->_eventDispatcher->newEventInstance($preRenderEvent->getSubject());
            $this->_eventDispatcher->dispatch(tubepress_app_api_event_Events::TEMPLATE_PRE_RENDER . ".$newTemplateName", $preRenderEvent);
        }

        /**
         * Render!
         */
        $result = $this->_delegate->render($newTemplateName, $preRenderEvent->getSubject());

        if ($originalTemplateName !== $newTemplateName) {

            /**
             * Fire the post-render event.
             */
            $newPostRenderEvent = $this->_eventDispatcher->newEventInstance($result, $preRenderEvent->getSubject());
            $this->_eventDispatcher->dispatch(tubepress_app_api_event_Events::TEMPLATE_POST_RENDER . ".$newTemplateName", $newPostRenderEvent);
            $result = $newPostRenderEvent->getSubject();
        }

        /**
         * Fire the post-render event.
         */
        $originalPostRenderEvent = $this->_eventDispatcher->newEventInstance($result, $preRenderEvent->getSubject());
        $this->_eventDispatcher->dispatch(tubepress_app_api_event_Events::TEMPLATE_POST_RENDER . ".$originalTemplateName", $originalPostRenderEvent);

        return $originalPostRenderEvent->getSubject();
    }
}