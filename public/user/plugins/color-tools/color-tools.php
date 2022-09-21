<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;
use Grav\Plugin\ColorTools\Color;

/**
 * Class ColorToolsPlugin
 * @package Grav\Plugin
 */
class ColorToolsPlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => [
                ['autoload', 100000], // TODO: Remove when plugin requires Grav >=1.7
                ['onPluginsInitialized', 0]
            ],
            'onTwigInitialized' => ['onTwigInitialized', 0],
        ];
    }

    /**
    * Composer autoload.
    *is
    * @return ClassLoader
    */
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        // Enable the main events we are interested in
        $this->enable([
            // Put your main events here
        ]);
    }

    public function onTwigInitialized()
    {
        $this->grav['twig']->twig()->addFunction(
            new \Twig\TwigFunction('color', function ($hex) {
                return new Color($hex);
            })
        );
        $this->grav['twig']->twig()->addFilter(
            new \Twig\TwigFilter('color', function ($hex) {
              return new Color($hex);
            })
        );
        $this->grav['twig']->twig()->addFunction(
            new \Twig\TwigFunction('name_to_hex', function ($name) {
                return Color::nameToHex($name);
            })
        );
        $this->grav['twig']->twig()->addFilter(
            new \Twig\TwigFilter('name_to_hex', function ($name) {
              return Color::nameToHex($name);
            })
        );
    }

}
