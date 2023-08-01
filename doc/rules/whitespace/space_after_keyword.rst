============================
Rule ``space_after_keyword``
============================

Ensure single space after a keyword.

Examples
--------

Example #1
~~~~~~~~~~

.. code-block:: diff

   --- Original
   +++ New
    <?php^M
    function foo() {^M
   -    if(true) {^M
   +    if (true) {^M
            return true;^M
        }^M
        return false;^M
    }^M
