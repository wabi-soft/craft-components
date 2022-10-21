<?php

namespace wabisoft\components;

use Craft;
use craft\base\Model;
use craft\events\RegisterTemplateRootsEvent;
use craft\web\twig\variables\CraftVariable;
use craft\web\View;
use wabisoft\components\models\Settings;
use wabisoft\components\variables\ApplyClassesVariable;
use wabisoft\components\variables\GetSettingsVariable;
use yii\base\Event;
use wabisoft\components\twigextensions\Extension;

class Plugin extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();

        if (Craft::$app->request->getIsSiteRequest()) {
            Craft::$app->view->registerTwigExtension(new Extension());
        }

        /*
         * Register components
         */
        Event::on(
            View::class,
            View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
            function(RegisterTemplateRootsEvent $event) {
                $event->roots['wabi-macros'] = __DIR__ . '/templates/macros';
            }
        );
        Event::on(
            View::class,
            View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
            function(RegisterTemplateRootsEvent $event) {
                $event->roots['wabi-components'] = __DIR__ . '/templates/components';
            }
        );
        /*
         * Register variables
         */
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function(Event $e) {
                /** @var CraftVariable $variable */
                $variable = $e->sender;
                $variable->set('getWabiDefaultSettings', GetSettingsVariable::class);
                $variable->set('wabiClasses', ApplyClassesVariable::class);
            }
        );
    }
    protected function createSettingsModel() : Model
    {
        return new Settings();
    }
}
