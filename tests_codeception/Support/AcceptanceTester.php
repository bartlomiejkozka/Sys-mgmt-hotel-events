<?php

declare(strict_types=1);

namespace TestsCodeception\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */

    public function logIn(): void
    {
        $this->seeCurrentUrlEquals('/login');
        $this->fillField('email', 'john.doe@gmail.com');
        $this->fillField('password', 'secret');
        $this->waitForNextPage(fn () => $this->click('Log in'));
    }

    public function logInAdmin(): void
    {
        $this->seeCurrentUrlEquals('/login');
        $this->fillField('email', 'admin123@gmail.com');
        $this->fillField('password', 'secretAdmin');
        $this->waitForNextPage(fn () => $this->click('Log in'));
    }

    public function waitForNextPage(callable $action): void
    {
        if (method_exists($this, 'waitForJS')) {
            $this->waitForJS('return document.oldPage = "yes"');
        }

        $action();

        if (method_exists($this, 'waitForJS')) {
            $this->waitForJS('return document.oldPage !== "yes"');
        }
    }

    public function assertTrue(bool $condition, string $message = ''): void
    {
        \PHPUnit\Framework\Assert::assertTrue($condition, $message);
    }


}
