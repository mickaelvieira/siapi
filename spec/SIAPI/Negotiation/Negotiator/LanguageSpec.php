<?php

namespace spec\SIAPI\Negotiation\Negotiator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class LanguageSpec
 * @package spec\SIAPI\Negotiation\Negotiator
 */
class LanguageSpec extends ObjectBehavior
{
    /**
     * @param \SIAPI\Negotiation\Header\Accept\Collection\Language $collection
     * @param \SIAPI\Negotiation\Strategy\Language $strategy
     */
    function let($collection, $strategy)
    {
        $this->beConstructedWith($collection, $strategy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Negotiator\Language');
    }

    /*function it_should_return_a_collection_of_accept_language_entities()
    {
        $this->getCollection()->shouldImplement('\Traversable');
        $this->getCollection()->shouldImplement('\IteratorAggregate');
        $this->getCollection()->shouldImplement('\Countable');
        $this->getCollection()->shouldHaveCount(3);
    }*/

    /*function it_should_an_collection_of_ordered_accept_language_entities()
    {
        $returned = array(
            0 => array('value' => 'da', 'subValue' => null, 'quality' => 1.0),
            1 => array('value' => 'en', 'subValue' => 'gb', 'quality' => 0.8),
            2 => array('value' => 'en', 'subValue' => null, 'quality' => 0.5)
        );*/

        /**
         * @TODO this loop does not work
         */

        /** @var \SIAPI\Negotiation\Header\Accept\Collection\Language $value */
        /*$key   = 0;
        $value = $this->getAcceptedValues()->first();

        do {
            var_dump($key);
            $values = $returned[$key];
            var_dump($value);

            $value->getLanguageRange()->getValue()->shouldBeEqualTo($values['value']);
            $value->getLanguageRange()->getSubValue()->shouldBeEqualTo($values['subValue']);
            $value->getQuality()->shouldBeEqualTo($values['quality']);
            $key++;
        } while ($value = $this->getAcceptedValues()->next());*/

    //}

    private function getTestHeaders()
    {
        return array(
            'Host' => 'localhost',
            'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:26.0) Gecko/20100101 Firefox/26.0',
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language' => 'da, en-gb;q=0.8, en;q=0.5',
            'Accept-Encoding' => 'gzip, deflate',
            'Referer' => 'http://localhost/siapi/',
            'Connection' => 'keep-alive',
            'Cache-Control' => 'max-age=0'
        );
    }
}
