![Vonage][logo]

# Random Fact Voice Call with PHP, uselessfacts and AWS Lambda

This repository contains the code example of a tutorial published on Vonage's [Developer Education Blog](https://learn.vonage.com).

Have you wanted to run a service without needing to create and maintain a server? Whether this to be a function triggered at set intervals or a specific action triggers this function?

In this tutorial, you'll get to create a PHP application that will be hosted on AWS Lambda, listening for a specific webhook URL to be triggered when a Vonage voice call is answered. The application will then confirm the callers number and then convert a random fact from text to speech for the person on the other end of the phone line. The fact will be retrieved from an API called [Random Useless Facts](uselessfacts.jsph.pl).

**Table of Contents**

- [Getting Started](#getting-started)
- [Code of Conduct](#code-of-conduct)
- [Contributing](#contributing)
- [License](#license)

## Prerequisites

* An [AWS Account](https://aws.amazon.com/)
* [Serverless](https://www.serverless.com/framework/docs/getting-started/) installed locally
* [PHP](https://www.php.net/docs.php) installed locally
* [Composer](https://getcomposer.org/) installed locally
* [Vonage's CLI](https://github.com/Nexmo/nexmo-cli) installed locally

## Clone the Repository

Clone or download the demo application. To download, [go to the repository]() and click on the *Clone or download* button on GitHub.

```bash
git clone 
```

Once unzipped or cloned, in your Terminal, change into the directory.

```bash
cd random-fact-with-php-bref-lambda-and-vonage
```

## Install dependencies

While still in your terminal run the following command to install all of the third party libraries this project will be using. To see what these libraries are check the contents of `"require": {}` inside the `package.json` file.

```bash
composer install
```

## Deploy the Application

To deploy the application, you'll need to run the following command:

```bash
serverless deploy
```

## Create a Vonage Application & Purchase a Virtual number

First, purchase a number in your [Dashboard](https://dashboard.nexmo/) under "Numbers" and "Buy Numbers". Make sure the number you're purchasing has Voice capabilities.

Next, create an application in your [Dashboard](https://dashboard.nexmo.com/) under "Your Applications". Give your new application a name.

Add Voice capabilities to the application and configure the URLs using the Lambda URL you copied earlier in the previous step. For the Answer URL, use `[paste lambda url]/webhooks/answer` and for the Event URL `[paste lambda url]/webhooks/event`.

Now, click the `Link` button next to your recently purchased Vonage virtual number to link your new application to the phone number.

You've purchased a Vonage virtual number, created a Vonage Application, and written the code to handle the voice webhook events. It's time to test your project in action!

## Deploy & Test the Application

The only way to test your project once you've deployed it to AWS Lambda is to call your virtual number and hear the voice reading back your phone number followed by a random fact.

## Code of Conduct

In the interest of fostering an open and welcoming environment, we strive to make participation in our project and our community a harassment-free experience for everyone. Please check out our [Code of Conduct][coc] in full.

## Contributing

We :heart: contributions from everyone! Check out the [Contributing Guidelines][contributing] for more information.

[![contributions welcome][contribadge]][issues]

## License

This project is subject to the [MIT License][license]

[logo]: vonage_logo.png "Vonage"

[contribadge]: https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat "Contributions Welcome"

[coc]: CODE_OF_CONDUCT.md "Code of Conduct"
[contributing]: CONTRIBUTING.md "Contributing"
[license]: LICENSE "MIT License"

[issues]: ./../../issues "Issues"
