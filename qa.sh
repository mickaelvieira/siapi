#!/bin/sh

PHPCS="$(which phpcs)"
PHPMD="$(which phpmd)"

echo "Running PhpSpec"
./bin/phpspec run

echo "Running PHPCS"
${PHPCS} --standard=PSR2 src/

echo "Running PHPMD"
${PHPMD} src/ text codesize, controversial, design, naming, unusedcode
