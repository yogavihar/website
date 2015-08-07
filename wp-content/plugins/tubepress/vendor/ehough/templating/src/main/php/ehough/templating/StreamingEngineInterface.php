<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * ehough_templating_StreamingEngineInterface provides a method that knows how to stream a template.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface ehough_templating_StreamingEngineInterface
{
    /**
     * Streams a template.
     *
     * The implementation should output the content directly to the client.
     *
     * @param string|ehough_templating_TemplateReferenceInterface $name       A template name or a ehough_templating_TemplateReferenceInterface instance
     * @param array                                               $parameters An array of parameters to pass to the template
     *
     * @throws RuntimeException if the template cannot be rendered
     * @throws LogicException   if the template cannot be streamed
     */
    function stream($name, array $parameters = array());
}
