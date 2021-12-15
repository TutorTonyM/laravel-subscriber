# laravel-subscriber
This package allows you to add a subscription/newsletter form to your laravel application without having to create everything from scratch. It also helps you protect your subscription form with Google reCAPTCHA by integrating it with simple entries to your .env file. 

This package sends the form via ajax call so there is no page refresh. Due to its use of ajax calls it depends on jQuery being installed on your project. 

A nickname for this package is ttm-subscriber and we may refer to it that way throughout this document.

## Documentation
The official and more in detailed documentation for this package can be found at [https://tutortonym.com/packages/laravel/laravel-subscriber](https://tutortonym.com/packages/laravel/laravel-subscriber).

## Compatibility
This package is compatible with Laravel 5.7 and above.

## Dependencies
This package is dependent on jQuery 3 or above.

The package will automatically register itself, and it will be ready to use.

## How to Use
1. [Install the package](#installation)
2. [Publish the public files](#publishing-files)
3. [Add the style and script components](#adding-components)
4. [Add the form and alert-modal components](#adding-components)
5. [Optionally, you can add attributes to the form](#form-attributes)

That is all you need to use this package. However, if you want to make use of Google Re-Captcha v2 to protect your form from spambots, you will need to complete one more step.

6. Add the needed fields to the .env file with their corresponding values.

### Installation
You can install the package via composer:

```bash
composer require tutortonym/laravel-subscriber
```

### Publishing Files
You can publish certain files by using the artisan command vendor:publish as such:

```bash
php artisan vendor:publish --provider="tutortonym/laravel-subscriber" --tag="public"
```

### Adding Components
You will have to add certain components to your views as they are the link between all modules in this package.

#### Style Component
The style component adds the style tag with the path to the corresponding stylesheet. This component must go in the head of the page.

```html
<x-ttm-subscriber-style />
```

#### Script Component
The script component adds the script tag with the path to the corresponding javascript file. This component must go after the jQuery script tag, preferably at the bottom of the body.

```html
<x-ttm-subscriber-script />
```

#### Form Component
The form component adds the form that will be used to enter the email address to subscribe to your newsletter. This component should be place where you want to show the subscribe field.

```html
<x-ttm-subscriber-form />
```

#### Alert Modal Component
The alert modal component adds the modal responsible for the alerts (success or fail) after submitting the form. This component can be place anywhere in the page as it is not visible until it gets triggered, but it is recommended to be placed towards the bottom of the page.

```html
<x-ttm-subscriber-alert-modal />
```

### Form Attributes
There are certain values that can be modified on the form by simple variables. The following list shows the variables that can be added to the form component to modify the text on the form:

* $labelText = Modifies the label shown above the input element (default: Subscribe for Special Offers).
* $inputText = Modifies the placeholder used in the input element (default: Enter your Email).
* $buttonText = Modifies the text used in the submit button (default: SUBMIT).

We can modify any or all three by assigning a new value to each variable.
```html
<x-ttm-subscriber-form labelText="Subscribe" inputText="Email" buttonText="Send" />
```

We can also add attributes to the form such as class. By giving the form a class we can add some style to it.
```html
<x-ttm-subscriber-form class="my-style" />
```

To learn about more advaced ways to manipulate the form refer to the official [documentation](#documentation).

### Using Google Re-Captcha
If you want to protect your form from spambots using re-captcha, first you'll need Google reCAPTCHA account. Getting an account is easy, but it is outside the scope of this documentation. You can do a Google search and find plenty of help on this topic.

Once you have a Google reCAPTCHA account you will need to register your domain/site. If you are on development make sure to register localhost and 127.0.0.1. Again, this is outside the scope of this documentation.

Once you have registered your domain and have the appropriate keys, all you have to do is add three entries to your .env file.

```dotenv
GOOGLE_RECAPTCHA=true
GOOGLE_RECAPTCHA_SITE_KEY=****************************************
GOOGLE_RECAPTCHA_SECRET_KEY=****************************************
```

The "GOOGLE_RECAPTCHA" entry set to true will enable all functionality to make use of Google re-captcha v2.

The other two entries "GOOGLE_RECAPTCHA_SITE_KEY" and "GOOGLE_RECAPTCHA_SECRET_KEY" will identify your domain to the Google API when making re-captcha calls.

## More Advanced Settings
This package has a lot more settings that can be configured to your needs such as change the text on the alert and re-captcha modals, add properties to the inner elements of the form and more. For a more complete list of features visit the official [documentation](#documentation).

## About TutorTonyM

I'm a developer from the United States who creates software and websites on a daily basis. I'm passionate about what
I do, and I like to share the knowledge I possess. I share my knowledge on different platforms such as
[YouTube.com/TutorTonyM](https://www.youtube.com/tutortonym) and [TutorTonyM.com](https://tutortonym.com/).
You can follow me on my social media @TutorTonyM on [Facebook](http://www.facebook.com/tutortonym), 
[Instagram](https://www.instagram.com/tutortonym), and [Twitter](https://www.twitter.com/tutortonym).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
