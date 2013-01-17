<?php

namespace Rice\DeckKeeperBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;


use Behat\Behat\Context\Step;
//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Feature context.
 */
class FeatureContext extends MinkContext implements KernelAwareInterface
{
    private $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given /^я залогинен как "([^"]*)" с паролем "([^"]*)"$/
     */
    public function iaZaloghinienKakSParoliem($username, $password)
    {
        return array(
            new Step\Given("I am on \"/login\""),
            new Step\When("I fill in \"Username\" with \"$username\""),
            new Step\When("I fill in \"Password\" with \"$password\""),
            new Step\When("I press \"Login\""),
            new Step\Then("I should be on \"/\""),
        );
    }
}
