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

namespace PhpCsFixer\Fixer\Whitespace;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;

/**
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 * @author John Paul E. Balandan, CPA <paulbalandan@gmail.com>
 */
final class SpaceAfterKeywordFixer extends AbstractFixer
{
    protected static $included = [T_IF, T_FOREACH, T_FOR, T_WHILE, T_SWITCH];

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            'Ensure single space after a keyword.',
            [
                new CodeSample(
                    '<?php
function foo() {
    if(true) {
        return true;
    }
    return false;
}
'
                ),
            ]
        );
    }

    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isAnyTokenKindsFound([...self::$included]);
    }

    protected function applyFix(\SplFileInfo $file, Tokens $tokens): void
    {
        foreach ($tokens as $index => $token) {
            if ($token->isGivenKind(self::$included)) {
                $tokens->ensureWhitespaceAtIndex($index + 1, 0, ' ');
            }
        }
    }
}
