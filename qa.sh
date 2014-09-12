#!/bin/sh

NEW_LINE="\r\n"
PHPSPEC_URL="http://www.phpspec.net/"
PHPCS_URL="http://pear.php.net/package/PHP_CodeSniffer/"
PHPMD_URL="http://phpmd.org/"

if ! type "phpcs" > /dev/null; then
    echo "PHP Code Sniffer does not seem to be installed. See. ${PHPCS_URL}"
    exit 1
fi
if ! type "phpmd" > /dev/null; then
    echo "PHP Mess Detector does not seem to be installed. See. ${PHPMD_URL}"
    exit 1
fi


echo "Running PhpSpec. See. ${PHPSPEC_URL}\n"
./bin/phpspec run
echo ${NEW_LINE}

echo "Running PHP Code Sniffer. See. ${PHPCS_URL}\n"
phpcs --standard=PSR2 src/
echo ${NEW_LINE}

echo "Running Mess Detector. See. ${PHPMD_URL}\n"
phpmd src/ text codesize, controversial, design, naming, unusedcode
echo ${NEW_LINE}
