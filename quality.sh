#!/bin/bash

INPUT_DIR="./src/"
OUTPUT_DIR="./reports/"
PHPSPEC_URL="http://www.phpspec.net/"
PHPCS_URL="http://pear.php.net/package/PHP_CodeSniffer/"
PHPMD_URL="http://phpmd.org/"
PHPDCD_URL="https://github.com/sebastianbergmann/phpdcd"
PHPCPD_URL="https://github.com/sebastianbergmann/phpcpd"

usage() {
    HELP_TEXT="\n"
    HELP_TEXT+="Usage:\n"
    HELP_TEXT+=" $0 [options]\n"
    HELP_TEXT+="\n"
    HELP_TEXT+="Options:\n"
    HELP_TEXT+=" -s, --source \t Provide the source directory path\n"
    HELP_TEXT+=" -r, --report \t Provide the report directory path\n"
    HELP_TEXT+=" -h, --help   \t Print this help message\n"
    echo -e ${HELP_TEXT} 1>&2;
    exit 1;
}
invalid_source_dir() {
    ERROR_MSG="\n"
    ERROR_MSG+="Error:\n"
    ERROR_MSG+=" Invalid source directory"
    echo -e ${ERROR_MSG} 1>&2;
    usage
}
invalid_report_dir() {
    ERROR_MSG="\n"
    ERROR_MSG+="Error:\n"
    ERROR_MSG+=" Invalid report directory"
    echo -e ${ERROR_MSG} 1>&2;
    usage
}

ARGS=$(getopt -a -o s:r:h -l "source:,report:,help" -n "quality.sh" -- "$@");

if [ $? -ne 0 ]; then
    usage
    exit 1
fi

eval set -- "${ARGS}";

while true; do
    case "$1" in
        -s|--source)
            shift;
            if [ -n "$1" ]; then
                if [[ ! -d $1 ]]; then
                    invalid_source_dir
                fi
            fi
        ;;
        -r|--report)
            shift;
            if [ -n "$1" ]; then
                if [[ ! -d $1 ]]; then
                    invalid_report_dir
                fi
            fi
        ;;
        -h|--help)
            shift;
            usage
        ;;
        --)
            shift;
            break;
        ;;
    esac
done

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
phpcs --standard=PSR2 ${INPUT_DIR}  --report=full --report-file=${OUTPUT_DIR}code-sniffer.txt
echo

echo "Running PHP Mess Detector. See. ${PHPMD_URL}"
echo
phpmd ${INPUT_DIR} html codesize, controversial, design, naming, unusedcode > ${OUTPUT_DIR}mess-detector.html
echo

echo "Running PHP Copy/Paste Detector. See. ${PHPCPD_URL}"
echo
phpcpd ${INPUT_DIR}
echo

#echo "Running PHP Dead Code Detector. See. ${PHPDCD_URL}"
#echo
#phpdcd ${INPUT_DIR}
#echo
