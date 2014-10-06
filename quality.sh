#!/bin/bash

INPUT_DIR="./src/"
OUTPUT_DIR="./reports/"

PHPSPEC_URL="http://www.phpspec.net/"
PHPCS_URL="http://pear.php.net/package/PHP_CodeSniffer/"
PHPMD_URL="http://phpmd.org/"

if [[ ! -d ${OUTPUT_DIR} ]]; then
    echo "Creating output directory ${OUTPUT_DIR}"
    echo
    mkdir -p ${OUTPUT_DIR}
    echo
fi

echo "Running PhpSpec. See. ${PHPSPEC_URL}"
echo
./bin/phpspec run
echo

echo "Running PHP Code Sniffer. See. ${PHPCS_URL}"
echo
./bin/phpcs --standard=PSR2 ${INPUT_DIR}  --report=full --report-file=${OUTPUT_DIR}code-sniffer.txt
echo

echo "Running PHP Mess Detector. See. ${PHPMD_URL}"
echo
./bin/phpmd ${INPUT_DIR} html codesize, controversial, design, naming, unusedcode > ${OUTPUT_DIR}mess-detector.html
echo
