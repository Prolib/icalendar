<?php

class CalendarTest extends \Codeception\Test\Unit {

	const DIR = __DIR__ . '/expected/';

	/** @var \ProLib\ICalendar\ICalendar */
	private $calendar;

	protected function _before() {
		$this->calendar = new \ProLib\ICalendar\ICalendar('myuid');
	}

	protected function _after() {
	}

	public function testBase() {
		$this->assertStringEqualsFile(self::DIR . 'base.exp', $this->calendar->toString());
	}

	public function testEvents() {
		$this->calendar->addEvent(new \ProLib\ICalendar\ICalEvent(new \DateTime('2017-01-02'), new \DateTime('2017-01-03')));
		$this->assertStringEqualsFile(self::DIR . 'events.exp', $this->calendar->toString());
	}

}