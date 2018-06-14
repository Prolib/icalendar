<?php

declare(strict_types=1);

namespace ProLib\ICalendar;

class ICalendar {

	const SCALE_GREGORIAN = "GREGORIAN";

	/** @var string */
	private $uid;

	/** @var ICalEvent[] */
	private $events = [];

	/** @var string */
	private $scale = self::SCALE_GREGORIAN;

	public function __construct(string $uid) {
		$this->uid = $uid;
	}

	public function setScale(string $scale): void {
		$this->scale = $scale;
	}

	public function addEvent(ICalEvent $event): void {
		$this->events[] = $event;
	}

	public function toString(): string {
		return
			"BEGIN:VCALENDAR\n" .
			"VERSION:2.0\n" .
			"PRODID:{$this->uid}\n" .
			"CALSCALE:{$this->scale}\n" .
			$this->collectionToString($this->events) .
			"END:VCALENDAR";
	}

	protected function collectionToString(array $collections) {
		$string = '';
		foreach ($collections as $item) {
			$string .= $item->toString();
		}

		return $string;
	}

}
