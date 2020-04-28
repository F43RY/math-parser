<?php
/*
 * @package     Parsing
 * @author      Frank Wikström <frank@mossadal.se>
 * @copyright   2015 Frank Wikström
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 *
 */

namespace MathParser\Parsing\Nodes;

use MathParser\Interpreting\Visitors\Visitor;

/**
 * AST node representing a number (int or float)
 */
class NullNode extends Node
{
    /** null $value The value of the represented number. */
    private $value;

    /** Constructor. Create a NumberNode with given value. */
    function __construct()
    {
        $this->value = null;
    }

    /**
     * Returns the value
     * @retval null
     */
    public function getValue()
    {
        return null;
    }

    /**
     * Implementing the Visitable interface.
     */
    public function accept(Visitor $visitor)
    {
        return $visitor->visitNullNode($this);
    }

    /** Implementing the compareTo abstract method. */
    public function compareTo($other)
    {
        if ($other === null) {
            return true;
        }
        if (!($other instanceof NullNode)) {
            return false;
        }

        return null == $other->getValue();
    }

}
