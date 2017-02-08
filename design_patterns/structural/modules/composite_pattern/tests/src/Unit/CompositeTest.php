<?php

namespace Drupal\composite_pattern\Tests;

use Drupal\composite_pattern\Classes\InputElement;
use Drupal\composite_pattern\Classes\TextElement;
use Drupal\composite_pattern\Classes\Form;
use Drupal\Tests\UnitTestCase;

class CompositeTest extends UnitTestCase
{
    public function testRender()
    {
        $form = new Form();
        $form->addElement(new TextElement('Email:'));
        $form->addElement(new InputElement());
        $embed = new Form();
        $embed->addElement(new TextElement('Password:'));
        $embed->addElement(new InputElement());
        $form->addElement($embed);

        $this->assertEquals(
            '<form>Email:<input type="text" /><form>Password:<input type="text" /></form></form>',
            $form->render()
        );
    }
}
