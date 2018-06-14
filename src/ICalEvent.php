<?php

declare(strict_types=1);

namespace ProLib\ICalendar;

class ICalEvent {

	/** @var \DateTime */
	private $start;

	/** @var \DateTime */
	private $end;

	public function __construct(\DateTime $start, \DateTime $end) {
		$this->start = $start;
		$this->end = $end;
	}

	public function toString(): string {
		return
			"BEGIN:VEVENT\n" .
			"DTSTART:" . $this->start->format('Ymd') . "\n" .
			"DTEND:" . $this->end->format('Ymd') . "\n" .
			"END:VEVENT\n";
	}

}
