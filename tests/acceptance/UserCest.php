<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class UserCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->amOnPage('/login');
      $I->fillField('email', 'maxime_hemmerle@orange.fr');
      $I->fillField('password', 'anberlin');
      $I->click('Sign in');
      $I->see('Vous êtes connecté en tant que maxime_hemmerle@orange.fr,');
      $I->makeHtmlSnapshot();
    }

    public function tryToFailTest(AcceptanceTester $I)
    {
      $I->amOnPage('/login');
      $I->fillField('email', 'notreal@orange.fr');
      $I->fillField('password', '1');
      $I->click('Sign in');
      $I->see('Email could not be found.');
    }
}
