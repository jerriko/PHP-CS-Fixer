<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PhpCsFixer\Tests\Fixer\Whitespace;

use PhpCsFixer\Tests\Test\AbstractFixerTestCase;

/**
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 * @author John Paul E. Balandan, CPA <paulbalandan@gmail.com>
 *
 * @internal
 *
 * @covers \PhpCsFixer\Fixer\Whitespace\TypeDeclarationSpacesFixer
 */
final class SpaceAfterKeywordFixerTest extends AbstractFixerTestCase
{
    /**
     * @dataProvider provideFixCases
     */
    public function testFix(string $expected, ?string $input = null): void
    {
        $this->doTest($expected, $input);
    }

    /**
     * @return iterable<array<int, null|string>>
     */
    public static function provideFixCases(): iterable
    {
        yield [
            '<?php 
function foo() {
    if (true) {
        return true;
    }
    return;
}
',
            '<?php 
function foo() {
    if(true) {
        return true;
    }
    return;
}
',
        ];

        yield [
            '<?php
function foo() {
    foreach ([1,2] as $i) {
        echo $i;
    }
    return;
}
',
            '<?php
function foo() {
    foreach([1,2] as $i) {
        echo $i;
    }
    return;
}
',
        ];

        yield [
            '<?php
function foo() {
    for ($i=0; $i<1; $i++) {
        echo $i;
    }
    return;
}
',
            '<?php
function foo() {
    for($i=0; $i<1; $i++) {
        echo $i;
    }
    return;
}
',
        ];

        yield [
            '<?php
function foo() {
    while (true) {
        return;
    }
}
',
            '<?php
function foo() {
    while(true) {
        return;
    }
}
',
        ];

        yield [
            '<?php
function foo() {
    switch (true) {
        default:
            return;
            break;
    }
}
',
            '<?php
function foo() {
    switch(true) {
        default:
            return;
            break;
    }
}
',
        ];
    }
}
