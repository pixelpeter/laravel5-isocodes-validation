<?php

namespace Pixelpeter\IsoCodesValidation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class IsoCodesValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // load translation files
        $this->loadTranslationsFrom(
            __DIR__ . '/../lang',
            'validation'
        );

        // registering intervention validator extension
        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $customAttributes) {
            // set the validation error messages
            foreach (get_class_methods('Pixelpeter\IsoCodesValidation\IsoCodesValidator') as $method) {
                $key = $this->getTranslationKeyFromMethodName($method);

                $messages[$key] = $this->getErrorMessage($translator, $messages, $key);
            }

            return new IsoCodesValidator($translator, $data, $rules, $messages, $customAttributes);
        });
    }

    /**
     * Return translation key for correspondent method name
     *
     * @param  string $name
     * @return string
     */
    private function getTranslationKeyFromMethodName($name)
    {
        if (stripos($name, 'validate') !== false) {
            return Str::snake(substr($name, 8));
        }

    }

    /**
     * Return the matching error message for the key
     *
     * @param  string $key
     * @return string
     */
    private function getErrorMessage($translator, $messages, $key)
    {
        // return error messages passed directly to the validator
        if (isset($messages[$key])) {
            return $messages[$key];
        }

        // return error message from validation translation file
        if ($translator->has("validation.{$key}")) {
            return $translator->get("validation.{$key}");
        }

        // return packages default message
        return $translator->get("validation::validation.{$key}");
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
