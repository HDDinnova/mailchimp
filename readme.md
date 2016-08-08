# Anekdotes Mailchimp

[![Latest Stable Version](https://poser.pugx.org/anekdotes/Mailchimp/v/stable)](https://packagist.org/packages/anekdotes/Mailchimp)
[![Build Status](https://travis-ci.org/anekdotes/Mailchimp.svg?branch=master)](https://travis-ci.org/anekdotes/Mailchimp)
[![codecov.io](https://codecov.io/github/anekdotes/Mailchimp/coverage.svg)](https://codecov.io/github/anekdotes/Mailchimp?branch=master)
[![StyleCI](https://styleci.io/repos/63967552/shield?style=flat)](https://styleci.io/repos/63967552)
[![License](https://poser.pugx.org/anekdotes/Mailchimp/license)](https://packagist.org/packages/anekdotes/Mailchimp)
[![Total Downloads](https://poser.pugx.org/anekdotes/Mailchimp/downloads)](https://packagist.org/packages/anekdotes/Mailchimp)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/50134febcefe4cc78daf07ca45969728)](https://www.codacy.com/app/Grasseh/Mailchimp?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=anekdotes/Mailchimp&amp;utm_campaign=Badge_Grade)

Utility to ease the integration of mailchimp

## Installation

Install via composer into your project:

    composer require anekdotes/mailchimp

## Basic Usage

Instantiate the class passing your mailchimp api key

```
    use Anekdotes\Mailchimp\Mailchimp;

    $mailchimp = new Mailchimp('<mailchimp api key>');
```
