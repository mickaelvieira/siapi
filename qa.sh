#!/bin/sh

PHPSPEC_URL="http://www.phpspec.net/"
PHPCS_URL="http://pear.php.net/package/PHP_CodeSniffer/"
PHPMD_URL="http://phpmd.org/"
PHPDCD_URL="https://github.com/sebastianbergmann/phpdcd"
PHPCPD_URL="https://github.com/sebastianbergmann/phpcpd"

if ! type "phpcs" > /dev/null; then
    echo "PHP Code Sniffer does not seem to be installed. See. ${PHPCS_URL}"
    exit 1
fi
if ! type "phpmd" > /dev/null; then
    echo "PHP Mess Detector does not seem to be installed. See. ${PHPMD_URL}"
    exit 1
fi
if ! type "phpdcd" > /dev/null; then
    echo "PHP Dead Code Detector does not seem to be installed. See. ${PHPDCD_URL}"
    exit 1
fi
if ! type "phpdcd" > /dev/null; then
    echo "PHP Copy/Paste Detector does not seem to be installed. See. ${PHPCPD_URL}"
    exit 1
fi

echo "Running PhpSpec. See. ${PHPSPEC_URL}"
echo
./bin/phpspec run
echo

echo "Running PHP Code Sniffer. See. ${PHPCS_URL}"
echo
phpcs --standard=PSR2 src/
echo

echo "Running PHP Mess Detector. See. ${PHPMD_URL}"
echo
phpmd src/ text codesize, controversial, design, naming, unusedcode
echo

echo "Running PHP Copy/Paste Detector. See. ${PHPCPD_URL}"
echo
phpcpd src/
echo

#echo "Running PHP Dead Code Detector. See. ${PHPDCD_URL}"
#echo
#phpdcd src/
#echo
